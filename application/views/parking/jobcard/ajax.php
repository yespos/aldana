 <script type="text/javascript">
    
 $(document).ready(function(){
  $.fn.change_driver = function(vehicle_no)
  {   
    var  vehicle_no;
    $.post(
           "<?php echo base_url(); ?>vehicle/change_driver",
                  { vehicle_no: vehicle_no },
                  function(data) {
                    // alert(data);
                     // $('#customer_name').val(data);
                      var obj = jQuery.parseJSON(data);
                     $('#customer_name').val(obj.customer_name);
                     $('#customer_id').val(obj.customer_id);
                     $('#mobile').val(obj.mobile);
                     $('#reg_no').val(obj.trn);
                     $('#model').val(obj.vehicleModel);
                     $('#mileage').val(obj.Millage);
                     var customer = obj.customer_name
                     if(customer=='Driver-In-Customer')
                     {
                      $('#credit_customer').val('');
                     }
                     else
                     {
                      $('#credit_customer').val(obj.customer_name);
                     }
                     $('#phone').val(obj.mobile);
                  }
           );
   };

  $.fn.change_services = function(id)
   {
    var vehicleType = $("input[name='vehicleType']:checked").val();
    var service = $("input[name='service']:checked").val();
          $.post( 
                 "<?php echo base_url(); ?>jobcard/change_services",
                  {vehicleType:vehicleType,service:service },
                  function(data) {
                   // alert(data);
                      $('#mainservices').html(data);
                   }
                 );

    }; 


   $.fn.change_company = function(company,type,id)
   {
    // salert(id);
           $.post( 
                 "<?php echo base_url(); ?>jobcard/change_company",
                  { type:type,company:company },
                  function(data){
                   // alert(data);
                      $('#item'+id).html(data);
                      $('#price'+id).val(0);
                      $('#quantity'+id).val(0);
                   }
                 );

    }; 

   $.fn.change_item = function(id,i)
   {
    // alert(id);

          $.post( 
                 "<?php echo base_url(); ?>jobcard/change_item",
                  { id:id },
                  function(data){
                     var obj = jQuery.parseJSON(data);
                  /* if(obj.quantity){  */
                     $('#price'+i).val(obj.price);
                     $('#quantity'+i).val(1);
                     $('#tquantity'+i).val(obj.quantity);
                     $('#u_price'+i).val(obj.price);
                     
                      /*}
                      else
                      {
                        alert('This product are not available');
                      }*/
                    }
                 );
           var customer_id = $('#customer_id').val();
           $.post( 
                 "<?php echo base_url(); ?>jobcard/check_item_offer",
                  { id:id,customer_id:customer_id },
                  function(data){
                      //alert(data)
                  /* var obj = jQuery.parseJSON(data);
                     $('#count').val(obj.customer_name);
                     $('#item').val(obj.mobile);
                  */
                    
                    }
                 );

   };

   $.fn.change_vehicletype = function(id)
   {
    // alert(id);
           $.post( 
                 "<?php echo base_url(); ?>jobcard/change_vehicletype",
                  { id:id },
                  function(data){
                    // alert(data)
                     $('#v_price').val(data);
                     $('#v_quantity').val(1);
                    }
                 );

   };

   $.fn.change_flushing = function(id)
   {
    // alert(id);
             $.post( 
                 "<?php echo base_url(); ?>jobcard/change_flushing",
                  { id:id },
                  function(data){
                     // alert(data)
                     $('#f_price').val(data);
                     $('#f_quantity').val(1);
                     $('#uf_price').val(data);
                    }
                  );

   };

   $.fn.change_CustomerNumber = function(mobile)
   {
    // alert(mobile);
    var phone;
    $.post(
           "<?php echo base_url(); ?>jobcard/change_CustomerNumber",
                  { phone: mobile },
                  function(data) {
                      // alert(data);
                     // $('#customer_name').val(data);
                     var obj = jQuery.parseJSON(data);
                     $('#customer_name').val(obj.customer_name);
                     $('#customer_id').val(obj.customer_id);
                     $('#mobile').val(obj.mobile);
                     $('#reg_no').val(obj.trn_no);
                     $('#credit_customer').val(obj.customer_name);
                     // $('#mobile').val(obj.mobile);
                     // $('#mileage').val(obj.Millage);
                  }
           );

   };

  $.fn.change_washing = function(id)
   {
    // alert(id);
             $.post( 
                 "<?php echo base_url(); ?>jobcard/change_washing",
                  { id:id },
                  function(data){
                     // alert(data)
                     $('#w_price').val(data);
                     $('#w_quantity').val(1);
                     $('#uw_price').val(data);
                    }
                  );

   };

   
   $.fn.change_amount = function(qty,id,tid)
    {
      var amount =parseFloat($("#"+id).val());
      // alert(amount);
      var total = qty * amount;
     // alert(total);
      // $("#"+id).val(total.toFixed(2));
      $("#"+tid).val(total.toFixed(2));
    };

   /* $.fn.change_amount = function(qtyid,id){
       var tqty =parseFloat($("#"+id).val());
       var qty =parseFloat($("#"+qtyid).val());
       if(qty>tqty)
       {
         alert('Available Quantity is ',+tqty);
         $("#"+qtyid).val(1);
       }
    }*/

    $.fn.change_payment = function(val)
    {
      var customer_id = $('#customer_id').val();
      // alert(customer_id);
      if(val==7 && customer_id ==0)
      {
       $('#refModal').modal('show');
      }

      if(val==8)
      {
        $('#payModal').modal('show');
      //  $("#multipaytype").css("display","block");
      }
     /* else{
        $("#multipaytype").css("display","none");
      }*/
    };

   

 });
 </script>

 <script type="text/javascript">
   $(function() {
    $('#search').on('keyup', function() {
        var pattern = $(this).val();
        $('.searchable-container .items').hide();
        $('.searchable-container .items').filter(function() {
            return $(this).text().match(new RegExp(pattern, 'i'));
        }).show();
    });
});
</script>




 <style>
.searchable-container{margin:20px 0 0 0}
.searchable-container label.btn-default.active{background-color:#007ba7;color:#FFF}
.searchable-container label.btn-default{width:90%;border:1px solid #efefef;margin:5px; box-shadow:5px 8px 8px 0 #ccc;}
.searchable-container label .bizcontent{width:100%;}
.searchable-container .btn-group{width:90%}
.searchable-container .btn span.glyphicon{
    opacity: 0;
}
.searchable-container .btn.active span.glyphicon {
    opacity: 1;
}
</style>
