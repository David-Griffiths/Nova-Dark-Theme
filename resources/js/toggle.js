
function darkTheme() {

    // If not already added by user, add the toggle just above logout link in top menu

    var toggle = document.querySelector('.dark-theme-toggle');
    if( !toggle.length ) {
        console.log('No toggle found!');
    }
    else {
        console.log('Toggle found OK!');
    }

    toggle.addEventListener("click", function (e) {
        e.stopPropagation();
        var html = document.querySelector('html');
        html.classList.toggle("nova-dark-theme");
    }, true);

}

document.addEventListener("DOMContentLoaded", darkTheme, false);
