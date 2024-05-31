const id_wydarzenia = window.location.search.split('=')[1];



const displayEvent = (wydarzenie) => {
    const titleElement = document.getElementById("title");
    const descriptionElement = document.getElementById("description");
    const imageElement = document.getElementById("image");
    const durationElement = document.getElementById("duration");
    const dateElement = document.getElementById("date");
    
    titleElement.textContent = wydarzenie.Nazwa;
    descriptionElement.textContent = wydarzenie.Opis;
    imageElement.src = wydarzenie.Zdjecie;
    durationElement.textContent = wydarzenie.Czas_Trwania;
    dateElement.textContent = wydarzenie.Data;


};

console.log("alert");

const xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        const wydarzenie = JSON.parse(this.responseText);
        displayEvent(wydarzenie);
    }
};
xhttp.open("GET", "podstrona_wydarzenia.php?id=" + id_wydarzenia, true);
xhttp.send();

var linkElement = document.getElementById('dynamicLink');
linkElement.addEventListener(function() {
    linkElement.onclick = function(event) {
        event.preventDefault(); 
        this.href = "../Rezerwacja/rezerwacja.html?id=" + 3;
        window.location.href = this.href; 
    };
});