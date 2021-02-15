$(document).ready(function(){

    $('.card:not(:first-of-type)').hide();

    var times = 1;

    $(this).keydown(function(e) {

        if (times < 3) {
            times++

        } else {
            times = 1;
        }

        console.log(times);

        switch(times) {
            case 1:
                $('.card:not(:first-of-type)').toggle();
                break;
            case 2:
                $('.card:not(:nth-of-type(2))').toggle();
                var savedCard = $('.card').not().css('display', 'none');
                $.ajax({
                    url: '../../../php/includes/card.php',
                    success: function(result) {
                        $('.card-hidden').html(result);
                    }
                });
                break;
            case 3:
                $('.card:not(:last-of-type').toggle();
                break;
        }

        switch(e.which) {
            case 37:
                //cardData("left");
            break;
    
            case 39:
                //cardData("right");
            break;
    
            default: return;
        }
        //e.preventDefault();
    });
});