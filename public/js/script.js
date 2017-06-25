// $(document).ready(function(){
//   $('.carousel').carousel();
// });

// $(document).ready(function(){
//   $('.scrollspy').scrollSpy();
// });

// $(document).ready(function() {
//   $('select').material_select();
// });

$('body').scrollspy({ target: '#navbar-example' });

$('#myTabs a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
});
