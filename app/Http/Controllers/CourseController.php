<?php
/**
 * Created by PhpStorm.
 * User: Hsmadera
 * Date: 1/06/2018
 * Time: 9:52 AM
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CoursePurchase;
use App\Models\Cursos;
use App\Models\Info;
use App\Models\Users;
use App\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Mail;
//use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Http\Requests;
use Monolog\Handler\FilterHandler;
use Swift_SwiftException;
use MailchimpMarketing;

class CourseController extends Controller
{
    private $clientMailChimp;
    private $listIdMailChimp;
    public function __construct()
    {
        $mailchimpConfig = Config::get('mailchimp');

        $this->clientMailChimp = new MailchimpMarketing\ApiClient();
        $this->clientMailChimp->setConfig([
            'apiKey' => $mailchimpConfig['api_key'],
            'server' => $mailchimpConfig['server_prefix'],
        ]);
        $this->listIdMailChimp = $mailchimpConfig['list_id'];
    }
    public function BuyCourse(Request $request){
        try
        {
            if ($request->isMethod('post')){

                $id = $request->id;
                $course = Cursos::find($id);
                setlocale(LC_ALL,"es_ES");
                $date = date("Y-m-d");
                $price = $course->precio;

                $id = DB::table('course_purchase')->insertGetId(
                    [
                        'user_id' => session()->get('id'),
                        'course_id' => $course->id,
                        'date_buy' => $date,
                        'total' => $price,
                        'status' => 3,
                        'validate' => 1,
                    ]
                );

                if($id > 0){
                    $reference_ped = uniqid("CO-COURSE{$id}");

                    DB::table('course_purchase')
                        ->where('id',$id)
                        ->where('user_id',session()->get('id'))
                        ->update(['reference' => $reference_ped]);

                    session(['type_paypal' => 1]);
                    session(['id_paypal' => $id]);

                    if($course->precio == 0){
                        DB::table('course_purchase')
                            ->where('id',$id)
                            ->where('user_id',session()->get('id'))
                            ->update(['status' => 1,'validate' => 2]);

                        $status_buy = 'Pago realizado';
                        $titulo ='¡Curso Claudia Obregon!';
                        $user = Users::find(session()->get('id'));
                        $courseP = CoursePurchase::find($id);
                        try{
                            \Mail::send('emails.EmailCourse', [
                                'user'=>$user,'course'=>$course,'courseP'=>$courseP,'status'=>$status_buy
                            ], function ($m) use ($titulo,$user) {
                                $m->from('no-reply@claudiaobregon.com', 'Claudia Obregon');
                                $m->to($user->mail, 'Curso Claudia Obregon')->subject($titulo);
                            });
                        } catch(Swift_SwiftException $e) {
                        }
                        try{
                            $this->clientMailChimp->lists->updateListMemberTags($this->listIdMailChimp, $user->mail, [
                                "tags" => [["name" => $course->tag_mailchimp, "status" => "active"]],
                            ]);
                        } catch(\Exception  $e) {
                        }
                        return 'buy';
                    }else{
                        $status_buy = 'Pago pendiente';
                        $titulo ='¡Curso Claudia Obregon!';
                        $user = Users::find(session()->get('id'));
                        $courseP = CoursePurchase::find($id);
                        try{
                            \Mail::send('emails.EmailCourse', [
                                'user'=>$user,'course'=>$course,'courseP'=>$courseP,'status'=>$status_buy
                            ], function ($m) use ($titulo,$user) {
                                $m->from('no-reply@claudiaobregon.com', 'Claudia Obregon');
                                $m->to($user->mail, 'Curso Claudia Obregon')->subject($titulo);
                            });
                        } catch(Swift_SwiftException $e) {
                        }
                        return 'complet';
                    }
                }
            }
        }catch (Exception $e) {
            return " Error: " . $e->getMessage();
        }
    }

    public function PaypalCourse()
    {
        $info = Info::find(1);
        $course = CoursePurchase::find(session()->get('id_course_payu'));
        $user = User::find($course->user_id);
        return view('components.courses.paypalCourse',[
            'info' => $info,
            'course' => $course,
            'user' => $user,
        ]);
    }
}
