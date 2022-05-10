<?php
require_once("inc/db.php");

// Set values if each params are passed from rigist
$login_id = isset($_POST['login_id']) ? $_POST['login_id'] : null;
$login_pw = isset($_POST['login_pw']) ? $_POST['login_pw'] : null;
$login_name = isset($_POST['login_name']) ? $_POST['login_name'] : null;

// Check params
if ($login_id == null || $login_pw == null || $login_name == null) {
    header("Location: /regist.php");
    exit();
}

// Check whether id is existing or not
$member_count = db_select("select count(member_id) cnt from tbl_member where login_id = ?", array($login_id));
if ($member_count && $member_count[0]['cnt'] == 1) {
    header("Location: /regist.php");
    exit();
}

// Hashing hassword
$bcrypt_pw = password_hash($login_pw, PASSWORD_BCRYPT);

// Store data
db_insert(
    "insert into tbl_member (login_id, login_name, login_pw) values (:login_id, :login_name, :login_pw )",
    array(
        'login_id' => $login_id,
        'login_name' => $login_name,
        'login_pw' => $bcrypt_pw
    )
);

// Move to login page
header("Location: /login.php");
