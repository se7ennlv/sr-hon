<?php
include './config/db.php';

try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql1 = "SELECT * FROM dbo.Departments WHERE IsHoN = 1";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->execute();
} catch (PDOException $ex) {
    echo $ex->getMessage();
}
$conn = NULL;
?>

<!-- Modal Config -->
<div class="modal" id="configModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="glyphicon glyphicon-cog"></i> Config</h4>
            </div>
            <div class="modal-body">
                <form name="frmConfigModal" id="frmConfigModal" method="POST" action="./">
                    <div class="form-group">
                        <h4>Department:</h4>
                        <input type="hidden" name="getDeptName" id="getDeptName" value="">
                        <select name="deptID" id="deptID" class="form-control">
                            <option value="">select</option>
                            <?php
                            while ($sel1 = $stmt1->fetch(PDO::FETCH_NUM)) {
                                echo "<option value='$sel1[0]'>$sel1[3]</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <h4>Location:</h4>
                        <input type="hidden" name="getLocaName" id="getLocaName" value="">
                        <select name="locaID" id="locaID" class="form-control">
                            <option value="">select</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="far fa-times-circle"></i> Close</button>
                        <input type="submit" name="setCookie" id="btnSetCookie" class="btn btn-primary" value="Save">
                        <input type="submit" name="deletCookie" class="btn btn-danger" value="Clear Config">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


