<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'ViewController@index')->name('Inicio');

Route::get('/perfil', 'ViewController@perfil')->name('perfil');

Route::get('/conoceme', 'ViewController@conoceme')->name('conoceme');

Route::get('/blog', 'ViewController@blog')->name('blog');

Route::get('/cursos', 'ViewController@cursos')->name('cursos');

Route::get('/blog/{slug}', 'ViewController@Blogs')->name('contentPost');

Route::get('/asesorias', 'ViewController@asesorias')->name('asesorias');

Route::get('/talleres', 'ViewController@talleres')->name('talleres');

Route::get('/contacto', 'ViewController@contacto')->name('contacto');

Route::get('/registro', 'ViewController@registro')->name('registro');

Route::get('/curso/{name}/{id}', function ($name,$id) {
      $info = \App\Models\Info::find(1);
      $course = \App\Models\Cursos::find($id);
      $validate_shop_course = 0;
      if($course->id == ''){
          return redirect('/cursos');
      }
      if(session()->has('id')){
          $courseP = \App\Models\CoursePurchase::where('course_id',$course->id)
              ->where('user_id',session()->get('id'))
              ->where('status',1)
              ->orderBy('id','desc')
              ->get();
          setlocale(LC_ALL,"es_ES");
          $date = date("Y-m-d");
          if($courseP->count() > 0) {
              $fecha_inicial = $courseP[0]->date_buy;
              $fecha_final = $date;
              $dias = (strtotime($fecha_inicial) - strtotime($fecha_final)) / 86400;
              $dias = abs($dias);
              $dias = floor($dias);
              if ($dias <= $course->days) {
                  $validate_shop_course = 1;
              }
          }
      }
      return view('components.courses.contentCurso.index',[
          'course'=>$course,
          'info_value'=>$info,
          'Videos'=>$course->list_videos,
          'Pdfs'=>$course->list_pdf,
          'Audios'=>$course->list_audios,
          'validate_shop_course'=>$validate_shop_course
      ]);
})->name('curso');

Route::post('contact','IndexController@Contact');
Route::post('/subscribe','IndexController@Subscribe');
Route::post('/subscribeMob','IndexController@SubscribeMob');
Route::get('email',function (){
  return view('emails.EmailRegister');
});

Route::post('getStates','IndexController@GetStates');
Route::post('getCities','IndexController@GetCities');

Route::post('registerGo','IndexController@RegisterUser');

Route::post('buyCourse', 'CourseController@BuyCourse');
//Route::get('/paypalCourse','CourseController@PaypalCourse');

Route::post('login','IndexController@Login');
Route::get('logout', 'IndexController@LogOut')->name('LogOut');
Route::post('forgetPassword', 'IndexController@ForgetPassword');

Route::post('buyTaller', 'TallerController@BuyTaller');
//Route::get('/paypalTaller','ViewsController@PaypalTaller');

Route::post('getCalendar','IndexController@GetCalendar');
Route::post('getHourServiceSolic','IndexController@GetHourServiceSolic');
Route::post('getHourServiceSolic_2','IndexController@GetHourServiceSolic_2');
Route::post('getHourServiceSolic_3','IndexController@GetHourServiceSolic_3');

Route::post('getService','IndexController@GetService');

Route::post('buyService', 'ServiceController@BuyService');
//Route::get('/paypalService','ViewsController@PaypalService');

//paypal
Route::get('/paypal/pay', 'PaypalController@payWithPayPal');
Route::get('/paypal/status', 'PaypalController@payPalStatus');
Route::get('/paypal/results', 'PaypalController@payPalResult');

//news
Route::post('updateGo','IndexController@UpdateUser');
Route::post('shopGo','IndexController@ShopGo');

Route::get('/taller/{name}/{id}', function ($name,$id) {
    $info = \App\Models\Info::find(1);
    $banners = \App\Models\Banners::find(1);
    $taller = \App\Models\Talleres::find($id);
    return view('components.talleres.only', [
        'info_value' => $info,
        'taller' => $taller,
        'banners_value' => $banners
    ]);
});

Route::get('/pay_again/{id}', function ($id) {
    session(['type_paypal' => 3]);
    session(['id_paypal' => $id]);
    return redirect('/paypal/pay');
});
Route::get('test',function (){
    //require_once '/path/to/MailchimpMarketing/vendor/autoload.php';

    $client = new MailchimpMarketing\ApiClient();
    $client->setConfig([
        'apiKey' => '707ecaa2a752d604c71c3e2b0613b7ea-us5',
        'server' => 'us5',
    ]);

    //$response = $client->lists->getListMembersInfo('4ef6df0f1a');
    //print_r($response);

    /*$response = $client->lists->addListMember("4ef6df0f1a", [
        "email_address" => "prueba@gmail.com",
        "status" => "subscribed",
    ]);
    print_r($response);*/

    /*$response = $client->lists->updateListMemberTags("4ef6df0f1a", "prueba@gmail.com", [
        "tags" => [["name" => "compra curso 2", "status" => "active"]],
    ]);
    print_r($response);*/

    try{
        $response = $client->lists->addListMember("4ef6df0f1a", [
            "email_address" => "prueba@gmail.com",
            "status" => "subscribed",
        ]);
        print_r($response);
    } catch (\Exception $e) {
    }
});
