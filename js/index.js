// --------------- Transparent to opaque navigation ---------------
$(function () {
    $(window).on('scroll', function () {
        if ($(window).scrollTop() > 10) {
            $('.navbar').addClass('active');
        } else {
            $('.navbar').removeClass('active');
        }
    });
});

// --------------- Spotify iframe Loader ---------------
function hide() {
    document.getElementById('loading').style.display = 'none';
}


// --------------- Hero Countdown Timer ---------------
document.addEventListener('DOMContentLoaded', () => {

    var eventDate = 1611878400; // Jan 29 in Unix Timestamp
    var flipdown = new FlipDown(eventDate)  // Set up FlipDown

            .start()    // Start the countdown
            // Do something when the countdown ends
            .ifEnded(() => {
                console.log('The countdown has ended!');
            });

    // Toggle theme
    let body = document.body;
    //body.querySelector('#flipdown').classList.toggle('flipdown__theme-dark');
    body.querySelector('#flipdown').classList.toggle('flipdown__theme-light');

    var ver = document.getElementById('ver');
});