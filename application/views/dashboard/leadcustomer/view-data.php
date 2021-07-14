<div class="main-panel">
  <div class="content-wrapper mt-5">
    <?php if ($this->session->flashdata('message_name')) :
    ?>

      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><?= $this->session->flashdata('message_name') ?>.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif; ?>
    <div class="row m-0 bg-white">
      <div class="col-sm-12 mb-2 mt-2">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h4>Customer Details</h4>
          </div>

          <div class="col-sm-12 col-md-6 text-right">
            <a href="<?= base_url() ?>dashboard/leadcustomer/add" class="btn btn-success ">ADD DATA</a>
          </div>
        </div>
      </div>
    </div>
    
    <div class="table-responsive bg-white">
    <p class="alert alert-success">Note: For page responsive do horizontal scroll</p>
    <table class="table table-bordered bg-white">
      <tr>
        <th>SI NO</th>
        <th>Name</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>Alternate Mobile</th>
        <th>Status</th>
        <th>ACTIONS</th>
      </tr>
      <?php $i = 0;
      foreach ($leadcustomers as $leadcustomer) : $i++ ?>
        <tr>
          <td><?= $i; ?></td>
          <td><?= $leadcustomer->name ?></td>
          <td><?= $leadcustomer->email; ?></td>
          <td><?= $leadcustomer->mobile ?></td>
          <td><?= $leadcustomer->alternate_mobile ?></td>
          <td><?= ($leadcustomer->is_active == 1) ? "Active" : "Inactive" ?></td>
          <td>
            <a href="<?= base_url() ?>dashboard/leadcustomer/edit/<?= $leadcustomer->customer_id ?>" class="btn btn-info">
              <i class="fa fa-pencil"></i></a>
            <button type="button" class="btn btn-danger delete-data" data-id="<?= $leadcustomer->customer_id ?>" data-toggle="modal" data-target="#confirm-modal"><i class="fa fa-trash"></i></button>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
    </div>
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
          <button type="button" class="btn btn-info confirm-delete">YES</button>

          <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        </div>

      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {

    $(document).on("click", ".delete-data", function() {
      var id = $(this).data("id");
      $(".confirm-delete").attr("data-id", id);
    });

    $(document).on("click", ".confirm-delete", function() {
      var id = $(this).data("id");

      window.location.href = "<?= base_url(); ?>dashboard/leadcustomer/delete/" + id;
    });
  });
</script>