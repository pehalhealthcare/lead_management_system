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

    <div class="row bg-white pt-3 m-0">
      <div class="col-sm-12 mb-2 text-right ">
        <a href="<?= base_url() ?>dashboard/add/leads" class="btn btn-success">ADD DATA</a>
      </div>
    </div>
    <div class="table-responsive bg-white">
    <p class="alert alert-success">Note: For page responsive do horizontal scroll</p>
    <table class="table table-responsive-sm table-bordered bg-white p-2">
      <tr>
        <th>SI NO</th>
        <th>LEAD SOURCE</th>
        <th>ASSIGNEE</th>
        <th>LEAD IMAGE</th>
         <th>STATUS</th>
   <!-- <th>REASONS</th> -->
        <th>ACTIONS</th>
      </tr>
      <?php $i = 0;
      foreach ($leads as $lead) : $i++ ?>
        <tr>
          <td><?= $i; ?></td>
          <td><?= ($lead->category == 2) ? "PRODUCT" : ""; ?><?= ($lead->category == 1) ? "SERVICES" : ""; ?> <?= ($lead->category == 3) ? "PRODUCT AND SERVICE" : "";
                                                                                                          ?></td>
          <td><?php echo $this->user_model->username($lead->assigned_to); //
              ?></td>
          <td><img src="<?= base_url(); ?>uploads/lead_image/<?= ($lead->lead_image) ? $lead->lead_image : "no-image.jpg" ?>" style="width:50px" /></td>
           <td><?= $lead->journey ?></td>
      <!--   <td><?= $lead->reasons ?></td> -->

          <td>
            <a href="<?= base_url() ?>dashboard/leads/assign/<?= $lead->id ?>" title="Assign Leads" class="btn btn-primary">
              <i class="fa fa-user"></i></a>
            <a href="<?= base_url() ?>dashboard/edit/leads/<?= $lead->id ?>" class="btn btn-info"><i class="fa fa-pencil"></i></a>
            <?php if ($this->session->category == "BTL" || $this->session->role == 1) : ?>
              <button type="button" class="btn btn-danger delete-data" data-id="<?= $lead->id ?>" data-toggle="modal" data-target="#confirm-modal"><i class="fa fa-trash"></i></button>
          </td>
        <?php endif; ?>
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

      localStorage.removeItem("tabs");
      localStorage.removeItem("subtabs");
      $(document).on("click", ".delete-data", function() {
        var id = $(this).data("id");
        $(".confirm-delete").attr("data-id", id);
      });

      $(document).on("click", ".confirm-delete", function() {
        var id = $(this).data("id");

        window.location.href = "<?= base_url(); ?>dashboard/delete/leads/" + id;
      });
    });
  </script>