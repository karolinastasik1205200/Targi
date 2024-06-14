const today = new Date();
const ListaWydarzen = document.getElementById("event-list");

var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var wydarzenia = JSON.parse(this.responseText);
        
        const upcomingEvents = wydarzenia
            .filter(wydarzenie => new Date(wydarzenie.Data) > today)
            .sort((a, b) => new Date(a.Data) - new Date(b.Data));
        
        upcomingEvents.forEach((wydarzenie, index) => {
            if (index % 4 === 0) {
                const row = document.createElement("div");
                row.classList.add("row");
                ListaWydarzen.appendChild(row);
            }
        
            const link = document.createElement("a");
            link.href = "/Wydarzenia/podstrona_wydarzenia2.php?id=" + wydarzenie.id;
            link.classList.add("event");
        
            const title = document.createElement("h2");
            title.textContent = wydarzenie.Nazwa;
            link.appendChild(title);
        
            const image = document.createElement("img");
            image.src = wydarzenie.Zdjecie;
            image.style.width = "250px"; 
            image.style.height = "250px";
            image.alt = wydarzenie.Nazwa;
            image.classList.add("event-image");
            link.appendChild(image);
        
            const date = document.createElement("p");
            date.textContent = wydarzenie.Data;
            link.appendChild(date);
        
            const currentRow = ListaWydarzen.lastElementChild;
            currentRow.appendChild(link);
        
            if ((index + 1) % 4 !== 0) {
                currentRow.appendChild(document.createTextNode(" "));
            }
        });
    }
};
xhttp.open("GET", "/Wydarzenia/script.php", true);
xhttp.send();