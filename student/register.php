
<?php
session_start();
$pageTitle = "Student Registration";
include '../header.php';  
include '../functions.php';  

$errorMessages = [];
$newStudent = [];

// Handle form submission for new student registration
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capture input from form fields
    $newStudent = [
        'student_id' => $_POST['student_id'],
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name']
    ];

    // Validate form input
    $errorMessages = validateStudentData($newStudent);

    // Check for duplicate entries based on student ID
    if (empty($errorMessages)) {
        if (!checkDuplicateStudentData($newStudent)) {
            $_SESSION['student_records'][] = $newStudent; // Store student data in session
            header("Location: register.php"); // Redirect to avoid duplicate submissions
            exit;
        } else {
            $errorMessages[] = "This Student ID already exists.";
        }
    }
}
?>

<main>
    <div class="container col-8">
        <h2 class="m-4">Register a New Student</h2>

        <!-- Breadcrumb Navigation -->
        <div class="mt-4 w-100">
            <div class="bg-light p-2 mb-4 border rounded">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="../dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Student Registration</li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Display Error Messages -->
        <?php if (!empty($errorMessages)): ?>
            <div class="alert alert-danger">
                <?php foreach ($errorMessages as $message): ?>
                    <p><?php echo htmlspecialchars($message); ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- Student Registration Form -->
        <form method="POST" class="border border-secondary p-5 mb-4">
            <div class="mb-3">
                <label for="student_id" class="form-label">Student ID</label>
                <input type="number" class="form-control" id="student_id" name="student_id" placeholder="Enter Student ID" required>
            </div>
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" required>
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" required>
            </div>
            <button type="submit" class="btn btn-primary">Register Student</button>
        </form>

        <!-- Registered Students List -->
        <?php if (!empty($_SESSION['student_records'])): ?>
            <div class="mt-3">
                <div class="border border-secondary p-5 mb-4">
                    <h5>List of Students</h5>
                    <hr>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Student ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($_SESSION['student_records'] as $idx => $record): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($record['student_id']); ?></td>
                                    <td><?php echo htmlspecialchars($record['first_name']); ?></td>
                                    <td><?php echo htmlspecialchars($record['last_name']); ?></td>
                                    <td>
                                        <a href="edit.php?index=<?php echo $idx; ?>" class="btn btn-info btn-sm">Edit</a>
                                        <a href="delete.php?index=<?php echo $idx; ?>" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php else: ?>
            <p>No students have been registered yet.</p>
        <?php endif; ?>
    </div>
</main>
