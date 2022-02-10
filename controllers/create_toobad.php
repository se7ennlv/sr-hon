<?php

include '../config/db.php';

try {
    $chk = $_POST['chk'];
    $fillterComm = array_filter($_POST['comment']);//remove empty array
    $comment = array_values($fillterComm);//reset array order index
    $deptID = $_POST['deptID'];
    $locaID = $_POST['locaID'];

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    for ($i = 0; $i <sizeof($chk); $i++) {
        $sql = "INSERT INTO [HoN].[dbo].[Transactions] (
                                                    [TranType], 
                                                    [TranQuestion],
                                                    [TranComment],
                                                    [DeptID],
                                                    [LocaID],
                                                    [TranCreatedAt]
                                                ) 
                                       VALUES (
                                                'dislike', 
                                                '{$chk[$i]}',
                                                '{$comment[$i]}',
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
