var $ = jQuery.noConflict();

$(function(){

  function fetchListings(category){
    return new Promise((resolve, reject) => {
      const { action, nonce, ajax_url }  = LO_DATA;

      const data = {
        action: 'lo_website_projects', //name of wordpress action
        nonce: 'iy2VWT03w0RefAD1Hrc9wN5W', // security token
        ajax_url: 'https://dev.leadorigin.com/admin-ajax.php',
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
        $('#lo-website-results').html(data);
      }
    })

  });

});