<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload to Gallery</title>
</head>
<body>
    <h2>Upload New Image/Video</h2>
    <form action="upload_process.php" method="POST" enctype="multipart/form-data">
        <label>Title:</label><br>
        <input type="text" name="title" required><br><br>

        <label>Select File:</label><br>
        <input type="file" name="file" accept="image/*,video/*" required><br><br>

        <button type="submit">Upload</button>
    </form>
</body>
</html>
