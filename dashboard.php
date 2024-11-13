<?php
session_start(); 
$pageTitle = "Dashboard";

// Redirect to login page if the user is not logged in
if (empty($_SESSION['email'])) {
    header("Location: index.php");
    exit;
}

// Disable caching
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header("Cache-Control: post-check=0, pre-check=0", false); 
header("Pragma: no-cache");

include 'functions.php'; 

// Check session status and guard access
checkUserSessionIsActive(); 
guard();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title><?php echo $pageTitle; ?></title>
</head>
<body>
    <div class="container my-4">
        <div class="d-flex justify-content-between align-items-center">
            <h4>Welcome to the System: <?php echo $_SESSION['email']; ?></h4>
            <button onclick="window.location.href='logout.php'" class="btn btn-danger">Logout</button>
        </div>
        
        <div class="row justify-content-center mt-5">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        Add a Subject
                    </div>
                    <div class="card-body">
                        <p>This section allows you to add a new subject in the system. Click the button below to proceed with the adding process.</p>
                        <a href="subject/add.php" class="btn btn-primary btn-block">Add Subject</a>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        Register a Student
                    </div>
                    <div class="card-body">
                        <p>This section allows you to register a new student in the system. Click the button below to proceed with the registration process.</p>
                        <a href="student/register.php" class="btn btn-primary btn-block">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


