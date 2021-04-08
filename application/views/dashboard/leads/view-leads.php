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

</div>
