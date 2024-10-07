<?php
/**
 * Created by PhpStorm.
 * User: Hsmadera
 * Date: 1/06/2018
 * Time: 9:52 AM
 */

namespace App\Http\Controllers;

use App\Models\HourSchedule;
use App\Models\HourSchedule2;
use App\Models\ScheduleService;
use App\Models\ServicePurchase;
use App\Models\Asesorias;
use App\Models\Users;
use App\User;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Mail;
//use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Http\Requests;
use Monolog\Handler\FilterHandler;
use App\Http\Controllers\Controller;
use Swift_SwiftException;

class ServiceController extends Controller
{
    public function BuyService(Request $request){
        try
        {
            if ($request->isMethod('post')){

                $id = $request->id;
                $service = Asesorias::find($id);
                setlocale(LC_ALL,"es_ES");
                $date = date("Y-m-d");
                $price = $service->precio;

                $dateGet = $request->date;
                $date_go = str_replace("/", "-", $dateGet);
                $hour = $request->hour;
                $schedule = ScheduleService::all();
                $serviceP = ServicePurchase::where('validate_date','=',1)->get();
                $hourSche = HourSchedule2::find($hour);

                $contSche = 0;
                foreach ($schedule as $key => $sche){
                    if($date_go == $sche->date){
                        $contSche = 1;
                    }
                }

                if($contSche == 1){
                    $contSche = 0;
                    foreach ($serviceP as $key => $servP)
                    {
                        if($servP->date == $date_go && $servP->clock == $hourSche->id){
                            $contSche = $contSche + 1;
                        }
                    }
                    if($contSche >= 1){
                        return 3;
                    }else{

                    }
                }else{
                    return 2;
                }


                $formatted_date = Carbon::now()->subMinutes(0)->toDateTimeString();
                $servicePurchase = ServicePurchase::create([
                    'user_id' => session()->get('id'),
                    'service_id' => $service->id,
                    'date' => $date_go,
                    'clock' => $hourSche->id,
                    'date_buy' => $date,
                    'total' => $price,
                    'status' => 3,
                    'validate' => 1,
                    'validate_date'=>1,
                    'created'=>$formatted_date,
                ]);
                $id = $servicePurchase->id;

                if($id > 0){
                    $reference_ped = uniqid("CO-SERVICIO{$id}");

                    DB::table('service_purchase')
                        ->where('id',$id)
                        ->where('user_id',session()->get('id'))
                        ->update([
                            'reference' => $reference_ped,
                        ]);

                    session(['type_paypal' => 3]);
                    session(['id_paypal' => $id]);

                    $status_buy = 'Pago pendiente';
                    $titulo ='¡Asesoria Claudia Obregon!';
                    $user = Users::find(session()->get('id'));
                    $serviceP = ServicePurchase::find($id);
                    try{
                        \Mail::send('emails.EmailService', [
                            'user'=>$user,'service'=>$service,'serviceP'=>$serviceP,'status'=>$status_buy
                        ], function ($m) use ($titulo,$user) {
                            $m->from('no-reply@claudiaobregon.com', 'Claudia Obregon');
                            $m->to($user->mail, 'Asesoria Claudia Obregon')->subject($titulo);
                        });
                    } catch(Swift_SwiftException $e) {
                    }
                    return 'complet';
                }
            }
        }catch (Exception $e) {
            return " Error: " . $e->getMessage();
        }
    }

}
