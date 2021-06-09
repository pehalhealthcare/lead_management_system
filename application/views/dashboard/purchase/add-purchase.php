

<div class="col-sm-12 col-md-6 mx-auto mt-5">
<?php echo validation_errors(); ?>

<?php  echo form_open_multipart(); ?>
<div class="card bg-light">
     <div class="card-header">
          <h4 class="text-center">Create Purchase</h4>     
     </div>
     <div class="card-body">

          <div class="form-group">
               <label for="">Purchase Order Number</label>
               <input type="text" name="purchase_order_number" class="form-control" value="<?php echo set_value('application') ? set_value('application') : time(); ?>"  />
          </div>

          
          
          <div class="form-group exist-customers">
               <label for="">Select Customer</label>
               <select name="customer_id" id="" class="form-control select-customer">
                    <option value="">Select Customers</option>
                    <?php foreach($customers as $customer):?>
                         <option <?= ($customer->customer_id==$leadcustomer[0]["customer_id"]) ? "selected" : ""?> value="<?= $customer->customer_id?>"><?= $customer->name?></option>
                    <?php endforeach;?>
               </select>
          </div>

         


          <div class="form-group">
               <label for="">Status</label>
               <select name="status" id="" class="form-control">
                    <option value="">Select Status</option>
                    <option value="open">Open</option>
                    <option value="close">Close</option>
               </select>
          </div>

          <div class="form-group">
               <label for="">Comments</label>
               <textarea class="form-control" name="comments" style="height:auto  !important" rows="5" id="comment"><?php echo set_value('comments'); ?></textarea>
               <!-- <textarea name="comments" rows="15" cols="15" class="form-control"  ><?php echo set_value('comments'); ?></textarea> -->
          </div>


     </div>
     <div class="card-footer">
          <div class="form-group">
               <input type="submit" class="btn btn-success" value="SAVE & CLOSE" />
          </div>
     </div>
</div>
</form>
</div>



<script>
$(document).ready(function(){

     
})
</script>