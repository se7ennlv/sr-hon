<?php

include '../config/db.php';

try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT QuesID, DeptID, QuesEnName +'/'+ QuesThName AS Question
            FROM Questions
            WHERE DeptID = 1
            ";

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $dataArray = array();

    while ($res = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $productArray[] = $res;
    }
    echo json_encode($productArray);
} catch (PDOException $ex) {
    echo $ex->getMessage();
}

$conn = NULL;
