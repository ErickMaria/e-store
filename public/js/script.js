$(document).ready(function() {
  
  /*  function for going page top at click on button close on categories menu in header_navbar_mobile.blade.php */
  $('#navbar-close-category-mobile').on('click', function() {
    $(document).scrollTop(0);
  });
  /* end */
  
  $('[data-toggle="tooltip"]').tooltip();
  
		
});