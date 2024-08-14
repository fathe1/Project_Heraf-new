document.getElementById('upload-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    let formData = new FormData(this);
    
    fetch('upload_image.php', {
        method: 'POST',
        body: formData
    }).then(response => response.text())
    .then(result => {
        console.log(result);
        alert(result);
    }).catch(error => {
        console.error('Error:', error);
    });
});

// استدعاء البيانات بناءً على ID الحرفي
function loadProfessionalProfile(professionalId) {
    fetch(`get_professional_data.php?id=${professionalId}`)
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                console.error(data.error);
                alert(data.error);
            } else {
                document.getElementById('professional-name').innerText = data.name;
                document.getElementById('professional-profession').innerText = data.profession;
                document.getElementById('professional-location').innerText = data.location;
                document.getElementById('professional-rating').innerText = data.rating;

                // الخدمات المقدمة
                document.getElementById('professional-services').innerHTML = data.services.split(',').map(service => `<li>${service}</li>`).join('');

                // قائمة الأشخاص الذين طلبوا الحجز
                document.getElementById('professional-bookings').innerHTML = data.bookings.split(',').map(booking => `<li>${booking}</li>`).join('');

                // آراء وتقييمات العملاء
                document.getElementById('professional-reviews').innerHTML = data.reviews.split(',').map(review => `<li>${review}</li>`).join('');

                // صورة الحرفي
                document.getElementById('professional-image').src = data.image;
            }
        })
        .catch(error => console.error('Error:', error));
}

