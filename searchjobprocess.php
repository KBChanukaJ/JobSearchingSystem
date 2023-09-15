<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Search Results</title>
    <!-- Add Bootstrap CSS link here -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Ru7IBm6z5u8dF0p/R6wFb9XsVVHoZPVJ9+kTf+Hl5Yb9fDw5f5clsp9NUk1t4WfF8" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <?php
        if ($_SERVER["REQUEST_METHOD"] === "GET") {
            // Read the job title search string from the URL query parameters
            if (isset($_GET["job_title"])) {
                $search_string = $_GET["job_title"];
            } else {
                echo "<div class='alert alert-danger'>Error: Please enter a job title to search. <a href='searchjobform.php'>Go back to search</a></div>";
                exit;
            }

            // Check if the "jobs.txt" file exists
            if (file_exists("jobposts/jobs.txt")) {
                // Read the contents of the "jobs.txt" file
                $lines = file("jobposts/jobs.txt");

                // Initialize variables to store job vacancy details
                $job_title = "";
                $description = "";
                $closing_date = "";
                $position = "";
                $application_method = "";
                $location = "";

                // Loop through the lines in the file to find matching job titles
                for ($i = 0; $i < count($lines); $i++) {
                    // Check if the line contains the job title
                    if (trim($lines[$i]) === $search_string) {
                        // Retrieve the job details from the following lines
                        $job_title = $search_string;
                        $description = trim($lines[$i + 1]);
                        $closing_date = trim($lines[$i + 2]);
                        $position = trim($lines[$i + 3]);
                        $application_method = trim($lines[$i + 4]);
                        $location = trim($lines[$i + 5]);

                        echo "<h1 class='display-4'>Search Results</h1>";
                        echo "<div class='alert alert-info'>";
                        echo "<strong>Job Vacancy Information</strong><br>";
                        echo "<p class='lead'><strong>Job Title:</strong> $job_title</p>";
                        echo "<p><strong>Description:</strong> $description</p>";
                        echo "<p><strong>Closing Date:</strong> $closing_date</p>";
                        echo "<p><strong>Position:</strong> $position</p>";
                        echo "<p><strong>Application by:</strong> $application_method</p>";
                        echo "<p><strong>Location:</strong> $location</p>";
                        echo "</div>";
                    }
                }

                if (empty($job_title)) {
                    echo "<div class='alert alert-warning'>No matching job vacancies found for '$search_string'. <a href='searchjobform.php'>Search again</a></div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Error: The 'jobs.txt' file does not exist. <a href='index.php'>Return to Home Page</a></div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Invalid request.</div>";
        }
        ?>
    </div>
    <!-- Add Bootstrap JavaScript and jQuery links here (if needed) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-vR2HPB411t9BSK5blzVb8/7W6q5BZ2AW3r5m9m/AqaFq1z5jj9aBwA5gIp1fKEdF1" crossorigin="anonymous"></script>
</body>
</html>
