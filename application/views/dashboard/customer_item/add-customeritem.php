

<div class="col-sm-12 col-md-8 mx-auto mt-5">
<?php echo validation_errors(); ?>

<form action="" class="item-form" enctype="multipart/form-data" method="post">
<div class="card bg-light">
     <div class="card-header">
          <h4 class="text-center">Create Customer Item</h4>     
     </div>

     <div class="card-body">

     <div class="row">
          <div class="form-group col-sm-6">
               <label for="">Customer </label>
               <input type="text" name="customer" class="form-control" readonly value="<?= $customer[0]["name"]?>"   />
               <input type="hidden" name="customer_id" class="customer_id" value="<?= $customer[0]["customer_id"]?>">
          </div>

          <div class="form-group col-sm-6">
               <label for="">Purchase Order Number</label>
               <input type="text" name="application" class="form-control application" readonly value="<?php echo set_value('application') ? set_value('application') : $purchase_order; ?>"   />
          </div>
          
          
          <div class="form-group exist-customers col-sm-6">
               <label for="">Select Product</label>
               <select name="customer" id="" class="form-control select-product">
                    <option value="">Select Product</option>
                    <?php foreach($products as $product):?>
                         <option value="<?= $product->product_id?>"><?= $product->product_name?></option>
                    <?php endforeach;?>
               </select>
          </div>


          <div class="col-sm-12 row select-item">
          <div class="col-sm-2">
          Select Item
          </div>
          <div class="col-sm-2">
          Quantity
          </div>
          <div class="col-sm-2">
          Unit Price
          </div>
          <div class="col-sm-2">
          Tax rate
          </div>
          <div class="col-sm-2">
          Tax amount
          </div>
          <div class="col-sm-2">
          Total Price
          </div>
               

               
          </div>

           <div class="col-sm-3">
           &nbsp;
           </div>  
           <div class="col-sm-3">
           &nbsp;
           </div>    
           <div class="col-sm-2">
           &nbsp;
           </div>         
          <div class="form-group col-sm-4 total-amount d-none">
                    <label for="">Total amount</label>
                    <input type="text" name="total_amount" class="form-control total_amount"   />
          </div>
         

         
          
     </div>

     </div>
     <div class="card-footer">
          <div class="form-group">
               <input type="submit" class="btn btn-success" value="ADD" />
          </div>
     </div>
</div>
</form>
</div>



<script>
$(document).ready(function(){

     $(".select-product").change(function(){
         var product_id = $(this).find(":selected").val();
          $.ajax({
               url:"<?= base_url()?>ajax/getProductItem",
               method:"post",
               data:{product_id:product_id},
               success:function(status)
               {
                    // console.log(status);
                    // console.log(JSON.parse(status));
                    status = JSON.parse(status);
                    
                    $.each(status,function(key,value){
                         // console.log("testing",value["item_id"]);
               var html = '<div class="form-group exist-customers col-sm-2"><input type="checkbox" disabled data-id="'+value["item_id"]+'" name="customeritem[]" value="'+value["item_id"]+'" class="customeritem item_'+value["item_id"]+'"> '+value["item_name"]+'</div>';
               html+='<div class="form-group col-sm-2"><input type="text" name="quantity[]" data-id="'+value["item_id"]+'" class="form-control quantity quantity_'+value["item_id"]+'"   /></div>';
               html+='<div class="form-group col-sm-2"><input type="text" readonly data-id="'+value["item_id"]+'" name="unit_price[]" class="form-control unit_price unit_price_'+value["item_id"]+'" value="'+value["unit_price"]+'"   /></div>';
               html+='<div class="form-group col-sm-2"><input type="text" readonly data-id="'+value["item_id"]+'" name="tax_rate[]" class="form-control tax_rate_'+value["item_id"]+'" value="'+value["tax_rate"]+'"   /></div>';
               html+='<div class="form-group col-sm-2"><input type="text" readonly data-id="'+value["item_id"]+'" name="tax_amount[]" class="form-control tax_amount_'+value["item_id"]+'"   /></div>';  
               html+='<div class="form-group col-sm-2"><input type="text" readonly data-id="'+value["item_id"]+'" name="total_price[]" class="form-control total_price total_price_'+value["item_id"]+'"   /></div>';
                        $(".select-item").append(html);
                    });
                    $(".total-amount").removeClass("d-none");
                    // $(".new-customer").removeClass("d-none");
                    // $(".input-customer").val(status[0]["name"]);
                    // $(".customer_id").val(status[0]["customer_id"]);
                    // $("#customer-data").modal("hide");
               }
          })
     })

     $(document).on("keyup",".quantity",function(){
          var id = $(this).data("id")
          if($(this).val().length>0)
          {
               $(".item_"+id).removeAttr("disabled");
          }
     });

     // $(".item-form").on("submit",function(e){
     $(document).on("change",".customeritem",function(e){
          e.preventDefault();
          var id=$(this).data("id");
          var formdata = $(".item-form").serializeArray();
          console.log($(this).find(":checked").val());
          if($(".item_"+id+":checked").val())
          {
               $.ajax({
               method:"post",
               url:"<?= base_url()?>ajax/submitProductItem",
               data:formdata,
               success:function(status)
               {
                    console.log(status);
               }
               })
          }
          else
          {
               $.ajax({
               method:"post",
               url:"<?= base_url()?>ajax/submitProductItem",
               data:{
                    application:$(".application").val(),
                    customer_id:$(".customer_id").val(),
                    item_id:id
               },
               success:function(status)
               {
                    console.log(status);
               }
                })
          }
          
     });

     $(document).on("keyup",".quantity",function(){
               var id = $(this).data("id");

               var tax_rate = $(".unit_price_"+id).val()*($(".tax_rate_"+id).val()/100);

               total_tax = tax_rate*$(this).val();

               // console.log(total_tax);

               $(".tax_amount_"+id).val(total_tax);

               var total_price = ($(".unit_price_"+id).val()*$(this).val())+total_tax;

               // console.log(total_price);

               $(".total_price_"+id).val(total_price);

               var total = 0;

               $(".total_price").each(function(){
                   var id = $(this).data("id");
               
                   total = total + parseFloat($(this).val());

                   if(total)
                   {
                     $(".total_amount").val(total);
                   }

                  

               });
     });

    
    
})
</script>