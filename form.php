<?php
// form.php - HTML Form for Bucket Boys
?>

<form action="index.php" method="post">
    <!-- Text input: Name -->
    <label for="name">Your Name:</label>
    <input type="text" id="name" name="name" required>

    <!-- Number input: Age -->
    <label for="age">Your Age:</label>
    <input type="number" id="age" name="age" min="10" max="100" required>

    <!-- Options input: Favorite Clothing Style -->
    <label for="style">Favorite Clothing Style:</label>
    <select id="style" name="style" required>
        <option value="">-- Choose a Style --</option>
        <option value="streetwear">Streetwear</option>
        <option value="casual">Casual</option>
        <option value="formal">Formal</option>
    </select>

    <input type="submit" value="Submit">
</form>
