//actionne l'onglet
$(document).ready(function() {
    $('#onglet #menu_onglet a').on('click', function(onglet)  {
        var lien = $(this).attr('href');
        $('#onglet ' + lien).show().siblings().hide();
   
        $(this).parent('li').addClass('active').siblings().removeClass('active');
		onglet.preventDefault();
    });
});

//selectionne la case et envoie
$(document).ready(function(){
	var aa;
	var cell = "ratatouille";
	$('table td').click(function(){
	cell = $(this).attr('id');
	aa = document.getElementById(cell).innerHTML;
	$(this).parents('table').find('td').each( function( index, element ) {
		$(element).removeClass('clicked');
	} );
	$(this).addClass('clicked');
	});
	$("#modifier").on("click",function(event) {
	 var form = $("<form action='projection.php' method='POST'>" + 
		"<input type='hidden' name='value' value='" + cell + "'>" +
		"</form>");
		form.appendTo($('body'));
		form.submit();
	});
});
  
//Scripte sticky bouton
$(window).scroll(function (event) {
 
    if ($(this).scrollTop() >= 380) {
      $('#bouton').addClass('fixed');
    } else {
      $('#bouton').removeClass('fixed');
    }
  });