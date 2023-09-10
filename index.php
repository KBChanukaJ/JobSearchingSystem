<!DOCTYPE html>
<html>
<head>
    <title>Job Vacancy Posting System</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    
    <!-- Add Bootstrap CSS link -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>
    
    <div class="container">
        <h1 class="mt-5">Job Vacancy Posting System</h1>
        
        <?php
        // Replace with your information
        $name = "John Smith";
        $studentID = "1234567";
        $email = "1234567@swin.edu.au";
        ?>

        <p>Name: <?php echo $name; ?></p>
        <p>Student ID: <?php echo $studentID; ?></p>
        <p>Email: <?php echo $email; ?></p>
        
        <p>
            I declare that this assignment is my individual work.
            I have not worked collaboratively, nor have I copied from any other student's work or from any other source.
        </p>

        <p>
            <a class="btn btn-primary" href="postjobform.php">Post a job vacancy</a>
            <a class="btn btn-primary" href="searchjobform.php">Search for a job vacancy</a>
            
            <a class="btn btn-secondary" href="about.php">About this assignment</a>
        </p>
    </div>
    
    <!-- Add Bootstrap JS scripts if needed -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
</body>
</html>
