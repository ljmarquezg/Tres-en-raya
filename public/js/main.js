const tablero = document.getElementById('tablero');


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
    // var contador = 0
    totalTurnos.forEach(pos => {
        if( pos == 1 || pos == 2){
           alert(pos)
           contador++
        }
    })
    turnos = (9 - contador)
    document.getElementById('form_turnos').value = turnos;
    document.getElementById('restantes') = turnos;
    
    jQuery(tablero).click((e) =>{
        if (e.target.classList.contains("posicion")){
                    var posicion = e.target.getAttribute('id')
                    var jugador =  e.target.getAttribute('data-jugador')
                    var pos = document.getElementById('form_pos'+posicion);
                    // const juegoid = document.getElementById('juego_id').innerHTML;
                if( pos.value == 0 ){
                    pos.value = jugador;
                    // alert(jugador)
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
                    
                    jQuery("form").submit()
                //    params = {
                //        'pos1' : pos1,
                //        'pos2' : pos2,
                //        'pos3' : pos3,
                //        'pos4' : pos4,
                //        'pos5' : pos5,
                //        'pos6' : pos6,
                //        'pos7' : pos7,
                //        'pos8' : pos8,
                //        'pos9' : pos9,
                //        'turnos' : turnos,
                //        'jugador' : jugador
                //    }

                //    fetch(`partida/${juegoid}`,
                //    {
                //        method: 'POST',
                //        body: params
                //    }).then(res => console.log(res)
                //     // window.location.reload()
                // );


                    // fetch({
                    //     url: '/partida',
                    //     dataType: "json",
                    //     cache: false,
                    //     data: params,
                    //     type: 'POST',
                    //     success: (data) =>{
                    //       if (data.msg=="OK") {
                    //         alert('Se ha añadido el evento exitosamente ')
                    //       }else {
                    //         alert(data.msg)
                    //       }
                    //     },
                    //     error: function(data){
                    //       alert("Ha ocurrido un error en la comunicación con el servidor");
                    //     }
                    //   })

                    // fetch(
                    //     url,
                    //     data = {
                    //         'juegoid' : juegoid,
                    //         'pos' : pos,
                    //     },
                    //     {
                    //         data : data,
                    //         method : 'POST',
                    //     }
                    // ).then(function(response) {
                    //     if(response.ok) {
                    //       response.blob().then(function(myBlob) {
                    //         alert('OK')
                    //       });
                    //     } else {
                    //       console.log('Network response was not ok.');
                    //     }
                    //   })
                    //   .catch(function(error) {
                    //     console.log('There has been a problem with your fetch operation: ' + error.message);
                    //   });

                    // alert('Movimiento Valido. Cambiar de turno')
                }else{
                    alert('Hay valor en este campo')
                }
        }
    } )
}

