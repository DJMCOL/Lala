@extends('layout.layout')

@section('content')
  <main>
    @component('components.asesorias.banner',[
      'banners_value'=>$banners_value
])
    @endcomponent

    @component('components.asesorias.asesorias',[
      'asesorias_value'=>$asesorias_value,
        'monthArray'=>$monthArray,
        'month'=>$month,
        'year'=>$year,
        'diaActual'=>$diaActual,
        'mesActual'=>$mesActual
    ])
    @endcomponent

    @component('components.float',[
      'info_value'=>$info_value
      ])
    @endcomponent
  </main>
@endsection

@section('script')
  <script>
    $('a.openAsesoria').click(function(event) {
      $(this).modal({
        clickClose: false,
        showClose: true,
        fadeDuration: 120
      });
      return false;
    });
  </script>
  <script>
      function calendarDay(day,date)
      {
          var date_go = date.replace('/','-');
          date_go = date_go.replace('/','-');
          $('#dateServiceSolic').val(date_go);
          $('#calendar .day').removeClass('selected');
          $('#calendar .day'+day).addClass('selected');
          setTimeout(function () {
              getHourServiceSolic();
          },100);
      }

      function getHourServiceSolic() {
          var getHourServiceSolic =  $('#dateServiceSolic').val();
          var idElement = 'hourServiceSolic';
          var options = '';
          //alert(getHourServiceSolic);
          $.ajax({
              url: https + "/getHourServiceSolic_3",
              type: "POST",
              data:{date:getHourServiceSolic,action:'getHourServiceSolic_3'},
              success:function(datos){
                  /*
                  $.each(datos, function(index, d) {
                      options = options +'<option value="'+d.id+'">'+d.name+'</option>';
                  });*/
                  $('.selecter').html('');
                  $('.selecter').html(datos);
                  //console.log(datos);
                  /*
                  $('.selecter').html('\n' +
                      '            <h5>\n' +
                      '                Hora\n' +
                      '            </h5>\n' +
                      '            <select name="hourServiceSolic" id="hourServiceSolic" class="filter-schedule">\n' +
                      '                <option value="">Seleccionar</option>\n' + options +
                      '            </select>');
                   */
               }
          });
      }
  </script>
@endsection
