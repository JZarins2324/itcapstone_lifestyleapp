<?php
// Assuming $password is passed to this script from the main authentication script

function validatePassword($password) {
    $errors = [];

    // Check for empty password
    if (empty($password)) {
        $errors[] = "Password is empty";
    }

    // Check for minimum length
    if (strlen($password) <= 8) {
        $errors[] = "Password must be more than 8 characters";
    }

    // Check for number
    if (!preg_match('/\d/', $password)) {
        $errors[] = "Password must include a number";
    }

    // Check for uppercase
    if (!preg_match('/[A-Z]/', $password)) {
        $errors[] = "Password must include an uppercase letter";
    }

    // Check for special characters (optional)
    // if (!preg_match('/[!-_]/', $password)) {
    //     $errors[] = "Password may contain only the following special characters: ! - _";
    // }

    return $errors;
}

// Perform the password validation
$passwordErrors = validatePassword($password);

?>
