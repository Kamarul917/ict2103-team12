//Initialise
$(document).ready(function () {
    activateMenu();
    animateAccordion();
    
});

// --------------- Indicate active page on nav ---------------
function activateMenu()
{
    $('.navbar-nav .nav-link').click(function () {
        $('.navbar-nav .nav-link').removeClass('.active');   // it remove all the active links
        $(this).addClass('.active');    // it adds active class to the current link you have opened
    });
}

// --------------- About us/FAQ Accordion ---------------
function animateAccordion()
{
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function () {
            this.classList.toggle("activeacc"); //Changed from "active" to "activeacc"
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
            }
        });
    }
}