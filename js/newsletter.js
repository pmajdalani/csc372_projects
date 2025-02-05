document.addEventListener("DOMContentLoaded", function () {
    if (!localStorage.getItem("newsletterDismissed")) {
        showNewsletterPopup();
    }
});


function showNewsletterPopup() {
    let popup = document.createElement("div");
    popup.id = "newsletter-popup";
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
    document.body.appendChild(popup)

    document.getElementById("newsletter-form").addEventListener("submit", function (event) {
        event.preventDefault();
        closePopup();
        window.location.href = "index.html";
    });
}

function closePopup() {
    document.getElementById("newsletter-popup").remove();
    localStorage.setItem("newsletterDismissed", "true");
}