<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - Bucket Boys Limited</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/cart.css" rel="stylesheet">
</head>
<body>
    <div class="container text-center my-4">
        <img src="images/bucketBoysLogo2.png" alt="Bucket Boys Logo" class="img-fluid" width="200">
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark bg-warning">
        <div class="container">
            <a class="navbar-brand" href="index.php">Bucket Boys</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="clothing.php">Clothing</a></li>
                    <li class="nav-item"><a class="nav-link" href="accessories.php">Accessories</a></li>
                    <li class="nav-item"><a class="nav-link" href="stickers.php">Stickers</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container text-center my-5">
        <h2>Your Shopping Cart</h2>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody id="cart-items"></tbody>
        </table>
        <h3>Total: $<span id="total-price">0.00</span></h3>

        <button class="btn btn-danger" onclick="clearCart()">Clear Cart</button>
        <a href="checkout.php" class="btn btn-success">Proceed to Checkout</a>
    </div>

    <footer class="bg-warning text-dark text-center py-3 mt-5">
        <p>Developer: Peter Majdalani</p>
        <p>Contact: <a href="mailto:pmajdalani@uri.edu" class="text-dark fw-bold">pmajdalani@uri.edu</a></p>
    </footer>

    <script>
        function loadCart() {
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            let cartTable = document.getElementById("cart-items");
            let totalPrice = 0;

            cartTable.innerHTML = ""; // Clear existing rows
            cart.forEach(item => {
                let row = `<tr>
                    <td>${item.name}</td>
                    <td>$${item.price.toFixed(2)}</td>
                </tr>`;
                cartTable.innerHTML += row;
                totalPrice += item.price;
            });

            document.getElementById("total-price").innerText = totalPrice.toFixed(2);
        }

        function clearCart() {
            localStorage.removeItem("cart");
            loadCart();
        }

        window.onload = loadCart;
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
