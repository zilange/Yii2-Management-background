/********************************/
/****** Author: Bao Nguyen ******/
/******** Verrsion: 1.0 *********/
/******** Date: 12/2013 *********/
/********************************/

/********************************/
/****** Author: Bao Nguyen ******/
/******** Verrsion: 1.0 *********/
/******** Date: 12/2013 *********/
/********************************/

(function ($) {$.extend($.fn, {


    FVN_FW_DataAnimated: function (x) {

        return this.each(function () {

            var animtype = $(this).attr('data-type');
            var anim = $(this).attr('data-animated');

            if(!animtype || animtype=="hover"){
                $(this).hover(function(){
                    $(this).addClass('animated '+ anim);
                });
                $(this).mouseleave(function(){
                    $(this).removeClass('animated '+ anim);
                });
            }
            else if(animtype=="click"){
                $(this).click(function(){
                    $(this).each(function( i ) {
                        if($(this).hasClass('animated')){
                            $(this).removeClass('animated');
                            $(this).removeClass(anim);
                            //$(this).addClass('animated '+ anim);
                        } else {
                            $(this).addClass('animated '+ anim);
                        }
                    });
                });
                $(this).mouseleave(function(){
                    $(this).removeClass('animated '+ anim);
                });
            }
            else if(animtype=="focus"){
                $(this).focus(function(){
                    $(this).addClass('animated '+ anim);
                });
                $(this).focusout(function(){
                    $(this).removeClass('animated '+ anim);
                });
            }


        })

    },

    FVN_FW_DataAnimatedAuto: function (x) {

        return this.each(function () {
            var anim = $(this).attr('data-animated-auto');
            $(this).addClass('animated '+ anim);

        })


    }



})})(jQuery);

/* CALL PLUGINS /////////////////////////////////////////////////////////////////////////////////////////////////*/

$(document).ready(function(e) {

    $('[data-animated]').FVN_FW_DataAnimated();
    $('[data-animated-auto]').FVN_FW_DataAnimatedAuto();
});


