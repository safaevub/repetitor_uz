<script>
	$("button#tutor_remove").click(function(){
		var tutor = $(this).attr("item");
		var span = $(this).parent("span.tutor");
		var dataString = 'action=unset&item='+ tutor;

		$.ajax({
			type: "POST",
			url: "<?=BASE?>system/classes/ajax/tutor_bar.php",
			data: dataString,
			cache: false,
			success: function(html){
				if($("span.tutor").length > 1){
					span.remove();
				} else{
					$("div#cart").remove();
				}
			}
		})

		return false;
	})
</script>