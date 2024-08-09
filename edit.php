<?php

    include 'connection.php';


    $id = $_GET['id'];

    // Fetch the existing survey data from the database
    $sql = "SELECT * FROM surveys WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    $survey = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey Form</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="d-flex justify-content-between mx-3 mt-3">
        <a href="index.php" class="btn btn-primary">Back</a>
    </div>
    <div class="container ">

        <form action="process.php" method="POST" enctype="multipart/form-data">
            
            <div >
                <h2>Survey Form</h2>
    
                <label class="form-label" for="name">Name:</label>
                <input class="form-control" type="text" name="name" value="<?php echo $survey['name'];?>" required><br>
        
                <label class="form-label" for="email">Email:</label>
                <input class="form-control" type="email" name="email" value="<?php echo $survey['email'];?>" required><br>
        
                <label class="form-label" for="age">Age:</label>
                <input class="form-control" type="number" name="age" value="<?php echo $survey['age'];?>" ><br>

                <label for="uploaded_file" class="form-label">Document:</label>
                <input class="form-control" type="file" name="uploaded_file" >
                <?php if ($survey['document']): ?>
                    <p>Current File: <a href="<?= $survey['document'] ?>" target="_blank"><?= basename($survey['document']) ?></a></p>
                <?php endif; ?>
                <br>
        
                <label class="form-label" for="feedback_type">Type of Feedback:</label>
                <select class="form-select" name="feedback_type">
                    <option value="positive" <?= $survey['feedback_type'] == 'positive' ? 'selected' : '' ?>>Positive</option>
                    <option value="negative" <?= $survey['feedback_type'] == 'negative' ? 'selected' : '' ?>>Negative</option>
                    <option value="neutral" <?= $survey['feedback_type'] == 'neutral' ? 'selected' : '' ?>>Neutral</option>
                </select><br>
        
                <label class="form-label" for="services_used">Services Used:</label><br>
                <input class="form-check-input" type="checkbox" name="services_used[]" value="Service1" <?= in_array('Service1', explode(',', $survey['services_used'])) ? 'checked' : '' ?>> Service 1<br>
                <input class="form-check-input" type="checkbox" name="services_used[]" value="Service2" <?= in_array('Service2', explode(',', $survey['services_used'])) ? 'checked' : '' ?>> Service 2<br>
                <input class="form-check-input" type="checkbox" name="services_used[]" value="Service3" <?= in_array('Service3', explode(',', $survey['services_used'])) ? 'checked' : '' ?>> Service 3<br>
        
                <label class="form-label" for="additional_comments">Additional Comments:</label><br>
                <textarea name="additional_comments" rows="4" cols="50"><?php echo $survey['additional_comments'];?></textarea><br>
        
                <input type="hidden" name="id" value="<?php echo $survey['id']; ?>">
                <input type="hidden" name="original_document" value="<?php echo $survey['document']; ?>">
                <input class="btn btn-primary" type="submit" name="submit_edit" value="Submit">
            </div>
        </form>
    </div>
</body>
</html>
