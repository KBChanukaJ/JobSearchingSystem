<?php
require_once("connection.php");

function validatePositionID($position_id) {
    return preg_match("/^PID\d{4}$/", $position_id);
}

function validateTitle($title) {
    return preg_match("/^[a-zA-Z0-9\s,\.!']{1,20}$/", $title);
}

function validateDescription($description) {
    return strlen($description) <= 250;
}

function validateClosingDate($closing_date) {
    return preg_match("/^\d{2}\/\d{2}\/\d{2}$/", $closing_date);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $position_id = mysqli_real_escape_string($conn, $_POST["position_id"]);
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);
    $closing_date = mysqli_real_escape_string($conn, $_POST["closing_date"]);
    $position = mysqli_real_escape_string($conn, $_POST["position"]);
    $contract = mysqli_real_escape_string($conn, $_POST["contract"]);
    $accept_post = isset($_POST["accept_post"]) ? mysqli_real_escape_string($conn, $_POST["accept_post"]) : "";
    $accept_email = isset($_POST["accept_email"]) ? mysqli_real_escape_string($conn, $_POST["accept_email"]) : "";
    $location = mysqli_real_escape_string($conn, $_POST["location"]);

    $errors = [];

    if (!validatePositionID($position_id)) {
        $errors[] = "Invalid Position ID format. It should be in the format PID0001.";
    }

    if (!validateTitle($title)) {
        $errors[] = "Invalid title format. It can contain up to 20 alphanumeric characters, spaces, comma, period, and exclamation point.";
    }

    if (!validateDescription($description)) {
        $errors[] = "Description should not exceed 250 characters.";
    }

    if (!validateClosingDate($closing_date)) {
        $errors[] = "Invalid closing date format. It should be in the format dd/mm/yy.";
    }

    // Check for Position ID uniqueness
    $check_query = "SELECT COUNT(*) FROM jobsdetails WHERE position_id = ?";
    $stmt_check = $conn->prepare($check_query);
    $stmt_check->bind_param("s", $position_id);
    $stmt_check->execute();
    $stmt_check->bind_result($count);
    $stmt_check->fetch();
    $stmt_check->close();

    if ($count > 0) {
        $errors[] = "Position ID '$position_id' already exists. Please choose a different one.";
    }

    if (!empty($errors)) {
        echo '<div class="alert alert-danger">Validation Errors:<br>';
        foreach ($errors as $error) {
            echo "$error<br>";
        }
        echo '<a href="postjobform.php">Go back</a></div>';
    } else {
        $sql = "INSERT INTO jobsdetails (position_id, title, description, closing_date, position, contract, accept_post, accept_email, location) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssss", $position_id, $title, $description, $closing_date, $position, $contract, $accept_post, $accept_email, $location);

        if ($stmt->execute()) {
            $file = fopen("jobposts/jobs.txt", "a");

            if ($file) {
                $data = "$position_id\n$title\n$description\n$closing_date\n$position\n$contract\n$accept_post$accept_email\n$location\n\n----------------------------------------------------------------------------\n";
                fwrite($file, $data);
                fclose($file);

                echo "<div class='alert alert-success'>Job vacancy posted successfully. <a href='index.php'>Return to Home Page</a></div>";
            } else {
                echo '<div class="alert alert-danger">Error: Could not open the jobs.txt file for writing.</div>';
            }
        } else {
            echo '<div class="alert alert-danger">Error: ' . $stmt->error . '</div>';
        }

        $stmt->close();
        $conn->close();
    }
} else {
    echo '<div class="alert alert-danger">Invalid request.</div>';
}
?>
