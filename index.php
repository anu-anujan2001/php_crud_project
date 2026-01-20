<?php
include('db.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h1>Student CRUD Application</h1>
                <a href="add.php" class="btn btn-success btn-sm float-end">Add New Student</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Mobile</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM student";
                        $result = mysqli_query($connection, $sql);
                        $id = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                            <td>{$id}</td>
                            <td>" . htmlspecialchars($row['name']) . "</td>
                            <td>" . htmlspecialchars($row['address']) . "</td>
                            <td>" . htmlspecialchars($row['mobile']) . "</td>
                            <td>
                                <a href='edit.php?id={$row['id']}' class='btn btn-primary btn-sm'>Edit</a>
                                <a href='delete.php?del={$row['id']}' class='btn btn-danger btn-sm' 
                                   onclick=\"return confirm('Are you sure?')\">Delete</a>
                            </td>
                          </tr>";
                            $id++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>