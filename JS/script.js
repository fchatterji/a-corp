"use strict";

function addActiveClassToNav() {
    var url = window.location.pathname;

    if (url.includes("reservation")) {
        $('.nav-reservation').addClass('active');

    } else if (url.includes("salle")) {
        $('.nav-salle').addClass('active');

    } else if (url.includes("home")) {
        $('.nav-home').addClass('active');

    } else if (url.includes("organism")) {
        $('.nav-organism').addClass('active');

    } else if (url.includes("login")) {
        $('.nav-login').addClass('active');
    }
}
