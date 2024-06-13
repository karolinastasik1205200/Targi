document.addEventListener('DOMContentLoaded', function() {
    var id_wydarzenia = window.location.search.split('=')[1];
    
    document.getElementById('id_wydarzenia').value = id_wydarzenia;
    
    
    document.getElementById('myForm').addEventListener('submit', function(event) {
        event.preventDefault(); 
        console.log(document.getElementById('selected-area'))
        if(document.getElementById('selected-area').value === "reserved") {
            alert("Wybierz niezarezerwowane miejsce.");
            return; }
        var formData = new FormData(this);
        
        fetch('submit_form.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            console.log(data); 
            
        })
        .catch(error => {
            alert('Błąd:' + error);
        });

        alert("Rezerwacja została wysłana.");
    }
    );
});