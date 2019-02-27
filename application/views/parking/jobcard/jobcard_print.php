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
$company = array();
// print_r($list);
$type = (array)json_decode($list->type);
$item = (array)json_decode($list->item);
$price = (array)json_decode($list->price);
$quantity = (array)json_decode($list->quantity);
$company = (array)json_decode($list->company);
$service = (array)json_decode($list->service);
$s_price = (array)json_decode($list->s_price);
$s_quantity = (array)json_decode($list->s_quantity);
$s_desc = (array)json_decode($list->s_desc);
foreach ($s_quantity as $key => $value) {
  $s_quantity[$key] = $value;
}
foreach ($s_price as $key => $value) {
  $s_price[$key] = $value;
}
foreach ($s_desc as $key => $value) {
  $s_desc[$key] = $value;
}
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
<table style="width:50mm;" border="0">
  <!--  <tr>
	  <td colspan="2" align="center"><strong style="font-size:10px;">VEHICLE SLIP</strong></td>
    </tr> -->
 <!--  <tr>
    <td align="left" style="width:50%;">Print Date/Time</td>
    <td align="left" style="width:50%;"><?=$list->date ?> <br /><?=$list->time ?></td>
  </tr> -->
  <!-- <tr>
    <td colspan="2" style="height:10px;"></td>
  </tr>  -->
  <tr>
    <td colspan="2" align="center"><img src="<?=base_url() ?>assets/images/logo.png" style="height: 43px;" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><strong style="font-size:12px;">Al DANA STATION</strong></td>
  </tr>
  <td colspan="2" >
     <center>  
          P.O Box:6033, Dubai-U.A.E,<br>Tel:(04) 2635200,Mobile:050-6760257<br>   
          www.aldanaservicestation.com  </center>
      <center> <p>TRN: 100375546700003 </p> </center>
  </td>
  </tr>
  <tr>
  	<td colspan="2"><hr /></td>
  </tr>
  <tr>
    <td><strong>Invoice #:</strong></td>
    <td><?=$list->ref_no ?></td>
  </tr>
  <tr>
    <td><strong>Invoice Ref No. #:</strong></td>
    <td><?=$list->invoice_ref ?></td>
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
    <td><strong>TRN No:</strong></td>
    <td><?=$list->reg_no ?></td>
  </tr>
  <tr>
    <td><strong>Payment Method. #:</strong></td>
    <td><?=paymentModeName($list->pay_type) ?></td>
  </tr>
  <?php
  $i=0;
  
  foreach ($item as $key => $value)
   {  
      $items[$key] = $value;
   }
   foreach ($company as $key => $value)
   {  
      $companys[$key] = $value;
   }
   foreach ($price as $key => $value)
   {  
       $prices[$key] = $value;
   }
   foreach ($quantity as $key => $value)
   {  
      $quantitys[$key] = $value;
   }
  
  foreach ($type as $key => $value)
   { 
       
   ?>
  <tr>
    <td colspan="2"><center><strong><?=servicetype($value) ?></strong></center></td>
  </tr>
  <tr>
    <td><strong><?=comapny_name($companys[$key]) ?>  </strong></td>
    <td><strong><?=filterservice($items[$key]) ?></strong></td>
  </tr>
  <tr>
    <td></td>
    <td><?=$quantitys[$key] ?>. Qty -<?=$prices[$key] ?> </td>
  </tr>
<?php $i++; } ?>
<?php // for($i=0;$i<$ser_count;$i++) { ?>
 <?php foreach ($service as $key => $value) {

  ?> 
  <tr>
<td><strong><?=$s_desc[$key] ?></strong> </td>
<td> <?=$s_quantity[$key] ?>. Qty - <?=$s_price[$key] ?></td>
  </tr>
 
<?php } ?>
<?php if(!empty($flush_oil) && !empty($f_quantity) && !empty($f_price))
        {  ?>
  <tr>
    <td><strong><?=flushing($flush_oil) ?></strong></td>
    <td><?=$f_quantity ?>. Qty - <?=$f_price ?></td>
  </tr>      
  
  <?php  }?> 
<?php if(!empty($wash_type) && !empty($w_quantity) && !empty($w_price))
        {  ?>
   <tr>
    <td colspan="2"> <center><strong><?="Carwash" ?></strong></center> </td>
  </tr> 
  <tr>
    <td><strong><?=servicecate($vehicletype) ?> - <?=washing($wash_type) ?></strong></td>
    <td><?=$w_quantity ?>. Qty - <?=$w_price ?></td>
  </tr>
  <?php  } ?> 
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
  <tr>
    <td colspan="2"><strong>Pay By</strong></td>
  </tr>
  <tr>
    <td colspan="2"> </td>
  </tr>
  <?php // if($data->mode_of_payment==8) { 
    $pay  = paymentstatus($list->id);
    // echo $this->db->last_query(); 
   // print_r($pay);
    $payment = $pay['paytype'];
    $amount = $pay['amount'];
    // print_r($payment);
    foreach ($payment as $key => $value) {
   ?>
  <tr>
    <td><strong><?=paymentModeName($value) ?> : </strong></td>
    <td><strong><?=$amount[$key] ?></strong></td>
  </tr>
 <?php } // }  ?>
  <tr>
    <td align="left" style="width:50%;">Print Date/Time</td>
    <td align="left" style="width:50%;"><?=$list->date ?>--<?=$list->time ?></td>
  </tr>
  <!-- 
  <tr>
  	<td colspan="2" align="center"><strong style="font-size:12px;">Vehicle #: <%=objRs("vehicleNumber")%></strong></td>
  </tr>
  <tr>
    <td colspan="2" style="hight:100px;" align="left">
      <center> <img id="barcode2" /> </center><!-- <img id="sku<%=objRs("id")%>"/> -->
          <script>
             // JsBarcode("#barcode2", "<?php echo $list->ref_no ?>", {
            //          format:"CODE128",
            //          displayValue:true,
            //          width:1,
            //          height:40,
           //           fontSize:14
            //           });
          </script>
    <!-- </td>
  </tr> -->
 
  
  <tr>
  	<td colspan="2" align="center">Thank You Visit Us Again</td>
  </tr>
  <tr>
  <td colspan="2" align="center"><button type="button" id="proceed" onclick="javascript:window.location.href='<?=$_SERVER['HTTP_REFERER']?>'" style="display: none;    background: #26B99A;
    border: 1px solid #169F85; color:white; height:40px; width:80px;">&laquo; Back</button></td>
  </tr>
</table>
<script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.js"></script>
<script>
	$('#proceed').delay(15000).show(0);
</script>
</body>
</html>