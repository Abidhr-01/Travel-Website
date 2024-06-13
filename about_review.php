<?php
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reviewer_name = $_POST['reviewer_name'];
    $review_text = $_POST['review_text'];

    $stmt = $conn->prepare("INSERT INTO reviews (reviewer_name, review_text) VALUES (?, ?)");
    $stmt->bind_param("ss", $reviewer_name, $review_text);

    $sql = "SELECT reviewer_name, review_text FROM reviews";
    $result = $conn->query($sql);
    $reviews = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $reviews[] = $row;
        }
    }

    if ($stmt->execute()) {
        header('location: about.html');
    } else {
        echo "Error: " . $stmt->error;
    }
    $conn->close();
    $stmt->close();
}
?>