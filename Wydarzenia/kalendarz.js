async function fetchEvents(year, month) {
    try {
        const response = await fetch('script.php');
        

        if (!response.ok) {
            throw new Error('Błąd pobierania danych');
        }
        const events = await response.json();
        return events;
    } catch (error) {
        console.error('Wystąpił błąd podczas pobierania danych:', error);
        return [];
    }
}

async function generateCalendar(year, month) {
    const calendarContainer = document.getElementById('calendar');
    const daysOfWeek = ['Poniedziałek', 'Wtorek', 'Środa', 'Czwartek', 'Piątek', 'Sobota', 'Niedziela'];
    const monthsOfYear = ['Styczeń', 'Luty', 'Marzec', 'Kwiecień', 'Maj', 'Czerwiec', 'Lipiec', 'Sierpień', 'Wrzesień', 'Październik', 'Listopad', 'Grudzień'];
    const daysInMonth = new Date(year, month + 1, 0).getDate();
    let firstDayOfMonth = new Date(year, month, 1).getDay();
    const calendarTable = document.createElement('table');
    calendarTable.classList.add('calendar-table');
    const headerRow = document.createElement('tr');
    daysOfWeek.forEach(day => {
        const cell = document.createElement('th');
        cell.textContent = day;
        headerRow.appendChild(cell);
    });
    calendarTable.appendChild(headerRow);
    let currentDay = 1;

    const events = await fetchEvents(year, month);

    for (let i = 0; i < 6; i++) {
        const weekRow = document.createElement('tr');
        for (let j = 0; j < 7; j++) {
            const cell = document.createElement('td');
            if (i === 0 && j < firstDayOfMonth) {
                cell.textContent = '';
            } else if (currentDay <= daysInMonth) {
                cell.textContent = currentDay;
                cell.classList.add('day');
                cell.setAttribute('data-day', currentDay);
                cell.setAttribute('data-month', month);
                cell.setAttribute('data-year', year);

                const eventsForDay = events.filter(event => {
                    const eventData = event.Data.split("-");
                    const eventDay = parseInt(eventData[2]);
                    const eventMonth = parseInt(eventData[1]);

        
                    if (eventDay === currentDay && eventMonth === month + 1) {
                            return true;
                        } else return false;
                });

                if (eventsForDay.length > 0) {
                    const eventList = document.createElement('ul');
                    eventsForDay.forEach(event => {
                        const eventItem = document.createElement('li');
                        const eventLink = document.createElement('a');
                        eventLink.href = "podstrona_wydarzenia.html?id=" + event.id;
                        eventLink.innerHTML = event.Nazwa;
                        eventItem.appendChild(eventLink);
                        eventList.appendChild(eventItem);
                    });
                    cell.appendChild(eventList);
                }

                currentDay++;
            }
            weekRow.appendChild(cell);
        }
        calendarTable.appendChild(weekRow);
        if (currentDay > daysInMonth) break;
    }
    calendarContainer.innerHTML = '';
    calendarContainer.appendChild(calendarTable);
    const currentMonthName = monthsOfYear[month];
    document.getElementById('current-month-name').textContent = currentMonthName;
    updateNavigationButtons(year, month);
}

function updateNavigationButtons(year, month) {
    const prevMonthBtn = document.getElementById('prev-month-btn');
    const nextMonthBtn = document.getElementById('next-month-btn');

    prevMonthBtn.disabled = false;
    nextMonthBtn.disabled = false;

    if (month === 0) {
        prevMonthBtn.disabled = true;
    }
    if (month === 11) {
        nextMonthBtn.disabled = true;
    }
}

window.onload = function() {
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