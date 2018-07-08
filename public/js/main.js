const tablero = document.getElementById('tablero');
jQuery(window).on('load', function() {
    jQuery('#loader').hide();
 })
$('#mensaje .close').click( () =>{
    $(mensaje).hide()
});

if (tablero){
    var contador = 0
    var turnos = 9
    var pos1 =  document.getElementById('form_pos'+1).value
    var pos2 =  document.getElementById('form_pos'+2).value
    var pos3 =  document.getElementById('form_pos'+3).value
    var pos4 =  document.getElementById('form_pos'+4).value
    var pos5 =  document.getElementById('form_pos'+5).value
    var pos6 =  document.getElementById('form_pos'+6).value
    var pos7 =  document.getElementById('form_pos'+7).value
    var pos8 =  document.getElementById('form_pos'+8).value
    var pos9 =  document.getElementById('form_pos'+9).value
    
    var totalTurnos = [pos1, pos2, pos3, pos4, pos5, pos6, pos7, pos8, pos9];
    for (let i = 0; i < totalTurnos.length; i++) {
        const posicion = totalTurnos[i];
        if( posicion == 1 || posicion == 2){
            contador++
            jQuery('#'+(i+1)).removeClass('jugador-1')
            jQuery('#'+(i+1)).removeClass('jugador-2')
            jQuery('#'+(i+1)).attr('disabled','disabled');
        }
    }

    turnos = (9 - contador)
    document.getElementById('form_turnos').value = turnos;
    document.getElementById('restantes').value = turnos;
    
    jQuery(tablero).click((e) =>{
    if (e.target.classList.contains("posicion")){
        var posicion = e.target.getAttribute('id')
        $('#posicion').attr("disabled",true);
        var jugador =  e.target.getAttribute('data-jugador')
        var pos = document.getElementById('form_pos'+posicion);
        if( pos.value == 0 ){
                pos.value = jugador;
                pos1 =  document.getElementById('form_pos'+1).value
                pos2 =  document.getElementById('form_pos'+2).value
                pos3 =  document.getElementById('form_pos'+3).value
                pos4 =  document.getElementById('form_pos'+4).value
                pos5 =  document.getElementById('form_pos'+5).value
                pos6 =  document.getElementById('form_pos'+6).value
                pos7 =  document.getElementById('form_pos'+7).value
                pos8 =  document.getElementById('form_pos'+8).value
                pos9 =  document.getElementById('form_pos'+9).value
            
            document.getElementById('form_turnos').value = turnos -1
            if (  jugador == 1 ){
                document.getElementById('form_jugador').value = 2;
            } else if (jugador ==2) {
                document.getElementById('form_jugador').value = 1;
            }else{
                mensaje = 'Valor inválido';
                return 
            }
            $('#loader').show();
            jQuery("#partida").submit()
        }else{
            $('#mensaje').show();
        }
        }
    })
}

