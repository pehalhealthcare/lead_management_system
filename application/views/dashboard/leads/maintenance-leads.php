

<div class="col-sm-12 col-md-6 mx-auto mt-5">
<?php echo validation_errors(); ?>

<?php echo form_open('/'); ?>
<div class="card bg-light">
     <div class="card-header">
          <h4 class="text-center">Assign Leads</h4>     
     </div>
     <div class="card-body">
          <div class="row">
          
          <div class="form-group col-sm-12 col-md-6">
               <label for="">Product Image</label>
               <input type="file" name="email" class="form-control" value="<?php echo set_value('mobile'); ?>"  />
          </div>
          
          <div class="form-group col-sm-12 col-md-6">
               <label for="">Business Agent</label>
               <select name="" class="form-control" id="">
                    <option>Default Agent</option>
                    <option>Agent 1</option>
                    <option>Agent 2</option>
               </select>
          </div>

          <div class="form-group col-sm-12 col-md-6">
               <label for="">Mobile</label>
               <input type="text" name="email" class="form-control" value="<?php echo set_value('mobile'); ?>"  />
          </div>

          <div class="form-group  col-sm-12 col-md-6">
               <label for="">Product</label>
               <input type="text" name="email" class="form-control" value="<?php echo set_value('mobile'); ?>"  />
          </div>

          <div class="form-group col-sm-12 col-md-6">
               <label for="">Service</label>
               <input type="text" name="email" class="form-control" value="<?php echo set_value('mobile'); ?>"  />
          </div>

          <div class="form-group  col-sm-12 col-md-6">
               <label for="">Date of Enquiry</label>
               <input type="text" name="email" class="form-control" value="<?php echo set_value('mobile'); ?>"  />
          </div>

          <div class="form-group  col-sm-12 col-md-6">
               <label for="">Date of Order</label>
               <input type="text" name="email" class="form-control" value="<?php echo set_value('mobile'); ?>"  />
          </div>

          <div class="form-group col-sm-12 col-md-6">
               <label for="">Email ID</label>
               <input type="text" name="email" class="form-control" value="<?php echo set_value('email'); ?>"  />
          </div>

          <div class="form-group col-sm-12 col-md-6">
               <label for="">Address</label>
               <input type="text" name="email" class="form-control" value="<?php echo set_value('mobile'); ?>"  />
          </div>


          <div class="form-group col-sm-12 col-md-6">
               <label for="">Role</label>
               <select class="form-control">
               <option>Group 1</option>
               <option>Group 2</option>
               </select>
          </div>

          <div class="form-group col-sm-12 col-md-6">
               <label for="">Product Name</label>
               <input type="text" name="email" class="form-control" value="<?php echo set_value('mobile'); ?>"  />
          </div>

          <div class="form-group col-sm-12 col-md-6">
               <label for="">Service Name</label>
               <input type="text" name="email" class="form-control" value="<?php echo set_value('mobile'); ?>"  />
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


