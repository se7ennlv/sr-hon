<?php
include './config/db.php';


try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_COOKIE["deptID"])) {
        $deptID = $_COOKIE["deptID"];
    } else {
        $deptID = 0;
    }

    $sql3 = "SELECT QuesID, DeptID, QuesEnName +'/'+ QuesThName AS Question
            FROM Questions
            WHERE DeptID = $deptID
            ";

    $stmt3 = $conn->prepare($sql3);
    $stmt3->execute();
} catch (PDOException $ex) {
    echo $ex->getMessage();
}
$conn = NULL;
?>

<!-- Modal VeryGood-->
<div class="modal" id="modalVeryGood" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-center" style="background-color: #007bff!important; color: #fff">
                <h2 class="modal-title"><i class="glyphicon glyphicon-grain"></i> โปรดเลือก / Please choose <i class="glyphicon glyphicon-grain"></i></h2>
            </div>
            <div class="modal-body">
                <form name="frmVeryGood" id="frmVeryGood" method="POST" action="#" autocomplete="off">
                    <?php while ($res3 = $stmt3->fetch(PDO::FETCH_ASSOC)) { ?>
                        <div class="input-group add-on">
                            <label class="label label-default">
                                <input type="checkbox" name="chk[]" class="verygood" value="<?= $res3['Question']; ?>" style="display: none"> <?= $res3['Question']; ?>
                            </label>
                            <input type="hidden" name="deptID[]" style="display: block">
                            <input type="hidden" name="locaID[]" style="display: none">
                        </div>
                    <?php } ?>
                    <div class="modal-footer">
                        <span style="color: red; display: none" class="pull-left chk-dept-loca">Please select Department and Location!</span>
                        <span style="color: red; display: none" class="pull-left chk-check">โปรดเลึอก/please choose!</span>
                        <button type="button" class="btn btn-default btn-lg" data-dismiss="modal"><i class="glyphicon glyphicon-remove-circle"></i> Close</button>
                        <button type="submit" class="btn btn-primary btn-lg"><i class="glyphicon glyphicon-share-alt"></i> Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

