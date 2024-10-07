<?php
/**
 * Created by PhpStorm.
 * User: Hsmadera
 * Date: 1/06/2018
 * Time: 9:52 AM
 */

namespace App\Http\Controllers;

use App\Models\TallerPurchase;
use App\Models\Talleres;
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
use App\Http\Controllers\Controller;
use Swift_SwiftException;
use MailchimpMarketing;

class TallerController extends Controller
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
    public function BuyTaller(Request $request){
        try
        {
            if ($request->isMethod('post')){
                $id = $request->id;
                $taller = Talleres::find($id);
                setlocale(LC_ALL,"es_ES");
                $date = date("Y-m-d");

                if($taller->cupos_descount <= 0){
                    return 'lleno';
                }

                $price = $taller->precio;

                $id = DB::table('taller_purchase')->insertGetId(
                    [
                        'user_id' => session()->get('id'),
                        'taller_id' => $taller->id,
                        'date' => $taller->date,
                        'date_buy' => $date,
                        'total' => $price,
                        'status' => 3,
                        'validate' => 1
                    ]
                );

                if($id > 0){
                    $reference_ped = uniqid("CO-TALLER{$id}");

                    DB::table('taller_purchase')
                        ->where('id',$id)
                        ->where('user_id',session()->get('id'))
                        ->update(['reference' => $reference_ped]);

                    session(['type_paypal' => 2]);
                    session(['id_paypal' => $id]);

                    if($taller->precio == 0){

                        DB::table('taller_purchase')
                            ->where('id',$id)
                            ->where('user_id',session()->get('id'))
                            ->update(['status' => 1,'validate' => 2]);

                        $status_buy = 'Pago realizado';
                        $titulo ='¡Curso Claudia Obregon!';
                        $user = Users::find(session()->get('id'));
                        $tallerP = TallerPurchase::find($id);
                        $taller->cupos_descount = $taller->cupos_descount - 1;
                        $taller->save();
                        try{
                            \Mail::send('emails.EmailTaller', [
                                'user'=>$user,'taller'=>$taller,'tallerP'=>$tallerP,'status'=>$status_buy
                            ], function ($m) use ($titulo,$user) {
                                $m->from('no-reply@claudiaobregon.com', 'Claudia Obregon');
                                $m->to($user->mail, 'Taller Claudia Obregon')->subject($titulo);
                            });
                        } catch(Swift_SwiftException $e) {
                        }
                        try{
                            $this->clientMailChimp->lists->updateListMemberTags($this->listIdMailChimp, $user->mail, [
                                "tags" => [["name" => $taller->tag_mailchimp,"status" => "active"]],
                            ]);
                        } catch(\Exception  $e) {
                        }
                        return 'buy';
                    }else{
                        $status_buy = 'Pago pendiente';
                        $titulo ='¡Taller Claudia Obregon!';
                        $user = Users::find(session()->get('id'));
                        $tallerP = TallerPurchase::find($id);
                        try{
                            \Mail::send('emails.EmailTaller', [
                                'user'=>$user,'taller'=>$taller,'tallerP'=>$tallerP,'status'=>$status_buy
                            ], function ($m) use ($titulo,$user) {
                                $m->from('no-reply@claudiaobregon.com', 'Claudia Obregon');
                                $m->to($user->mail, 'Taller Claudia Obregon')->subject($titulo);
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
}
