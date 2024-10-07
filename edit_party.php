<?php  
include "header.php";
include "../user/connection.php";
$id = $_GET["id"];
$firstname = "";
$lastname = "";
$businessname = "";
$contact = "";
$address = "";
$city = "";
$res = mysqli_query($link, "SELECT * FROM party_info WHERE id =  '$id'");
while($row=mysqli_fetch_array($res))
{
    $firstname = $row["firstname"];
    $lastname = $row['lastname'];
    $businessname = $row['businessname'];
    $contact = $row['contact'];
    $address = $row['address'];
    $city = $row['city'];
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
                        <h5>Edit Party</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form name="form1" action="" method="post" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">First Name :</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="First name" name="firstname" value="<?php echo $firstname ?>" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Last Name :</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Last name" name="lastname" value="<?php echo $lastname ?>" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Business Name :</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Businessname" name="businessname" value="<?php echo $businessname ?>" readonly />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Contact</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Enter Contact"
                                        name="contact" value="<?php echo $contact ?>" />
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Address</label>
                                <div class="controls">
                                    <textarea class="span11" 
                                        name="address" > <?php echo  $address ?> </textarea>

                                </div>
                            </div>
                           
                            <div class="control-group">
                                <label class="control-label">City</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Enter City"
                                        name="city" value="<?php echo $city ?>" />
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
    mysqli_query($link, "UPDATE party_info 
    SET firstname = '$_POST[firstname]' , lastname = '$_POST[lastname]', 
    contact = '$_POST[contact]',  address = '$_POST[address]', city = '$_POST[city]' WHERE id = '$id'")
    or die(mysqli_error($link));
    ?>
    <script type="text/javascript">
        document.getElementById("success").style.display = 'block';
        setTimeout(function(){
            window.location = "add_new_party.php";
        },1500)
        </script>
                    <?php 
}
?>
<!--end-main-container-part-->

<?php include "footer.php"; ?>