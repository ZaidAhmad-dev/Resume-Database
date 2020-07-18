
<?php
require_once "pdo.php";
if (isset($_POST['user_id'])) {
    # code...

    $sql = "DELETE from users WHERE user_id = :zip";
    echo "<pre>\n$sql\n</pre>";
    $stmt = $pdo->prepare($sql);
    $stmt -> execute(array(':zip'=>$_POST['user_id']));
}

?>

<p>Delete a User</p>
<form action="" method="post">
<p>ID to Delete: <input type="text" name="user_id" id=""></p>
<input type="submit" value="Delete">
</form>