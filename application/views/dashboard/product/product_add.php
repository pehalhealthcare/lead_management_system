<div class="col-sm-9">
     <div class="col-sm-6 mx-auto mt-3">
          <div class="card">
               <div class="card-header">
                    <h4>ADD PRODUCT</h4>
               </div>
               <div class="card-body">
                    <?php echo $error; ?>
                    <?php echo form_open_multipart('dashboard/products/add'); ?>
                    <div class="form-group">
                         <label for="">Select Product Image</label>
                         <input type="file" name="userfile" size="20" accept="image/*" class="form-control" />
                    </div>
                    <div class="form-group">
                         <label for="">Product Name</label>
                         <input type="text" name="fullname" id="" class="form-control border-bottom">
                    </div>
                    <div class="form-group">
                         <input type="submit" class="mx-auto btn btn-success" value="ADD DATA" />
                    </div>
               </div>
          </div>
     </div>
</div>