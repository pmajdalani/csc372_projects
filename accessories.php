<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accessories - Bucket Boys Limited</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/accessories.css" rel="stylesheet">
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
        <h1>Accessories</h1> 
        <div class="row g-4">
            <?php
            // List of products with associated values
            $products = [
                ["name" => "Cap", "image" => "images/bucketBoysCap.png", "description" => "A classic premium-made Bucket Boys cap to keep the sun out of your eyes.", "price" => 20.00],
                ["name" => "Beanie", "image" => "images/bucketBoysBeanie.png", "description" => "A beanie that shows off the true style of Bucket Boys Limited.", "price" => 18.00],
                ["name" => "Water Bottle", "image" => "images/bucketboysWaterBottle.png", "description" => "Stylish water bottle so that you can stay hydrated while repping the Bucket Boys Style.", "price" => 15.00],
                ["name" => "Tote Bag", "image" => "images/bucketBoysToteBag.png", "description" => "Durable, premium-quality tote bag that shows off the Bucket Boys Style.", "price" => 22.00]
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
    
    <!-- // Script that adds item to cart -->
    <script>
        function addToCart(name, price) {
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            cart.push({ name, price });
            localStorage.setItem("cart", JSON.stringify(cart));
            alert(name + " added to cart!");
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/loadJSON.js"></script>
</body>
</html>
