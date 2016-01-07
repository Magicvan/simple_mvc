$( document ).ready(function() {
  console.log( "Follow me on Twitter: @iml385!" );
  $('.new-entry').on('click', function(){
  	$('#newEntry').removeClass('hidden');
  });
  $('.new-tag').on('click', function(){
  	$('#newTag').removeClass('hidden');
  });
});