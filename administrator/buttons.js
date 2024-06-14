document.addEventListener('DOMContentLoaded', function() {
    const acceptButton = document.getElementById('akceptacja');
    const rejectButton = document.getElementById('odrzucenie');

    const id_rezerwacji = window.location.search.split('=')[1];

    acceptButton.addEventListener('click', function() {
        console.log("cokolwiek");
        sendUserDecision('accept', id_rezerwacji);
    });

    rejectButton.addEventListener('click', function() {
        sendUserDecision('reject', id_rezerwacji);
    });
});

function sendUserDecision(action, id) {
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            const response = JSON.parse(this.responseText);
            if (response.success) {
                alert('Akcja zakończona sukcesem');
            } else if (response.error) {
                alert('Błąd: ' + response.error);
            }
        }
    };
    xhttp.open("POST", "buttons.php", true);
    xhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    const data = JSON.stringify({ action: action, id: id });
    xhttp.send(data);
}