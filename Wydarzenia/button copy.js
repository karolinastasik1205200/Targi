document.addEventListener('DOMContentLoaded', function() {
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
                    linkElement.href = "../Rezerwacja/rezerwacja.html?id=" + data.isLoggedIn;
                    window.location.href = linkElement.href; 
                }
            });
        })
        .catch(error => {
            console.error('Error:', error);
        });
});