<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $creditStanding = $_GET["credit_standing"];
    $age = $_GET["age"];
    $first_name = $_GET["first_name"];

    // Save the form data and perform filters
    saveFormData($creditStanding, $age, $first_name);
}

function saveFormData($creditStanding, $age, $first_name) {
    // Perform data validation and saving here
    // For now, let's just print the received data
    echo "Credit Standing: " . $creditStanding . "<br>";
    echo "Age: " . $age . "<br>";

    // Apply filters
    if ($creditStanding == "Poor") {
        header("Location: confirm-details.php");
        exit();
    } elseif ($creditStanding == "Terrible") {
        header("Location: sorry.php");
        exit();
    }

    if ($age < 18) {
        header("Location: sorry.php");
        exit();
    }

    // If none of the filters apply, proceed to the next step
    header("Location: thanks.php?first_name=$first_name&last_name=$last_name");
    exit();
}
?>