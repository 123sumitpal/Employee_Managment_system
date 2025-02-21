<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $emp_postion = $_POST['emp_position'];
    $emp_department = $_POST['emp_department'];
   
    

    $sql = "INSERT INTO employees (name, emp_position, emp_department) VALUES ('$name', ' $emp_postion', ' $emp_department')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
