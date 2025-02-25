document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("load-content-btn").addEventListener("click", function () {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                document.getElementById("content-section").innerHTML = xhr.responseText;
            }
        };
        xhr.open("GET", "content.html", true);
        xhr.send();
    });
});
