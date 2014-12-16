function mostrar(input) {///funcion para mostrar la hora se necesita un nombre de campo como parametro
    var Digital = new Date();
    var hours = Digital.getHours();
    var minutes = Digital.getMinutes();
    var seconds = Digital.getSeconds();
    var dn = "AM";    
    if (hours > 12) {
        dn = "PM";
        hours = hours - 12;
    }
    if (hours === 0)
        hours = 12;
    if (minutes <= 9)
        minutes = "0" + minutes;
    if (seconds <= 9)
        seconds = "0" + seconds;
    $("#"+input).val(hours + ":" + minutes + ":" + seconds + " " + dn);
    var input = input;

    setTimeout("mostrar('"+input+"')", 1000);    
}
function comprobarCamposRequired(form){////funcion para campos requeridos en el formulario se necesita el nombre del formulario
    var correcto=true;
    var campos_text=$('#'+form+' input:required');
    $(campos_text).each(function() {
        var pattern = new RegExp("^" + $(this)[0].pattern + "$");
        if($(this).val() != '' && pattern.test($(this).val())){            
            $(this).parent().parent().removeClass('has-error');            
        }else{
            correcto=false;
            $(this).parent().parent().addClass('has-error');
        }   
    });
    return correcto;
}