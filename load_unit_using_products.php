<?php 
include "../../user/connection.php";
$companyname = $_GET["company_name"];
$productname = $_GET["productname"];
$res = mysqli_query($link, "SELECT  * FROM products WHERE companyname = '$companyname' && productname = '$productname'");
?>
<select name="productname" class="span11" id="unit">
    <option>select</option>
<?php 
while($row = mysqli_fetch_array($res))
{
    echo '<option>';
    echo $row["unit"]; 
    echo '</option>';    
}
echo '</select>';
?>