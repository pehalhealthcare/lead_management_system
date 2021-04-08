

<div class="col-sm-12 col-md-6 mx-auto mt-5">
<?php echo validation_errors(); ?>

<?php  echo form_open_multipart('dashboard/add/leads'); ?>
<div class="card bg-light">
     <div class="card-header">
          <h4 class="text-center">Create Leads</h4>     
     </div>
     <div class="card-body">

          <div class="form-group">
               <label for="">Application Number</label>
               <input type="text" name="application" class="form-control" value="<?php echo set_value('application') ? set_value('application') : time(); ?>"  />
          </div>

          <div class="form-group">
               <label for="">Lead Image</label>
               <input type="file" name="userfile" class="form-control" id="">
          </div>

          <div class="form-group">
               <label for="">Full Name</label>
               <input type="text" name="full_name" class="form-control" value="<?php echo set_value('full_name'); ?>"  />
          </div>

          <div class="form-group">
               <label for="">Email ID</label>
               <input type="text" name="email" class="form-control" value="<?php echo set_value('email'); ?>"  />
          </div>

          <div class="form-group">
               <label for="">Mobile</label>
               <input type="text" name="mobile" class="form-control" value="<?php echo set_value('mobile'); ?>"  />
          </div>

          <div class="form-group">
               <label for="">Lead Call</label>
               <select name="lead_call" id="" class="form-control">
                    <option value="">Select Lead Call</option>
                    <option value="qualified">Qualified</option>
                    <option value="disqualified">DisQualified</option>
               </select>
          </div>

          <div class="form-group">
               <label for="">Reason with Queries</label>
               <input type="text" name="reasons" class="form-control" value="<?php echo set_value('reasons'); ?>"  />
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


