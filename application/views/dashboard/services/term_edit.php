<div class="col-sm-9 row">
     <div class="col-sm-6 mx-auto mt-3">
          <div class="card">
               <div class="card-header">
                    <h4>EDIT TERMS</h4>
               </div>
               <div class="card-body">
               <?php echo $error; ?>
               <?php echo form_open_multipart(''); ?>
               <div class="form-group">
                    <label for="">Term Name</label>
                    <input type="text" value="<?= $terms[0]["term_name"] ?>" name="terms" id="" class="form-control border-bottom">
               </div>
               <div class="form-group">
                    <input type="submit"  class="mx-auto btn btn-success" value="UPDATE & CLOSE" />
               </div>
               </div>
          </div>
     </div>
</div>