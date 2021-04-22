<div class="col-md-9 col-sm-12 mt-5 mx-auto">
<?php if($this->session->flashdata('message_name')): 
?>

<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong><?= $this->session->flashdata('message_name') ?>.</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
 <?php endif; ?>

 <div class="row">
    <div class="col-sm-12 mb-2 text-right">
        <a href="<?= base_url()?>dashboard/add/leads" class="btn btn-success">ADD DATA</a>
    </div>
 </div>

 <table class="table table-bordered">
  <tr>
    <th>SI NO</th>
    <th>LEAD SOURCE</th>
    <th>ASSIGNEE</th>
    <th>LEAD IMAGE</th>
    <!-- <th>STATUS</th>
    <th>REASONS</th> -->
    <th>ACTIONS</th>
  </tr>
  <?php $i=0; foreach($leads as $lead): $i++?>
    <tr>
      <td><?= $i;?></td>
      <td><?= ($lead->lead_source==2) ? "PRODUCT" : ""; ?><?= ($lead->lead_source==1) ? "SERVICES" : "";?> <?=($lead->lead_source==3) ? "PRODUCT AND SERVICE" : "";
      ?></td>
      <td><?php echo $this->user_model->username($lead->assigned_to);//?></td>
      <td><img src="<?= base_url();?>uploads/lead_image/<?= $lead->lead_image ?>" style="width:50px" /></td>
      <!-- <td><?= $lead->status ?></td>
      <td><?= $lead->reasons ?></td> -->
      <td>
      <a href="<?= base_url()?>dashboard/leads/assign/customer/<?= $lead->id?>" class="btn btn-primary">ASSIGN</a>
      <!-- <a href="<?= base_url()?>dashboard/add/purchase-order/<?= $lead->id?>" class="btn btn-primary">Create Purchase</a> -->
      <a href="<?= base_url()?>dashboard/edit/leads/<?= $lead->id ?>" class="btn btn-info">EDIT</a>
      <button type="button" class="btn btn-danger delete-data" data-id="<?= $lead->id ?>"" data-toggle="modal" data-target="#confirm-modal">DELETE</button>
      </td>
    </tr>
  <?php endforeach;?>
 </table>

</div>

<div class="modal" id="confirm-modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Message Confirmation </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Are sure you wan to delete data ?
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button"  class="btn btn-info confirm-delete">YES</button>

        <button type="button"  class="btn btn-danger" data-dismiss="modal">No</button>
      </div>

    </div>
  </div>
</div>
<script>
$(document).ready(function(){

    $(document).on("click",".delete-data",function(){
        var id = $(this).data("id");
        $(".confirm-delete").attr("data-id",id);
    });

    $(document).on("click",".confirm-delete",function(){
      var id = $(this).data("id");

      window.location.href = "<?= base_url();?>dashboard/delete/leads/"+id;
    });
});
</script>
