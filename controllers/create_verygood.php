<?php

include '../config/db.php';

try {
    $chk = $_POST['chk'];
    $question = $_POST['question'];
    //$comment = $_POST['comment'];
    $deptID = $_POST['deptID'];
    $locaID = $_POST['locaID'];

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo count($chk);

    for ($i = 0; $i < count($chk); $i++) {
        $sql = "INSERT INTO [HoN].[dbo].[Transactions] (
                                                    [TranType], 
                                                    [TranQuestion],
                                                    [DeptID],
                                                    [LocaID],
                                                    [TranCreatedAt]
                                                ) 
                                       VALUES (
                                                'like', 
                                                '{$chk[$i]}',
                                                '{$deptID}',
                                                '{$locaID}',
                                                GETDATE()
                                       )";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }

    header('Content-Type: application/json');
    $arr = "Success";
    echo json_encode(array(
        "status" => "success",
        "message" => $arr
    ));
} catch (Exception $ex) {
    header('Content-Type: application/json');
    $arr = "Fail " . $ex->getMessage();
    echo json_encode(array(
        "status" => "danger",
        "message" => $arr
    ));
}
$conn = NULL;
