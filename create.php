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
                <input class="form-control" type="text" name="name" required><br>
        
                <label class="form-label" for="email">Email:</label>
                <input class="form-control" type="email" name="email" required><br>
        
                <label class="form-label" for="age">Age:</label>
                <input class="form-control" type="number" name="age"><br>

                <label for="uploaded_file" class="form-label">Document:</label>
                <input class="form-control" type="file" name="uploaded_file" ><br>
        
                <label class="form-label" for="feedback_type">Type of Feedback:</label>
                <select class="form-select" name="feedback_type">
                    <option value="positive">Positive</option>
                    <option value="negative">Negative</option>
                    <option value="neutral">Neutral</option>
                </select><br>
        
                <label class="form-label" for="services_used">Services Used:</label><br>
                <input class="form-check-input" type="checkbox" name="services_used[]" value="Service1"> Service 1<br>
                <input class="form-check-input" type="checkbox" name="services_used[]" value="Service2"> Service 2<br>
                <input class="form-check-input" type="checkbox" name="services_used[]" value="Service3"> Service 3<br>
        
                <label class="form-label" for="additional_comments">Additional Comments:</label><br>
                <textarea name="additional_comments" rows="4" cols="50"></textarea><br>
        
                <input class="btn btn-primary" type="submit" name="submit_create" value="Submit">
            </div>
        </form>
    </div>
</body>
</html>
