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
    <div  class="container mt-5">
        <div class="d-flex justify-content-between mb-3">
            <h2>Survey List</h2>
            <a href="create.php" class="btn btn-primary">Create New Survey</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Age</th>
                    <th scope="col">Document</th>
                    <th scope="col">Feedback Type:</th>
                    <th scope="col">Services Used</th>
                    <th scope="col">Additional Comments</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
    
                    $sql = "SELECT * FROM surveys";
                    $stmt = $pdo->query($sql);
                    $rowCount = 1; 
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                            echo "<th scope=\"row\">" . $rowCount++ . "</th>";
                            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['age']) . "</td>";
                            echo "<td><a href='" . $row['document'] . "'>" .$row['document'] . "</a></td>";
                            echo "<td>" . htmlspecialchars($row['feedback_type']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['services_used']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['additional_comments']) . "</td>";
                            echo "<td><a href='edit.php?id=" . $row['id'] . "'>Edit</a> | <a href='delete.php?id=" . $row['id'] . "'>Delete</a></td>";
                        echo "</tr>";
    
                    }
    
                ?>
    
            </tbody>
        </table>
    </div>
    
</body>
</html>

    
    

