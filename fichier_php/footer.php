<footer class="footer">
    <p><b>Contactez-nous :</b> email@medicare.com | +33 1 23 45 67 89 | 10 Rue Sextius Michel, 75015 Paris</p>
    <div id="map" class="google-map"></div>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        var map = L.map('map').setView([48.85117091598405, 2.2885323073959074], 16);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        L.marker([48.85117091598405, 2.2885323073959074]).addTo(map)
            .bindPopup('10 Rue Sextius Michel, 75015 Paris')
            .openPopup();
    </script>
</footer>