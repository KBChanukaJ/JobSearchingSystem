<!DOCTYPE html>
<html>
<head>
    <title>Search Job Vacancy</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Search Job Vacancy</h1>
        <form action="searchjobprocess.php" method="GET" class="form-inline">
            <div class="form-group mr-2">
                <label for="job_title" class="mr-2">Job Title:</label>
                <input type="text" id="job_title" name="job_title" required class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
        <br>
        <a class="btn btn-primary" href="advancesearchjobform.php">Search for a job vacancy</a><br>
        <p class="mt-3"><a href="index.php">Return to Home Page</a></p>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
