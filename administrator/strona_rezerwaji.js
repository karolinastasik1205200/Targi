const id_rezerwacji = window.location.search.split('=')[1];
console.log("ID rezerwacji:", id_rezerwacji);

const sendRequest = (url, data, callback) => {
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
            if (this.status == 200) {
                try {
                    const response = JSON.parse(this.responseText);
                    callback(response);
                } catch (error) {
                    console.error("Error parsing response JSON:", error);
                    console.error("Response text:", this.responseText);
                }
            } else {
                console.error("Request failed with status:", this.status);
                console.error("Response text:", this.responseText);
            }
        }
    };
    xhttp.open("POST", url, true);
    xhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xhttp.send(JSON.stringify(data));
};

const displayEvent = (rezerwacja) => {
    const titleElement = document.getElementById("nazwa");
    const eventElement = document.getElementById("event");
    const emailElement = document.getElementById("email");
    const telephoneElement = document.getElementById("telephone");
    const tableElement = document.getElementById("tables");
    const chairsElement = document.getElementById("chairs");
    const equipmentElement = document.getElementById("equipment");
    const descriptionElement = document.getElementById("description");
    const placeElement = document.getElementById("place");

    titleElement.textContent = rezerwacja.Wlasciciel;
    eventElement.textContent = rezerwacja.Nazwa;
    emailElement.textContent = rezerwacja.Email;
    telephoneElement.textContent = rezerwacja.Telefon;
    tableElement.textContent = rezerwacja.Blaty;
    chairsElement.textContent = rezerwacja.Krzesla;
    equipmentElement.textContent = rezerwacja.Wyposazenie;
    descriptionElement.textContent = rezerwacja.Opis;
    placeElement.textContent = rezerwacja.Miejsce;
};

const xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4) {
        if (this.status == 200) {
            try {
                const rezerwacja = JSON.parse(this.responseText);
                displayEvent(rezerwacja);
            } catch (error) {
                console.error("Error parsing response JSON:", error);
                console.error("Response text:", this.responseText);
            }
        } else {
            console.error("Request failed with status:", this.status);
            console.error("Response text:", this.responseText);
        }
    }
};
xhttp.open("GET", "strona_rezerwacji.php?id=" + id_rezerwacji, true);
xhttp.send();