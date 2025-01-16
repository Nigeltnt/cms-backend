$(document).ready(function() {
    // Smooth scroll for navigation
    $('a[href^="#"]').on('click', function(event) {
        event.preventDefault();
        $('html, body').animate({
            scrollTop: $($.attr(this, 'href')).offset().top - 80
        }, 500);
    });
    
    // Video modal
    $('.btn-video').on('click', function() {
        // Add your video modal implementation
    });
});