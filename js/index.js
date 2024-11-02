$(document).ready(function () {
  // Inicialize a máscara de dinheiro no campo #price
  $('#price').maskMoney({
    prefix: 'R$ ',
    allowNegative: false,
    thousands: '.',
    decimal: ',',
    affixesStay: true,
    precision: 2
  });

  // Atualize o campo com a máscara imediatamente ao carregar
  $('#price').maskMoney('mask');
});