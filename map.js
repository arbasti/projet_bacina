var map = L.map('map').setView([48.85117091598405, 2.2885323073959074], 15); // Coordinates for 10 Rue Sextius Michel, 75015 Paris

	L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
	}).addTo(map);

	L.marker([48.85117091598405, 2.2885323073959074]).addTo(map)
		.bindPopup('10 Rue Sextius Michel, 75015 Paris')
		.openPopup();