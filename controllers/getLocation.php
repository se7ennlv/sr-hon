<?php
include '../config/db.php';

try {
    $deptID = $_POST['deptID'];

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql2 = "SELECT * FROM dbo.Locations WHERE DeptID = {$deptID} ";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->execute();
} catch (PDOException $ex) {
    echo $ex->getMessage();
}
$conn = NULL;
?>

<select name="locaID" id="locaID" style="width: 70px">
    <option value="">Select</option>
    <?php
    while ($sel2 = $stmt2->fetch(PDO::FETCH_NUM)) {
        echo "<option value='$sel2[0]'>$sel2[2]</option>";
    }
    ?>
</select>