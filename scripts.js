var $ = jQuery.noConflict();

$(function(){

  function fetchListings(category){
    return new Promise((resolve, reject) => {
    

      const data = {
        action: 'lo_website_projects', //name of wordpress action
        nonce: '12345', // security token
        category
      };


      $.ajax({
        type: 'POST',
        url: 'https://dev.leadorigin.com//wp-admin/admin-ajax.php',
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
     
    fetchListings(category).then(({ success, data }) => {
      if (success) {
        $('#lo-website-results').html(data);
      } else{
        $('#lo-website-results').html('Error: ', data.message);
      }
    })
    .catch(error => {
      // Handle the error here
      console.error('Error fetching listings:', error);
      // Optionally, display an error message to the user
      $('#lo-website-results').html('<p>An error occurred while fetching listings.</p>');
    });

  });

});