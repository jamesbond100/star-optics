<?php 

session_start();
 
include '../include/connection.php';

$cust_id = $_GET['id'];
$customer_q = mysqli_query($con,"SELECT * FROM customer_details WHERE cus_id = '$cust_id'");
$customer = mysqli_fetch_assoc($customer_q);
$oth = 1;
?>
<head>
<link href="../main.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../main.js"></script>
<script type="text/javascript" src="../include/javascript/jquery-1.9.1.js"></script>
<script src="customer.js"></script>
<title>Edit Customer</title>

<style>
#c {
    margin-left: 10%;
    margin-top: 20%;
    margin-right: 10%;
}

#table tr td {
	padding-right:10px;
}

*{
box-sizing: border-box;
}

.data-div {
display: flex;
}

/* Create two equal columns that sits next to each other */
.column {
flex: 50%;
padding: 5px;
}

td{
 padding: 2.8px;
 text-align: right;
}

.fieldset-side{
      -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    margin:0;
    float: left;
}


  .back-button{
    display: inline-block;
      padding: 10px 20px;
      font-size: 20px;
      cursor: pointer;
      text-align: center;
      text-decoration: none;
      outline: none;
      color: #fff;
      background-color: red;
      border: none;
      border-radius: 15px;
      box-shadow: 0 9px #999;
}
.back-button:hover {background-color: brown}

.back-button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}


.save-btn{
    display: inline-block;
      padding: 10px 20px;
      font-size: 20px;
      cursor: pointer;
      text-align: center;
      text-decoration: none;
      outline: none;
      color: #fff;
      background-color: #4CAF50;
      border: none;
      border-radius: 15px;
      box-shadow: 0 9px #999;
}
.save-btn:hover {background-color: #3e8e41}

.save-btn:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
</style>
</head>

<body>

<div class="main-div">
  <div class="menu-div" id="menu-div">
    <input type="button" class="menu-button" value="Home" onclick="location.href='../home.html'">
    <input type="button" class="menu-button" value="Sales" onclick="location.href='../sales/'">
    <input type="button" class="menu-button selected-button" value="Customer" onclick="location.href='../customer/'">
    <input type="button" class="menu-button" value="Inventory" onclick="location.href='../inventory/'">
  <input type="button" class="menu-button" value="Supplier" onclick="location.href='../supplier/'"></div>

    <div class="clock">
  <iframe src="http://free.timeanddate.com/clock/i6kkoal7/n122/tlmy/fn2/ftb/bo3/tt0/td1/ts1" frameborder="0" width="258" height="20"></iframe>
</div>

<div class="data-div">
  <div class="column" style="border-right: 2px solid red;">
    <h3><p><b><u>Edit Customer</u></b></p></h3>
    <form action="action.php" method="POST">
      <input type="hidden" name="cus_id" value="<?php echo $customer['cus_id'];?>">
        <fieldset><legend><h4>Personal Information</h4></legend>
              <table border="0" cellspacing="0" cellpadding="1" style="font-family:Arial, Helvetica, sans-serif; font-size:18px;padding-top:10px;padding-left:15px;padding-bottom:15px;">
              <tr height="30">
              <td>Customer Name</td>
              <td>:</td>
              <td><input class="input" type="text" name="full_name" id="full_name" size="47" value="<?php echo $customer['full_name'];?>" autocomplete="off" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" required/>
            </td>
            </tr>

            <tr height="30">
              <td>Customer Address</td>
              <td>:</td>
              <td>
                  <textarea class="input" name="address" id="address" rows="3" cols="50" style="width: 305px; height: 70px;resize:none;" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();"><?php echo $customer['address'];?></textarea>
              </td>
            </tr>
            
            <tr height="30">
              <td>Customer Contact no.</td>
              <td>:</td>
              <td>
                <input size="47" class="input" type="text" name="phone_no" value="<?php echo $customer['phone_no'];?>" id="phone_no" class="tel" autocomplete="off"/>
            </td>
            </tr>
            </table>
           </fieldset> 
        
           <fieldset><legend><h4>Vision Information</h4></legend>
            <table>
              <tr><td><b><u>Right Vision</u></b></td></tr>
              <tr align="center">
              <td><b></b></td>
              <td>Sph</td>
              <td>Cyl</td>
              <td>Axis</td>
              <td>Vision</td>
            </tr>

            <tr>
              <td>Distance</td>
              <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="right_d_sph" id="right_d_sph" value="<?php echo $customer['right_d_sph'];?>"/></td>

              <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="right_d_cyl" id="right_d_cyl" value="<?php echo $customer['right_d_cyl'];?>"/></td>

              <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="right_d_axis" id="right_d_axis" value="<?php echo $customer['right_d_axis'];?>"/></td>

              <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="right_d_vision" id="right_d_vision" value="<?php echo $customer['right_d_vision'];?>"/></td>
            </tr>

            <tr>
              <td>Reading</td>
              <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="right_r_sph" id="right_r_sph" value="<?php echo $customer['right_r_sph'];?>"/></td>

              <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="right_r_cyl" id="right_r_cyl" value="<?php echo $customer['right_r_cyl'];?>"/></td>

              <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="right_r_axis" id="right_r_axis" value="<?php echo $customer['right_r_axis'];?>"/></td>

              <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="right_r_vision" id="right_r_vision" value="<?php echo $customer['right_r_vision'];?>"/></td>
            </tr>
            <tr><td></td></tr>
            <tr><td></td></tr>
            <tr><td></td></tr>

            <tr><td><b><u>Left Vision</u></b></td></tr>
            <tr align="center">
            <td><b></b></td>
            <td>Sph</td>
            <td>Cyl</td>
            <td>Axis</td>
            <td>Vision</td>
          </tr>

          <tr>
            <td>Distance</td>
             <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="left_d_sph" id="left_d_sph" value="<?php echo $customer['left_d_sph'];?>"/></td>

            <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="left_d_cyl" id="left_d_cyl" value="<?php echo $customer['left_d_cyl'];?>"/></td>

            <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="left_d_axis" id="left_d_axis" value="<?php echo $customer['left_d_axis'];?>"/></td>

            <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="left_d_vision" id="left_d_vision" value="<?php echo $customer['left_d_vision'];?>"/></td>
          </tr>

          <tr>
            <td>Reading</td>
            <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="left_r_sph" id="left_r_sph" value="<?php echo $customer['left_r_sph'];?>"/></td>

            <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="left_r_cyl" id="left_r_cyl" value="<?php echo $customer['left_r_cyl'];?>"/></td>

            <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="left_r_axis" id="left_r_axis" value="<?php echo $customer['left_r_axis'];?>"/></td>

            <td><input class="input" type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="left_r_vision" id="left_r_vision" value="<?php echo $customer['left_r_vision'];?>"/></td>

          </tr>
            </table>

           </fieldset>
  </div>
  
  <div class="column">
    <fieldset class="fieldset-side" style="width: 30%;"><legend><h4>Decenter</h4></legend>
      <table>
        <tr>
          <td>In</td>
          <td>Out</td>
        </tr>

        <tr>
          <td><input type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="decenter_in" id="decenter_in" autocomplete="off" value="<?php echo $customer['decenter_in']; ?>"/></td>

          <td><input type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="decenter_out" id="decenter_out" autocomplete="off" value="<?php echo $customer['decenter_out']; ?>"/></td>
        </tr>
      </table>
    </fieldset>

    <fieldset  class="fieldset-side" style="width: 30%;"><legend><h4>Segment Height</h4></legend>
      <table>
        <tr>
           <td>RV</td>
            <td>LV</td>
        </tr>

        <tr>
          <td><input type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="seg_height_rv" id="seg_height_rv" autocomplete="off" value="<?php echo $customer['seg_height_rv']; ?>"/></td>

            <td><input type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="seg_height_lv" id="seg_height_lv" autocomplete="off" value="<?php echo $customer['seg_height_lv']; ?>"/></td>
        </tr>
      </table>
    </fieldset>

    <fieldset style="width: 30%;"><legend><h4>Base</h4></legend>
      <table>
        <tr>
          <td>RV</td>
            <td>LV</td>
        </tr>

        <tr>
          <td><input type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="base_rv" id="base_rv" autocomplete="off" value="<?php echo $customer['base_rv']; ?>"/></td>

          <td><input type="text" size="3" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" name="base_lv" id="base_lv" autocomplete="off" value="<?php echo $customer['base_lv']; ?>"/></td>
        </tr>
      </table>
    </fieldset>

    <fieldset><legend><h4>Extra Information</h4></legend>
      <table>
        <td>Lense</td>
        <td>:</td>
      <td>
        <input class="input" size="47" type="text" name="lense" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();" value="<?php echo $customer['lense'];?>" id="lense" autocomplete="off" />
    </td>
   </tr>

     <tr>
      <td>Frame</td>
      <td>:</td>
      <td>
        <input type="text" size="47" name="frame" id="frame" value="<?php echo $customer['frame'];?>" onblur="this.value=this.value.toUpperCase();" onkeyup="this.value=this.value.toUpperCase();"/>
      </td>
    </tr>

    <tr height="30">
      <td>Remarks</td>
      <td>:</td>
      <td>
        <textarea style="width: 304px; height: 65px;" type="text" class="input" name="remarks" id="remarks" rows="3" cols="50" ><?php echo $customer['remarks'];?></textarea>
    </td>
   </tr>
      </table>
    </fieldset>

      <table border="0" cellspacing="0" cellpadding="4" align="center">
        <tr>
      <td align="right">
        <input type="button" class="back-button" value="Back" width="93" height="25" onclick="window.location.href='index.php'"/>
              &nbsp;
        <input type="submit" class="save-btn" value="Save" width="93" height="25" name="submit_edit_cus"/>
      </td>
        </tr>
      </table>
    </form>
  </div>
  
</div>

</div>
</body>
<script type="text/javascript">
    footnoteLoad();
</script>
</html>