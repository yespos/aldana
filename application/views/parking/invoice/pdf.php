<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>INVOICE</title>
        <link rel="stylesheet" href="style.css" media="all" />

        <style type="text/css">
            @font-face {
                font-family: SourceSansPro;
                src: url(SourceSansPro-Regular.ttf);
            }

            .clearfix:after {
                content: "";
                display: table;
                clear: both;
            }

            a {
                color: #0087C3;
                text-decoration: none;
            }

            body {
                position: relative;
                width: 21cm;  
                height: 29.7cm; 
                margin: 0 auto; 
                color: #555555;
                background: #FFFFFF; 
                font-family: Arial, sans-serif; 
                font-size: 14px; 
                font-family: SourceSansPro;
                /* position:absolute;*/

            }

            header {
                padding: 10px 0;
                margin-bottom: 20px;
                border-bottom: 1px solid #AAAAAA;
            }

            .pad {
                margin-top: 7px;
            }

            .logo {
                float: left;
                margin-top: 8px;
            }

            .logo img {
                height: 70px;
            }

            .company {
                float: right;
                text-align: right;
            }


            .details {
                margin-bottom: 50px;
            }

            .client {
                padding-left: 6px;
                border-left: 6px solid #0087C3;
                float: left;
            }

            #client .to {
                color: #777777;
                font-size: 1.1em;

            }

            #reciver {
                padding-left: 6px;
                border-left: 6px ;
                float: left;
                margin-top: 50px;
                border: 1px;
                border-style: solid;
                padding-left:26px;
                padding-top:10px;
                padding-bottom:26px;
                width: 330px;
                color: #777777;
                font-size: 16px;
            }

            #terms {
                padding-left: 6px;
                border-left: 6px ;
                float: left;
                margin-top: 50px;
                border: 1px;
                border-style: solid;
                padding-left:26px;
                padding-top:10px;
                padding-bottom:26px;
                width:  765px;
                color: #777777;
                font-size: 16px;
            }

            h2.name {
                font-size: 1.4em;
                font-weight: normal;
                margin: 0;
            }

            #invoice1 {
                float: left;
                text-align: left;
                margin-left: 65px;
                margin-top: -20px;
             }

            #invoice1 h1 {
                color: #0087C3;
                font-size: 2.4em;
                line-height: 1em;
                font-weight: normal;
                margin: 0  0 10px 0;
            }
            #invoice1{
                font-size: 1.1em;
                color: #777777;
            }

            #invoice {
                float: right;
                text-align: right;
            }

            #invoice h1 {
                color: #0087C3;
                font-size: 2.4em;
                line-height: 1em;
                font-weight: normal;
                margin: 0  0 10px 0;
            }

            #invoice .date {
                font-size: 1.1em;
                color: #777777;
            }

            .word{
                font-size: 24px;
                color: #000000;
                margin-bottom: 28px;
            }

            #thanks{
                font-size: 2em;
                margin-bottom: 50px;
            }

            #notices{
                padding-left: 6px;
                border-left: 6px solid #0087C3;  
            }

            #notices .notice {
                font-size: 1.2em;
            }
            hr {
                height: 4px;
            }

            @font-face {
                font-family: myFirstFont;
                src: url(<?= base_url() ?>asset/font-awesome/4.5.0/fonts/IDAutomationHC39M.ttf); 
            }

            .barcode {
                font-family: myFirstFont;
            }

            footer {
                color: #777777;
                width: 100%;
                height: 30px;
                /* position: absolute;*/
                bottom: 0;
                border-top: 1px solid #AAAAAA;
                padding: 8px 0;
                text-align: center;
                margin-top: 300px;
            }

            .image
            {
                /* width:500px;
                 height:250px;*/
                background:url(<?= base_url('asset/images/CC.png') ?>);
                background-repeat:no-repeat;
                background-position:center 200px;
                background-size: auto 200px;

                /* border:2px solid;
                 border-color:#CD853F;*/
            }
            .imageAC
            {
                /* width:500px;
                 height:250px;*/
                background:url(<?= base_url('asset/images/AC.png') ?>);
                background-repeat:no-repeat;
                background-position:center 200px;
                background-size: auto 200px;

                /* border:2px solid;
                 border-color:#CD853F;*/
            }

            /*div.transparentbox
              {
              opacity:0.6;
              filter:alpha(opacity=60);
              }*/

            /*div.transparentbox p
              {
              margin:30px 40px;
              font-weight:bold;
              color:#CD853F;
              }*/

    @media print {
        html, body {
           width: 21cm;  
          height: 29.7cm;
        }
        .page {
               
                font-family: SourceSansPro;*/
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: always;
          }

          .page2 {
            page-break-after: always;
          }

        .product-name {
          font-size: 16px;
        }
      }


        </style>
    </head>
    <body>

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
        
        <div class="main_div">
     <?php 
     
      $row = ($invtype == "AC") ? 3 : (($invtype == "RC")  ? 2 : 1);
           $img3 ="AC.png"; $img2 ="RC.png"; $img1 ="CC.png";
           $img = array("CC.png","RC.png","AC.png");
           for ($z=0; $z<$row ; $z++) { 
      ?>
        <div class="page">    
        <table width="100%" cellspacing="0" cellpadding="2" style="background-color:#FFF !important;background-image: url('<?= base_url("asset/images/$img[$z]") ?>'); background-position:center 150px; background-size: auto 200px; background-repeat:no-repeat; font-family:Calibri" >
          <tr>
            <td colspan="2" align="left" valign="top" style="padding-top:5px;"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="Company Logo"  ></td>
            <td width="32%" rowspan="5" valign="top" style="border-bottom: 0px solid #999; border-left: 0px solid #999;"><table cellspacing="0" cellpadding="5">
              <tr>
                <td colspan="2" style="border-bottom: 1px solid #999;"> <strong>Al DANA SERVICE STATION </strong> </td>
              </tr> 
              <tr>
              <td colspan="2"><span id="barcode" class="barcode" style="font-size: 12px;" /> <?php echo "*" . $inv->invoice_no . "*"; ?> </span></td>
              </tr>
              <tr>
             <td colspan="2" ><span style="font-size: 33px; color: #0087C3; "> <?php echo $inv->invoice_no; ?> </span></td>
              </tr>
              <tr>
                <td><strong>Date</strong></td>
                <td style="border-bottom: 1px solid #999;"><strong>:</strong> <?= $inv->invoice_date ?></td>
              </tr>
              <tr>
                <td><strong>Time</strong></td>
                <td style="border-bottom: 1px solid #999;"><strong>:</strong> <?=date('h:m:s')  ?></td>
              </tr>
              <tr>
                <td><strong>Due Date</strong></td>
                <td style="border-bottom: 1px solid #999;"><strong>:</strong> &nbsp;</td>
              </tr>
              <tr>
                <td><strong>P.O.No.</strong></td>
                <td style="border-bottom: 1px solid #999;"><strong>:</strong> &nbsp;</td>
              </tr>
              <tr>
                <td><strong>Order ref.</strong></td>
                <td style="border-bottom: 1px solid #999;"><strong>:</strong> <?=$voucher->ref_no  ?></td>
              </tr>
              
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td colspan="2" style="border-bottom: 1px solid #999;"><strong>Payment Term</strong></td>
              </tr>
              <tr>
                <td colspan="2">
                	<label class="checkbox-inline">
                      <center> <strong style="font-size: 20px; color:#F00 "><?=$inv->pay_type  ?></strong> </center>
                    </label>
                </td>
              </tr>
            </table>
            </td>
          </tr>
          <tr>
            <td><table cellspacing="0" cellpadding="2">
              <tr>
                <td><strong>P.O.Box</strong> </td>
                <td><strong>:</strong>International Airport Road</td>
              </tr>
              <tr>
                <td><strong>Email</strong></td>
                <td><strong>:</strong><?php echo $company[0]->email; ?></td>
              </tr>
              <tr>
                <td><strong>Phone</strong> </td>
                <td><strong>:</strong><?php echo $company[0]->phone; ?></td>
              </tr>
              <tr>
                <td><strong>TRN </strong> </td>
                <td><strong>:</strong><?php echo $company[0]->tan_no; ?></td>
              </tr>
            </table></td>
            <td width="34%" align="center"><img width="100" src="<?php echo base_url('assets/images/logo12.png'); ?>" alt="Company Logo"  ></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        
          <tr>
            <td style="border-right: 1px solid #999; border-top: 0px solid #999;"><h2>INVOICE TO</h2></td>
            <td align="center" style="border-top: 0px solid #999;"><h2 style="border-bottom: 1px solid #999;">TAX INVOICE</h2> <span>CREDIT SALE <br/> PAGE <?=($z+1)."/".$row ?></span></td>
          </tr>
          <tr>
            <td style="border-bottom: 0px solid #999; border-right: 1px solid #999;"><table cellspacing="0" cellpadding="2">
              <tr>
                <td><strong>Name </strong> </td>
                <td><strong>:</strong> <?=!empty($customer->customer_name)?$customer->customer_name:$data[0]->customer_name; ?> </td>
              </tr>
              <tr>
                <td><strong>Address </strong> </td>
                <td><strong>:</strong> <?=$customer->address ?> </td>
              </tr>
              <tr>
                <td><strong>Phone </strong> </td>
                <td><strong>:</strong> <?= !empty($customer->phone)?$customer->phone:"--"; ?></td>
              </tr>
              <tr>
                <td><strong>Fax  </strong> </td>
                <td><strong>:</strong> -- </td>
              </tr>
              <tr>
                <td><strong>Mobile  </strong> </td>
                <td><strong>:</strong> <?= !empty($customer->mobile)?$customer->mobile:$data[0]->phone; ?></td>
              </tr>
              <tr>
                <td><strong>Email  </strong> </td>
                <td><strong>:</strong> <?= !empty($customer->email)?$customer->email:"--"; ?></td>
              </tr>
              <tr>
                <td><strong>TRN </strong> </td>
                <td>: <?= $customer->tan_no; ?></td>
              </tr>
            </table></td>
            <td valign="top" style="border-top: 1px solid #999;border-bottom: 0px solid #999;"><table cellspacing="0" cellpadding="3">
              <tr>
                <td><strong>Deliver to </strong></td>
                <td style="border-bottom: 0px solid #999;"><strong>:</strong> <?= !empty($inv->deliver_to) ? $inv->deliver_to : $data[0]->customer_name; ?> </td>
              </tr>
              <tr>
                <td><strong>Dispatch Details  </strong></td>
                <td style="border-bottom: 0px solid #999;"><strong>:</strong> <?= !empty($inv->dispatch) ? $inv->dispatch : $data[0]->customer_address; ?></td>
              </tr>
              <tr>
                <td><strong> Shipping Charge </strong> </td>
                <td style="border-bottom: 0px solid #999;"><strong>:</strong> <?= !empty($inv->shipping_charge) ? $inv->shipping_charge : 0.00; ?></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3"><table width="100%" cellspacing="0" cellpadding="0" style="border: 1px solid #999">
              <tr>
                <td nowrap align="center" bgcolor="#333333" style="border-bottom: 1px solid #999;border-right: 1px solid #999; padding:10px; color:#FFF;"><strong>Sr No</strong></td>
                <td bgcolor="#333333" nowrap align="center" style="color:#FFF; border-bottom: 1px solid #999;border-right: 1px solid #999; padding:10px;"><strong>Item Code</strong></td>
                <td bgcolor="#EEEEEE" align="center" style="border-bottom: 1px solid #999;border-right: 1px solid #999; padding:10px;"><strong>Description</strong></td>
                <td bgcolor="#EEEEEE" align="center" style="border-bottom: 1px solid #999;border-right: 1px solid #999; padding:10px;"><strong>Unit</strong></td>
                <td  bgcolor="#DDDDDD" align="center" style="border-bottom: 1px solid #999;border-right: 1px solid #999; padding:10px;"><strong>Qty</strong></td>
                <td  bgcolor="#DDDDDD" nowrap align="center" style="border-bottom: 1px solid #999;border-right: 1px solid #999; padding:10px;"><strong>Unit Price</strong></td>
                <td  bgcolor="#DDDDDD" align="center" style="border-bottom: 1px solid #999;border-right: 1px solid #999; padding:10px;"><strong>Discount</strong></td>
                <td  bgcolor="#DDDDDD" align="center" style="border-bottom: 1px solid #999;border-right: 1px solid #999;">
                <table width="100%" cellspacing="0" cellpadding="2">
                  <tr>
                    <td bgcolor="#e30614" colspan="2" align="center" style="color:#FFF; border-bottom: 1px solid #999;"><strong>VAT</strong></td>
                  </tr>
                  <tr>
                    <td bgcolor="#e30614" style="color:#FFF;" align="left"><strong>% Type</strong></td>
                    <td bgcolor="#e30614" style="color:#FFF;" align="right"><strong>Value</strong></td>
                  </tr>
                </table>
                </td>
                <td bgcolor="#e30614" align="center" style="color:#FFF; border-bottom: 1px solid #999; padding:4px;"><strong>Total</strong> </td>
              </tr>
                 <?php
                        $k = 0;
                        $ser_amt = 0;
                        $ser_vat = 0;
                        if (!empty($data)) {
                        $k = 1;
                        ?>
              <tr>
                <td bgcolor="#333333" align="center" style="color:#FFF; border-bottom: 1px solid #999;border-right: 1px solid #999; padding:10px;"><?= $k ?></td>
                <td bgcolor="#333333" align="center" style="color:#FFF; border-bottom: 1px solid #999;border-right: 1px solid #999; padding:10px;"><?=$data[0]->ref_no ?></td>
                <td bgcolor="#EEEEEE" align="center" style="border-bottom: 1px solid #999;border-right: 1px solid #999; padding:10px;">Vehicle Type:- <?= ucfirst(vehicleType($data[0]->vehicle_type)); ?> <br> 
                                Service:-<?= serviceCat($data[0]->service_cat) ?> <br>
                                Instruction:- <?php
                                $instruct = explode(",", $data[0]->instruct);
                                echo $instruct[0] . ",";
                                for ($i = 1; $i < count($instruct); $i++) {
                                    echo instruct($instruct[$i]) . "<br>";
                                }
                                ?><br>
                               <!--  Special Instruction:-
                                <?php
                                if ($data[0]->pws == 1) {
                                    echo "Power Washer Strength - ";
                                    echo (($data[0]->pws_level == 0) ? "Low" :
                                            (($data[0]->pws_level == 50) ? "Medium" : "High"));
                                    echo"<br>";
                                }
                                ?> -->
                                 Service Type:- <?php
                                $type = explode(",", $data[0]->type);
                                for ($i = 0; $i < count($type); $i++) {
                                    echo type($type[$i]) . ", ";
                                } ?>
                 </td>
                <td bgcolor="#EEEEEE" align="center" style="border-bottom: 1px solid #999;border-right: 1px solid #999; padding:10px;">LOT</td>
                <td bgcolor="#DDDDDD" align="center" style="border-bottom: 1px solid #999;border-right: 1px solid #999; padding:10px;">-</td>
                <td bgcolor="#DDDDDD" align="center" style="border-bottom: 1px solid #999;border-right: 1px solid #999; padding:10px;"><?= $data[0]->amount ?></td>
                <td bgcolor="#DDDDDD" align="center" style="border-bottom: 1px solid #999;border-right: 1px solid #999; padding:10px;"><?= !empty($data[0]->discount)?$data[0]->discount:0; ?> </td>
                <td bgcolor="#e30614" align="center" style="color:#FFF; border-bottom: 1px solid #999;border-right: 1px solid #999; padding:10px;"><table width="100%" cellspacing="0" cellpadding="2">
                  <tr>
                    <td bgcolor="#e30614" align="left">5%</td>
                    <td bgcolor="#e30614" align="right"><?= $data[0]->vat; ?></td>
                  </tr>
                </table></td>
                <td bgcolor="#e30614" align="center" style="color:#FFF; border-bottom: 1px solid #999; padding:4px;"><?= $data[0]->total ?></td>
              </tr>
              <?php } ?>
                    <?php $j = $k + 1;
                        $tot = 0;
                        $dis = 0;
                        foreach ($items as $value) { ?>
               <tr>
                <td bgcolor="#333333" align="center" style="color:#FFF; border-bottom: 1px solid #999;border-right: 1px solid #999; padding:10px;"><?php echo $j; ?></td>
                <td bgcolor="#333333" align="center" style="color:#FFF; border-bottom: 1px solid #999;border-right: 1px solid #999; padding:10px;"><?php echo $value->code; ?></td>
                <td bgcolor="#EEEEEE" align="center" style="border-bottom: 1px solid #999;border-right: 1px solid #999; padding:10px;"><?= $value->name ?>
                </td>
                <td bgcolor="#EEEEEE" align="center" style="border-bottom: 1px solid #999;border-right: 1px solid #999; padding:10px;"><?= $value->unit ?> </td>
                <td bgcolor="#DDDDDD" align="center" style="border-bottom: 1px solid #999;border-right: 1px solid #999; padding:10px;"><?php echo $value->quantity; ?></td>
                <td bgcolor="#DDDDDD" align="center" style="border-bottom: 1px solid #999;border-right: 1px solid #999; padding:10px;"><?=$value->gross_total ?></td>
                <td bgcolor="#DDDDDD" align="center" style="border-bottom: 1px solid #999;border-right: 1px solid #999; padding:10px;"><?=$value->discount  ?> </td>
                <td bgcolor="#e30614" align="center" style="color:#FFF; border-bottom: 1px solid #999;border-right: 1px solid #999; padding:10px;"> <table width="100%" cellspacing="0" cellpadding="2">
                   <tr>
                    <td bgcolor="#e30614" align="left">5%</td>
                    <td bgcolor="#e30614" align="right"> <?= $value->tax; ?> </td>
                   </tr>
                </table></td>
                <td bgcolor="#e30614" align="center" style="color:#FFF; border-bottom: 1px solid #999; padding:4px;"><?=($value->gross_total - $value->discount + $value->tax); ?></td>
              </tr>
               <?php
                     $j++;
                     $tot += $value->gross_total;
                     $dis += $value->discount;
                        }
                    $grantotal = $data[0]->total + $sales_data[0]->total -$voucher->pay    
                ?>              
              
              <tr>
                <td colspan="6" valign="top" style="border-right: 1px solid #999; padding:10px;"><table  cellspacing="0" cellpadding="2">
                  <tr>
                    <td><strong>&nbsp;</strong></td>
                    <td><strong>&nbsp;</strong></td>
                  </tr>
                  <tr>
                    <td><strong>&nbsp;</strong></td>
                    <td><strong>&nbsp;</strong></td>
                  </tr>
                  <tr>
                    <td><strong>&nbsp;</strong></td>
                    <td><strong>&nbsp;</strong></td>
                  </tr>
                  <tr>
                    <td><strong>&nbsp;</strong></td>
                    <td><strong>&nbsp;</strong></td>
                  </tr>
                  <!--  <tr>
                    <td><strong>&nbsp;</strong></td>
                    <td><strong>&nbsp;</strong></td>
                  </tr> -->
                  <tr>
                    <td><strong>Currency</strong></td>
                    <td><strong><strong>:</strong> AED</strong></td>
                  </tr>
                  <tr>
                    <td><strong>In Word</strong></td>
                    <td><strong><strong>: </strong>AED <?php $word = numberTowords($grantotal); echo $word = ucfirst($word); ?> Only </strong></td>
                  </tr>
                </table>
                </td>
                <td colspan="3" valign="top" style=""><table width="100%" cellspacing="0" cellpadding="2">
                  <tr>
                    <td width="17%" style="border-bottom: 1px solid #999; padding:4px;"><strong>Total (AED)</strong></td>
                    <td width="1%" style="border-bottom: 1px solid #999; padding:4px;"><strong>:</strong></td>
                    <td width="12%" style="border-bottom: 1px solid #999; padding:4px;" align="right"><strong><?php echo $data[0]->amount + $tot; ?></strong></td>
                  </tr>
                  <tr>
                    <td style="border-bottom: 1px solid #999; padding:4px;"><strong>Discount (AED)</strong></td>
                    <td style="border-bottom: 1px solid #999; padding:4px;"><strong>:</strong></td>
                    <td style="border-bottom: 1px solid #999; padding:4px;" align="right"><strong> <?php echo ($sales_data[0]->discount_value)?$sales_data[0]->discount_value:'0'; ?></strong></td>
                  </tr>
                  <tr>
                    <td style="border-bottom: 1px solid #999; padding:4px;"><strong>VAT (AED)</strong></td>
                    <td style="border-bottom: 1px solid #999; padding:4px;"><strong>:</strong></td>
                    <td style="border-bottom: 1px solid #999; padding:4px;" align="right"><strong> <?php echo $data[0]->vat + $sales_data[0]->tax_value; ?></strong></td>
                  </tr>
                  <tr>
                    <td style="border-bottom: 1px solid #999; padding:4px;"><strong>Net Total (AED)</strong></td>
                    <td style="border-bottom: 1px solid #999; padding:4px;"><strong>:</strong></td>
                    <td style="border-bottom: 1px solid #999; padding:4px;" align="right"><strong><?php echo $grantotal = $data[0]->total + $sales_data[0]->total ?></strong></td>
                  </tr>
                   <tr>
                    <td style="border-bottom: 1px solid #999; padding:4px;"><strong>Advanced Payment (AED)</strong></td>
                    <td style="border-bottom: 1px solid #999; padding:4px;"><strong>:</strong></td>
                    <td style="border-bottom: 1px solid #999; padding:4px;" align="right"><strong><?php echo $voucher->pay ?></strong></td>
                   
                
                  </tr>
                  <tr>
                    <td style=" padding:4px;"><strong>Net Amount (AED)</strong></td>
                    <td style=" padding:4px;"><strong>:</strong></td>
                    <td style=" padding:4px;" align="right"><strong><?php echo $grantotal = $data[0]->total + $sales_data[0]->total - $voucher->pay ?></strong></td>
                    <?php $word = numberTowords($grantotal); $word = ucfirst($word); ?>
                   <!--  <input type="hidden" name="" onload="inword(<?=$word ?>)"> -->
                
                  </tr>
                </table></td>
              </tr>
              
            </table>
            </td>
          </tr>
          
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td style="border-left:6px solid #0087C3;" colspan="3"><div>NOTICE:</div>
            <div class="notice">Please review the "Terms and Condition" associated with this purchase at the back/attached to this documents.</div></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
                <td width="34%" colspan="3">
                <table width="100%" cellspacing="0" cellpadding="2">
                  <tr>
                    <td style="border:1px solid #999; padding:10px;"><table cellspacing="0" cellpadding="5">
                  <tr>
                    <td><strong>RECIEVER'S INFO</strong></td>
                    <td><strong>:</strong>&nbsp;</td>
                  </tr>
                  <tr>
                    <td><strong>Name </strong></td>
                    <td> <strong>: </strong>_______________________</td>
                  </tr>
                  <tr>
                    <td><strong>EID No</strong></td>
                    <td><strong>: </strong> _______________________</td>
                  </tr>
                  <tr>
                    <td><strong>Mobile </strong></td>
                    <td><strong>:</strong> _______________________</td>
                  </tr>
                  <tr>
                    <td><strong>Signature</strong> </td>
                    <td><strong>:</strong> _______________________</td>
                  </tr>
                  <tr>
                    <td><strong>Date</strong></td>
                    <td><strong>: </strong>__________________</td>
                  </tr>
                </table></td>
                    <td align="right"><table cellspacing="0" cellpadding="5">
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="2" align="right"><strong>For Carzone:</strong></td>
                  </tr>
                  <tr>
                    <td><strong>Signature</strong> </td>
                    <td><strong>:</strong> _______________________</td>
                  </tr>
                  
                </table></td>
                  </tr>
                </table></td>
              </tr>
             
            <tr>
             <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
           <tr>
            <td colspan="3">
            <table width="100%">
            <tr>
            <td width="20%"><img width="60"  src="<?php echo base_url('assets/images/logo/1.png'); ?>" alt="Company Logo"  ></td>
            <td width="20%"><img width="60"  src="<?php echo base_url('assets/images/logo/2.png'); ?>" alt="Company Logo"  ></td>
            <td width="20%"><img width="60" src="<?php echo base_url('assets/images/logo/3.png'); ?>" alt="Company Logo"  ></td>
            <td width="20%"><img width="60" src="<?php echo base_url('assets/images/logo/4.png'); ?>" alt="Company Logo"  ></td>
            <td width="20%"><img width="60" src="<?php echo base_url('assets/images/logo/5.jpg'); ?>" alt="Company Logo"  ></td>
            </tr>
            </table>
            </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr> 
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><span text-align="left"><strong>Stamp:</strong> </span></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
      </div> 
         <div class="page">
             <table >
                 <tr>
                <td colspan="2" style="border:1px solid #999; padding:10px;"><table width="100%" cellspacing="0" cellpadding="5">
                  <tr> 
                    <td valign="top" width="50%" align="left"><!-- <?= $company[0]->terms_condition ?> -->
                     <strong>TERMS AND CONDITIONS</strong><br />Invoice,Receipt,Voucher,Services,Item and Eco Wash &nbsp;<br />
                       <strong>Car Wash Terms &amp; Conditions of Entry</strong>
                       <br />*By entering our facility/s you agree to be bound by these terms &amp; conditions.<br />IT IS MANDATORY TO ACCEPT OUR SERVICE &quot;TERMS AND CONDITION&quot; PRIOR TO YOUR VEHICLE&#39;S WASH COMMENCING.<br />DISAGREEMNT TO OUR SERVICE TERMS ANS CONDITIONS RESULTS SERVICE DENIAL.<br />1. By entering our facility, you accept that your vehicle is fit for the purpose and acknowledge that Green &amp; Clean L.L.C. Carwash will not be held responsible for anything that is dislodged, broken or misplaced, inside or outside any vehicle, which has been caused by our normal washing process. This includes but is not limited to the following:<br />&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pre-existing damage whatsoever<br />&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Aerials (including aerials that cannot be completely removed or cannot completely retract),<br />&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Damage to Wipers (Front or Rear)<br />&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Loose or faulty interior trims, buttons, knobs etc.<br />&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Number Plates or Number plate Covers<br />&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Windscreen adhered accessories (E-tags, sat-nav aids, mirrors etc...)<br />&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Any Items left in a Vehicle<br />&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Open windows and sunroofs or faulty seals<br />&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cracked or chipped windows including damage to tint<br />&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Oxidised, chipped, blistered or flaked paintwork<br />&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Any modified or aftermarket internal or external accessories<br />&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Automatic door locks including auto lock vehicles, kill switches or alarms<br />&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bonnet/windshield(front &amp; rear)/headlight protectors, mudflaps, side skirts or bumpers<br />&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Faulty ignitions, flat or damaged batteries, alarm keys, mechanical faults or keys.<br />&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Vehicle graphics<br />&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Scratches or marks to rims.<br />&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Damage caused to vehicles due to your vehicle stopping, braking or turning manually or automatically inside the wash tunnel.<br />The customer&nbsp;accepts full&nbsp;responsibility for any damages or loss incurred to their vehicle whatsoever.<br />Green &amp; Clean appreciate your acknowledgement and acceptance of the above Terms &amp; Conditions prior to entering our car wash facilities</p>    
                    </td>
                    <td valign="top" width="50%" align="right"><!-- <?= $company[0]->ar_terms_condition ?> -->
                        <p>الشروط و الاحكام<br />&nbsp;قرين اند كلين هي شركة &nbsp;خدمات غسيل سيارات مهنية.<br />&nbsp;<br />شروط و أغراض غسيل السيارات</p><p>* عند الدخولك إلى منشأتنا فإنك توافق على الالتزام بهذه الشروط والأحكام.</p><p>&nbsp;وهية ملزمة لقبول خدماتنا &quot;البنود والشروط&quot; قبل تقديم خدمة غسيل سيارتك.<br />عدم الموافقة على شروط الخدمة الخاصة بنا لا يخولنا القيام بعملية الغسيل وسنقوم برفض الخدمة</p><p>. عند دخولك منشأتنا، فإنك تقر بأن سيارتك مناسبة للغرض وبان شركة قرين اند كلين غير مسؤولة عن أي ضرار &nbsp;&nbsp;<br />&nbsp;غير محله، سواء داخل أو خارج &nbsp;المركبة، والتي تنجم عن عملية الغسيل العادية. ويشمل ذلك على سبيل المثال لا الحصر ما يلي:<br />الأضرار الموجودة سابقا<br />الهوائيات (بما في ذلك الهوائيات التي لا يمكن إزالتها بالكامل أو لا يمكن أن تتراجع بالكامل)<br />المساحات الامامية او الخلفية<br />حواف داخلية فضفاضة أو خاطئة ، وأزرار ، ومقابض إلخ<br />لوحة الأرقام او اغطية لوحة الأرقام<br />الملحقات الزجاجية الملتصقة بالزجاج الأمامي (العلامات الإلكترونية ، مساعدات الملاحة عبر الأقمار الصناعية ، المرايا الخ<br />اي العناصر المتبقية في سيارة<br />فتح النوافذ وفتحات السقف أو الأختام المعيبة<br />النوافذ المتصدعة او متكسرة بما في ذلك تلف الصبغ<br />الطلاء المرق او المؤكسد او ذو بقايا<br />او أي ملاحق داخلية او خارجية معدلة&nbsp;<br />أقفال الأبواب التلقائية بما في ذلك السيارات قفل السيارات ، ومفاتيح القتل أو الإنذارات<br />بونيه / الزجاج الأمامي (الأمامي والخلفي) / واقيات المصابيح الأمامية ، الوصلات الطينية ، التنانير الجانبية أو المصدات<br />الإشعال الخاطئ ، البطاريات المسطحة أو التالفة ، مفاتيح الإنذار ، الأخطاء الميكانيكية أو المفاتيح<br />الرسومات على المركبة<br />الأضرار التي تحدث للمركبات بسبب توقف السيارة أو الكبح أو الدوران يدويًا أو تلقائيًا داخل نفق الغسيل&nbsp;<br />الخدوش على الإطارات العلامات على الحافة&nbsp;<br />العميل يقبل المسؤولية الكاملة عن أي أضرار أو خسائر متكبدة على سيارتهم على الإطلاق.<br />تقدر شركة قرين اند كلين اقرارك وقبولك للشروط والاحكام اعلاها قبل الدخول الى مرافق غسيل السيارات الخاصة بنا.<br />&nbsp;</p>

                    </td>
                  </tr>
                </table>
                </td>
              </tr>
            </table>
         </div>
     <?php   }  ?>
       </div>  
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
    function inwords(word)
    {
     // alert("hello");
     $(".word").append("<strong style ='font-family: Arial, sans-serif;font-size: 14px;font-family: SourceSansPro;'>: AED "+word+"</strong>");
        console.log(word);
    }
</script>

<script>
    //window.print();


</script>
</body>
</html>