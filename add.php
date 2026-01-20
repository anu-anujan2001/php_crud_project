<?php
include('db.php');

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $address = mysqli_real_escape_string($connection, $_POST['address']);
    $mobile = mysqli_real_escape_string($connection, $_POST['mobile']);

    $sql = "INSERT INTO student (name, address, mobile) VALUES ('$name', '$address', '$mobile')";
    if (mysqli_query($connection, $sql)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h2>Add New Student</h2>
        <form method="post">
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Address</label>
                <input type="text" name="address" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Mobile</label>
                <input type="text" name="mobile" class="form-control" required>
            </div>
            <input type="submit" name="submit" value="Add Student" class="btn btn-primary">
            <a href="index.php" class="btn btn-secondary">Back</a>
        </form>
    </div>
</body>

</html>