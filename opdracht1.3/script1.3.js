document.getElementById("myForm").addEventListener("submit", function(event){
    event.preventDefault();

    var product = document.getElementById("product").value; 
    console.log(product);
});