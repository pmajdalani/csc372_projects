document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("load-xml-btn").addEventListener("click", loadXMLData);
});

function loadXMLData() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var xmlDoc = xhr.responseXML;
            var styleDesc = xmlDoc.getElementsByTagName("description")[0].textContent;
            var products = xmlDoc.getElementsByTagName("product");
            
            var contentSection = document.getElementById("xml-content");
            contentSection.innerHTML = "";

            var styleParagraph = document.createElement("p");
            styleParagraph.textContent = styleDesc;
            contentSection.appendChild(styleParagraph);

            var productsContainer = document.createElement("div");
            productsContainer.classList.add("row");

            for (var i = 0; i < products.length; i++) {
                var name = products[i].getElementsByTagName("name")[0].textContent;
                var desc = products[i].getElementsByTagName("description")[0].textContent;
                var img = products[i].getElementsByTagName("image")[0].textContent;

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
    xhr.open("GET", "bucketboys.xml", true);
    xhr.send();
}
