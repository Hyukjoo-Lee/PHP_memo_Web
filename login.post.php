<?php
require_once("inc/db.php");

// Set values if each params are passed from login
$login_id = isset($_POST['login_id']) ? $_POST['login_id'] : null;
$login_pw = isset($_POST['login_pw']) ? $_POST['login_pw'] : null;

// Check params
if ($login_id == null || $login_pw == null) {
    header("Location: /login.php");
    exit();
}

// Retrieve user data
$member_data = db_select("select * from tbl_member where login_id = ?", array($login_id));

// if there is not data, return login
if ($member_data == null || count($member_data) == 0) {
    header("Location: /login.php");
    exit();
}

// Verify password
$is_match_password = password_verify($login_pw, $member_data[0]['login_pw']);

// If password is incorrect
if ($is_match_password === false) {
    header("Location: /login.php");
    exit();
}

session_start();
$_SESSION['member_id'] = $member_data[0]['member_id'];

// Move to list
header("Location: /list.php");
