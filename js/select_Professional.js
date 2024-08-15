document.addEventListener("DOMContentLoaded", function() {
    fetch('../php/select_Professional.php') // ضع هنا مسار ملف PHP الذي تم إنشاؤه
        .then(response => response.json())
        .then(data => {
            // تحديث تفاصيل الحرفي
            document.querySelector('.profile-info h1').textContent = data.name;
            document.querySelector('.profile-img').src = data.photo;
            document.querySelector('.profile-info span').textContent = data.location;
            document.querySelector('.profile-info p span:last-child').textContent = data.average_rating + '/5';

            // عرض الخدمات المقدمة
            const servicesList = document.getElementById('services-list');
            data.services.forEach(service => {
                let li = document.createElement('li');
                li.textContent = service;
                servicesList.appendChild(li);
            });

            // عرض قائمة الأشخاص الذين طلبوا الحجز
            const bookingsSection = document.querySelector('.bookings-section ul');
            data.bookings.forEach(booking => {
                let li = document.createElement('li');
                li.textContent = `${booking.name} - تاريخ الحجز: ${booking.date} - رقم الهاتف: ${booking.phone}`;
                bookingsSection.appendChild(li);
            });

            // عرض آراء وتقييمات العملاء
            const reviewsSection = document.querySelector('.reviews-section');
            data.reviews.forEach(review => {
                let div = document.createElement('div');
                div.className = 'review';
                div.innerHTML = `<p><strong>${review.name}:</strong> "${review.comment}"</p><span class="rating">${'★'.repeat(review.rating)}${'☆'.repeat(5 - review.rating)}</span>`;
                reviewsSection.appendChild(div);
            });
        });
});
