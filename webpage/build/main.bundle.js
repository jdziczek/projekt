"use strict";

// Otwieranie i zamykanie panelu bocznego
function showSideBar() {
    document.getElementById("sidebar").style.display = "block";
    document.getElementById("shadow").style.display = "block";
}
function hideSideBar() {
    document.getElementById("sidebar").style.display = "none";
    document.getElementById("shadow").style.display = "none";
}