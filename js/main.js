//prueba 2
//Mapa
const map = L.map('mapa').setView([20.6736, -103.344], 20);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

L.marker([20.6736, -103.344]).addTo(map)
    .bindPopup('Ubicacion de WebCamp!')
    .openPopup();