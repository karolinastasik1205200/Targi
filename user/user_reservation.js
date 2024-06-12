document.addEventListener('DOMContentLoaded', function() {
    const ListaRezerwacji = document.getElementById("rezerwacje-lista");

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            try {
                var results = JSON.parse(this.responseText);
                results.forEach(function(result) {
                    const link = document.createElement("a");
                    link.href = "strona_rezerwacji.html?id=" + result.ID;
                    link.classList.add("rezerwacja");

                    const wlasciciel = document.createElement("h3");
                    wlasciciel.textContent = result.Wlasciciel || result.some_other_field; // Adjust as per your field
                    link.appendChild(wlasciciel);

                    const nazwa = document.createElement("p");
                    nazwa.textContent = result.Nazwa || '';
                    link.appendChild(nazwa);

                    ListaRezerwacji.appendChild(link);
                });
            } catch (e) {
                console.error("Parsing error:", e);
            }
        }
    };
    xhttp.open("GET", "user/user_reservation.php", true);
    xhttp.send();
});
