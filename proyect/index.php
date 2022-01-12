<?php include_once 'header.php' ?>

<body>
    <section class="proyect">
        <h2>Mercedes-Benz Vision AVTR
            <hr>
        </h2>
        <div class="proyect_header">
            <!--<label for="recaudacion">Recaudación</label>
                <div title="70%"><progress max="100" value="70">70%</progress></div>-->
        </div>

        <div class="container">
            <div class="carousel">
                <button id="retroceder">Retroceder</button>
                <div id="imagen"></div>
                <button id="avanzar">Avanzar</button>
            </div>
            <div class="proyect-info">
                <h3> Info </h3>
                <div class="circle">
                    <div class="skill">
                        <div class="outer">
                            <div class="inner">
                                <div id="number">
                                    <script src="js/circle_bar.js"></script>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="160px" height="160px">
                                    <defs>
                                        <linearGradient id="GradientColor">
                                            <stop offset="0%" stop-color="#e91e63" />
                                            <stop offset="100%" stop-color="#673ab7" />
                                        </linearGradient>
                                    </defs>
                                    <circle cx="80" cy="80" r="70" stroke-linecap="round" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <p>Un año después de su debut en el CES de Las Vegas, el futurista Mercedes-Benz Vision AVTR Concept llega al Salón de Múnich para anticipar cómo ve la marca de la estrella en un futuro lejano la conexión entre vehículo y conductor: una
                    interacción avanzada y orgánica entre la máquina, el ser humano y la naturaleza.
                    <br><br> Inspirado en la saga cinematográfica 'Avatar' este prototipo eléctrico y autónomo que puede controlarse con el pensamiento es un ejercicio de diseño y tecnología futurista, que difiere de otros concept car más realistas
                    y cercanos como el Mercedes-Benz EQE, o el todoterreno eléctrico Mercedes-Benz EQG, también presentes en el IAA Mobility.
                </p>
            </div>
        </div>
        <div class="controles">
            <button id="play">Play</button>
            <button id="stop" disabled>Stop</button>
        </div>
    </section>
</body>

<?php include_once 'footer.php' ?>