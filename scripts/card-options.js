$(document).ready(function() {

    // Toggle navbar options menu
    const optContent = $('.navbar__options-content');
    const optBtn     = $('.navbar__options-btn');

    optContent.hide();

    optBtn.click(function(){
        optContent.toggle('fold', "fast");
        optBtn.toggleClass('navbar__options-btn--toggle');
    });

    // Save init. curr. value in localStorage
    const initCurr = $('.card__info--salary').html();
    const selectCurr = "#options__currency";

    localStorage.setItem('initCurr', initCurr);

    // Populate select statement with all current curr. values from API
    $.getJSON('https://api.exchangeratesapi.io/latest', function (obj) {
       $.each(obj.rates, function(key, value) {
            $(selectCurr).append(new Option(key, value));
       });
    });

    // On curr. select do curr. difference 
    $(selectCurr).change(function() {
        const b = $(this).children('option:selected');
        const c = Math.floor((initCurr * b.val())) + ' ' + b.text();

        $('.card__info--salary').html(c);
    });

});