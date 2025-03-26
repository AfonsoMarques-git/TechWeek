<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/programacao.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Programação</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="pagina">
        <div class="container">
            <div class="calendar">
                <div class="sep-calendar">
                    <h1>Março</h1>
                    <ul class="week">
                        <li>
                            <span>Segunda-Feira</span>
                            <span class="event-day" data-event="Eventos do dia 24">24</span>
                        </li>
                        <li>
                            <span>Terça-Feira</span>
                            <span class="event-day" data-event="Eventos do dia 25">25</span>
                        </li>
                        <li>
                            <span>Quarta-Feira</span>
                            <span class="event-day" data-event="Eventos do dia 26">26</span>
                        </li>
                        <li>
                            <span>Quinta-Feira</span>
                            <span class="event-day" data-event="Eventos do dia 27">27</span>
                        </li>
                        <li>
                            <span>Sexta-Feira</span>
                            <span class="event-day" data-event="Eventos do dia 28">28</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="content">
                <div class="event-content">
                    <div class="event-details">Selecione um dia para ver os detalhes do evento</div>
                </div>
            </div>
        </div>

    </div>
    <?php include 'footer.php'; ?>
    <script>
        async function fetchEventDetails() {
            const response = await fetch('events.xml');
            const xmlText = await response.text();
            const parser = new DOMParser();
            const xmlDoc = parser.parseFromString(xmlText, 'application/xml');
            const events = {};

            xmlDoc.querySelectorAll('day').forEach(day => {
                const dayNumber = day.getAttribute('number');
                const dayEvents = Array.from(day.querySelectorAll('event')).map(event => {
                    const titulo = event.querySelector('titulo')?.textContent.trim() || ''; // Extract the 'titulo' field
                    const hora = event.querySelector('hora')?.textContent || '';
                    const descricao = event.querySelector('descricao')?.textContent.trim() || '';
                    const oradores = Array.from(event.querySelectorAll('oradores nome')).map(nome => nome.textContent).join(', ');
                    const fotos = Array.from(event.querySelectorAll('oradores foto')).map(foto => foto.textContent); // Extract all 'foto' fields
                    const empresa = event.querySelector('oradores empresa')?.textContent || '';
                    return { titulo, hora, descricao, oradores, empresa, fotos }; // Include 'fotos' in the event object
                });
                events[dayNumber] = dayEvents;
            });

            return events;
        }

        document.addEventListener('DOMContentLoaded', async () => {
            const eventDetails = await fetchEventDetails();

            document.querySelectorAll('.event-day').forEach(day => {
                day.addEventListener('click', function () {
                    const eventDetailsContainer = document.querySelector('.event-details');
                    const dayEvents = eventDetails[this.textContent] || [{ hora: '', descricao: 'Nenhum evento', oradores: '', empresa: '', fotos: [] }];
                    eventDetailsContainer.innerHTML = dayEvents.map(event => `
                        <div class="event-item">
                            <h2>${event.titulo}</h2>
                            <div class="details-oradores">
                                <div class="image">
                                    ${event.fotos.map(foto => foto ? `<img src="${foto}" alt="Foto do orador">` : '').join('')}
                                </div>
                                <div class="oradores" style="text-align: left; font-size: 1rem; line-height: 1.6;">
                                    <p>${event.descricao}</p>
                                    <p>${event.oradores}</p>
                                    ${event.empresa ? `<p>${event.empresa}</p>` : ''}
                                    <h3 style="margin-top: 10px; font-size: 1.2rem;">${event.hora}</h3>
                                </div>
                            </div>
                        </div>
                    `).join('');

                    document.querySelectorAll('.event-day').forEach(d => d.classList.remove('selected-day'));
                    this.classList.add('selected-day');
                });
            });
        });
    </script>
</body>

</html>