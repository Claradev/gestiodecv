//alert("salimata");
$(document).ready(function(){
	$('#btnValider').click(function(){
		var url= "categories.php"
		$('#btnValider').text('enregistrer...');
		$('#btnValider').attr('disabled',true);
		$.post(url,{
					libelle:$('#libelle').val(),
					},
				function(data){
					if (data==1) {
						$('#btnValider').text('enregistrer');
						$('#btnValider').attr('disabled',false);
						$('#libelle').val('');
					}
					console.log(data);

				});
	});
});