var pos = 0; 
var id = setInterval(frame, 10);

function frame() {
    if (pos >= window.innerWidth - 50) {
        clearInterval(id);
    } else {
        pos++; 
        document.getElementById("myDiv").style.left = pos + "px"; 
    }
}