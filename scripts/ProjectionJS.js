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
 
	$('table td').dblclick(function(){
		var cell = $(this).attr('id');
		var aa = document.getElementById(cell).innerHTML;
		alert('Cellule: '+aa);
 
	});
  });
  
  //fait apparaitre formulaire de l'adresse de livraison
function montrer (box) {
var a = document.getElementById('checkbox').checked;
	if(a == true){
	box.className="shown";
	}
	else{ 
	box.className="hidden";
	}
}