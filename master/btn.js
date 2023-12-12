function toggleOrders() {
    var ordersContainer = document.getElementById('orders-container');
    ordersContainer.style.display = (ordersContainer.style.display === 'none' || ordersContainer.style.display === '') ? 'block' : 'none';

}
function submitRating() {
var ratingSelect = document.getElementById('rating-select');
var ratingValue = ratingSelect.value;

// Використовуйте AJAX для відправлення оцінки на сервер
var xhr = new XMLHttpRequest();
xhr.open('POST', 'save_rating.php', true);
xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
        // Оновіть відображення оцінки на сторінці
        var ratingContainer = document.querySelector('.rating-container p');
        ratingContainer.innerHTML = '<strong>Оцінка:</strong> ' + xhr.responseText;
    }
};
xhr.send('rating=' + ratingValue);
}