window.onload = function() {
    logoAlign();
}

window.addEventListener("resize", logoAlign);

// Vertical center for Logo in Banner based on window size
function logoAlign() {
    var logo = document.getElementById('logo');
    var banner = document.getElementById('banner');
    var logoMargin = Math.floor((banner.clientHeight - logo.clientHeight) / 2);
    logo.style.marginTop = logoMargin + "px";
}