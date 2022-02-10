<?php
include './config/db.php';

if (!empty($_POST['setCookie'])) {
    setcookie("deptID", $_POST["deptID"], time() + (86400 * 360));
    setcookie("locaID", $_POST["locaID"], time() + (86400 * 360));

    setcookie("getDeptName", $_POST["getDeptName"], time() + (86400 * 360));
    setcookie("getLocaName", $_POST["getLocaName"], time() + (86400 * 360));

    $_COOKIE ['deptID'] = $_POST["deptID"];
    $_COOKIE ['locaID'] = $_POST["locaID"];

    $_COOKIE ['getDeptName'] = $_POST["getDeptName"];
    $_COOKIE ['getLocaName'] = $_POST["getLocaName"];
}

if (!empty($_POST['deletCookie'])) {
    setcookie("deptID", "");
    setcookie("locaID", "");

    setcookie("getDeptName", "");
    setcookie("getLocaName", "");

    $_COOKIE ['deptID'] = "";
    $_COOKIE ['locaID'] = "";

    $_COOKIE ['getDeptName'] = "";
    $_COOKIE ['getLocaName'] = "";
}


try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql1 = "SELECT * FROM dbo.Departments";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->execute();
} catch (PDOException $ex) {
    echo $ex->getMessage();
}
$conn = NULL;
?>

<!DOCTYPE html>

<html oncontextmenu="return false;">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="refresh" content="180;url=http://172.16.98.171/HoN/" />
        <title>Happy Or Not</title>
        <?php include 'head.php'; ?>
        <script>
            document.addEventListener('touchmove', function (event) {
                event.preventDefault();
            }, {passive: false});
        </script>
    </head>
    <body id="body" oncontextmenu="return false;">
        <?php include 'header.php'; ?>

        <div class="container" style="margin-top: 50px;">
            <div class="row text-center">
                <h2 class="text-warning" id="topText" style="margin-bottom: 0 ">คุณรู้สึกอย่างไรกับ สะหวัน รีสอร์ท ?</h2>
                <img src="assets/images/wow2.gif" class="" style="width: 190px; height: 150px;">
            </div>
            <div class="row">
                <center>
                    <table>
                        <tr>
                            <td class="text-center" style="padding-right: 150px">
                                <a data-toggle="modal" data-target="#modalVeryGood" style="cursor: pointer;">
                                    <img src="assets/images/good.png" class="" style="width: 330px; height: 270px;"> 
                                </a>
                            </td>
                            <td class="text-center">
                                <a data-toggle="modal" data-target="#modalTooBad" style="cursor: pointer;">
                                    <img src="assets/images/dislike.jpg" class="" style="width: 270px; height: 260px;">
                                </a>

                            </td>
                        </tr>
                        <tr>
                            <td class="text-center" style="padding-right: 150px">
                                <h4 id="veryGood"><strong>ดีมาก</strong></h4>
                            </td>
                            <td class="text-center">
                                <h4 id="tooBad"><strong>ไม่ดีเลย</strong></h4>
                            </td>
                        </tr>
                    </table>
                </center>
            </div>
        </div>

        <?php include 'modals/tooBadModal.php'; ?>
        <?php include 'modals/verygoodModal.php'; ?>
        <?php include 'modals/configModal.php'; ?>
        <?php include 'footer.php'; ?>

    </body>
</html>
