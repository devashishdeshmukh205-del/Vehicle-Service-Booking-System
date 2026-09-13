<?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vehicle_no = trim($_POST['vehicle_no']);
    $owner_name = trim($_POST['owner_name']);
    $slot_no = trim($_POST['slot_no']);
    $duration = intval($_POST['duration']);
    $status = trim($_POST['status']);

    if (!empty($vehicle_no) && !empty($owner_name) && !empty($slot_no)) {
        $stmt = mysqli_prepare($conn, "INSERT INTO parking_slots (vehicle_no, owner_name, slot_no, duration, status) VALUES (?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "sssds", $vehicle_no, $owner_name, $slot_no, $duration, $status);

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
            header("Location: view.php?msg=success");
            exit();
        } else {
            echo "Error saving data.";
        }
    }
}
?>