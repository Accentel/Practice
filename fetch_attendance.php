 <?php
include("connection.php");

$query = "
    SELECT 
        date AS event_date,
        SUM(CASE WHEN status = 'Present' THEN 1 ELSE 0 END) AS present_count,
        SUM(CASE WHEN status = 'Absent' THEN 1 ELSE 0 END) AS absent_count
    FROM emp_attendance
    GROUP BY date
";
$result = $conn->query($query);

$events = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $events[] = [
            'title' => "Present: " . $row['present_count'] . ", Absent: " . $row['absent_count'],
            'start' => $row['event_date'],
        ];
    }
}

header('Content-Type: application/json');
echo json_encode($events);
?>
