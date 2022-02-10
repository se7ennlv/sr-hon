<?php
include './config/db.php';

try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_COOKIE["deptID"])) {
        $deptID = $_COOKIE["deptID"];
    } else {
        $deptID = 0;
    }

    $sql2 = "SELECT QuesID, DeptID, QuesEnName +'/'+ QuesThName AS Question
            FROM Questions
            WHERE DeptID = $deptID
            ";

    $stmt2 = $conn->prepare($sql2);
    $stmt2->execute();
} catch (PDOException $ex) {
    echo $ex->getMessage();
}
$conn = NULL;
?>

<!-- Modal TooBad-->
<div class="modal" id="modalTooBad" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-center" style="background-color: #dc3545!important; color: #fff;"> 
                <h2 class="modal-title text-center"><i class="glyphicon glyphicon-grain"></i> โปรดเลือก / Please choose<i class="glyphicon glyphicon-grain"></i></h2>
            </div>
            <div class="modal-body">
                <form name="frmTooBad" id="frmTooBad" method="POST" action="#" autocomplete="off" class="form-inline">
                    <?php while ($res2 = $stmt2->fetch(PDO::FETCH_ASSOC)) { ?>
                        <section>
                            <div class="form-group" style="padding-right: 0">
                                <label class="label label-default">
                                    <input type="checkbox" name="chk[]"  class="toobad" value="<?= $res2['Question']; ?>"  style="display: none"> <?= $res2['Question']; ?>
                                    <input type="text" name="comment[]" class="form-control box-comment" placeholder="feedback..." style="width: 200px; margin-left: 2px">
                                </label>
                                
                            </div>
                           
                        </section>
                    <?php } ?>

                    <div class="modal-footer">
                        <span style="color: red; display: none" class="pull-left chk-dept-loca">Please select Department and Location!</span>
                        <span style="color: red; display: none" class="pull-left chk-check">โปรดเลึอก/please choose!</span>
                        <button type="button" class="btn btn-default btn-lg" data-dismiss="modal"><i class="glyphicon glyphicon-remove-circle"></i> Close</button>
                        <button type="submit" class="btn btn-danger btn-lg"><i class="glyphicon glyphicon-share-alt"></i> Send</button>
                    </div>

                    <input type="hidden" name="deptID[]" style="display: block">
                    <input type="hidden" name="locaID[]" style="display: none">
                </form>
            </div>
        </div>
    </div>
</div>
