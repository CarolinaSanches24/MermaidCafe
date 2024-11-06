$(document).ready(function () {

  $('#price').maskMoney({
    prefix: 'R$ ',
    allowNegative: false,
    thousands: '.',
    decimal: ',',
    affixesStay: true,
    precision: 2
  });


  $('#price').maskMoney('mask');
});

//Função para ajustar formatação do campo Price