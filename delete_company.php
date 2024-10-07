<?php 
include "../user/connection.php";
$id = $_GET["id"];
mysqli_query($link, "DELETE FROM company_name WHERE id = $id")
?>

<script type="text/javascript">
    window.location = "add_company.php";
</script>