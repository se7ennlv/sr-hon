<?php

if (!empty($_POST["setCookie"])) {
    setcookie("deptID", $_POST["deptID"], time() + (10 * 365 * 24 * 60 * 60));
    setcookie("locaID", $_POST["locaID"], time() + (10 * 365 * 24 * 60 * 60));
} else {
    if (isset($_COOKIE["deptID"])) {
        setcookie("deptID", "");
    }
    if (isset($_COOKIE["locaID"])) {
        setcookie("locaID", "");
    }
}