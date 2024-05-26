window.onload = function() {
    const areas = document.querySelectorAll('area');
    const selectedAreaInput = document.getElementById('selected-area');
    const info = document.getElementById('info');

    const urlParams = new URLSearchParams(window.location.search);
    const id = urlParams.get('id');

    
    fetch(`script2.php?id=${id}`) 
        .then(response => response.json())
        .then(data => {
            
            data.forEach(item => {
                const area = document.querySelector(`area[title="${item.Miejsce}"]`);
                if (area) {
                    area.classList.add('occupied-area');
                    area.title = "To miejsce jest już zarezerwowane.";
                }
            });
        })
        .catch(error => {
            console.error('Error fetching occupied areas:', error);
        });

    areas.forEach(area => {
        area.addEventListener('click', (event) => {
            event.preventDefault();  
            if (!event.target.classList.contains('occupied-area')) {
                const title = event.target.title;
                info.textContent = `Wybrane miejsce: ${title}.`;

                
                areas.forEach(a => a.classList.remove('selected-area'));

                
                event.target.classList.add('selected-area');

                
                selectedAreaInput.value = title;
            } else {
                info.textContent = "To miejsce jest już zarezerwowane.";
            }
        });
    });
};