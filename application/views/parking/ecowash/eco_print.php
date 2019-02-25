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
<?php  $category = category_name($list->service); ?>
<body>
<table style="width:45mm;" border="0">
  <tr>
    <td colspan="2" align="center"><img src="<?=base_url() ?>assets/images/logo.png" style="height: 43px;" /></td>
  </tr>
  <tr>
	<td colspan="2" align="center"><strong style="font-size:14px;">VEHICLE IN SLIP</strong></td>
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
   <tr>
    <td colspan="2" >
     <p> Tel:(04) 2635200 Fax:(04) 2635100 Mobile:050-6760257</br>
          P.O Box:6033, Dubai-U.A.E Email:Joepolly727@yahoo.com </br>
          Email:adds95@yahoo.com,www.aldanaservicestation.com 
     </p>
     <p><strong> TRN: 100375546700003 </strong> </p>
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
    <td><strong>Sales Category:</strong></td>
    <td><?=$category ?></td>
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
    <td><strong>Payment Method. #:</strong></td>
    <td><?=paymentModeName($list->pay_type) ?></td>
  </tr>
  <tr>
    <td><strong>Amount:</strong></td>
    <td><?=$list->amount ?></td>
  </tr>
  <tr>
    <td><strong>Vat:</strong></td>
    <td><?=$list->vat ?></td>
  </tr>
  <tr>
    <td><strong>Total:</strong></td>
    <td><?=$list->total ?></td>
  </tr>
  <tr>
  	<td colspan="2"><hr /></td>
  </tr>
  <!-- <tr>
  	<td colspan="2" align="center"><strong style="font-size:12px;">Vehicle #: <%=objRs("vehicleNumber")%></strong></td>
  </tr> -->
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
