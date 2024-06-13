const id_wydarzenia = window.location.search.split('=')[1];

const displayEvent = (wydarzenie) => {
    const titleElement = document.getElementById("title");
    const imageElement = document.getElementById("image");
    const durationElement = document.getElementById("duration");
    const dateElement = document.getElementById("date");

    titleElement.textContent = wydarzenie.Nazwa;
    imageElement.src = wydarzenie.Zdjecie;
    durationElement.textContent = wydarzenie.Czas_Trwania;
    dateElement.textContent = wydarzenie.Data;
};

const xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        const wydarzenie = JSON.parse(this.responseText);
        displayEvent(wydarzenie);
    }
};
xhttp.open("GET", "../wydarzenia/podstrona_wydarzenia.html?id=" + id_wydarzenia, true);
xhttp.send();

