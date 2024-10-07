<?php
include "header.php";
include "../user/connection.php";
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="purchase_master.php" title="Go to Add New Products" class="tip-bottom"><i
                    class="icon-home"></i>
                Add New Purchase</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Add New Purchase</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form name="form1" action="" method="post" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">Select a Company:</label>
                                <div class="controls">
                                    <select class="span11" name="companyname" id="companyname" onchange="select_company(this.value)">
                                        <option value="">Select</option>
                                        <?php 
                                        $res = mysqli_query($link, "SELECT * FROM company_name");
                                        while($row = mysqli_fetch_array($res)) {
                                            echo '<option>';
                                            echo $row['companyname'];
                                            echo '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>


                                <div class="control-group">
                                <label class="control-label">Select Product Name:</label>
                                <div class="controls" id="productname_div">
                                        <select class="span11">
                                            <option>select</option>
                                        </select>
                                </div>
                                </div>

                                <div class="control-group">
                                <label class="control-label">Select a Unit:</label>
                                <div class="controls" id="unit_div">
                                    <select class="span11" >
                                      <option>select</option>
                                    </select>
                                </div>
                                </div>

                                
                                <div class="control-group">
                                <label class="control-label">Enter Packing Size:</label>
                                <div class="controls" id="packingsize">
                                <select class="span11" name="packingsize">
                                      <option>select</option>
                                    </select>
                                </div>
                                </div>

                                <div class="control-group">
                                <label class="control-label">Enter Quantity:</label>
                                <div class="controls">
                                <input type="text" name="quantity" value="0" class="span11">
                                </div>
                                </div>  

                                
                                <div class="control-group">
                                    <label class="control-label">Enter Price:</label>
                                    <div class="controls">
                                        <input type="text" name="price" value="0" class="span11">
                                    </div>
                                </div>    
                                    
                                <div class="control-group">
                                  <label class="control-label">Select Party Name:</label>
                                    <div class="controls">
                                         <select class="span11" name="partyname">
                                            <option>select</option>
                                         </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                <label class="control-label">Select Purchase Type:</label>
                                <div class="controls">
                                <select class="span11" name="purchase_type">
                                        <option>cash</option>
                                        <option>debit</option>
                                </select>
                                </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Enter Price:</label>
                                    <div class="controls">
                                        <input type="number" name="expiry_date" value="0" class="span11" placeholder="YYYY-MM-dd" required pattern="\d{4}-\d{2}-\d{2}">
                                </div>
                                </div>
                                    
                    <div class="form-actions">
                        <button type="submit" name="submit1" class="btn btn-success">Purchase Now</button>
                    </div>

                    <div class="alert alert-success" id="success" style="display: none;">
                        Purchase Inserted Successfully !!!
                    </div>

                    </form>
                </div>

               

            </div>

        </div>
    </div>

</div>

<script type="text/javascript"> 
function select_company(company_name){
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange =function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            document.getElementById("productname_div").innerHTML=xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET","forajax/load_product_using_company.php?company_name="+company_name,true);
    xmlhttp.send();
}


function select_product($productname, $companyname){
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange =function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            document.getElementById("unit_div").innerHTML=xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET","forajax/load_unit_using_products.php?productname="+productname+"company_name="+company_name,true);
    xmlhttp.send();
    alert($productname + "==" + $companyname);
}

</script>

<?php
if (isset($_POST['submit1'])) {
    $count = 0;
    $res = mysqli_query($link, "SELECT * FROM products 
    WHERE companyname = '$_POST[companyname]', productname = ''$_POST[productname]' , unit = ''$_POST[unitname]',  packingsize = ''$_POST[packingsize]'");

    $count = mysqli_num_rows($res);

    if ($count > 0) {
        ?>
        <script type="text/javascript">
            document.getElementById("success").style.display = 'none';
            document.getElementById("error").style.display = 'block';
        </script>
        <?php
    } else {
         mysqli_query($link, "INSERT INTO products
        VALUES(NULL, '$_POST[companyname]', '$_POST[productname]', '$_POST[unitname]', '$_POST[packingsize]')") or die(mysqli_error($link));
        
      
        ?>
        <script type="text/javascript">
            document.getElementById("error").style.display = 'none';
            document.getElementById("success").style.display = 'block';
            setTimeout(function(){
            window.location.href = window.location.href;
            },3000)
        </script>
        <?php

    }
}
?>

<!--end-main-container-part-->

<?php include "footer.php";