<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stickers - Bucket Boys Limited</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/stickers.css" rel="stylesheet">
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
        <h1>Stickers</h1>
        <div class="row g-4">
            <?php
            // List of products with associated values
            $products = [
                ["name" => "Sticker 1", "image" => "images/bucketBoysSticker1.png", "description" => "High-quality vinyl sticker with the Bucket Boys branding.", "price" => 5.00],
                ["name" => "Sticker 2", "image" => "images/bucketBoysSticker2.png", "description" => "Durable and waterproof sticker for your gear.", "price" => 5.00],
                ["name" => "Sticker 3", "image" => "images/bucketBoysLogo.png", "description" => "Classic Bucket Boys logo sticker for any surface.", "price" => 4.50],
                ["name" => "Sticker 4", "image" => "images/bucketBoysLogo2.png", "description" => "Stylish sticker featuring the iconic Bucket Boys design.", "price" => 6.00]
            ];
            // Loop through an array of products and display them dynamically.
            foreach ($products as $product) {
                echo "<div class='col-md-6'>
                        <img src='{$product['image']}' class='img-fluid rounded' alt='{$product['name']}'>
                        <h2>{$product['name']}</h2>
                        <p>{$product['description']}</p>
                        <p><strong>Price: \${$product['price']}</strong></p>
                        <button class='btn btn-primary' onclick=\"addToCart('{$product['name']}', {$product['price']})\">Buy Now</button>
                      </div>";
            }
            ?>
        </div>
    </div>

    <footer class="bg-warning text-dark text-center py-3 mt-5">
        <p>Developer: Peter Majdalani</p>
        <p>Contact: <a href="mailto:pmajdalani@uri.edu" class="text-dark fw-bold">pmajdalani@uri.edu</a></p>
        <a href="cart.php" class="btn btn-dark">View Cart</a>
    </footer>

    <script>
        function addToCart(name, price) {
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            cart.push({ name, price });
            localStorage.setItem("cart", JSON.stringify(cart));
            alert(name + " added to cart!");
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
