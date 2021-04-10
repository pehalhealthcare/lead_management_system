<div class="col-md-9 mx-auto mt-5">
    
    <div class="card bg-light">
          <div class="card-header">
               <h4>Lead Quotation</h4>
          </div>
          <form action="" method="post">
               <div class="card-body">
                    <div class="row">
                         <div class="form-group col-md-6 col-sm-12">
                              <label for="">Application Number</label>
                              <input type="text" name="application_number" readonly value="<?= $application; ?>" class="form-control" id="">
                         </div>
                         <div class="form-group  col-md-6 col-sm-12">
                              <label for="">Agent Name</label>
                              <input type="text" name="agent_name" readonly value="<?= $agent[0]->firstname; ?>" class="form-control" id="">
                              <input type="hidden" name="agent_id" value="<?= $agent[0]->id; ?>">
                         </div>
                         <div class="form-group  col-md-6 col-sm-12">
                              <label for="">TeamLeader Name</label>
                              <input type="text" name="teamleader_name" readonly value="<?= $teamleader[0]->firstname; ?>" class="form-control" id="">
                              <input type="hidden" name="teamleader_id" value="<?= $teamleader[0]->id; ?>">
                         </div>
                         <div class="form-group col-md-6 col-sm-12">
                              <label for="">Item Name</label>
                              <input type="text" name="item_name" id="" class="form-control">
                         </div>
                         <div class="form-group col-md-6 col-sm-12">
                              <label for="">Item Quantity</label>
                              <input type="text" name="item_quantity" id="" class="form-control">
                         </div>
                         <div class="form-group col-md-6 col-sm-12">
                              <label for="">Item Price</label>
                              <input type="text" name="item_price"  id="item_price" class="form-control">
                         </div>
                         <div class="form-group col-md-6 col-sm-12">
                              <label for="">Item Tax (%)</label>
                              <input type="text" name="item_tax" id="item_tax"  class="form-control">
                         </div>
                         <div class="form-group col-md-6 col-sm-12">
                              <label for="">Item Tax Amount</label>
                              <input type="text" readonly name="item_tax_amount"  id="item_tax_amount" class="form-control">
                         </div>
                         <div class="form-group col-md-6 col-sm-12">
                              <label for="">Item Total Price With Tax</label>
                              <input type="text" name="item_total"  id="item_total" readonly class="form-control">
                         </div>
                    </div>
               </div>
               <div class="card-footer">
                    <input type="submit" value="Generate" class="btn btn-success">
               </div>
          </form>
    </div>
</div>
<script>
$(document).ready(function(){

     $("#item_tax").on("keyup",function(){
          var tax = $(this).val();

          var price = $("#item_price").val();

          var tax_amount = price*(tax/100);

          var total = (Number(tax_amount) + Number(price));

          if($(this).val() != "" && price != "")
          {
               $("#item_tax_amount").val(tax_amount);
               $("#item_total").val(total);
          }
          
     })
})
</script>

    
    
