<!DOCTYPE html>
<html>
<head>
    <title>Advanced Search Job Vacancy</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Advanced Search Job Vacancy</h1>
        <form action="advancesearchjobprocess.php" method="GET" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="job_title">Job Title:</label>
                <input type="text" class="form-control" name="job_title">
            </div>

            <div class="form-group">
                <label>Position:</label><br>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="position" value="Full Time">
                    <label class="form-check-label">Full Time</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="position" value="Part Time">
                    <label class="form-check-label">Part Time</label>
                </div>
            </div>

            <div class="form-group">
                <label for="contract">Contract:</label>
                <select class="form-control" name="contract">
                    <option value="">Any</option>
                    <option value="On-going">On-going</option>
                    <option value="Fixed term">Fixed term</option>
                </select>
            </div>

            <div class="form-group">
                <label for="application_type">Application Type:</label>
                <select class="form-control" name="application_type">
                    <option value="">Any</option>
                    <option value="Post">Post</option>
                    <option value="Email">Email</option>
                </select>
            </div>

            <div class="form-group">
                <label for="location">Location:</label>
                <select class="form-control" name="location">
                    <option value="">Any</option>
                    <option value="ACT">ACT</option>
                    <option value="NSW">NSW</option>
                    <option value="NT">NT</option>
                    <option value="QLD">QLD</option>
                    <option value="SA">SA</option>
                    <option value="TAS">TAS</option>
                    <option value="VIC">VIC</option>
                    <option value="WA">WA</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Search</button>
        </form>
        <a href="index.php" class="mt-3">Return to Home Page</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function validateForm() {
            // Get references to form fields
            var jobTitle = document.getElementsByName("job_title")[0].value;
            var position = document.querySelector('input[name="position"]:checked');
            var contract = document.getElementsByName("contract")[0].value;
            var applicationType = document.getElementsByName("application_type")[0].value;
            var location = document.getElementsByName("location")[0].value;

            // Check if any of the required fields are empty
            if (jobTitle === "" && !position && contract === "" && applicationType === "" && location === "") {
                alert("Please fill in at least one search criteria.");
                return false; // Prevent form submission
            }

            return true; // Allow form submission
        }
    </script>
</body>
</html>
