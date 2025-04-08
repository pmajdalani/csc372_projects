<?php
// validation.php - Validation functions for form inputs

// Validate text input length (e.g. name between 2 and 50 characters)
function isValidText($text, $minLength = 2, $maxLength = 50) {
    $len = strlen(trim($text));
    return $len >= $minLength && $len <= $maxLength;
}

// Validate number is numeric and in range (e.g. age between 10 and 100)
function isValidNumber($num, $min = 10, $max = 100) {
    return is_numeric($num) && $num >= $min && $num <= $max;
}

// Validate if selected style is in allowed list
function isValidStyle($style) {
    $validStyles = ['streetwear', 'casual', 'formal'];
    return in_array($style, $validStyles);
}
?>
