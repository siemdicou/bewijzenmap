<html>
<head>
    <title>User Login Form</title>
</head>
<body>
<h4>User Login Form</h4>
<ul>
    <li>stop wat usergegevens in de database</li>
    <li>daarna probeer de volgende code bij user name<br>
        qwerty' OR 1=1 -- </li
</ul>
<?php
if (!isset($_POST['submit'])){
    ?>
    <!-- The HTML login form -->
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        Username: <input type="text" name="username" /><br />
        Password: <input type="password" name="password" /><br />

        <input type="submit" name="submit" value="Login" />
    </form>
<?php
} else {
    require_once("db_const.php");

    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    # check connection
    if ($mysqli->connect_errno) {
        echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
        exit();
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * from users WHERE username LIKE '{$username}' AND password LIKE '{$password}' LIMIT 1";
    $result = $mysqli->query($sql);
    if (!$result->num_rows == 1) {
        echo "<p>Invalid username/password combination</p>";
    } else {
        echo "<p>Logged in successfully</p>";
        // do stuffs
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo "Username =". $row['username']."<br> e-mail = ". $row['email'] . "<br>";
        }
    }
}
?>
<!--http://w3epic.com/php-mysql-login-system-a-super-simple-tutorial/-->
</body>
</html>