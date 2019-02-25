<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="user-scalable=no, width=device-width, target-densitydpi=device-dpi">
	<link rel="stylesheet" href="<?=base_url() ?>assets/css/hdpi.css">

<title>Print</title>
<script src="<?=base_url() ?>assets/js/JsBarcode.all.js"></script>
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

<body>
<table width="100%" border="0">
  <tr>
	<td colspan="3" align="center"><strong style="font-size:12px;">VEHICLE OUTSLIP</strong></td>
  </tr>
  <tr>
    <td align="left" style="width:33%;">Print Date</td>
    <td align="center" style="width:33%;">Customer</td>
    <td align="right" style="width:33%;">Print Time</td>
  </tr>
  <tr>
    <td align="left">17-6-2018</td>
    <td align="center"></td>
    <td align="right">5:07:03 PM</td>
  </tr>
  <tr>
    <td colspan="3" style="height:10px;"></td>
  </tr>  
  <tr>
    <td colspan="3" align="center"><strong style="font-size:24px;">Farid Car Parking</strong></td>
  </tr>
  <tr>
    <td colspan="3" align="center">Mobile: +971 55 430 9087</td>
  </tr>
  <tr>
  	<td colspan="3"><hr /></td>
  </tr>
  <tr>
    <td align="center">Invoice #: <br />HO-INV-00348</td>
    <td align="center">Date In: <br />14-6-2018</td>
    <td align="center">Time In: <br />11:44:05 PM</td>
  </tr>
  
  
  
  <tr>
  	<td colspan="3"><hr /></td>
  </tr>
  <tr>
    <td align="center">Parking Time: <br />1,127:59</td>
    <td align="center">Date Out: <br />31-6-2018</td>
    <td align="center">Time Out: <br />11:43:05 PM</td>
  </tr>
  <tr>
  	<td colspan="3" align="center"><strong style="font-size:12px;">Vehicle #: 456456</strong></td>
  </tr>
  <tr>
  	<td colspan="3"><hr /></td>
  </tr>
  <tr>
  	<td colspan="3"><strong style="font-size:16px;">Amount: 705.00</strong></td>
  </tr>
  <tr>
  	<td colspan="3"><strong style="font-size:16px;">VAT Amount Included: 35.25</strong></td>
  </tr>
  <tr>
  	<td colspan="3"><hr /></td>
  </tr>
  <tr>
  	<td colspan="3" style="hight:50px;" align="center"><img id="sku367"/>
		<script>JsBarcode("#sku367", "HO-INV-00348", {
			format:"CODE128",
			displayValue:true,
			width:2,
			height:25,
			fontSize:10
		});</script></td>
  </tr>
  <tr>
  	<td colspan="3" align="center"><hr />For Every 1 HR 10 AED,  Park At Your Own Risk<br />Thank You Visit Us Again</td>
  </tr>
  <tr>
  	<td colspan="3" align="center"><button type="button" id="proceed" onclick="javascript:window.location.href='vehicleIn.asp'" style="display: none;    background: #26B99A;
    border: 1px solid #169F85; color:white; height:40px; width:80px;">&laquo; Back</button></td>
  </tr>
</table>
<script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.js"></script>
<script>
	$('#proceed').delay(10000).show(0);
</script>
</body>
</html>
