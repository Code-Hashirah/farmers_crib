<?php
require_once "database.php";

// Get the POST data
$labourer_id = intval($_POST['labourer_id']);
$rating = intval($_POST['rating']);

// Validate input
if ($labourer_id > 0 && $rating >= 1 && $rating <= 5) {
    $db = (new Database())->getConnection();

    // Insert the rating into the database
    $stmt = $db->prepare("INSERT INTO farmer_ratings (farmer_id, rating) VALUES (?, ?)");
    $stmt->bind_param("ii", $labourer_id, $rating);
    $stmt->execute();
    $stmt->close();

    // Calculate the new average rating
    $stmt = $db->prepare("SELECT AVG(rating) as average_rating FROM farmer_ratings WHERE farmer_id = ?");
    $stmt->bind_param("i", $labourer_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $new_average = round($row['average_rating'], 1);

    // Return the new average rating as JSON
    echo json_encode(['success' => true, 'new_average' => $new_average]);
} else {
    // Return an error if the input is invalid
    echo json_encode(['success' => false]);
}
?>
