<section class="courses">
  <div class="containerCourses mg90 grid">

    @foreach($cursos_value as $key=>$c)
      <div class="itemCourse">
        <img src="{{asset($c->portada)}}" alt="">
        <div class="colflex">
          <h2>{{$c->titulo}}</h2>
          <p>{{$c->resumen}}</p>
          <div class="flex price">
            <span>${{$c->precio}} USD</span>
            <span>{{$c->cupos}} <!--cupos--></span>
          </div>
          <div class="flex ctaMore">
              @php
                  $name = str_replace(' ','-',$c->titulo);
                  $name = strtolower($name);
                  $name = preg_replace('([^A-Za-z0-9 -])', '', $name);
                  $name = str_replace(array('Á', 'À', 'Â', 'Ä', 'á', 'à', 'ä', 'â', 'ª'),array('A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a'),$name);
                  $name = str_replace(array('É', 'È', 'Ê', 'Ë', 'é', 'è', 'ë', 'ê'),array('E', 'E', 'E', 'E', 'e', 'e', 'e', 'e'),$name);
                  $name = str_replace(array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'),array('I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'),$name);
                  $name = str_replace(array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'),array('O', 'O', 'O', 'O', 'o', 'o', 'o', 'o'),$name);
                  $name = str_replace(array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'),array('U', 'U', 'U', 'U', 'u', 'u', 'u', 'u'),$name);
                  $name = str_replace(array('Ñ', 'ñ', 'Ç', 'ç'),array('N', 'n', 'C', 'c'),$name);
              @endphp
            <a class="" href="{{url('/curso/'.$name.'/'.$c->id)}}">Ver más...</a>
            @php
                $validate_shop = false;
            @endphp
            @if(session()->has('id'))
                  @php
                      setlocale(LC_ALL,"es_ES");
                      $date = date("Y-m-d");
                      $courseP = \App\Models\CoursePurchase::where('course_id',$c->id)
                        ->where('user_id',session()->get('id'))
                        ->where('status',1)
                        ->orderBy('id','desc')
                        ->get();
                  @endphp
                  @if($courseP->count() > 0)
                      @php
                          $fecha_inicial = $courseP[0]->date_buy;
                          $fecha_final = $date;
                          $dias = (strtotime($fecha_inicial)-strtotime($fecha_final))/86400;
                          $dias = abs($dias);
                          $dias = floor($dias);
                      @endphp
                      @if($dias <= $c->days)
                          @php
                            $validate_shop = true;
                          @endphp
                          @php
                              $name = str_replace(' ','-',$c->titulo);
                              $name = strtolower($name);
                              $name = preg_replace('([^A-Za-z0-9 -])', '', $name);
                              $name = str_replace(array('Á', 'À', 'Â', 'Ä', 'á', 'à', 'ä', 'â', 'ª'),array('A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a'),$name);
                              $name = str_replace(array('É', 'È', 'Ê', 'Ë', 'é', 'è', 'ë', 'ê'),array('E', 'E', 'E', 'E', 'e', 'e', 'e', 'e'),$name);
                              $name = str_replace(array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'),array('I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'),$name);
                              $name = str_replace(array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'),array('O', 'O', 'O', 'O', 'o', 'o', 'o', 'o'),$name);
                              $name = str_replace(array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'),array('U', 'U', 'U', 'U', 'u', 'u', 'u', 'u'),$name);
                              $name = str_replace(array('Ñ', 'ñ', 'Ç', 'ç'),array('N', 'n', 'C', 'c'),$name);
                          @endphp
                          <a href="{{url('/curso/'.$name.'/'.$c->id)}}">ADQUIRIDO</a>
                      @else
                          @if($c->link == '')
                          <a class="buyCourseGo" id="{{$c->id}}">Donar</a>
                          @else
                              <a href="{{$c->link}}" target="_blank">Donar</a>
                          @endif
                      @endif
                  @else
                      @if($c->link == '')
                      <a class="buyCourseGo" id="{{$c->id}}">Donar</a>
                      @else
                          <a href="{{$c->link}}" target="_blank">Donar</a>
                      @endif
                  @endif
            @else
                @if($c->link == '')
                    <a href="#shopModal"  rel="modal:open" class="buyCourseLogin" id="{{$c->id}}">Donar</a>
                @else
                    <a href="{{$c->link}}" target="_blank">Donar</a>
                @endif
            @endif
          </div>
        </div>
      </div>

      <!--MODAL CURSO-->
      <div id="modalCourse{{$c->id}}" class="modal modalCourse">
        <h1>Curso</h1>
        <hr>
        <div class="colflex contDescriptionCourse">
          <div class="colflex descriptionCourse">
            <h2>{{$c->titulo}}</h2>
            <p>{!!$c->descripcion!!}</p>
            <h3>¿Qué aprenderás en este curso?</h3>
            <ul style="list-style-image: url('{{asset('./img/ok.svg')}}')">
              @php
                $items = \App\Models\ItemCursos::where('curso_id',$c->id)->get();
              @endphp
              @if(count($items) > 0)
                @foreach($items as $i)
                  <li>{{$i->item_curso}}</li>
                @endforeach
              @endif
            </ul>

              @php
                  $name = str_replace(' ','-',$c->titulo);
                  $name = strtolower($name);
                  $name = preg_replace('([^A-Za-z0-9 -])', '', $name);
                  $name = str_replace(array('Á', 'À', 'Â', 'Ä', 'á', 'à', 'ä', 'â', 'ª'),array('A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a'),$name);
                  $name = str_replace(array('É', 'È', 'Ê', 'Ë', 'é', 'è', 'ë', 'ê'),array('E', 'E', 'E', 'E', 'e', 'e', 'e', 'e'),$name);
                  $name = str_replace(array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'),array('I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'),$name);
                  $name = str_replace(array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'),array('O', 'O', 'O', 'O', 'o', 'o', 'o', 'o'),$name);
                  $name = str_replace(array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'),array('U', 'U', 'U', 'U', 'u', 'u', 'u', 'u'),$name);
                  $name = str_replace(array('Ñ', 'ñ', 'Ç', 'ç'),array('N', 'n', 'C', 'c'),$name);
              @endphp
            <a href="{{url('/curso/'.$name.'/'.$c->id)}}" class="btn_course_modal">VER CURSO</a>
          </div>
          <div class="colflex buyCourse">
            <img src="{{asset($c->portada)}}" alt=portadaCurso"">
            @if(session()->has('id'))
                @if($validate_shop == true)
                      <a href="{{url('/curso/'.$name.'/'.$c->id)}}">ADQUIRIDO</a>
                @else
                      @if($c->link == '')
                        <a class="buyCourseGo" id="{{$c->id}}">Donar</a>
                      @else
                          <a href="{{$c->link}}" target="_blank">Donar</a>
                      @endif
                @endif
            @else
              @if($c->link == '')
                <a href="#shopModal" class="ctaLogin buyCourseLogin" id="{{$c->id}}" rel="modal:open">Donar</a>
                <a href="#loginModal" class="ctaLogin buyCourseLogin" id="{{$c->id}}" rel="modal:open">iniciar sesión</a>
              @else
                  <a href="{{$c->link}}" target="_blank">Donar</a>
              @endif
            @endif
            <span>Información del curso</span>
              @if($c->list_videos->count() > 0)
                <div class="flex">
                  <img src="{{asset('./img/video.svg')}}" alt="">
                  <p>{{$c->list_videos->count()}} Videos</p>
                </div>
              @endif
              @if($c->list_pdf->count() > 0)
                  <div class="flex">
                      <img src="{{asset('./img/attach.svg')}}" alt="">
                      <p>{{$c->list_pdf->count()}} Archivos Adjuntos</p>
                  </div>
              @endif
              @if($c->list_audios->count() > 0)
                  <div class="flex">
                      <img src="{{asset('./img/audio.svg')}}" alt="">
                      <p>{{$c->list_audios->count()}} Audios</p>
                  </div>
              @endif
          </div>
        </div>
      </div>
  @endforeach

  </div>
</section>
