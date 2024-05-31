document.addEventListener('DOMContentLoaded', function() {
    const ListaRezerwacji = document.getElementById("rezerwacje-lista");

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var rezerwacje = JSON.parse(this.responseText);
            
            rezerwacje.forEach(function(rezerwacja) {
                const link = document.createElement("a");
                link.href = "strona_rezerwacji.html?id=" + rezerwacja.ID;
                link.classList.add("rezerwacja");
                
                const wlasciciel = document.createElement("h3");
                wlasciciel.textContent = rezerwacja.Wlasciciel;
                link.appendChild(wlasciciel);
                
                const nazwa = document.createElement("p");
                nazwa.textContent = rezerwacja.Nazwa; 
                link.appendChild(nazwa);

                ListaRezerwacji.appendChild(link);
            });
        }
    };
    xhttp.open("GET", "admin.php", true); 
    xhttp.send();
});