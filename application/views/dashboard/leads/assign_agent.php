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
                   <div class="row">
                    <?php foreach($agents as $agent): if($agent["role"]=="2" && $agent["category"]=="BA"):?>
                              <div data-id="<?= $agent["id"] ?>" data-parent="<?= $agent["parent_id"]?>" class="agent col-sm-6 col-md p-5 bg-primary text-white m-1 text-center text-capitalize">
                                   <span><?php echo $agent["firstname"]; ?></span>
                              </div>
                    <?php endif; endforeach;?>
                    <input type="hidden" name="agentID" class="agentID">
                    <input type="hidden" name="parentID" class="parentID">
                   </div>
                   
              </div>
           </div>
           <div class="card-footer">
                    <input type="submit" class="btn btn-success" value="SAVE & CLOSE">
           </div>
           </form>   
      </div>
     
 </div>
 </div>

</div>

<script>
$(".agent").on("click",function(){
     $(".agent").removeClass("bg-success").addClass("bg-primary");
     $(this).removeClass("bg-primary").addClass("bg-success");
     $(".agentID").val($(this).data("id"));
     $(".parentID").val($(this).data("parent"));
     // 
});
</script>