<?php
$host = "localhost";
$user = "root";      // change to your DB username
$pass = "";          // change to your DB password
$db   = "abok"; // change to your DB name

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$title = $_POST['title'];
$file = $_FILES['file'];

// Folder to store uploads
$uploadDir = "uploads/";
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

$fileName = basename($file["name"]);
$targetFile = $uploadDir . time() . "_" . $fileName;

// Detect file type
$fileType = (strpos($file["type"], "video") !== false) ? "video" : "image";

if (move_uploaded_file($file["tmp_name"], $targetFile)) {
    $stmt = $conn->prepare("INSERT INTO gallery (title, file_path, file_type) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $targetFile, $fileType);

    if ($stmt->execute()) {
        echo "File uploaded successfully! <a href='gallery.php'>View Gallery</a>";
    } else {
        echo "Database error: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Error uploading file.";
}

$conn->close();
?>
