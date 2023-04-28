<?php include('includes/conn.php'); 

    // Prepare the SQL statement with placeholders for the voters_id parameters
    $stmt = $conn->prepare('SELECT COUNT(*) as count FROM voters WHERE voters_id = ?');

    // Bind the parameters to the placeholders and execute the statement
    $stmt->bind_param('s', $_POST['voters_id']);
    $stmt->execute();

    // Fetch the result as an associative array
    $result = $stmt->get_result()->fetch_assoc();

    // Return the result as JSON
    header('Content-Type: application/json');
    echo json_encode(array('exists' => ($result['count'] > 0)));
?>