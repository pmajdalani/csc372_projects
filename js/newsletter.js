$(document).ready(function () {
    // Checks if popup should be displayed
    if (!localStorage.getItem("newsletterDismissed")) {
        showNewsletterPopup();
    }
});

function showNewsletterPopup() {
    // Creates a div element for the popup
    let $popup = $('<div id="newsletter-popup"></div>');

    // Sets the inner HTML for the popup, including the form and the close button
    $popup.html(`
        <div class="popup-content">
            <span class="close-btn">&times;</span>
            <h2>Sign up for the Bucket Boys Limited Newsletter</h2>
            <form id="newsletter-form">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <button type="submit">Subscribe</button>
            </form>
        </div>
    `);

    // Appends the popup to the body of the page
    $('body').append($popup);

    // Cache jQuery selections for efficiency
    let $popupForm = $('#newsletter-form');
    let $closeBtn = $('.close-btn');

    // Attach event listener to form submit
    $popupForm.on('submit', function (event) {
        event.preventDefault();
        closePopup();

        // Redirects to homepage
        window.location.href = "index.html";
    });

    // Attach event listener to close button
    $closeBtn.on('click', closePopup);
}

function closePopup() {
    $('#newsletter-popup').remove();

    // Store a flag in localStorage indicating the popup was closed
    localStorage.setItem("newsletterDismissed", "true");
}
