<div class="col-md-9 col-sm-12 mt-5">
<?php if($this->session->flashdata('message_name')): 
?>

<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong><?= $this->session->flashdata('message_name') ?>.</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
 <?php endif; ?>

 <div class="col-sm-12 col-md-9 mx-auto">
      <div class="card bg-light">
           <div class="card-header">
               <h4>Assign Application Number</h4>
           </div>
           <?php echo form_open("/dashboard/leads/agent/".$application)?>
           <div class="card-body">
               <div class="form-group">
                    <label for="">Application Number</label>
                    <input type="text" name="application" readonly value="<?= $application?>" class="form-control" id="">
               </div>
              <div class="form-group">
                   <label for="">Agent Names</label>
              </div>
           </div>
           <div class="card-footer">
                    <input type="submit" class="btn btn-success" value="ADD">
           </div>
           </form>   
      </div>
     
 </div>
 </div>

</div>