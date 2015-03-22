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
 
	$('table td').click(function(){
		var cell = $(this).attr('id');
		var aa = document.getElementById(cell).innerHTML;
		$(this).addClass('clicked').siblings().removeClass('clicked');
		alert('Voulez vous supprimer cette projection ?'+cell+' '+aa);
		});
			
  });
  
$("button").on( 'click', function () {
    $.ajax({
        type: 'post',
        url: 'http://localhost/aa/gmlbV2/supprimer.php',
        data: {
            proj: "some text"
        },
        success: function( data ) {
            console.log( data );
        }
    });
});

