window.onload = function() {
    const areas = document.querySelectorAll('area');
    const selectedAreaInput = document.getElementById('selected-area');
    const info = document.getElementById('info');

    const urlParams = new URLSearchParams(window.location.search);
    const id = urlParams.get('id');


    function markReservedAreas(reservedAreas, isConfirmed) {
        areas.forEach(area => {
            const title = area.getAttribute('title');
            const isReserved = reservedAreas.some(item => item.Miejsce === title);
            if (!isReserved) return;

            if (isConfirmed) {
                area.classList.add('occupied-area');
                area.title = "To miejsce jest już zarezerwowane.";
                return;
            }

            area.classList.add('preoccupied-area');
            area.title = "To miejsce jest już wstępnie zarezerwowane.";
        });
    }

    fetch(`script2.php?id=${id}`) 
        .then(response => response.json())
        .then(data => {
            markReservedAreas(data, true); 
        })
        .catch(error => {
            console.error('Błąd pobierania rezerwacji potwierdzonych:', error);
        });

    fetch(`script3.php?id=${id}`) 
        .then(response => response.json())
        .then(data => {
            markReservedAreas(data, false); 
        })
        .catch(error => {
            console.error('Błąd pobierania rezerwacji niepotwierdzonych:', error);
        });

        areas.forEach(area => {
            area.addEventListener('click', (event) => {
                event.preventDefault();
                const isOccupied = event.target.classList.contains('occupied-area');
                const isPreoccupied = event.target.classList.contains('preoccupied-area');
                if (isOccupied === true) {
                    info.textContent = "To miejsce jest już zarezerwowane.";
                    selectedAreaInput.value = "reserved";
                    return;
                }
                if (isPreoccupied === true) {
                    info.textContent = "To miejsce jest już wstępnie zarezerwowane.";
                    selectedAreaInput.value="reserved";
                    return;
                }
                selectedAreaInput.value = event.target.title;
                info.textContent = `Wybrane miejsce: ${event.target.title}.`;
                event.target.classList.add('selected-area');
            });
        });

};