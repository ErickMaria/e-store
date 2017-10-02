// all request ajax

window.onload = $('#preloader').remove();
      
$(document).ready(function(){
  
  /* Cart */
  
  // add product on cart
  $('#addCart').click(function(){

    $.ajax({ 
      type: "GET", 
      url: '/addCart/'+$('#idCart').val(),
      dataType:"html",
      beforeSend: function(){
        $('#addCartLoad').removeClass('hidden');
      },
      success:function(response){
        $('body').load(document.URL);
        $('body').html(response);
        $.notify("added cart","success");
      }
    }).fail(function(){
      alert('fail');
    });
          
  });
    
  // delete product on cart
  $("input:radio[name='cartDelete']").change(function () {
    
    $.ajax({ 
      type: "GET", 
      url: '/delete_cart/'+$(this).val(),
      dataType:"html",
      success:function(response){
        $('body').load(document.URL);
        $('body').html(response);
      }
    }).fail(function(){
      alert('fail');
    });
    
  });
  
  // increment product on cart
  $("input:radio[name='cartIcrement']").change(function() {
    
    $.ajax({
      type: "GET", 
      url: "/incrementCart/"+$(this).val(),
      dataType:"html",
      success: function(response){
        $('body').load(document.URL);
        $('body').html(response);
      }
    }).fail(function(){
      alert('fail');
    });
    
  });
   
  // decrement product on cart
  $("input:radio[name='cartDecrement']").change(function() {
     
     $.ajax({
       type: "GET", 
       url: "/decrementCart/"+$(this).val(),
       dataType:"html",
       success: function(response){
         $('body').load(document.URL);
         $('body').html(response);
       }
     }).fail(function(){
       alert('fail');
     });
     
  });
  
  /* Checkout */
  
  // increment product on checkout
  $("input:radio[name='checkoutIcrement']").change(function() {
    
    $.ajax({
      type: "GET", 
      url: "/incrementCheckout/"+$(this).val(),
      dataType:"html",
      success: function(response){
        $('body').load(document.URL);
        $('body').html(response);
      }
    }).fail(function(){
      alert('fail');
    });
    
  });
   
  // decrement product on checkout
  $("input:radio[name='checkoutDecrement']").change(function() {
     
     $.ajax({
       type: "GET", 
       url: "/decrementCheckout/"+$(this).val(),
       dataType:"html",
       success: function(response){
         $('body').load(document.URL);
         $('body').html(response);
       }
     }).fail(function(){
       alert('fail');
     });
     
  });
    
  // delete product on checkout
  $("input:radio[name='checkoutDelete']").change(function () {

    $.ajax({ 
      type: "GET", 
      url: '/delete_checkout/'+$(this).val(),
      dataType:"html",
      success:function(response){
        $('body').load(document.URL);
        $('body').html(response);
      }
    }).fail(function(){
      alert('fail');
    });
    
  });
  
  /* Freight */
  
  // calculate  product freight
  $('#calcFreight').submit(function(e){
          
    e.preventDefault();
         
    $.ajax({
      type: "POST",
      url: '/freight',
      data: $(this).serialize(),
      dataType: "html",
      beforeSend: function(){
        $('#calcFreightLoad').removeClass('hidden');
      },
      success: function(response){
        $('body').html(response);
      }
    }).fail(function(){
      alert('fail');
    });
          
  });
  
});