jQuery(document).ready(function ($) {
  $('body').on("focusout", "#calc_shipping_postcode", function () {
    fetch(`https://viacep.com.br/ws/${$(this).val()}/json/`, {
      method: 'GET',
    })
      .then(res => res.text())
      .then(data => {
        const response = JSON.parse(data);
        $("#calc_shipping_city").val(response.localidade);
        $("#calc_shipping_state").val(response.uf).trigger("change");
      }).catch(err => {
        console.log(err);
      });
  });
});