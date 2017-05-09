<script src="<?=BASE?>lib/js/jquery.min.js"></script>
<script src="<?=BASE?>lib/js/jquery.pin.js"></script>
<!--<script src="<?=BASE?>lib/js/tutor_select.js"></script>-->
<script>
    $(document).ready(function(){
        //Region select option
        $("div.loc_list").hide();
        $("a#loc").click(function(){
            $(this).next("div.loc_list").fadeIn();
            return false;
        })

        $(document).mouseup(function(e){
            var container = $("div.loc_list");
            var cont = $("a#loc");

            if (!container.is(e.target) && !cont.is(e.target) && container.has(e.target).length === 0){
                container.hide();
            }
        });

        //User selected language
        $("a#localize").click(function(){
            var lang = $(this).attr("lang");
            var dataString = "lang="+ lang;

            $.ajax({
                type: "POST",
                url: "<?=BASE?>system/classes/ajax/localization.php",
                data: dataString,
                cache: false,
                success: function(){
                    location.reload();
                }
            })

            return false;
        })
    });
</script>