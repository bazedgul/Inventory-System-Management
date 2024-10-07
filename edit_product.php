<?php  
include "header.php";
include "../user/connection.php";
$id = $_GET["id"];
$companyname = "";
$productname = "";
$unitname = "";
$packingsize = "";

$res = mysqli_query($link, "SELECT * FROM products WHERE id =  '$id'");
while($row=mysqli_fetch_array($res))
{
    $companyname = $row["companyname"];
    $productname = $row["productname"];
    $unitname = $row["unit"];
    $packingsize = $row["packingsize"];
  
}
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            Home</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">

        <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Edit Products</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form name="form1" action="" method="post" class="form-horizontal">

                            <div class="control-group">
                                <label class="control-label">Select Company:</label>
                                <div class="controls">
                                   <select name="companyname" class="span11">
                                    <?php 
                                    $res = mysqli_query($link, "SELECT  * FROM company_name");
                                    while($row=mysqli_fetch_array($res)){
                                        ?>
                                        <option <?php if($row["companyname"] == $companyname ){echo "selected";} ?> >
                                        <?php    
                                        echo $row['companyname'];
                                        echo  "</option>";
                                    }

                                    ?>
                                   </select>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Product Name :</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Product name" name="productname" value="<?php echo $productname ?>" />
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Select Unit:</label>
                                <div class="controls">
                                <select name="unit" class="span11">
                                    <?php 
                                    $res = mysqli_query($link, "SELECT  * FROM units");
                                    while($row=mysqli_fetch_array($res)){
                                        ?>
                                        <option <?php if($row["unit"] == $unitname ){echo "selected";} ?> >
                                        <?php    
                                        echo $row['unit'];
                                        echo  "</option>";
                                    }

                                    ?>
                                   </select>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Packing Size :</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Packing Size" name="packingsize" value="<?php echo $packingsize ?>" />
                                </div>
                            </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" name="submit1" class="btn btn-success">Update</button>
                    </div>

                    <div class="alert alert-success" id="success" style="display: none;">
                        Record Updated Successfully !!!
                    </div>

                    </form>
                </div>

            </div>

        </div>

        </div>

    </div>
</div>

<?php 
if(isset($_POST['submit1'])){
    mysqli_query($link, "UPDATE products 
    SET productname = '$_POST[productname]' , unit = '$_POST[unitname]', packingsize = '$_POST[packingsize]' WHERE id = '$id'")
    or die(mysqli_error($link));
    ?>
    <script type="text/javascript">
        document.getElementById("success").style.display = 'block';
        setTimeout(function(){
            window.location = "add_products.php";
        },1500)
        </script>
                    <?php 
}
?>
<!--end-main-container-part-->

<?php include "footer.php"; ?>