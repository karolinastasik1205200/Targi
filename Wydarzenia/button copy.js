document.addEventListener('DOMContentLoaded', function() {
    const id_wydarzenia = window.location.search.split('=')[1];

    fetch('button.php')
        .then(response => response.json())
        .then(data => {
            var isLoggedIn = data.isLoggedIn !== null;
            var linkElement = document.getElementById('dynamicLink');

            linkElement.addEventListener('click', function(event) {
                event.preventDefault(); 

                if (!isLoggedIn) {
                    alert('Zaloguj się, aby przejść na stronę rezerwacji.');
                } else {
                    const newHref = "../Rezerwacja/rezerwacja2.php?id=" + (id_wydarzenia || data.isLoggedIn);
                    linkElement.href = newHref;
                    window.location.href = newHref;
                }
            });
        })
        .catch(error => {
            console.error('Error:', error);
        });
});