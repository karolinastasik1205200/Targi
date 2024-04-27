import Wydarzenia from './Wydarzenia.js';
//importujemy klasę Wydarzenia w pliku Wydarzenia.js
document.addEventListener('DOMContentLoaded', function() {
const wydarzenia = [
    new Wydarzenia('Wystawa Kotów', 'TargiKotkow.png', '2024-08-12'),
    new Wydarzenia('Targi Roślin', 'TargiRoslin.png', '2024-07-07'),
    new Wydarzenia('Targi Książek', 'TargiKsiazek.png', '2024-11-12'),
    new Wydarzenia('Targi Komiksów', 'TargiKomiksow.png', '2024-09-07'),
    new Wydarzenia('Targi Antyków', 'TargiAntykow.png', '2024-08-13'),
    new Wydarzenia('Zlot Kolekcjonerów Znaczków', 'TargiZnaczkow.png', '2024-07-15')
]

const today = new Date();
const upcomingEvents = wydarzenia
    .filter(wydarzenie => new Date(wydarzenie.date) > today)
    .sort((a, b) => {
        const dateA=new Date(a.date);
        const dateB = new Date (b.date);
        const diffA=Math.abs(dateA-today);
        const diffB = Math.abs(dateB - today);
        return diffA-diffB;
    });
const ListaWydarzen = document.getElementById("event-list");

upcomingEvents.forEach(wydarzenie => {
    const listItem = document.createElement("li");
    listItem.innerHTML = `
    <h2>${wydarzenie.title}</h2>
    <img src="${wydarzenie.image}" alt="${wydarzenia.title}" width="200">
    <p>${wydarzenie.date}</p>
    `;
    ListaWydarzen.appendChild(listItem);
});
});