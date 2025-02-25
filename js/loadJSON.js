document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("load-json-btn").addEventListener("click", loadJSONData);
});

function loadJSONData() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var jsonData = JSON.parse(xhr.responseText);
            var styleDesc = jsonData.style.description;
            var products = jsonData.products;
            
            var contentSection = document.getElementById("json-content");
            contentSection.innerHTML = "";

            var styleParagraph = document.createElement("p");
            styleParagraph.textContent = styleDesc;
            contentSection.appendChild(styleParagraph);

            var productsContainer = document.createElement("div");
            productsContainer.classList.add("row");

            for (var i = 0; i < products.length; i++) {
                var name = products[i].name;
                var desc = products[i].description;
                var img = products[i].image;

                var productCard = document.createElement("div");
                productCard.classList.add("col-md-4");
                productCard.innerHTML = `
                    <div class='card'>
                        <img src='${img}' class='card-img-top' alt='${name}'>
                        <div class='card-body'>
                            <h5 class='card-title'>${name}</h5>
                            <p class='card-text'>${desc}</p>
                        </div>
                    </div>`;

                productsContainer.appendChild(productCard);
            }
            
            contentSection.appendChild(productsContainer);
        }
    };
    xhr.open("GET", "bucketboys.json", true);
    xhr.send();
}