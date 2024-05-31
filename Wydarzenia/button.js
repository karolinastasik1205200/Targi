document.addEventListener('DOMContentLoaded', function() {
    var linkElement = document.getElementById('dynamicLink');
    
    linkElement.onclick = function(event) {
        event.preventDefault(); 
        const id_wydarzenia = window.location.search.split('=')[1];
        this.href = "../Rezerwacja/rezerwacja.html?id=" + id_wydarzenia;
        window.location.href = this.href; 
    };
});