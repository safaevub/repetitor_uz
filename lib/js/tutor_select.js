$(document).ready(function(){
    function update_bar(){
        var dataString = 'action=show';

        $.ajax({
            type: "POST",
            url: "<?=BASE?>system/classes/ajax/tutor_bar.php",
            data: dataString,
            cache: false,
            success: function(html){
                $("footer").before(html);
            }
        })
    }

    update_bar();
});