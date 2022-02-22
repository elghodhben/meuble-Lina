$(document).ready(function () {
    $('body').on('click', '.btn_add_panier', function () {
        var id_article = $(this).attr('id_article');
        
        $.ajax({
            url: "add_article_panier.php",
            method: 'POST',
            data: 'id_article=' + id_article,
            success: function (result) {
                $('#ModalPanier').modal('show');
                $('.body_panier').html(result);
            }
        });
    });
    $('body').on('click', '.div_panier', function () {
        $.ajax({
            url: "add_article_panier.php",
            success: function (result) {
                $('#ModalPanier').modal('show');
                $('.body_panier').html(result);
            }
        });
    });
    $(document).on('click', '#clear_cart', function(){
		var action = 'empty';
		$.ajax({
			url:"add_article_panier.php",
			method:"POST",
			data:{action:action},
			success:function(result)
			{
                $('#ModalPanier').modal('hide');
                $('.body_panier').html(result);
			}
		});
    });
    $(document).on('click', '#delete', function(){
		var id_article = $(this).attr('id_article');
		var action = 'remove';
		
			$.ajax({
				url:"add_article_panier.php",
				method:"POST",
				data:{id: id_article,action:action},
				success:function()
				{
                    $('#ligne').remove();
                    $(".body_panier").removeClass("fixed");
				}
			});
	});
		
});
