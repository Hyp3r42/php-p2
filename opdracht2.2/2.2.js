var pos = 0; 
var direction = 1; 
var id = setInterval(frame, 10);

function frame() {
    if (pos >= window.innerWidth - 50) { 
        direction = -1; 
    } else if (pos <= 0) {
        direction = 1; 
    }
    
    pos += direction; 

    document.getElementById("myDiv").style.left = pos + "px";
}