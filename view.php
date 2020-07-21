<?php
require_once "pdo.php";
session_start();

if (! isset($_GET['profile_id']) ) {
    $_SESSION['error'] = "Missing profile_id";
    header("Location: $url/index.php");
    return;
}

$sql = "SELECT * FROM profile WHERE profile_id = :profile_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(array(":profile_id" => $_GET['profile_id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($row === false ) {
    $_SESSION['error'] = 'Bad value for profile_id';
    header('Location: index.php');
    return;
}

$fn = htmlentities($row["first_name"]);
$ln = htmlentities($row["last_name"]);
$em = htmlentities($row["email"]);
$he = htmlentities($row["headline"]);
$su = htmlentities($row["summary"]);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Zaid Ahmad</title>
</head>
<body>
    <h1>Profile information</h1>
    <p>First Name: <?php echo $fn ?></p>
    <p>Last Name: <?php echo $ln ?></p>
    <p>Email: <?php echo $em ?></p>
    <p>
        Headline:
        <br>
        <?php echo $he ?>
    </p>
    <p>
        Summary:
        <br>
        <?php echo $su ?>
    </p>
    <a href="index.php">Done</a>
</body>
</html>