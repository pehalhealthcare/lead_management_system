<div class="main-panel page has-sidebar-left height-full">
  <div class="content-wrapper container-fluid relative animatedParent animateOnce p-lg-5">
    <?php if ($this->session->flashdata('message_name')) :
    ?>

      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><?= $this->session->flashdata('message_name') ?>.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif; ?>
    
          <?php echo form_open_multipart(''); ?>
          <div class="card bg-white">
               <div class="card-header">
                    <h4 class="text-center">Assign Orders</h4>
               </div>
               <div class="card-body">
                    <?php if(validation_errors()): ?>
                    <div class="alert alert-danger"><?php echo validation_errors(); ?></div>
                    <?php endif; ?>
                    <div class="form-group ">
                         <input type="hidden" name="quid" value="<?= $order[0]["quotation_id"] ?>">
                         <input type="hidden" name="lead_id" value="<?= $order[0]["lead_id"] ?>">
                         <input type="hidden" name="order_id" value="<?= $order[0]["order_id"] ?>">
                         <label for="">Agent</label>
                        <select name="agent_id" class="form-control border text-capitalize">
                         <option value="">Select Agent</option>
                         <?php foreach($agents as $agent):?>
                              <option value="<?= $agent["id"]?>"><?= $agent["firstname"]. " ".$agent["lastname"] ?></option>
                         <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group bordered">
                         <label for="">Status</label>
                         <select name="status" class="form-control border text-capitalize">
                          <option value="yes">yes</option>
                          <option value="no">no</option>
                         </select>
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
</div>