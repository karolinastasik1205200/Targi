document.addEventListener('DOMContentLoaded', function() {
    const rezerwacjeLista = document.getElementById("rezerwacje-niepotwierdzone-lista");

    
    const dodajRezerwacjeDoListy = (rezerwacja) => {
        const li = document.createElement("li");
        const nazwa = document.createElement("h3");
        nazwa.textContent = rezerwacja.Nazwa;
        li.appendChild(nazwa);

        const blaty = document.createElement("p");
        blaty.textContent = `Blaty: ${rezerwacja.Blaty}`;
        li.appendChild(blaty);

        const krzesla = document.createElement("p");
        krzesla.textContent = `Krzesła: ${rezerwacja.Krzesla}`;
        li.appendChild(krzesla);

        const wyposazenie = document.createElement("p");
        wyposazenie.textContent = `Wyposażenie: ${rezerwacja.Wyposazenie}`;
        li.appendChild(wyposazenie);

        const opis = document.createElement("p");
        opis.textContent = `Opis: ${rezerwacja.Opis}`;
        li.appendChild(opis);

        const miejsce = document.createElement("p");
        miejsce.textContent = `Miejsce: ${rezerwacja.Miejsce}`;
        li.appendChild(miejsce);

        rezerwacjeLista.appendChild(li);
    };

    
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            const rezerwacje = JSON.parse(this.responseText);
            rezerwacje.forEach(rezerwacja => {
                dodajRezerwacjeDoListy(rezerwacja);
            });
        }
    };
    xhttp.open("GET", "user/user_reservation2.php", true);
    xhttp.send();
});
