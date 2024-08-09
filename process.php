<?php
    include 'connection.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>

<?php
    function modalView($titlemsg, $msg, $btnlink){
        echo "<div class=\"modal position-static d-block\" tabindex=\"-1\">";
            echo "<div class=\"modal-dialog\">";
                echo "<div class=\"modal-content\">";

                echo "<div class=\"modal-header\">";
                    echo "<h5 class=\"modal-title\">$titlemsg</h5>";
                    // echo "<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>";
                echo "</div>";

                echo "<div class=\"modal-body\">";
                    echo "<p>$msg</p>";
                echo "</div>";

                echo "<div class=\"modal-footer\">";
                    echo "<button type=\"button\" class=\"btn btn-primary\" onclick=\"window.location.href='$btnlink'\">Ok</button>";
                echo "</div>";

                echo "</div>";
            echo "</div>";
        echo "</div>";
    }
    $titlemsg='Survey Module';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $feedback_type = $_POST['feedback_type'];
    $services_used = implode(",", $_POST['services_used']); // Convert array to string
    $additional_comments = $_POST['additional_comments'];


    // Handle file upload
    $uploaded_file = '';
    if (isset($_FILES['uploaded_file']) && $_FILES['uploaded_file']['error'] == 0) {
        $target_directory = "uploads/";
        $target_file = $target_directory . basename($_FILES["uploaded_file"]["name"]);
        if (move_uploaded_file($_FILES["uploaded_file"]["tmp_name"], $target_file)) {
            $uploaded_file = $target_file;
        } else {
            echo "Error uploading file.";
        }
    }

    
    

    // create process
    if (isset($_POST['submit_create'])) {
        
    
        $sql = "INSERT INTO surveys (name, email, age, document, feedback_type, services_used, additional_comments) 
                VALUES (:name, :email, :age, :uploaded_file, :feedback_type, :services_used, :additional_comments)";
    
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':age' => $age,
            ':uploaded_file' => $uploaded_file,
            ':feedback_type' => $feedback_type,
            ':services_used' => $services_used,
            ':additional_comments' => $additional_comments
        ]);
        
        $msg='Survey submitted successfully!';
        $btnlink='index.php';
        modalView($titlemsg, $msg, $btnlink);
        exit();
        
    }


    // edit process
    if (isset($_POST['submit_edit'])) {
        $id = $_POST['id'];
        $original_document = $_POST['original_document'];

        if($uploaded_file == ''){
            $uploaded_file = $original_document;
        }

        $sql = "UPDATE surveys SET name = :name, email = :email, age = :age, document = :uploaded_file, feedback_type = :feedback_type, services_used = :services_used, additional_comments = :additional_comments WHERE id = :id";
    
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':age' => $age,
            ':uploaded_file' => $uploaded_file,
            ':feedback_type' => $feedback_type,
            ':services_used' => $services_used,
            ':additional_comments' => $additional_comments,
            ':id' => $id
        ]);
        
        $msg='Survey updated successfully!';
        $btnlink='edit.php?id='.$id;
        modalView($titlemsg, $msg, $btnlink);
        exit();
        
    }

?>
</body>
</html>