<?php  
// Database connection  
$host = 'localhost';  
$user = 'root';  
$password = '';  
$dbname = 'thrivewithin';  
  
$conn = new mysqli($host, $user, $password, $dbname);  
  
if ($conn->connect_error) {  
    die("Connection failed: " . $conn->connect_error);  
}  
  
// Retrieve booking data from the database table  
$sql =  "SELECT name, email, phone, category FROM bookings";  
$result = $conn->query($sql);  
?>
<!DOCTYPE html>
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Admin Panel - Thrive Within</title>  
    <link rel="stylesheet" href="admin.css">  
</head>  
<body>  
    <header>  
        <h1>Admin Panel - Thrive Within</h1>  
        <p>List of Counseling Session Bookings</p>  
    </header>

    <section class="admin-table">  
    <?php if ($result->num_rows > 0): ?>  
        <table>  
            <thead>  
                <tr>  
                    <th>Name</th>  
                    <th>Email</th>  
                    <th>Phone Number</th>  
                    <th>Booking Date</th>  
                </tr>  
            </thead>  
            <tbody>  
                <?php while($row = $result->fetch_assoc()): ?>  
                    <tr>  
                        <td><?php echo htmlspecialchars($row['name']); ?></td>  
                        <td><?php echo htmlspecialchars($row['email']); ?></td>  
                        <td><?php echo htmlspecialchars($row['phone']); ?></td>  
                        <td><?php echo htmlspecialchars($row['category']); ?></td>  
                    </tr>  
                <?php endwhile; ?>  
            </tbody>  
        </table>  
    <?php else: ?>  
        <p>No bookings at the moment.</p>  
    <?php endif; ?>  
    </section>  
  
</body>  
</html>
<?php $conn->close(); ?>