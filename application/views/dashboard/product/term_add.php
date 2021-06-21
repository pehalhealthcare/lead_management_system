<div class="main-panel">
     <div class="content-wrapper mt-5">
          <div class="col-sm-12 mx-auto mt-3">
               <div class="card">
                    <div class="card-header">
                         <h4>ADD TERMS</h4>
                    </div>
                    <div class="card-body">
                         <?php echo $error; ?>
                         <?php echo form_open_multipart('dashboard/products/terms/add'); ?>
                         <div class="form-group">
                              <label for="">Term Name</label>
                              <input type="text" name="terms" id="" class="form-control border-bottom">
                         </div>
                         <div class="form-group">
                              <input type="submit" class="mx-auto btn btn-success" value="SAVE & CLOSE" />
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>