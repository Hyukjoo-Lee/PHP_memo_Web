<!DOCTYPE html>
<html>

<head>
    <title>php-memo registration</title>
</head>

<body>
    <?php require_once("inc/header.php"); ?>
    <h1>Registration</h1>
    <form method="POST" action="regist.post.php">
        <p>
            ID :
            <input type="text" name="login_id" />
        <p>
        <p>
            PASSWORD :
            <input type="password" name="login_pw" />
        <p>
        <p>
            NAME :
            <input type="text" name="login_name" />
        <p>
        <p><input type="submit" value="REGISTER"></p>
    </form>
</body>

</html>