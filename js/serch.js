document.querySelector('.search-form').addEventListener('submit', function(event) {
    event.preventDefault(); // منع إعادة تحميل الصفحة

    fetch('read_json.php')
    .then(response => response.json())
    .then(data => {
        const selectedProfession = document.getElementById('profession').value;
        const selectedLocation = document.getElementById('location').value.trim();

        const filteredProfessionals = data.filter(professional => {
            const matchesProfession = !selectedProfession || professional.profession === selectedProfession;
            const matchesLocation = !selectedLocation || professional.location.includes(selectedLocation);
            return matchesProfession && matchesLocation;
        });

        displayResults(filteredProfessionals);
    })
    .catch(error => console.error('حدث خطأ:', error));
});

function displayResults(results) {
    const resultsList = document.querySelector('.results-list');
    resultsList.innerHTML = '';

    results.forEach(professional => {
        const listItem = document.createElement('li');
        listItem.classList.add('result-item');

        listItem.innerHTML = `
            <h3>${professional.name} - ${professional.profession}</h3>
            <p>المنطقة: ${professional.location}</p>
            <p>تقييم: ${professional.rating}/5</p>
            <a href="#" class="more-info-btn">عرض المزيد</a>
        `;

        resultsList.appendChild(listItem);
    });
}
