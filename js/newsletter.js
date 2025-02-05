document.addEventListener("DOMContentLoaded", function () {
    // Checks if popup should be displayed
    if (!localStorage.getItem("newsletterDismissed")) {
        showNewsletterPopup();
    }
});


function showNewsletterPopup() {
    // Creates a div element for the popup
    let popup = document.createElement("div");
    popup.id = "newsletter-popup";

    // Sets the inner HTML for the popup, this includes the form and the close button
    popup.innerHTML = `
        <div class="popup-content">
            <span class="close-btn" onclick="closePopup()">&times;</span>
            <h2>Sign up for the Bucket Boys Limited Newsletter</h2>
            <form id="newsletter-form">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <button type="submit">Subscribe</button>
            </form>
        </div>
    `;

    // Appends the popup to body of the page
    document.body.appendChild(popup)

    document.getElementById("newsletter-form").addEventListener("submit", function (event) {
        event.preventDefault();
        closePopup();

        //Redirects to homepage
        window.location.href = "index.html";
    });
}

function closePopup() {
    document.getElementById("newsletter-popup").remove();

    // Store a flag in localStorage indicating the popup was closed
    localStorage.setItem("newsletterDismissed", "true");
}