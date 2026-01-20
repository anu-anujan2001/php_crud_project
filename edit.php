<?php
include('db.php');

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = intval($_GET['id']);
$sql = "SELECT * FROM student WHERE id = $id";
$result = mysqli_query($connection, $sql);

if (!$result || mysqli_num_rows($result) == 0) {
    echo "Student not found!";
    exit;
}

$student = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $address = mysqli_real_escape_string($connection, $_POST['address']);
    $mobile = mysqli_real_escape_string($connection, $_POST['mobile']);

    $update_sql = "UPDATE student SET name='$name', address='$address', mobile='$mobile' WHERE id=$id";
    if (mysqli_query($connection, $update_sql)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error updating record: " . mysqli_error($connection);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h2>Edit Student</h2>
        <form method="post">
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($student['name']); ?>" required>
            </div>
            <div class="mb-3">
                <label>Address</label>
                <input type="text" name="address" class="form-control" value="<?php echo htmlspecialchars($student['address']); ?>" required>
            </div>
            <div class="mb-3">
                <label>Mobile</label>
                <input type="text" name="mobile" class="form-control" value="<?php echo htmlspecialchars($student['mobile']); ?>" required>
            </div>
            <input type="submit" name="submit" value="Update Student" class="btn btn-primary">
            <a href="index.php" class="btn btn-secondary">Back</a>
        </form>
    </div>
</body>

</html>