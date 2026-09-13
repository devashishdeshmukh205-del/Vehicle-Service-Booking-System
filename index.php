<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Smart Parking System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Smart Parking Booking System</h2>
        <nav>
            <a href="index.php">Book Slot</a> | 
            <a href="view.php">View Bookings</a>
        </nav>
        <hr>
        <h3>New Parking Request</h3>
        <form action="save.php" method="POST">
            <div class="form-group">
                <label>Vehicle Number:</label>
                <input type="text" name="vehicle_no" required placeholder="e.g. MH-31-AB-1234">
            </div>
            <div class="form-group">
                <label>Owner Name:</label>
                <input type="text" name="owner_name" required placeholder="e.g. Amit Patil">
            </div>
            <div class="form-group">
                <label>Slot Number:</label>
                <input type="text" name="slot_no" required placeholder="e.g. Slot-A1">
            </div>
            <div class="form-group">
                <label>Duration (Hours):</label>
                <input type="number" name="duration" min="1" max="24" required placeholder="e.g. 2">
            </div>
            <div class="form-group">
                <label>Status:</label>
                <select name="status" required>
                    <option value="Reserved">Reserved</option>
                    <option value="Parked">Parked</option>
                </select>
            </div>
            <button type="submit">Confirm Booking</button>
        </form>
    </div>
</body>
</html>