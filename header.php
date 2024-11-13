<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo isset($pageTitle) ? $pageTitle : 'Dashboard'; ?></title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

   

    <style>
        /* You can include custom styles here if needed */
        .navbar-brand {
            font-weight: bold;
        }

        .navbar {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    

    <!-- Optional Message -->
    <?php
    if (isset($_SESSION['message'])) {
        echo '<div class="alert alert-info text-center">' . $_SESSION['message'] . '</div>';
        unset($_SESSION['message']);
    }
    ?>

    <!-- Main content starts here -->

