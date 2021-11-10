var clave = "";
window.addEventListener("keydown", function(e) {
    if (e.key=="Enter") {
        window.location.href = "retrieve.php?clave=" + clave;
        //clave = ""; //Maybe not needed now that we redirect to another page.
    } else {
        clave += e.key;
    }
});
