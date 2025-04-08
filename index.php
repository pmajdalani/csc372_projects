<?php
session_start();

include __DIR__ . '/validation.php';

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}


$formData = [
    'name' => '',
    'age' => '',
    'style' => ''
];

$errors = [
    'name' => '',
    'age' => '',
    'style' => ''
];

$message = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize input
    $formData['name'] = $_POST['name'] ?? '';
    $formData['age'] = $_POST['age'] ?? '';
    $formData['style'] = $_POST['style'] ?? '';

    // Validate name
    if (!isValidText($formData['name'])) {
        $errors['name'] = "Name must be between 2 and 50 characters.";
    }

    // Validate age
    if (!isValidNumber($formData['age'], 10, 100)) {
        $errors['age'] = "Age must be a number between 10 and 100.";
    }

    // Validate style
    if (!isValidStyle($formData['style'])) {
        $errors['style'] = "Please select a valid clothing style.";
    }

    // Check if any errors exist
    $allErrors = implode('', $errors);
    if (empty($allErrors)) {
        $message = "Thank you! Your form has been submitted successfully.";
    } else {
        $message = "Please correct the errors in the form.";
    }
}


// Set cookie if data is valid
if (empty($allErrors)) {
    // Set cookie to remember name for 7 days
    setcookie('visitor_name', $formData['name'], time() + (86400 * 7)); // 86400 = 1 day
    $_SESSION['fav_style'] = $formData['style'];

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bucket Boys Limited</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
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
        <h2>Welcome to Bucket Boys Limited</h2>
        <p class="lead">A streetwear brand blending bold, stylish designs.</p>
    </div>

    <p><a href="index.php?logout=1">Clear Session</a></p>


    <h1>Get in Touch With Bucket Boys</h1>
    <p>Fill out this form to stay up to date with our drops and style tips!</p>

    <?php include 'form.php'; ?>

    <footer class="bg-warning text-dark text-center py-3 mt-5">
        <p>Developer: Peter Majdalani</p>
        <p>Contact: <a href="mailto:pmajdalani@uri.edu" class="text-dark fw-bold">pmajdalani@uri.edu</a></p>
        <a href="cart.php" class="btn btn-dark">View Cart</a>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/loadContent.js"></script>
</body>
<?php if (isset($_COOKIE['visitor_name'])): ?>
    <p>👋 Welcome back, <?= htmlspecialchars($_COOKIE['visitor_name']) ?>!</p>
<?php endif; ?>

<?php if (isset($_SESSION['fav_style'])): ?>
    <p>Your favorite style is: <?= htmlspecialchars($_SESSION['fav_style']) ?></p>
<?php endif; ?>

</html>
