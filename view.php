<?php
require_once 'config.php';
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Bookings</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Smart Parking System</h2>
        <nav>
            <a href="index.php">Book Slot</a> | 
            <a href="view.php">View Bookings</a>
        </nav>
        <hr>

        <?php if (isset($_GET['msg']) && $_GET['msg'] == 'success'): ?>
            <div class="alert">Parking slot booked successfully!</div>
        <?php endif; ?>

        <h3>Active Parking Records</h3>
        <form action="view.php" method="GET" class="search-form">
            <input type="text" name="search" placeholder="Search by vehicle or slot..." value="<?php echo htmlspecialchars($search); ?>">
            <button type="submit">Search</button>
            <a href="view.php" class="btn-reset">Reset</a>
        </form>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Vehicle No</th>
                    <th>Owner</th>
                    <th>Slot</th>
                    <th>Duration (Hrs)</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($search)) {
                    $param = "%" . $search . "%";
                    $stmt = mysqli_prepare($conn, "SELECT * FROM parking_slots WHERE vehicle_no LIKE ? OR slot_no LIKE ? ORDER BY id DESC");
                    mysqli_stmt_bind_param($stmt, "ss", $param, $param);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                } else {
                    $result = mysqli_query($conn, "SELECT * FROM parking_slots ORDER BY id DESC");
                }

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['vehicle_no']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['owner_name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['slot_no']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['duration']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['status']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No records found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>