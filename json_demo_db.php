<?php
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_GET["x"], false);

$conn = new mysqli("localhost", "iberkatm", "shati5620", "iberkatm_iberkat");
$stmt = $conn->prepare("SELECT ? FROM ? LIMIT ?");
$stmt->bind_param("ss", $obj->field, $obj->table, $obj->limit);
$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);
?>
