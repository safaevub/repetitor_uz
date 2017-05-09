<script>
    // Tutor search filter
    var stick_height = 0;
    var full_height = $("div#param").height();
    $("ul.toggle").hide();
    var orig_height = $("div#param").height();
    $("div#toggle_button").click(function(){
        if($("ul.toggle:hidden").length == 0){
            $("div#param").animate({height:orig_height},"slow", function(){
                $("ul.toggle").hide();
            });
            $(this).html("More options");

            stick_height = 0;
        } else{
            $("div#param").animate({height:full_height},"slow");
            $("ul.toggle").show();
            $(this).html("Hide options");

            stick_height = full_height - orig_height;
        }
    });

	//SUBJECT PAGE SEARCH INPUT
    $("div.drop").hide();
    $("ul.lesson").hide();
    $("div.subject span#nfound").hide();

    $(".drop_trigger").click(function(){
        $("div.drop").hide();
        $(this).next("div.drop").fadeIn();

        if($(this).attr("id") == "location"){
            $(this).attr("disabled", "disabled");
        } else{
            // $(this).attr("disabled", false);
            $("input#location").attr("disabled", false);
        }
    })

    $(document).mouseup(function(e){
        var container = $("div.drop");
        var cont = $(".drop_trigger");

        if (!container.is(e.target) && !cont.is(e.target) && container.has(e.target).length === 0){
            container.hide();
            $("input#subject").val($("input#subject").attr("text"));
        }
    });

    $("#subject").keyup(function(){
        // Retrieve the input field text and reset the count to zero
        var filter = $(this).val(), count = 0;

        if(filter.length > 0){
            $("ul.lesson").show();
        } else{
            $("ul.lesson").hide();
        }

        // Loop through the comment list
        $("div.subject ul li").each(function(){
     
            // If the list item does not contain the text phrase fade it out
            if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                $(this).fadeOut();
            // Show the list item if the phrase matches and increase the count by 1
            } else {
                $(this).show();
                count++;

                // Assign parameters of matching item to hidden input
                if($(this).text().toLowerCase() === filter.toLowerCase()){
                    $("input[name='table']").attr("value", $(this).children("a").attr("target"));
                    $("input[name='category']").attr("value", $(this).children("a").attr("item"));
                } else{
                    $("input[name='table']").removeAttr("value");
                    $("input[name='category']").removeAttr("value");
                }
            }
        });

        if(count == 0){
            $("div.subject").css({"overflow": "hidden"});
            //$("div.subject ul").hide();
            $("div.subject span#nfound").show();
        } else{
            $("div.subject").css({"overflow-y": "auto"});
            $("div.subject span#nfound").hide();
            //$("div.subject ul").show();
        }
    });

    $("div.region a").click(function(){
        var text = $(this).text();
        var reg_id = $(this).attr("rid");

        $("input#location").attr("value", text);
        $("input#location").attr("disabled", false);
        $("input[name='region']").attr("value", reg_id);
            
        $("div.drop").hide();
        return false;
    })
    //END OF SUBJECT FILTER

    //STICKY SIDEBAR
    
    function stick_me(){
        var stickyTop = $('.sticky').offset().top;
        
        $(window).scroll(function(){ // scroll event
            var windowTop = $(window).scrollTop(); // returns number

            var stick_cont_width = $("#side").width();

            if (stickyTop < windowTop - stick_height) {
                $('.sticky').css({ position: 'fixed', top: 0, width: stick_cont_width });
            } else {
                $('.sticky').css('position','static');
            }
        });
    }

    stick_me();

    $("#up span").click(function(){
        $('html, body').animate({scrollTop: 0}, 800);
    })
</script>