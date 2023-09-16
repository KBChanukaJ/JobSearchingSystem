<?php
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    // Retrieve the advanced search criteria from the form fields
    $job_title = isset($_GET["job_title"]) ? $_GET["job_title"] : "";
    $position = isset($_GET["position"]) ? $_GET["position"] : "";
    $contract = isset($_GET["contract"]) ? $_GET["contract"] : "";
    $application_type = isset($_GET["application_type"]) ? $_GET["application_type"] : "";
    $location = isset($_GET["location"]) ? $_GET["location"] : "";

    // Read and process the job vacancy data from jobs.txt
    $lines = file("jobposts/jobs.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    if ($lines === false) {
        echo "Error: Failed to open the job vacancy data file.";
    } else {
        $results = [];
        $current_record = [];

        // Iterate through the job vacancy data
        foreach ($lines as $line) {
            if ($line === "----------------------------------------------------------------------------") {
                // End of a job record, process and reset current record
                if (!empty($current_record)) {
                    $results[] = $current_record;
                }
                $current_record = [];
            } else {
                // Continue building the current job record
                $current_record[] = $line;
            }
        }

        // Filter job vacancies based on the specified criteria
        $filtered_results = [];

        foreach ($results as $result) {
            if (
                (empty($job_title) || stripos($result[1], $job_title) !== false) &&
                (empty($position) || $position === $result[4]) &&
                (empty($contract) || $contract === $result[5]) &&
                (empty($application_type) || $application_type === $result[6]) &&
                (empty($location) || $location === $result[7])
            ) {
                $filtered_results[] = $result;
            }
        }

        // Sort the filtered results by closing date in ascending order
        usort($filtered_results, function ($a, $b) {
            $dateA = DateTime::createFromFormat('d/m/y', $a[3]);
            $dateB = DateTime::createFromFormat('d/m/y', $b[3]);
            $currentDate = new DateTime();

            if ($dateA && $dateB) {
                $diffA = $dateA->diff($currentDate)->days;
                $diffB = $dateB->diff($currentDate)->days;

                return $diffA - $diffB;
            }

            return 0;
        });

        // Display the job vacancy with the closest future closing date
        if (!empty($filtered_results)) {
            $closest_job = $filtered_results[0];
            echo "<div class='container mt-3'>";
            echo "<div class='alert alert-primary'>";
            echo "<h1 class='alert-heading'>Job Vacancy Information</h1>";
            echo "<p><strong>Job Title:</strong> " . $closest_job[1] . "</p>";
            echo "<p><strong>Description:</strong> " . $closest_job[2] . "</p>";
            echo "<p><strong>Closing Date:</strong> " . $closest_job[3] . "</p>";
            echo "<p><strong>Position:</strong> " . $closest_job[4] . "</p>";
            echo "<p><strong>Contract:</strong> " . $closest_job[5] . "</p>";
            echo "<p><strong>Application Type:</strong> " . $closest_job[6] . "</p>";
            echo "<p><strong>Location:</strong> " . $closest_job[7] . "</p>";
            echo "</div>";
            echo "</div>";
        } else {
            echo "No matching job vacancies found for the specified criteria. Search again.";
        }
    }
} else {
    echo "Invalid request.";
}
?>
