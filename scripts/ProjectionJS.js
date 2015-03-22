//actionne l'onglet
$(document).ready(function() {
    $('#onglet #lien_onglet a').on('click', function(onglet)  {
        var lien = $(this).attr('href');
        $('#onglet ' + lien).show().siblings().hide();
   
        $(this).parent('li').addClass('active').siblings().removeClass('active');
		onglet.preventDefault();
    });
});

//selectionne la case
$(document).ready(function(){
	var aa;
	var cell;
	$('table td').click(function(){
	cell = $(this).attr('id');
	aa = document.getElementById(cell).innerHTML;
	$(this).parents('table').find('td').each( function( index, element ) {
		$(element).removeClass('clicked');
	} );
	$(this).addClass('clicked');
	/*alert('Voulez vous supprimer cette projection ?'+cell+' '+aa);
	$.post('planning.php', {value: cell}, function(data) {
	alert(data);
	$(document).load(this);
	});*/
	});

	$("#supprimer").click(function() {
	  $('<form action="projection.php" method="POST">' + 
		'<input type="hidden" name="value" value="' + cell + '">' +
		'</form>').submit();
	
});
});
  
