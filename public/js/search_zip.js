/*
* API of the viacep.com.br/ for bowsing Zip Code Correios
*/

$(document).ready(function() {

  function clear_fields_ref_zipcode() {
    // clear form fields
    $("#address").val("");
    $("#neighborhood").val("");
    $("#city").val("");
    $("#state").val("");
    //$("#ibge").val("");
  }
              
  // When zip code field loses focus
  $("#zipcode").blur(function() {
  
    // New zip code variable with digits only.
    var zipcode = $(this).val().replace(/\D/g, '');

    //Check if field zipcode has value informed.
    if (zipcode !== "") {

    // Regular expression to validate the Zip.
    var validzipcode = /^[0-9]{8}$/;

    // Validates the format of zip
    if(validzipcode.test(zipcode)) {

      // Fill in the fields with "..." while browsing webservice.
      $("#address").val("...");
      $("#neighborhood").val("...");
      $("#city").val("...");
      $("#state").val("...");
      //$("#ibge").val("...");

      // Browsing webservice viacep.com.br/
      $.getJSON("//viacep.com.br/ws/"+ zipcode +"/json/?callback=?", function(data) {

        if (!("erro" in data)) {
          // Refreshes fields with query values
          $("#address").val(data.logradouro);
          $("#neighborhood").val(data.bairro);
          $("#city").val(data.localidade);
          $("#state").val(data.uf);
          //$("#ibge").val(dados.ibge);
        }
        else {
          // Search zip code not found
          clear_fields_ref_zipcode();
            alert("Zip Code not found.");
        }
      });
    }
    else {
      //Invaid zip code
      clear_fields_ref_zipcode();
      alert("Invalid formart Zip Code.");
    }
    }
    else {
      //zip code without value, cear form.
      clear_fields_ref_zipcode();
    }
  });
});