<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="user-scalable=no, width=device-width, target-densitydpi=device-dpi">
	<link rel="stylesheet" href="css/hdpi.css">

<title>Print</title>

<script src="<?=base_url() ?>assets/JsBarcode/dist/JsBarcode.all.js"></script>
<script>
    Number.prototype.zeroPadding = function(){
      var ret = "" + this.valueOf();
      return ret.length == 1 ? "0" + ret : ret;
    };
  </script>

<style>
body {
  background: rgb(255,255,255);
  font-family:Tahoma;
  font-size:11px; 
}
</style>
</head>
<?php 
$type = json_decode($list->type);
$item = json_decode($list->item);
$price = json_decode($list->price);
$quantity = json_decode($list->quantity);
$company = json_decode($list->company);
$service = json_decode($list->service);
$s_price = json_decode($list->s_price);
$s_quantity = json_decode($list->s_quantity);
$wash_type = $list->wash_type;
$w_quantity = $list->w_quantity;
$w_price = $list->w_price;
$vehicletype = $list->vehicletype;
$flush_oil = $list->flush_oil;
$f_quantity = $list->f_quantity;
$f_price = $list->f_price;


$count = count($type);
$ser_count = count($service);
?>
<body>
<table style="width:45mm;" border="0">
  <tr>
	<td colspan="2" align="center"><strong style="font-size:14px;">VEHICLE SLIP</strong></td>
  </tr>
  <tr>
    <td align="left" style="width:50%;">Print Date/Time</td>
    <td align="left" style="width:50%;"><?=$list->date ?> <br /><?=$list->time ?></td>
  </tr>
  <tr>
    <td colspan="2" style="height:10px;"></td>
  </tr>  
  <tr>
    <td colspan="2" align="center"><strong style="font-size:18px;">Al DANA SERVICE STATION</strong></td>
  </tr>
 <!--  <tr>
    <td colspan="2" align="center">Location: <%=objLogUser("location")%><br />Mobile: +971 56 369 1304</td>
  </tr> -->
  <tr>
  	<td colspan="2"><hr /></td>
  </tr>
  <tr>
    <td><strong>Invoice #:</strong></td>
    <td><?=$list->ref_no ?></td>
  </tr>
  <tr>
    <td><strong>Car Plate:</strong></td>
    <td><?=$list->car_plate ?></td>
  </tr>
  <tr>
    <td><strong>Customer:</strong></td>
    <td><?=$list->customer_name ?></td>
  </tr>
  <tr>
    <td><center><strong><?="Services" ?></strong></center></td>
  </tr>
  <tr>
    <td colspan="2"><hr /></td>
  </tr>
  <?php for($i=0;$i<$count;$i++) { ?>
  <tr>
    <td colspan="2"><center><strong><?=servicetype($type[$i]) ?></strong></center></td>
  </tr>
  <tr>
    <td><strong><?=comapny_name($company[$i]) ?> </strong></td>
    <td> <strong><?=filterservice($item[$i]) ?> <strong> </td>
  </tr>
  <tr>
    <td><?=$quantity[$i] ?>. Qty</td>
    <td><?=$price[$i] ?></td>
  </tr>
<?php } ?>
<?php for($i=0;$i<$ser_count;$i++) { ?>
  <tr>
    <!-- <td><strong><?=$company[$i] ?></strong></td>
    <td><?=$type[$i] ?></td> -->
<td colspan="2"> <center> <strong><?=servicejob($service[$i]) ?></strong> </center></td>
  </tr>
  <tr>
    <td><?=$s_quantity[$i] ?>. Qty</td>
    <td><?=$s_price[$i] ?></td> 
  </tr>
<?php } ?>
<?php if(!empty($flush_oil) && !empty($f_quantity) && !empty($f_price))
        {  ?>
  <tr>
    <td><strong><?="Flushing Oil" ?></strong></td>
    <td><strong><?=flushing($flush_oil) ?></strong></td>
  </tr>      
  <tr>
    <td><?=$f_quantity ?>. Qty</td>
    <td><?=$f_price ?></td>
  </tr>
  <?php  }?> 
<?php if(!empty($wash_type) && !empty($w_quantity) && !empty($w_price))
        {  ?>
   <tr>
    <td colspan="2"> <center><strong><?="Carwash" ?></strong></center> </td>
  </tr> 
  <tr>
    <td><strong><?=servicecate($vehicletype) ?></strong></td>
    <td><strong><?=washing($wash_type) ?></strong></td>
  </tr>      
  <tr>
    <td><?=$w_quantity ?>. Qty</td>
    <td><?=$w_price ?></td>
  </tr>
  <?php  } ?> 
 
    <tr>
    <td colspan="2"><hr /></td>
  </tr>
   
  </tr>    
  <tr>
    <td><strong>Subtotal:</strong></td>
    <td><strong><?=$list->amount ?></strong></td>
  </tr>
  <?php  if(!empty($list->foc)) {  ?>
  <tr>
    <td><strong>F.O.C(<?=$list->foc_service ?>)</strong></td>
    <td><strong><?=$list->foc ?></strong></td>
  </tr>
  <?php  }  ?>
  <?php  if(!empty($list->discount) ) {  ?>
  <tr>
    <td><strong>Discount</strong></td>
    <td><strong><?=$list->discount ?></strong></td>
  </tr>
  <?php  }  ?>
  <tr>
    <td><strong>Vat:</strong></td>
    <td><strong><?=$list->vat ?></strong></td>
  </tr>

  <tr>
    <td><strong>Total:</strong></td>
    <td><strong><?=$list->total ?></strong></td>
  </tr>
  <tr>
  	<td colspan="2"><hr /></td>
  </tr>
  <!-- 
  <tr>
  	<td colspan="2" align="center"><strong style="font-size:12px;">Vehicle #: <%=objRs("vehicleNumber")%></strong></td>
  </tr>
   -->
  <tr>
  	<td colspan="2" style="hight:100px;" align="left">
      <center> <img id="barcode2" /> </center><!-- <img id="sku<%=objRs("id")%>"/> -->
          <script>
              JsBarcode("#barcode2", "<?php echo $list->ref_no ?>", {
                      format:"CODE128",
                      displayValue:true,
                      width:1,
                      height:40,
                      fontSize:14
                       });
          </script>
		</td>
  </tr>
  <tr>
  	<td colspan="2" align="center">Thank You Visit Us Again</td>
  </tr>
  <tr>
  	<td colspan="2" align="center"><button type="button" id="proceed" onclick="javascript:window.location.href='<?=base_url() ?>'" style="display: none;    background: #26B99A;
    border: 1px solid #169F85; color:white; height:40px; width:80px;">&laquo; Back</button></td>
  </tr>
</table>
<script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.js"></script>
<script>
	$('#proceed').delay(15000).show(0);
</script>
</body>
</html>