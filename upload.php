<?php
$targetDirectory = "files/"; // Destination directory for uploaded files
$targetFile = $targetDirectory . basename($_FILES["fileToUpload"]["name"]); // Full path to the uploaded file

// Check if the file was uploaded without errors
if (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] === 0) {
    // Check file type (you can add more file type validations)
    $allowedExtensions = array("jpg", "jpeg", "png", "gif", "pdf", "doc", "docx", "xls", "xlsx", "ppt", "pptx", "accdb");
    $fileExtension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    if (in_array($fileExtension, $allowedExtensions)) {
        // Move the uploaded file to the specified directory
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
            echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Sorry, only JPG, JPEG, PNG, GIF, PDF, DOC, DOCX, XLS, XLSX, PPT, PPTX, ACCDB files are allowed.";
    }
} else {
    echo "Sorry, there was an error uploading your file.";
}

?>
