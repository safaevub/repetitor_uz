<script>
// Cart
function update_bar(){
	var dataString = 'action=show';

	$.ajax({
		type: "POST",
		url: "<?=BASE?>system/classes/ajax/tutor_bar.php",
		data: dataString,
		cache: false,
		success: function(html){
			if(html){
				$("footer").before(html);
				tutor_remove();
				clear_cart();
			} else{
				$("section#selected_tutor").remove();
			}
		}
	})
}

function tutor_select(){
	$("span#tutor_select a").click(function(){
		$(this).parent(".btn").addClass('disabled');
		var tutor = $(this).attr("item");
		var dataString = 'action=set&item='+ tutor;

		$.ajax({
			type: "POST",
			url: "<?=BASE?>system/classes/ajax/tutor_bar.php",
			data: dataString,
			cache: false,
			success: function(){
				update_bar();
			}
		})

		return false;
	})
}

function tutor_remove(){
	$("button#tutor_remove").click(function(){
		var tutor = $(this).attr("item");
		var dataString = 'action=unset&item='+ tutor;

		$.ajax({
			type: "POST",
			url: "<?=BASE?>system/classes/ajax/tutor_bar.php",
			data: dataString,
			cache: false,
			success: function(html){
				update_bar();
				$('a[item='+ tutor +']').parent("span#tutor_select").removeClass("disabled");
			}
		})

		return false;
	})
}

function clear_cart(){
	$("span#remove_all a").click(function(){
		var dataString = 'action=empty_cart';

		$.ajax({
			type: "POST",
			url: "<?=BASE?>system/classes/ajax/tutor_bar.php",
			data: dataString,
			cache: false,
			success: function(html){
				update_bar();
				$("span#tutor_select").removeClass("disabled");
			}
		})

		return false;
	})
}

update_bar();
tutor_select();
tutor_remove();
clear_cart();
</script>