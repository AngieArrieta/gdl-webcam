(function () {
  "use strict";
  var regalo = document.getElementById('regalo');
  document.addEventListener('DOMContentLoaded', function () {

    
    //------------------------MAPA---------------------


    var map = L.map('mapa').setView([10.973044, -74.797325], 16);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    
    L.marker([10.973044, -74.797325]).addTo(map)
        .bindPopup('AQUI TOY.')
        .openPopup()
        .bindTooltip('Un Tooltip')
        .openTooltip();

    //OBTENIENDO ELEMENTOS----------------------------
    //campos Datos usuario
    var nombre = document.getElementById('nombre');
    var apellido = document.getElementById('apellido');
    var email = document.getElementById('email');

    //campos pases
    var pase_dia = document.getElementById('pase_dia');
    var pase_completo = document.getElementById('pase_completo');
    var pase_dosdias = document.getElementById('pase_dosdias');

    //botones y divs
    var calcular = document.getElementById('calcular');
    var errorDiv = document.getElementById('error');
    var botonRegistro = document.getElementById('btnRegistro');
    var lista_productos = document.getElementById('lista-productos');
    var suma = document.getElementById('suma-total');

    //Extras
    var etiquetas = document.getElementById('etiquetas');
    var camisas = document.getElementById('camisa_evento');

    //--------------------------------------------------




    //---------boton calcular-----------
    if(document.getElementById('calcular')){

    
    calcular.addEventListener('click', calcularMontos);

    function calcularMontos(event) {
      event.preventDefault();
      console.log("has hecho click en calcular");
      if (regalo.value === '') {
        alert("Debes elegir un regalo");
        regalo.focus();
      } else {
        var boletosDia = parseInt(pase_dia.value, 10) || 0;
        var boletos2Dias = parseInt(pase_dosdias.value, 10) || 0;
        var boletosCompleto = parseInt(pase_completo.value, 10) || 0;
        var cantCamisas = parseInt(camisas.value, 10) || 0;
        var cantEtiquetas = parseInt(etiquetas.value, 10) || 0;


        var totalPagar = (boletosDia * 30) + (boletos2Dias * 45) + (boletosCompleto * 50) + (0.93 * (cantCamisas * 10)) + (cantEtiquetas * 2);
        console.log(totalPagar);



        //---------RESUMENr-----------
        var listadoProductos = [];


        if (boletosDia >= 1) {
          listadoProductos.push(boletosDia + ' Pases por dia');
        }
        if (boletos2Dias >= 1) {
          listadoProductos.push(boletos2Dias + ' Pases por 2  dia');
        }
        if (boletosCompleto >= 1) {
          listadoProductos.push(boletosCompleto + ' Pases completos');
        }
        if (cantCamisas >= 1) {
          listadoProductos.push(cantCamisas + ' camisas');
        }
        if (cantEtiquetas >= 1) {
          listadoProductos.push(cantEtiquetas + ' Etiquetas');
        }
        lista_productos.style.display = "block";
        lista_productos.innerHTML = '';
        for (var i = 0; i < listadoProductos.length; i++) {
          lista_productos.innerHTML += listadoProductos[i] + '</br>'
        }
        console.log(listadoProductos);

        //-------------TOTAL--------------------

        suma.innerHTML = '$' + totalPagar.toFixed(2);
      }
    }
    
    //-----------------elige tus talleres--------------
    //(hacer cambie de 2 o mas a menor)ERROR728

    pase_dia.addEventListener('blur', mostrarDias); //hace una accion cuando salga
    pase_dosdias.addEventListener('blur', mostrarDias);
    pase_completo.addEventListener('blur', mostrarDias);

    function mostrarDias() {

      var boletosDia = parseInt(pase_dia.value, 10) || 0;
      var boletos2Dias = parseInt(pase_dosdias.value, 10) || 0;
      var boletosCompleto = parseInt(pase_completo.value, 10) || 0;

      var diasElegidos = [];

      if (boletosDia > 0) {
        diasElegidos.push('viernes');
      }
      if (boletos2Dias > 0) {
        diasElegidos.push('viernes', 'sabado');
      }
      if (boletosCompleto > 0) {
        diasElegidos.push('viernes', 'sabado', 'domingo');
      }

      for (var i = 0; i < diasElegidos.length; i++) {
        document.getElementById(diasElegidos[i]).style.display = 'block';
      }

    }


    //-----------VALIDACIO (IMPORTANTE)-----------------
    //(hacer que no salga rojo a la vez)ERROR728
    nombre.addEventListener('blur', validarCampos);
    apellido.addEventListener('blur', validarCampos);
    email.addEventListener('blur', validarCampos);

    function validarCampos() {
      if (this.value == '') {
        errorDiv.style.display = 'block';
        errorDiv.innerHTML = '* este campo es obligatorio';
        errorDiv.style.color = 'red';
        errorDiv.style.textAlign = 'center';
        this.style.border = '1px solid red';
      } else {
        errorDiv.style.display = 'none';
        this.style.border = '1px solid #cccccc';
      }
    }

    //---email---
    email.addEventListener('blur', validarMail);

    function validarMail() {
      if (this.value.indexOf('@') > -1) {
        errorDiv.style.display = 'none';
        this.style.border = '1px solid #cccccc';
      } else {
        errorDiv.style.display = 'block';
        errorDiv.innerHTML = '* debe tener al menos una @';
        errorDiv.style.color = 'red';
        errorDiv.style.textAlign = 'center';
        this.style.border = '1px solid red';
      }
    }

  }

    
  }); //DOM content Loaded

})();


//--------comenzando query-------------
$(function(){

  //letterinf
  $('.nombre-sitio').lettering();//separando letra por letra

  
//agregar clase menu
$('body.conferencia .navegacion-principal a:contains("Conferencia")').addClass('activo');
$('body.calendario .navegacion-principal a:contains("Calendario")').addClass('activo');
$('body.invitados .navegacion-principal a:contains("Invitados")').addClass('activo');

  
//menu fijo IMPORTANTE728
var windowHeigth = $(window).height();
var barraAltura = $('.barra').innerHeight();

$(window).scroll(function(){

var scroll = $(window).scrollTop();
if(scroll > windowHeigth){
$('.barra').addClass('fixed');
$('body').css({'margin-top':barraAltura + 'px'})

}else{
  $('.barra').removeClass('fixed');
  $('body').css({'margin-top':0})
}
});


//menu responsive
$('.menu-movil').on('click',function(){
  $('.navegacion-principal').slideToggle();
})






  //talleres
$('div.ocultar').hide();
$('.programa-evento .info-curso:first').show();
$('.menu-programa a:first').addClass('activo');

$('.menu-programa a').on('click', function() {
  $('.menu-programa a').removeClass('activo');
  $(this).addClass('activo');
  $('.ocultar').hide();
  var enlace = $(this).attr('href');
  $(enlace).fadeIn(1000);

  return false;
});

//animacion de numeros
      //contador 1
$('.resumen-evento li:nth-child(1) p').animateNumber({number : 6},1200);
$('.resumen-evento li:nth-child(2) p').animateNumber({number : 15},1200);
$('.resumen-evento li:nth-child(3) p').animateNumber({number : 3},1500);
$('.resumen-evento li:nth-child(4) p').animateNumber({number : 9},1500);
      

//contador 2 cuenta regresica
$('.cuenta-regresiva').countdown('2019/06/28 00:00:00',function(event){
  $('#dias').html(event.strftime('%D'));
  $('#horas').html(event.strftime('%H'));
  $('#minutos').html(event.strftime('%M'));
  $('#segundos').html(event.strftime('%S'));
});

//colorbox invitados

$('.invitado-info').colorbox( { inline:true , width:"50%"});



});
