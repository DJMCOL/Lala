<?php

namespace App\Http\Controllers;

use App\Models\CoursePurchase;
use App\Models\Cursos;
use App\Models\ServicePurchase;
use App\Models\Users;
use Carbon\Carbon;

class ViewController extends Controller
{

  public function __construct()
  {
    $this->formatted_date = Carbon::now()->subMinutes(2)->toDateTimeString();
  }

  public function Blogs($slug)
  {
    $blog = \App\Models\Blog::where('slug', $slug)->first();
    $info = \App\Models\Info::find(1);
    return view('components.blog.contentPost.index', [
      'blog_value' => $blog,
      'info_value' => $info,
    ]);
  }

  public function index()
  {
    $info = \App\Models\Info::find(1);
    $banners = \App\Models\Banners::find(1);
    $links = \App\Models\LinksHerbalife::find(1);
    $blog = \App\Models\Blog::orderBy('id', 'desc')->take(3)->get();
    return view('components.home.index', [
      'info_value' => $info,
      'blog_value' => $blog,
      'links_value' => $links,
      'banners_value' => $banners
    ]);
  }

  public function conoceme()
  {
    $info = \App\Models\Info::find(1);
    return view('components.about.index', [
      'info_value' => $info
    ]);
  }

  public function blog()
  {
    $info = \App\Models\Info::find(1);
    $banners = \App\Models\Banners::find(1);
    $blog = \App\Models\Blog::orderBy('id', 'desc')->paginate(6);
    return view('components.blog.index', [
      'info_value' => $info,
      'blog_value' => $blog,
      'banners_value' => $banners
    ]);
  }

  public function cursos()
  {
    $info = \App\Models\Info::find(1);
    $cursos = \App\Models\Cursos::orderBy('id', 'desc')
      ->where('status', 'activo')
      ->whereNull('deleted_at')
      ->get();
    $banners = \App\Models\Banners::find(1);
    return view('components.courses.index', [
      'info_value' => $info,
      'cursos_value' => $cursos,
      'banners_value' => $banners,
    ]);
  }

  public function asesorias()
  {
    $info = \App\Models\Info::find(1);
    $banners = \App\Models\Banners::find(1);
    $asesorias = \App\Models\Asesorias::where('status', 'activo')
      ->whereNull('deleted_at')
      ->orderBy('id', 'desc')
      ->get();

    setlocale(LC_ALL, "es_CO");
    ini_set('date.timezone', 'America/Bogota');
    date_default_timezone_set('America/Bogota');
    $monthArray = date("n");
    $month = date("m");
    $year = date("Y");
    $diaActual = date("j");
    $mesActual = date("n");

    return view('components.asesorias.index', [
      'info_value' => $info,
      'asesorias_value' => $asesorias,
      'banners_value' => $banners,

      'monthArray' => $monthArray,
      'month' => $month,
      'year' => $year,
      'diaActual' => $diaActual,
      'mesActual' => $mesActual
    ]);
  }

  public function talleres()
  {
    $info = \App\Models\Info::find(1);
    $banners = \App\Models\Banners::find(1);
    $date = date('Y-m-d');
    $talleres = \App\Models\Talleres::orderBy('id', 'desc')
      ->where('active', 'si')
      ->where('cupos_descount', '>', 0)
      ->where('date', '>=', $date)
      ->whereNull('deleted_at')
      ->orderBy('date', 'asc')
      ->get();
    return view('components.talleres.index', [
      'info_value' => $info,
      'talleres_value' => $talleres,
      'banners_value' => $banners
    ]);
  }

  public function contacto()
  {
    $info = \App\Models\Info::find(1);
    return view('components.contact.index', [
      'info_value' => $info
    ]);
  }

  public function registro()
  {
    $info = \App\Models\Info::find(1);
    $banners = \App\Models\Banners::find(1);
    return view('components.registro.index', [
      'info_value' => $info,
      'banners_value' => $banners
    ]);
  }

  public function perfil()
  {
    if(session()->has('id')) {
        $info = \App\Models\Info::find(1);
        $user = Users::find(session()->get('id'));
        $courses = CoursePurchase::where('user_id',session()->get('id'))
            ->where('status',1)
            ->where('validate',2)
            ->get();
        return view('components.profile.index', [
            'info_value' => $info,
            'user'=>$user,
            'courses'=>$courses
        ]);
    }else{
        return redirect('/');
    }
  }

}
