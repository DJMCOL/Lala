<div class="colflex contAsesorias">
    <div class="colflex descriptionAsesoria">
        <img src="{{asset($a->portada)}}" alt="portadaAsesoria">
        <h2>{{$a->titulo}}</h2>
        <h3 style="color: #000;margin:10px 0px">{{$a->resumen}}</h3>
        <p>{!!$a->descripcion!!}</p>
        <h3 style="display: none">¿Qué aprenderás en esta asesoría?</h3>
        <ul style="list-style-image: url('{{asset('./img/ok.svg')}}')">
            @php
                $items = \App\Models\ItemAsesorias::where('asesoria_id',$a->id)->get();
            @endphp
            @if(count($items) > 0)
                @foreach($items as $i)
                    <li>{{$i->item_asesoria}}</li>
                @endforeach
            @endif
        </ul>
    </div>
    <div class="colflex buyAsesoria">
        <div class="calendarioAsesoria">
            @component('components.asesorias.calendar',[
                'monthArray'=>$monthArray,
                'month'=>$month,
                'year'=>$year,
                'diaActual'=>$diaActual,
                'mesActual'=>$mesActual
            ])
            @endcomponent
        </div>
        <div class="columns">
            <div class="colum">
                <h6>
                    <span class="no">&ensp;&ensp;</span>
                    No disponible
                </h6>
            </div>
            <div class="colum">
                <h6>
                    <span>&ensp;&ensp;</span>
                    Agenda llena
                </h6>
            </div>
            <div class="colum">
                <h6>
                    <span class="yes">&ensp;&ensp;</span>
                    Agenda disponible
                </h6>
            </div>
        </div>
        <input type="hidden" id="dateServiceSolic" name="dateServiceSolic" readonly>
        <input type="hidden" id="hourService" name="hourService" readonly>
        <div class="selecter">
            <h5>
                Hora
            </h5>
            <select name="hourServiceSolic" id="hourServiceSolic">
                <option value="" selected>Seleccionar</option>
            </select>
        </div>
        @if(session()->has('id'))
            <a class="ctaLogin buyServiceGo" id="{{$a->id}}">compralo ahora</a>
        @else
            <a href="#shopModal" class="ctaLogin buyServiceLogin" id="{{$a->id}}" rel="modal:open">compralo ahora</a>
            <a href="#loginModal" class="ctaLogin buyServiceLogin" id="{{$a->id}}" rel="modal:open">iniciar sesión</a>
        @endif
        <p>
            <br>
            <strong>Importante:</strong> Luego de haber seleccionado el día y la fecha de tu asesoría, contarás con 15 minutos para realizar el pago.<br>
            En caso de exceder este tiempo, el sitio web liberará el agendamiento y será necesario repetir el proceso.
        </p>
    </div>
</div>
<script>
    //alert(login_go_service);
    $('.buyServiceLogin').click(function () {
        //alert('hello');
        if($('#dateServiceSolic').val() == '' || $('#hourService').val() == ''){
            swal({
                text: "Debe seleccionar fecha y hora",
                icon: imageURL_2,
                button: "OK!",
                closeOnClickOutside: false,
            });
            return false;
        }
        idLogin_service = this.id;
        login_go_service = 4;
        //alert(login_go_service);
        //alert($('#hourService').val());
        //alert($('#dateServiceSolic').val());
    });
    $('.buyServiceGo').click(function () {
        var id = this.id;
        //alert(id);
        //alert($('#dateServiceSolic').val());
        //alert($('#hourService').val());
        if($('#dateServiceSolic').val() == '' || $('#hourService').val() == ''){
            swal({
                text: "Debe seleccionar fecha y hora",
                icon: imageURL_2,
                button: "OK!",
                closeOnClickOutside: false,
            });
        }
        //return false;
        swal({
            text: "Espere un momento",
            icon: imageURL_2,
            button: false,
            closeOnClickOutside: false,
        });
        $.ajax({
            url: https + "/buyService",
            method: "POST",
            data: {
                id: id,
                date: $('#dateServiceSolic').val(),
                hour: $('#hourService').val(),
                action: "buyService"
            },
            success: function (data) {
                if ($.trim(data) == "complet") {
                    location.href = https + "/paypal/pay";
                } else if ($.trim(data) == "2") {
                    swal({
                        text: "No disponibilidad en la fecha",
                        icon: imageURL_2,
                        button: "OK!",
                        closeOnClickOutside: false,
                    });
                } else if ($.trim(data) == "3") {
                    swal({
                        text: "CUPO LLENO EN ESTA HORA",
                        icon: imageURL_2,
                        button: "OK!",
                        closeOnClickOutside: false,
                    });
                } else {
                    swal({
                        text: "Ha ocurrido un error" + data,
                        icon: imageURL_2,
                        button: "OK!",
                        closeOnClickOutside: false,
                    });
                }
            }
        });
    });
</script>
