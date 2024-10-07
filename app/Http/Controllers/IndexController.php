<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Asesorias;
use App\Models\City;
use App\Models\Contact;
use App\Models\ScheduleService;
use App\Models\ScheduleServiceHour;
use App\Models\State;
use App\Models\Subscribe;
use App\Models\SubscribeMob;
use App\Models\Users;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Mail;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Swift_SwiftException;
use MailchimpMarketing;

class IndexController
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

  public function Contact(Request $request)
  {
    try {
      if ($request->isMethod('post')) {
        $name = $request->input('nameContact');
        $email = $request->input('mailContact');
        $messague = $request->input('messagueContact');

        //validar repcatcha
        $token = $request->input('token');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array(
            'secret' => '6LeaIIkkAAAAAAwI9RHxQ0_H_QmSjcJ5rWvO3UtW',
            'response' => $token)
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        $arrResponse = json_decode($response, true);
        if($arrResponse["success"] == '1' && $arrResponse["score"] >= 0.5) {
        }else{
          return 0;
        }
        //endvalidar

        $contact = new Contact();
        $contact->name = $name;
        $contact->email = $email;
        $contact->messague = $messague;

        if ($contact->save()) {
          /*
          try {
            $titulo = '¡Nuevo contacto!';
            Mail::send('email', [
              'name' => $name,
              'email' => $email,
              'messague' => $messague
            ],
              function ($m) use ($titulo) {
                $m->from('no-reply@claudiaobregon.com', 'Claudia Obregón');
                $m->to('info@claudiaobregon.com', 'Nuevo contacto')->subject($titulo);
              });
            return 1;
          }catch (\Exception $e){
            return 1;
          }
          */
          return 1;
        } else {
          return 1;
        }
      }else{
        return 0;
      }
    } catch (Exception $e) {
      return " Error: " . $e->getMessage();
    }
  }

  public function Subscribe(Request $request)
  {
    try {
      if ($request->isMethod('post')) {
        $email = $request->input('mailSubscribe');

        //validar repcatcha
        $token = $request->input('token');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array(
            'secret' => '6LfRdtwZAAAAAKh0QGShmtE19H-_hdroKNxT6NNr',
            'response' => $token)
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        $arrResponse = json_decode($response, true);
        if($arrResponse["success"] == '1' && $arrResponse["score"] >= 0.5) {
        }else{
          return 0;
        }
        //endvalidar

        $subscribe = new Subscribe();
        $subscribe->email = $email;

        if ($subscribe->save()) {
          try {
            $titulo = '¡Nueva Suscripción a Newsletter!';
            Mail::send('subscribeEmail', [
              'email' => $email,
            ],
              function ($m) use ($titulo) {
                $m->from('no-reply@claudiaobregon.com', 'Claudia Obregón');
                $m->to('info@claudiaobregon.com', 'Nueva Suscripción a Newsletter')->subject($titulo);
              });
              $titulo = '¡Gracias por suscribirte !';
              Mail::send('emails.EmailThanksSubscribe', [
                  'email' => $email,
              ],
                  function ($m) use ($titulo,$email) {
                      $m->from('no-reply@claudiaobregon.com', 'Claudia Obregón');
                      $m->to($email, 'Gracias por suscribirte')->subject($titulo);
                  });
            return 1;
          }catch (\Exception $e){
            return $e;
          }
        } else {
          return 0;
        }
      }else{
        return 0;
      }
    } catch (Exception $e) {
      return " Error: " . $e->getMessage();
    }
  }

  public function SubscribeMob(Request $request)
  {
    try {
      if ($request->isMethod('post')) {
        $email = $request->input('mailSubscribeMob');

        //validar repcatcha
        $token = $request->input('token');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array(
            'secret' => '6LfRdtwZAAAAAKh0QGShmtE19H-_hdroKNxT6NNr',
            'response' => $token)
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        $arrResponse = json_decode($response, true);
        if($arrResponse["success"] == '1' && $arrResponse["score"] >= 0.5) {
        }else{
          return 0;
        }
        //endvalidar

        $subscribeMob = new SubscribeMob();
        $subscribeMob->email = $email;

        if ($subscribeMob->save()) {
          try {
            $titulo = '¡Nueva Suscripción a Newsletter!';
            Mail::send('subscribeEmail', [
              'email' => $email,
            ],
              function ($m) use ($titulo) {
                $m->from('no-reply@claudiaobregon.com', 'Claudia Obregón');
                $m->to('info@claudiaobregon.com', 'Nueva Suscripción a Newsletter')->subject($titulo);
              });
            $titulo = '¡Gracias por suscribirte !';
            Mail::send('emails.EmailThanksSubscribe', [
              'email' => $email,
            ],
              function ($m) use ($titulo,$email) {
                $m->from('no-reply@claudiaobregon.com', 'Claudia Obregón');
                $m->to($email, 'Gracias por suscribirte')->subject($titulo);
              });
            return 1;
          }catch (\Exception $e){
            return 1;
          }
        } else {
          return 0;
        }
      }else{
        return 0;
      }
    } catch (Exception $e) {
      return " Error: " . $e->getMessage();
    }
  }

    public function GetStates(Request $request)
    {
        try
        {
            $data= State::where('CodPais', $request->id)
                ->orderBy("DisNombre")
                ->get();
            return response(json_encode($data), 200)->header('Content-Type', 'text/json');
        }catch (Exception $e) {
            return " Error: " . $e->getMessage();
        }
    }

    public function GetCities(Request $request)
    {
        try
        {
            $data= City::where('CodDistrito', $request->id)
                ->orderBy("CiuNombre")
                ->get();
            return response(json_encode($data), 200)->header('Content-Type', 'text/json');
        }catch (Exception $e) {
            return " Error: " . $e->getMessage();
        }
    }

    public function RegisterUser(Request $request)
    {
        try
        {
            $veri = $request->input("mail");
            $email = Users::select('mail')
                ->get();
            $num = 0;
            foreach ($email as $key => $row){
                if($row->mail == $veri){
                    $num = $num + 1 ;
                }
            }
            if($num == 0){
                $user = new Users();
                $user->name = $request->input("name");
                $user->phone = $request->input("phone");
                $user->mail = $request->input("mail");
                $user->password = $request->input("password");
                if ($user->save()) {
                    $array = $request->input('numberList');
                    $vector = explode(',',$array);
                    for($i = 0; $i < count($vector); ++$i){
                        if($vector[$i] == 'si'){
                            $address = new Address();
                            $address->user_id = $user->id;
                            $address->address = $request->input('address'.$i);
                            $address->town = $request->input('town'.$i);
                            $address->description = $request->input('description'.$i);
                            $address->country = $request->input('country'.$i);
                            $address->state = $request->input('state'.$i);
                            $address->city = $request->input('city'.$i);
                            $address->save();
                        }
                    }
                    session(['id' => $user->id]);
                    $name = explode(" ", $user->name);
                    session(['name' => $name[0]]);
                    try{
                        $titulo = '¡Registro exitoso!';
                        \Mail::send('emails.EmailRegister', ['user'=>$user], function ($m) use ($titulo,$user) {
                            $m->from('no-reply@claudiaobregon.com', 'Claudia Obregon');
                            $m->to($user->mail, 'Registro exitoso')->subject($titulo);
                        });
                        $titulo = '¡Nuevo Registro!';
                        \Mail::send('emails.EmailRegisterClaudia', ['user'=>$user], function ($m) use ($titulo,$user) {
                            $m->from('no-reply@claudiaobregon.com', 'Claudia Obregon');
                            $m->to('info@claudiaobregon.com', 'Nuevo Registro')->subject($titulo);
                        });
                    } catch(Swift_SwiftException $e) {
                    }
                    try{
                        $this->clientMailChimp->lists->addListMember($this->listIdMailChimp, [
                            "email_address" => $user->mail,
                            "status" => "subscribed",
                            "merge_fields" => [
                                "FNAME"=>$user->name,
                                "LNAME"=>$user->name,
                                "PHONE"=>$user->phone
                            ]
                        ]);
                    } catch(\Exception  $e) {
                    }
                    return 1;
                } else {
                    return 0;
                }
            }else{
                return 2;
            }
        } catch (Exception $e) {
            return " Error: " . $e->getMessage();
        }
    }

    public function Login(Request $request)
    {
        try
        {
            if ($request->isMethod('post')){
                $email = $request->input("email");
                $password = $request->input('pass');
                $user = Users::where('mail', $email)
                    ->get();
                $users = Users::where('mail', $email)->count();
                if($users > 0){
                    if($user[0]->password == $password){
                        session(['id' => $user[0]->id]);
                        $name = explode(" ", $user[0]->name);
                        session(['name' => $name[0]]);
                        return "1";
                    }else{
                        return "Usuario o contraseña incorrecta";
                    }
                }else{
                    return "Usuario o contraseña incorrecta";
                }
            }
        } catch (Exception $e) {
            return " Error: " . $e->getMessage();
        }
    }

    public function LogOut(Request $request)
    {
        $request->session()->forget('id');
        return redirect('/');
    }

    public function ForgetPassword(Request $request){
        try
        {
            $email = $request->data;
            $users = Users::where('mail', $email)->count();
            if($users > 0){
                $user =  Users::where('mail', $email)->take(1)->get();
                $password = $user[0]->password;
                try{
                    $titulo ='¡Recuperacion de contraseña!';
                    Mail::send('emails.EmailForgetPassword', ['user'=>$user], function ($m) use ($titulo,$user) {
                        $m->from('no-reply@claudiaobregon.com', 'Claudia Obregon');
                        $m->to($user[0]->mail, 'Recuperacion de contraseña')->subject($titulo);
                    });
                    return 1;
                } catch(Swift_SwiftException $e) {
                    return 0;
                }
            }else{
                return 2;
            }
        } catch (Exception $e) {
            return " Error: " . $e->getMessage();
        }
    }

    public function GetCalendar(Request $request)
    {
        try
        {
            setlocale(LC_ALL,"es_CO");
            ini_set('date.timezone','America/Bogota');
            date_default_timezone_set('America/Bogota');
            $monthArray = $request->month;
            if($monthArray<=9)
            {
                $month= '0'.$monthArray;
            }else{
                $month = $monthArray;
            }
            $year=$request->year;
            $diaActual=date("j");
            $mesActual=date("n");
            $yearActual = date('Y');
            return view('components.asesorias.calendar',[
                'monthArray'=>$monthArray,
                'month'=>$month,
                'year'=>$year,
                'diaActual'=>$diaActual,
                'mesActual'=>$mesActual,
                'yearActual'=>$yearActual
            ]);
        }catch (Exception $e) {
            return " Error: " . $e->getMessage();
        }
    }

    function GetHourServiceSolic(Request $request){
        try
        {
            $date = str_replace("/", "-", $request->date);
            $data= ScheduleService::where('date',$date)
                ->orderBy("hour",'asc')
                ->get();
            //$dataHour = HourSchedule::whereNull('deleted_at')->where('id',1)->get();
            $where = '';
            $cont = 0;
            foreach($data as $key => $dt){
                $cont = $key;
            }
            foreach($data as $key => $dt){
                if($cont == $key){
                    $where = $where . ' id = ' . $dt->hour;
                }else{
                    $where = $where . ' id = ' . $dt->hour . ' OR';
                }
            }
            $dataHour = DB::select('SELECT * FROM hour_schedule WHERE id = 0 OR'.$where.' ORDER BY name ASC');
            return response(json_encode($dataHour), 200)->header('Content-Type', 'text/json');
        }catch (Exception $e) {
            return " Error: " . $e->getMessage();
        }
    }

    public function GetHourServiceSolic_2(Request $request) {
        //$date = str_replace("/", "-", $request->date);
        $data= ScheduleService::where('date','=',$request->date)
            ->orderBy("hour",'asc')
            ->get();
        //return $data;
        $where = '';
        $where_2 = '';
        $cont = 0;
        foreach($data as $key => $dt){
            $cont = $key;
        }
        foreach($data as $key => $dt){
            if($cont == $key){
                $where = $where . ' id = ' . $dt->hour;
                $where_2 = $where_2 . ' id = ' . $dt->hour_end;
            }else{
                $where = $where . ' id = ' . $dt->hour . ' OR';
                $where_2 = $where_2 . ' id = ' . $dt->hour_end  . ' OR';
            }
        }
        $dataHour = DB::select('SELECT * FROM hour_schedule WHERE id = 0 OR'.$where.' ORDER BY name ASC');
        $dataHour_2 = DB::select('SELECT * FROM hour_schedule WHERE id = 0 OR'.$where_2.' ORDER BY name ASC');
        return view('components.asesorias.hour',[
            'dataHour'=>$dataHour,
            'dataHour_2'=>$dataHour_2,
            'date'=>$request->date
        ]);
    }

    public function GetHourServiceSolic_3(Request $request) {
        $dates = ScheduleService::where('date','=',$request->date)
            ->orderBy("id",'desc')
            ->get();
        $where = '';
        foreach($dates as $key => $dt){
            $data = ScheduleServiceHour::where('schedule_id','=',$dt->id)
                ->orderBy("id",'asc')
                ->get();
            foreach($data as $key_2 => $dt_2){
                $where = $where . ' id = ' . $dt_2->hour_id . ' OR';
            }
        }
        $dataHour = DB::select('SELECT * FROM hour_schedule_2 WHERE id = 0 OR'.$where.' id = 0 ORDER BY name ASC');
        return view('components.asesorias.hour',[
            'dataHour'=>$dataHour,
            'date'=>$request->date
        ]);
    }

    public function GetService(Request $request){
        try {
            if ($request->isMethod('post')) {
                $id = $request->input('category_id');
                $a = Asesorias::find($id);

                setlocale(LC_ALL,"es_CO");
                ini_set('date.timezone','America/Bogota');
                date_default_timezone_set('America/Bogota');
                $monthArray=date("n");
                $month=date("m");
                $year=date("Y");
                $diaActual=date("j");
                $mesActual=date("n");

                $validate_s = false;
                if(session()->has('id')){
                    $date = date("Y-m-d");
                    $courseP = \App\Models\ServicePurchase::where('service_id',$a->id)
                        ->where('user_id',session()->get('id'))
                        ->where('date','>=',$date)
                        ->where('status',1)
                        ->orderBy('id','desc')
                        ->get();
                    $courseP_v = \App\Models\ServicePurchase::where('service_id',$a->id)
                        ->where('user_id',session()->get('id'))
                        ->where('date','>=',$date)
                        ->where('status','!=',1)
                        ->where('validate_date',1)
                        ->orderBy('id','desc')
                        ->get();
                    if($courseP->count() > 0){
                        $validate_s = true;
                        $courseBuy = $courseP[0];
                    }elseif($courseP_v->count() > 0){
                        $validate_s = true;
                        $courseBuy = $courseP_v[0];
                    }else{
                        $validate_s = false;
                    }
                }else{
                }
                if($validate_s == true){
                    return view('components.asesorias.modal_buy',[
                        'a'=>$a,
                        'courseBuy' => $courseBuy
                    ]);
                }else{
                    return view('components.asesorias.modal',[
                        'a'=>$a,
                        'monthArray'=>$monthArray,
                        'month'=>$month,
                        'year'=>$year,
                        'diaActual'=>$diaActual,
                        'mesActual'=>$mesActual
                    ]);
                }
            }else{
                return '';
            }
        } catch (Exception $e) {
            return '';
        }
    }

    public function UpdateUser(Request $request){
        try
        {
            $user = Users::find(session()->get('id'));
            $user->name = $request->input("name");
            $user->phone = $request->input("phone");
            $user->mail = $request->input("mail");
            if($request->input("password") == $user->password ){
                $user->password = $request->input("password_new");
            }
            if ($user->save()) {
                session(['id' => $user->id]);
                $name = explode(" ", $user->name);
                session(['name' => $name[0]]);
                return 1;
            } else {
                return 0;
            }
        } catch (Exception $e) {
            return " Error: " . $e->getMessage();
        }
    }

    public function ShopGo(Request $request){
        try
        {
            $veri = $request->input("mail");
            $email = Users::select('mail')
                ->get();
            $num = 0;
            foreach ($email as $key => $row){
                if($row->mail == $veri){
                    $num = $num + 1 ;
                }
            }
            if($num == 0){
                $user = new Users();
                $user->name = $request->input("name");
                $user->phone = $request->input("phone");
                $user->mail = $request->input("mail");
                $name = explode(" ", $user->name);
                $user->password = strtolower($name[0]).rand(00000, 99999);
                if ($user->save()) {
                    session(['id' => $user->id]);
                    $name = explode(" ", $user->name);
                    session(['name' => $name[0]]);
                    try{
                        $titulo = '¡Registro exitoso!';
                        \Mail::send('emails.EmailRegister', ['user'=>$user], function ($m) use ($titulo,$user) {
                            $m->from('no-reply@claudiaobregon.com', 'Claudia Obregon');
                            $m->to($user->mail, 'Registro exitoso')->subject($titulo);
                        });
                        $titulo = '¡Nuevo Registro!';
                        \Mail::send('emails.EmailRegisterClaudia', ['user'=>$user], function ($m) use ($titulo,$user) {
                            $m->from('no-reply@claudiaobregon.com', 'Claudia Obregon');
                            $m->to('info@claudiaobregon.com', 'Nuevo Registro')->subject($titulo);
                        });
                    } catch(Swift_SwiftException $e) {
                    }
                    try{
                        $this->clientMailChimp->lists->addListMember($this->listIdMailChimp, [
                            "email_address" => $user->mail,
                            "status" => "subscribed",
                            "merge_fields" => [
                                "FNAME"=>$user->name,
                                "LNAME"=>$user->name,
                                "PHONE"=>$user->phone
                            ]
                        ]);
                    } catch(\Exception  $e) {
                    }
                    return 1;
                } else {
                    return 0;
                }
            }else{
                $user =  Users::where('mail',$veri)
                    ->first();
                session(['id' => $user->id]);
                $name = explode(" ", $user->name);
                session(['name' => $name[0]]);
                return 1;
            }
        } catch (Exception $e) {
            return " Error: " . $e->getMessage();
        }
    }
}
