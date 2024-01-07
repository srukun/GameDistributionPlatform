<?php
session_start();

// Function to update windowStart and windowEnd session variables
function updateWindow($start, $end) {
    $_SESSION['windowStart'] = $start;
    $_SESSION['windowEnd'] = $end;
}

// Check if the AJAX request is received
if (isset($_POST['windowStart']) && isset($_POST['windowEnd'])) {
    $start = $_POST['windowStart'];
    $end = $_POST['windowEnd'];
    updateWindow($start, $end);
}
?>
