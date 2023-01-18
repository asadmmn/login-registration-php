<?php
if (isset($_GET["id"]) && !empty($_GET["id"])) {

    require_once "conn.php";
    $sql = "DELETE FROM users WHERE id = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $_GET["id"]);
        if ($stmt->execute()) {
            header("location: home.php");
            exit();
        } else {
            echo "Error! Please try again later.";
        }
    }
    $stmt->close();
    $conn->close();
} else {
    echo "Error! Please try again later.";
}
?>