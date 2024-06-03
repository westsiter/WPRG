
let offset = 0;
let loading = false;

function loadProducts() {
    if (loading) return;
    loading = true;
    $.ajax({
        url: './php/productLoader.php',
        type: 'post',
        data: { offset: offset },
        success: function (response) {
            if (response.trim() !== "Brak kolejnych rekordów do wyświetlenia.") {
                $('#productContainer').append(response);
                offset += 1;
                loading = false;
            } else {
                $(window).off('scroll');
            }
        },
        error: function () {
            loading = false;
        }
    });
}

// Load the first set of products when the page loads
$(document).ready(function () {
    loadProducts();

    $(window).scroll(function () {
        if ($(window).scrollTop() + $(window).height() > $(document).height() - 100) {
            loadProducts();
        }
    });
});