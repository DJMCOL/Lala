<?php

namespace App\Http\Controllers;

use App\Models\Asesorias;
use App\Models\CoursePurchase;
use App\Models\Cursos;
use App\Models\Info;
use App\Models\ServicePurchase;
use App\Models\Talleres;
use App\Models\TallerPurchase;
use App\Models\Users;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;
use Swift_SwiftException;
use Mail;
use MailchimpMarketing;

class PaypalController extends Controller
{
    private $apiContext;
    private $clientMailChimp;
    private $listIdMailChimp;

    public function __construct()
    {
        $payPalConfig = Config::get('paypal');
        $mailchimpConfig = Config::get('mailchimp');

        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                $payPalConfig['client_id'],
                $payPalConfig['secret']
            )
        );

        $this->apiContext->setConfig($payPalConfig['settings']);

        $this->clientMailChimp = new MailchimpMarketing\ApiClient();
        $this->clientMailChimp->setConfig([
            'apiKey' => $mailchimpConfig['api_key'],
            'server' => $mailchimpConfig['server_prefix'],
        ]);
        $this->listIdMailChimp = $mailchimpConfig['list_id'];
    }

    // ...

    public function payWithPayPal()
    {
        if(session()->has('id_paypal')){
            switch (session()->get('type_paypal')){
                case 1:
                    $info = CoursePurchase::find(session()->get('id_paypal'));
                    $price =  $info->total;
                    $reference =  $info->reference;
                    $description =  'Pago de curso - claudiaobregon.com - Referencia:'.$reference;
                    break;
                case 2:
                    $info = TallerPurchase::find(session()->get('id_paypal'));
                    $price =  $info->total;
                    $reference =  $info->reference;
                    $description =  'Pago de taller - claudiaobregon.com - Referencia:'.$reference;
                    break;
                case 3:
                    $info = ServicePurchase::find(session()->get('id_paypal'));
                    if($info->validate_date == 2){
                        return redirect('/');
                    }
                    $price =  $info->total;
                    $reference =  $info->reference;
                    $description =  'Pago de asesoria - claudiaobregon.com - Referencia:'.$reference;
                    break;
            }
        }else{
            return redirect('/');
        }
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new Amount();
        $amount->setTotal($price);
        $amount->setCurrency('USD');

        $transaction = new Transaction();
        $transaction->setAmount($amount);
        $transaction->setDescription($description);
        //$transaction->setPurchaseUnitReferenceId($reference);

        $callbackUrl = url('/paypal/status');

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl($callbackUrl)
            ->setCancelUrl($callbackUrl);

        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);

        try {
            $payment->create($this->apiContext);
            return redirect()->away($payment->getApprovalLink());
        } catch (PayPalConnectionException $ex) {
            //echo $ex->getData();
            $code = 1;
            $status = '¡Lo sentimos! El pago no se pudo realizar.';
            session(['code' => $code]);
            session(['status' => $status]);
            return redirect('/paypal/results');
        }
    }

    public function payPalStatus(Request $request)
    {

        //dd($request->all());
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');
        $token = $request->input('token');

        if (!$paymentId || !$payerId || !$token) {
            $code = 1;
            $status = '¡Lo sentimos! El pago no se pudo realizar.';
            session(['code' => $code]);
            session(['status' => $status]);
            return redirect('/paypal/results');
        }

        $payment = Payment::get($paymentId, $this->apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        /** Execute the payment **/
        $result = $payment->execute($execution, $this->apiContext);
        if ($result->getState() === 'approved') {
            $code = 2;
            $status = '¡Gracias! El pago se ha ralizado correctamente.';
        }else{
            $code = 1;
            $status = '¡Lo sentimos! El pago no se pudo realizar.';
        }
        if($code == 2){
            if(session()->has('id_paypal')) {
                $status_buy = 'Pago realizado';
                $user = Users::find(session()->get('id'));
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
                switch (session()->get('type_paypal')) {
                    case 1:
                        $info = CoursePurchase::find(session()->get('id_paypal'));
                        $info->status = 1;
                        $info->validate = 2;
                        $info->update();

                        $titulo ='¡Curso Pagado Claudia Obregon!';
                        $course = Cursos::find($info->course_id);
                        try{
                            \Mail::send('emails.EmailCourse', [
                                'user'=>$user,'course'=>$course,'courseP'=>$info,'status'=>$status_buy
                            ], function ($m) use ($titulo,$user) {
                                $m->from('no-reply@claudiaobregon.com', 'Claudia Obregon');
                                $m->to($user->mail, 'Curso Claudia Obregon')->subject($titulo);
                            });
                            \Mail::send('emails.EmailCoursePay', [
                                'user'=>$user,'course'=>$course,'courseP'=>$info,'status'=>$status_buy
                            ], function ($m) use ($titulo,$user) {
                                $m->from('no-reply@claudiaobregon.com', 'Claudia Obregon');
                                $m->to('info@claudiaobregon.com', 'Curso Pagado Claudia Obregon')->subject($titulo);
                            });
                        } catch(Swift_SwiftException $e) {
                        }
                        try{
                            $this->clientMailChimp->lists->updateListMemberTags($this->listIdMailChimp, $user->mail, [
                                "tags" => [["name" => $course->tag_mailchimp, "status" => "active"]],
                            ]);
                        } catch(\Exception  $e) {
                        }
                        break;
                    case 2:
                        $info = TallerPurchase::find(session()->get('id_paypal'));
                        $info->status = 1;
                        $info->validate = 2;
                        $info->update();

                        $titulo ='¡Taller Pagado Claudia Obregon!';
                        $taller = Talleres::find($info->taller_id);
                        $taller->cupos_descount = $taller->cupos_descount - 1;
                        $taller->save();
                        try{
                            \Mail::send('emails.EmailTaller', [
                                'user'=>$user,'taller'=>$taller,'tallerP'=>$info,'status'=>$status_buy
                            ], function ($m) use ($titulo,$user) {
                                $m->from('no-reply@claudiaobregon.com', 'Claudia Obregon');
                                $m->to($user->mail, 'Taller Claudia Obregon')->subject($titulo);
                            });
                            \Mail::send('emails.EmailTallerPay', [
                                'user'=>$user,'taller'=>$taller,'tallerP'=>$info,'status'=>$status_buy
                            ], function ($m) use ($titulo,$user) {
                                $m->from('no-reply@claudiaobregon.com', 'Claudia Obregon');
                                $m->to('info@claudiaobregon.com', 'Taller Pagado Claudia Obregon')->subject($titulo);
                            });
                        } catch(Swift_SwiftException $e) {
                        }
                        try{
                            $this->clientMailChimp->lists->updateListMemberTags($this->listIdMailChimp, $user->mail, [
                                "tags" => [["name" => $taller->tag_mailchimp,"status" => "active"]],
                            ]);
                        } catch(\Exception  $e) {
                        }
                        break;
                    case 3:
                        $info = ServicePurchase::find(session()->get('id_paypal'));
                        $info->status = 1;
                        $info->validate = 2;
                        $info->update();

                        $titulo ='¡Asesoria Pagada Claudia Obregon!';
                        $service = Asesorias::find($info->service_id);
                        try{
                            \Mail::send('emails.EmailService', [
                                'user'=>$user,'service'=>$service,'serviceP'=>$info,'status'=>$status_buy
                            ], function ($m) use ($titulo,$user) {
                                $m->from('no-reply@claudiaobregon.com', 'Claudia Obregon');
                                $m->to($user->mail, 'Asesoria Claudia Obregon')->subject($titulo);
                            });
                            \Mail::send('emails.EmailServicePay', [
                                'user'=>$user,'service'=>$service,'serviceP'=>$info,'status'=>$status_buy
                            ], function ($m) use ($titulo,$user) {
                                $m->from('no-reply@claudiaobregon.com', 'Claudia Obregon');
                                $m->to('info@claudiaobregon.com', 'Asesoria Pagada Claudia Obregon')->subject($titulo);
                            });
                        } catch(Swift_SwiftException $e) {
                        }
                        try{
                            $this->clientMailChimp->lists->updateListMemberTags($this->listIdMailChimp, $user->mail, [
                                "tags" => [["name" => $service->tag_mailchimp, "status" => "active"]],
                            ]);
                        } catch(\Exception  $e) {
                        }
                        break;
                }
            }else{
                $code = 1;
                $status = '¡Lo sentimos! El pago no se pudo realizar.';
            }
        }
        session(['code' => $code]);
        session(['status' => $status]);
        return redirect('/paypal/results');
    }

    public function payPalResult()
    {

        $info = Info::find(1);
        return view('components.paypal.results',[
            'info' => $info,
        ]);
    }
}
