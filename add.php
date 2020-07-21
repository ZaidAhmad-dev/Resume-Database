<?php
require_once "pdo.php";
session_start();

$host = $_SERVER['HTTP_HOST'];

//phpself is a function which returns currently executing directory

$route = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$url = "http://$host$route"; 

if (!isset($_SESSION["user_id"])) {
    return("Not logged in");    
}

if (isset($_POST["cancel"])) { 
    header("Location: index.php");
    return;
}

if (isset($_POST["add"])) {
    if (strlen($_POST["first_name"]) < 1
        || strlen($_POST["last_name"]) < 1
        || strlen($_POST["email"]) < 1
        || strlen($_POST["headline"]) < 1
        || strlen($_POST["summary"]) < 1
    ) {
        $_SESSION["error"] = "All fields are required";
        header("Location: add.php");
        die();
    }

    if (strpos($_POST["email"], "@") === false) {
        $_SESSION["error"] = "Email address must contain @";
        header("Location: add.php");
        die();
    }
    $stmt = $pdo->prepare(
        'INSERT INTO Profile
        (user_id, first_name, last_name, email, headline, summary)
        VALUES ( :uid, :fn, :ln, :em, :he, :su)'
    );

    $stmt->execute(
        array(
            ':uid' => $_SESSION['user_id'],
            ':fn' => $_POST['first_name'],
            ':ln' => $_POST['last_name'],
            ':em' => $_POST['email'],
            ':he' => $_POST['headline'],
            ':su' => $_POST['summary']
        )
    );
    $_SESSION["success"] = "Profile added";
    header("Location: index.php");
    die();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Zaid Ahmad</title>
</head>
<body style="font-family: Helvetica">
    <h1>Adding Profile for <?php echo htmlentities($_SESSION["name"]); ?></h1>
    <?php
    if (isset($_SESSION["error"])) {
        echo('<p style="color: red;">' . $_SESSION["error"]);
        unset($_SESSION["error"]);
    }
    ?>
    <form method="post">
        <label>First Name:</label>
        <input type="text" name="first_name">
        <br>
        <label>Last Name:</label>
        <input type="text" name="last_name">
        <br>
        <label>Email:</label>
        <input type="text" name="email">
        <br>
        <label>Headline:</label>
        <br>
        <input type="text" name="headline">
        <br>
        <label>Summary:</label>
        <br>
        <textarea
            name="summary"
            cols="100"
            rows="20"
            style="resize: none;"
        ></textarea>
        <br>
        <input type="submit" name="add" value="Add">
        <input type="submit" name="cancel" value="Cancel">
    </form>
</body>
</html>