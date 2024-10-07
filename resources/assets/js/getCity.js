$(".countryRegister").change(function(){
    var country_id= $(this).val();
    getStates(country_id,'state'+$(this).attr('data-id'),'city'+$(this).attr('data-id'));
});
$(".countryUpdate").change(function(){
    var country_id= $(this).val();
    getStates(country_id,'state_re'+$(this).attr('data-id'),'city_re'+$(this).attr('data-id'));
});
$(".statesRegister").change(function(){
    var state_id= $(this).val();
    getCities(state_id,'city'+$(this).attr('data-id'));
});
$(".statesUpdate").change(function(){
    var state_id= $(this).val();
    getCities(state_id,'city_re'+$(this).attr('data-id'));
});
function getStates(country_id,idElement,idElement2)
{
    $.ajax({
        url: https + "/getStates",
        type: "POST",
        dataType: "json",
        data:{id:country_id,action:'getStates'},
        success:function(datos){
            $('#'+idElement+' .opctions'+idElement).remove();
            $('#'+idElement2+' .opctions'+idElement2).remove();
            $.each(datos, function(index, d) {
                $('#'+idElement).append('<option class="opctions'+idElement+'" value="'+d.DisCodigo+'">'+d.DisNombre+'</option> ');
            });
        }
    });
}
function getCities(state_id,idElement)
{
    $.ajax({
        url: https + "/getCities",
        type: "POST",
        dataType: "json",
        data:{id:state_id,action:'getCities'},
        success:function(datos){
            $('#'+idElement+' .opctions'+idElement).remove();
            $.each(datos, function(index, c) {
                $('#'+idElement).append('<option class="opctions'+idElement+'" value="'+c.CiuCodigo+'">'+c.CiuNombre+'</option> ');
            });
        }
    });
}
