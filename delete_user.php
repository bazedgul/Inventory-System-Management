<?php 
include "../user/connection.php";
$id = $_GET["id"];
mysqli_query($link, "DELETE FROM user_register WHERE id = $id")
?>

<script type="text/javascript">
    window.location = "add_new_user.php";
</script>