<?php
include ('connection.php');

$sql = "SELECT reviewer_name, review_text, rating FROM reviews";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div class="review">';
        echo '<h3>' . htmlspecialchars($row["reviewer_name"]) . '</h3>';
        echo '<p>' . htmlspecialchars($row["review_text"]) . '</p>';
        echo '</div>';
    }
} else {
    echo "0 results";
}

$conn->close();
?>
