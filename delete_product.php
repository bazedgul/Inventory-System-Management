<?php 
include "../user/connection.php";
$id = $_GET["id"];
mysqli_query($link, "DELETE FROM products WHERE id = $id")
?>

<script type="text/javascript">
    window.location = "add_products.php";
</script>