@php
    $month = $month;
    $year = $year;
    $diaActual = $diaActual;
    # Obtenemos el dia de la semana del primer dia
    # Devuelve 0 para domingo, 6 para sabado
    $diaSemana=date("w",mktime(0,0,0,$month,1,$year))+7;
    # Obtenemos el ultimo dia del mes
    $ultimoDiaMes=date("d",(mktime(0,0,0,$month+1,1,$year)-1));
    $meses=array(1=>"Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio","Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

    if($monthArray == 1){
        $monthBefore = 12;
        $yearBefore = $year - 1;
    }else{
        $monthBefore = $monthArray - 1;
        $yearBefore = $year;
    }

    if($monthArray == 12){
        $monthAfter = 1;
        $yearAfter = $year + 1;
    }else{
        $monthAfter = $monthArray + 1;
        $yearAfter = $year;
    }

@endphp
<table id="calendar">
<caption>
    <i class="material-icons arrow_calendar_before" month="{{$monthBefore}}" year="{{$yearBefore}}" onclick="calendarMove({{$monthBefore}},{{$yearBefore}})">
        <img src="{{asset('img/calendar/left.svg')}}" alt="">
    </i>
    {{$meses[$monthArray]}} {{$year}}
    <i class="arrow_right material-icons arrow_calendar_after" month="{{$monthAfter}}" year="{{$yearAfter}}" onclick="calendarMove({{$monthAfter}},{{$yearAfter}})">
        <img src="{{asset('img/calendar/right.svg')}}" alt="">
    </i>
</caption>
<tr>
    <th>Lun</th><th>Mar</th><th>Mie</th><th>Jue</th>
    <th>Vie</th><th>Sab</th><th>Dom</th>
</tr>
<tr bgcolor="">
    @php
        $cont = 0;
        $last_cell=$diaSemana+$ultimoDiaMes;
        // hacemos un bucle hasta 42, que es el máximo de valores que puede
        // haber... 6 columnas de 7 dias
    @endphp
    @for($i=1;$i<=42;$i++)
        @if($i==$diaSemana)
            @php
                // determinamos en que dia empieza
                $day=1;
            @endphp
        @endif
        @if($i<$diaSemana || $i>=$last_cell)
            @php
                $cont = $cont +1;
                //celca vacia
            @endphp
            @if($cont <= 7)
                <td class='{{($diaSemana == 7)? '': 'vacia'}}'>&nbsp;</td>
            @else
                <td>&nbsp;</td>
            @endif
        @else
            @php
                if($day <= 9){
                    $dayDate = ('0'.$day);
                }else{
                    $dayDate = $day;
                }
                $date = $year.'/'.$month.'/'.$dayDate;
                $date_validate = $year.'-'.$month.'-'.$dayDate;
                $scheduleService = \App\Models\ScheduleService::where('date',$date_validate)->first();
                if(empty($scheduleService))
                {
                    $status = 'no';
                }else{
                    $contCupo = 0;
                    $scheduleServiceHourCount = 0;
                    $scheduleServiceHour = \App\Models\ScheduleService::where('date',$date_validate)->get();
                    foreach ($scheduleServiceHour as $key => $ssh){
                        $data = \App\Models\ScheduleServiceHour::where('schedule_id','=',$ssh->id)
                            ->orderBy("id",'asc')
                            ->get();
                        foreach($data as $key_2 => $dt_2){
                            $scheduleServiceHourCount++;
                            $servicePurchaseHour = \App\Models\ServicePurchase::where('date',$date_validate)
                                ->where('clock',$dt_2->hour_id)
                                ->where('validate_date',1)
                                ->get();
                            foreach ($servicePurchaseHour as $sph){
                                $contCupo = $contCupo +1;
                            }
                        }
                    }
                    //$scheduleServiceHourCount = \App\Models\ScheduleService::where('date',$date_validate)->count();
                    if($contCupo == $scheduleServiceHourCount){
                        $status = 'nocupo';
                    }else{
                        $status = 'cupo';
                    }
                }
            @endphp
            @if($day <= 9)
                @php
                    $day = '0'.$day
                @endphp
            @endif
            @if($i%7==0)
                <td class='day day{{$day}} disabledDay' date="{{$date}}">
                    <span>{{$day}}</span>
                </td>
            @else
                @if($monthArray<$mesActual && $year <= $yearActual)
                    <td class='day day{{$day}} disabledDay' date="{{$date}}">
                        <span>{{$day}}</span>
                    </td>
                @elseif($day < $diaActual && $mesActual == $monthArray)
                        <td class='day day{{$day}} disabledDay' date="{{$date}}">
                            <span>{{$day}}</span>
                        </td>
                @else
                    @if($status == 'no' || $status == 'nocupo')
                        <td class='day day{{$day}} {{$status}}' date="{{$date}}">
                            <span>{{$day}}</span>
                        </td>
                    @else
                        <td class='day day{{$day}} {{$status}}' date="{{$date}}" onclick="calendarDay('{{$day}}','{{$date}}')">
                            <span>{{$day}}</span>
                        </td>
                    @endif
                @endif
            @endif
            @php
                $day++;
            @endphp
        @endif
    <!--cuando llega al final de la semana, iniciamos una columna nueva-->
        @if($i%7==0)
            </tr>
            <tr>
        @endif
    @endfor
</tr>
</table>
<script>
    function calendarMove(month,year)
    {
        $.ajax({
            url: https + "/getCalendar",
            method: "POST",
            data: {
                month:month,
                year:year,
                action:'getCalendar',
            },
            success: function (data) {
                console.log(data);
                $('.calendarioAsesoria').html('');
                $('.calendarioAsesoria').html(data);
                $('.selecter').html('');
                $('.selecter').html('\n' +
                    '            <h5>\n' +
                    '                Hora\n' +
                    '            </h5>\n' +
                    '            <select name="hourServiceSolic" id="hourServiceSolic" class="filter-schedule">\n' +
                    '                <option value="">Seleccionar</option>\n'+
                    '            </select>');
            }
        });
    }
</script>
