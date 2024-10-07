<section class="infoUser">
    <div class="contInfo colflex mg90">
        <div class="colflex picUser relative">
            <p>Perfil de usuario</p>
            <img class="logo" src="{{asset('img/logo2.png')}}" alt="">
            <!--
            <img src="{{asset('img/pen.svg')}}" alt="" class="pen">
            -->
            <!--
            <div class="flex imgUser">
                <img src="{{asset('img/claudia_profile.jpg')}}" alt="">
            </div>
            -->
            <h2>Usuario</h2>
            <p class="nameUser">Buenas {{session()->get('name')}}</p>
            <a class="active5 tab2" data-tab-target="#editUser">Datos Personales</a>
            <a class="tab2" data-tab-target="#learning">Cursos</a>
            <div class="flex closeSesion">
                <a href="{{url('/logout')}}">Cerrar Sesión</a>
            </div>
        </div>

            <!--EDIT USER-->
            <div data-tab-content id="editUser" class="active3 colflex editUser">
                <form action="" id="formUpdate">
                    <div class="dataUser">
                        <h3>Edita tus datos personales</h3>
                        <div class="formInfoUser colflex">
                            <div class="flex colflex">
                                <label >Nombre</label>
                                <input type="text" id="nameUpdate" name="name" value="{{$user->name}}">
                            </div>
                            <div class="flex colflex">
                                <label >Telefono</label>
                                <input type="text" id="phoneUpdate" name="phone" value="{{$user->phone}}">
                            </div>
                            <div class="flex colflex">
                                <label >Correo</label>
                                <input type="text" id="mailUpdate" name="mail" value="{{$user->mail}}">
                            </div>
                        </div>
                    </div>
                    <div class="passUser">
                        <h3>Cambiar contraseña</h3>
                        <div class="formPassUser colflex">
                            <div class="flex colflex">
                                <label >Contraseña actual:</label>
                                <input type="password" name="password">
                            </div>
                            <div class="flex colflex">
                                <label >Nueva contraseña:</label>
                                <input type="password" name="password_new">
                            </div>
                        </div>
                    </div>
                    <div class="ctaInfo flex">
                        <a class="btnFormUpdate">Guardar  Cambios</a>
                    </div>
                </form>
            </div>
            <!--COURSES-->
            <div data-tab-content id="learning" class=" colflex learning">
                <h3>Cursos que estoy aprendiendo</h3>
                <div class="listLearning colflex">
                    @foreach($courses as $c)
                        @php
                            setlocale(LC_ALL,"es_ES");
                            $date = date("Y-m-d");
                              $fecha_inicial = $c->date_buy;
                              $fecha_final = $date;
                              $dias = (strtotime($fecha_inicial)-strtotime($fecha_final))/86400;
                              $dias = abs($dias);
                              $dias = floor($dias);
                              $curso = \App\Models\Cursos::find($c->course_id);
                        @endphp
                        @if(intval($dias) <= $curso->days)
                            <div class="flex itemLearning">
                                <img src="{{asset($curso->portada)}}" alt="">
                                <div class="colflex">
                                    <h4>{{$curso->titulo}}</h4>
                                    <p>{{$curso->resumen}}</p>
                                    @php
                                        $name = str_replace(' ','-',$curso->titulo);
                                        $name = strtolower($name);
                                        $name = preg_replace('([^A-Za-z0-9 -])', '', $name);
                                        $name = str_replace(array('Á', 'À', 'Â', 'Ä', 'á', 'à', 'ä', 'â', 'ª'),array('A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a'),$name);
                                        $name = str_replace(array('É', 'È', 'Ê', 'Ë', 'é', 'è', 'ë', 'ê'),array('E', 'E', 'E', 'E', 'e', 'e', 'e', 'e'),$name);
                                        $name = str_replace(array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'),array('I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'),$name);
                                        $name = str_replace(array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'),array('O', 'O', 'O', 'O', 'o', 'o', 'o', 'o'),$name);
                                        $name = str_replace(array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'),array('U', 'U', 'U', 'U', 'u', 'u', 'u', 'u'),$name);
                                        $name = str_replace(array('Ñ', 'ñ', 'Ç', 'ç'),array('N', 'n', 'C', 'c'),$name);
                                    @endphp
                                    <a class="go_button" href="{{url('/curso/'.$name.'/'.$curso->id)}}">VER CURSO</a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
</section>
