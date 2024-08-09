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

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $sql = "DELETE FROM surveys WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':id' => $id]);

            $msg =  "Survey deleted successfully!";
            modalView($titlemsg, $msg, 'index.php');
        }
    ?>
</body>
</html>
