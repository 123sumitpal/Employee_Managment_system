<?php
include 'conn.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM employees WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Update Employees</h2>
        <div class="mt-4">
            <form action="update.php?id=<?= $id ?>" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="<?= $row['name'] ?>" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="emp_position">Postion</label>
                        <input type="text" class="form-control" name="emp_position" id="emp_position" value="<?= $row['emp_position'] ?>" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="emp_department">Address</label>
                        <input type="text" class="form-control" name="emp_department" id="emp_department" value="<?= $row['emp_department'] ?>" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update Employees</button>
            </form>
        </div>
    </div>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['emp_position'];
    $address = $_POST['emp_department'];

    $sql = "UPDATE employees SET name='$name', emp_department='$emp_department', emp_department='$emp_department' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>