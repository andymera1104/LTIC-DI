var counter = 0; // Global Variable
function readyFn( jQuery ) {
    if(counter == 0){ // if counter is 1, it will not execute
        $('.count').each(function () {
            $(this).prop('Counter',0).animate({
                    Counter: $(this).text()
            }, {
                    duration: 4000,
                    easing: 'swing',
                    step: function (now) {
                            $(this).text(Math.ceil(now));
                    }
            });
        });
        counter++; // increment the counter by 1, new value = 1
    }
}