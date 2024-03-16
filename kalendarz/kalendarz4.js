function generateCalendar(year, month) {
    const calendarContainer = document.getElementById('calendar');
    //pobieramy element HTML o nazwie kalendarz
    //przypisujemy go do zmiennej calendarContainer

    const daysOfWeek = ['Poniedziałek', 'Wtorek', 'Środa', 'Czwartek', 'Piątek', 'Sobota', 'Niedziela'];
    //tworzymy tablicę dni tygodnia, zawierającą dni tygodnia
    const monthsOfYear = ['Styczeń', 'Luty', 'Marzec', 'Kwiecień', 'Maj', 'Czerwiec', 'Lipiec', 'Sierpień', 'Wrzesień', 'Październik', 'Listopad', 'Grudzień'];
    //tworzymy tablicę zawierającą miesiące
    const daysInMonth = new Date(year, month + 1, 0).getDate();
// year to rok,
// month + 1 to następny miesiąc (wartość month zostaje zwiększona o 1, ponieważ miesiące w obiekcie daty są indeksowane od zera, więc jeśli chcemy uzyskać następny miesiąc, musimy dodać 1),
// 0 to dzień miesiąca. W ten sposób uzyskujemy ostatni dzień bieżącego miesiąca.
// .getDate() - Pobiera dzień miesiąca z obiektu daty. Działa tak, że jeśli przekażemy dzień 0, to otrzymamy ostatni dzień poprzedniego miesiąca. Ponieważ month + 1 wskazuje na następny miesiąc, a dzień ustawiony na 0, otrzymujemy ostatni dzień bieżącego miesiąca, co jest równoważne liczbie dni w tym miesiącu.

// Na przykład, jeśli year to 2024, a month to 2 (marzec), linia kodu ta obliczy, ile dni ma marzec 2024 roku.
let firstDayOfMonth = new Date(year=year, month=month, day=0).getDay();
//Ten kod sprawdza, czy firstDayOfMonth wynosi 0 (co oznacza niedzielę), a jeśli tak, to zmienia go na 7, co jest zgodne z konwencją tygodnia, w której 7 oznacza niedzielę. Dzięki temu poprawnie określisz, który dzień tygodnia jest pierwszym dniem miesiąca, a kalendarz będzie pokazywał poprawne dni tygodnia dla danego miesiąca.
    const calendarTable = document.createElement('table');
    calendarTable.classList.add('calendar-table');
    //tworzymy element HTML za pomocą createElement
    //Dodajemy klasę CSS calendar-table do tabeli za pomocą metody classList.add(), aby mogli ją odpowiednio stylizować.
    const headerRow = document.createElement('tr');
    //tworzymy wiersz w nagłówku tabeli (tr)
    daysOfWeek.forEach(day => {
        const cell = document.createElement('th');
        cell.textContent = day;
        headerRow.appendChild(cell);
    }
    );
    //W nawiasach po forEach znajduje się nazwa zmiennej, która będzie przechowywać aktualny element tablicy podczas iteracji. 
    //tworzymy komórkę th dla każdego dnia tygodnia
    //Iterujemy przez tablicę daysOfWeek, a dla każdego dnia tworzymy nową komórkę nagłówka, ustawiamy jej tekst na nazwę dnia tygodnia i dodajemy ją do wiersza nagłówka.
    //informujemy, że ta komórka jest częścią stworzonego nagłówka headerRow
    calendarTable.appendChild(headerRow);
    //dodajemy wiersz nagłówka do tabeli kalendarza
    let currentDay = 1;
    for (let i = 0; i<6; i++) {
        const weekRow = document.createElement('tr'); //tworzymy nowy rząd
        for (let j = 0; j<7; j++) {
            console.log(currentDay);
            const cell = document.createElement ('td'); //tworzymy nową komórkę w tym rzędzie, 7, ponieważ jest 7 dni tygodnia
            if (i===0 && j<firstDayOfMonth) {
                cell.textContent = '';
                // puste komórki przed początkiem miesiąca
            }

            else if (currentDay<=daysInMonth) {
                cell.textContent = currentDay;
                cell.classList.add('day');
                cell.setAttribute('data-day', currentDay);
                cell.setAttribute('data-month', month);
                cell.setAttribute('data-year', year);
                currentDay++;
            }
            weekRow.appendChild(cell); //dodawanie komórki do aktualnego wiersza
        }
        calendarTable.appendChild(weekRow); //dodwanie wiersza do tablicy
        if (currentDay> daysInMonth) break; 
        //prawdza, czy wszystkie dni miesiąca zostały już umieszczone w kalendarzu.
    }
    calendarContainer.innerHTML=''; //usuwamy poprzednią zawartość
    calendarContainer.appendChild(calendarTable);
    //informujemy, że tablica należy do contenera
    const currentMonthName = monthsOfYear[month];
    document.getElementById('current-month-name').textContent = currentMonthName;
    //?
    updateNavigationButtons(year, month);
}

function updateNavigationButtons(year, month) {
    const prevMonthBtn = document.getElementById('prev-month-btn'); //pobranie z HTML-a przycisków
    const nextMonthBtn = document.getElementById('next-month-btn'); //pobranie z HTML-a przycisków

    prevMonthBtn.disabled = false;
    nextMonthBtn.disabled = false;
    //domyślnie przyciski są wyłączone

    if (month === 0) {
        // Jeśli aktualny miesiąc to styczeń, wyłącz przycisk poprzedniego miesiąca
        prevMonthBtn.disabled = true;
    }
    if (month === 11) {
        // Jeśli aktualny miesiąc to grudzień, wyłącz przycisk następnego miesiąca
        nextMonthBtn.disabled = true;
    }
}

window.onload = function() {
    //funkcja uruchomiana automatycznie po załadowaniu strony
    const currentDate = new Date();
    let currentYear = currentDate.getFullYear();
    let currentMonth = currentDate.getMonth();
    generateCalendar(currentYear, currentMonth);

    const prevMonthBtn = document.getElementById('prev-month-btn');
    const nextMonthBtn = document.getElementById('next-month-btn');

    prevMonthBtn.addEventListener('click', function() {
        currentMonth--;
        if (currentMonth < 0) {
            currentMonth = 11;
            currentYear--;
        }
        generateCalendar(currentYear, currentMonth);
    });

    nextMonthBtn.addEventListener('click', function() {
        currentMonth++;
        if (currentMonth > 11) {
            currentMonth = 0;
            currentYear++;
        }
        generateCalendar(currentYear, currentMonth);
    });
}