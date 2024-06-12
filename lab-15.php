<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload Form</title>
</head>
<body>
    <h2>Upload a File</h2>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == 0) {
            $targetDir = "uploads/";
            $fileName = basename($_FILES["fileToUpload"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

            // Create the uploads directory if it doesn't exist
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0755, true);
            }
            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFilePath);
        } else {
            echo "Error: " . $_FILES["fileToUpload"]["error"];
        }
    }
    ?>
    <form action="lab.php" method="post" enctype="multipart/form-data">
        <label for="fileToUpload">Select file to upload:</label>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload File" name="submit">
    </form>
</body>
</html>