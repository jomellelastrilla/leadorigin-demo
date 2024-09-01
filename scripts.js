var $ = jQuery.noConflict();

$(function(){

  function fetchListings(category){
    return new Promise((resolve, reject) => {
      const { action, nonce, ajax_url }  = LO_DATA;

      const data = {
        action, //name of wordpress action
        nonce,
        ajax_url,
        category
      };


      $.ajax({
        type: "POST",
        url: ajax_url,
        data,
        dataType: "json",
        beforeSend: function () {
          
        },
      })
        .done((response) => {
          resolve(response);
        })
        .fail(function (e) {
          reject(e.message);
        })
        .always(function () {});
    });
  }

  $('#lo-website-filter').on('change', function(){
    const category = $(this).val();

    $('#lo-website-results').empty();
     
    fetchListings(category).then(({success, data}) => {
      if (success) {

      }
    })

  });

});