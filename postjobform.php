<!DOCTYPE html>
<html>
<head>
    <title>Post a Job Vacancy</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add your custom style.css if needed -->
    <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Post a Job Vacancy</h1>
        <form action="postjobprocess.php" method="POST">
            <div class="form-group">
                <label for="position_id">Position ID:</label>
                <input type="text" class="form-control" id="position_id" name="position_id" required pattern="PID\d{4}">
            </div>

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" required maxlength="20">
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" required maxlength="250"></textarea>
            </div>

            <div class="form-group">
                <label for="closing_date">Closing Date:</label>
                <input type="text" class="form-control" id="closing_date" name="closing_date" required placeholder="dd/mm/yy">
            </div>

            <div class="form-group">
                <label>Position:</label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="full_time" name="position" value="Full Time" required>
                    <label class="form-check-label" for="full_time">Full Time</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="part_time" name="position" value="Part Time" required>
                    <label class="form-check-label" for="part_time">Part Time</label>
                </div>
            </div>

            <div class="form-group">
                <label>Contract:</label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="ongoing" name="contract" value="On-going" required>
                    <label class="form-check-label" for="ongoing">On-going</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="fixed_term" name="contract" value="Fixed term" required>
                    <label class="form-check-label" for="fixed_term">Fixed term</label>
                </div>
            </div>

            <div class="form-group">
                <label>Accept Application by:</label>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="accept_post" name="accept_post" value="Post">
                    <label class="form-check-label" for="accept_post">Post</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="accept_email" name="accept_email" value="Email">
                    <label class="form-check-label" for="accept_email">Email</label>
                </div>
            </div>

            <div class="form-group">
                <label for="location">Location:</label>
                <select class="form-control" id="location" name="location">
                    <option value="---">---</option>
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

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <p class="mt-3"><a href="index.php">Return to Home Page</a></p>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
