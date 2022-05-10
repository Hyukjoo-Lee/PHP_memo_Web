<!DOCTYPE html>
<html>

<head>
    <title>php-memo login </title>
</head>

<body>
    <?php require_once("inc/header.php"); ?>
    <h1>Login</h1>
    <form method="POST" action="login.post.php">
        <p>
            ID(EMAIL) :
            <input type="text" name="login_id" />
        <p>
        <p>
            PASSWORD :
            <input type="password" name="login_pw" />
        <p>
        <p><input type="submit" value="Login"></p>
    </form>
</body>

</html>