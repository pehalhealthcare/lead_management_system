<div class="main-panel">
  <div class="content-wrapper mt-5">
    <?php if ($this->session->flashdata('message')) :
    ?>

      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><?= $this->session->flashdata('message') ?>.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif; ?>
      

    <div class="table-responsive bg-white">
      <p class="alert alert-success">Note: For page responsive do horizontal scroll</p>
      <table class="table table-bordered bg-white">
        <tr>
          <th>SI NO</th>
          <th>LEAD ID</th>
          <th>ORDER NO</th>
          <th>PAYMENT</th>
          <th>DECISION</th>
          <th>APPROVED</th>
          <th>ACTIONS</th>
        </tr>
        <?php $i = 0;
        foreach ($orders as $order) : $i++ ?>
          <tr>
            <td><?= $i; ?></td>
            <td><?= $order->lead_id ?></td>
            <td><?= $order->order_no; ?></td>
            <td><?= $order->payment ?></td>
            <td><?= $order->decision ?></td>
            <td><?= $order->decision ?></td>
            <td>
              <a href="<?= base_url() ?>dashboard/operation/order/view/<?= $order->order_id ?>" title="Assign Leads" class="btn btn-primary">
                <i class="fa fa-eye"></i>
              </a>
              <button data-order-id="<?= $order->order_id ?>" data-toggle="modal" data-target="#orderdocform" class="btn btn-primary documents">
                <i class="fa fa-file"></i>
              </button>
              <button data-order-id="<?= $order->order_id ?>" data-toggle="modal" data-target="#downloadbox" class="btn btn-primary downloads">
                <i class="fa fa-download"></i>
              </button>
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

<div class="modal" id="orderdocform">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Order Related Documents</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form id="docform" method="post" enctype="multipart/form-data">
        <!-- Modal body -->
        <div class="modal-body">
          <div class="form-group">
            <label>Upload Invoice 1</label>
            <input type="file" name="userfile" class="form-control" />
            <span class="text-danger"> * File size less than 2MB</span>
            <input type="hidden" name="order_id" class="order_id" />
          </div>
          <div class="form-group">
            <label>Upload Invoice 2</label>
            <input type="file" name="userfile2" class="form-control" />
            <span class="text-danger"> * File size less than 2MB</span>
            
          </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-info">UPLOAD</button>
        </div>
      </form>

    </div>
  </div>
</div>
</div>

<div class="modal" id="downloadbox">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Order Related Documents</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body doc-download">

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">close</button>
      </div>
      </form>

    </div>
  </div>
</div>
</div>

<div class="modal" id="messageModalBox">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Message</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body message-data">

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" onclick="window.location.reload()" data-dismiss="modal" class="btn btn-info">Close</button>
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

      window.location.href = "<?= base_url(); ?>dashboard/delete/leads/" + id;
    });

    $(document).on("click", ".documents", function() {
      var order_id = $(this).data("order-id");

      $(".order_id").val(order_id);

    });

    $(document).on("submit", "#docform", function(e) {
      e.preventDefault();
      var formdata = new FormData(this);

      $.ajax({
        method: "post",
        url: "<?= base_url() ?>ajax/orderdoc",
        data: formdata,
        cache: false,
        processData: false,
        contentType: false,
        success: function(status) {
          $("#orderdocform").modal("hide");
          $(".message-data").html(status);
          $("#messageModalBox").modal("show");
        }
      })
    });

    $(document).on("click", ".downloads", function() {
      $(".doc-download").html('');

      $.ajax({
        method: "post",
        url: "<?= base_url() ?>ajax/dowloadorderdocs",
        data: {
          order_id: $(this).data("order-id")
        },
        success: function(status) {
          $.each(JSON.parse(status), function(k, v) {
            var html = "<div>";
            html +="<p class='alert alert-info'><a download href='<?= base_url() ?>uploads/order_docs/" + v["document1"] + "'>" + v["document1"] + "</a></p>";
            html +="<p class='alert alert-info'><a download href='<?= base_url() ?>uploads/order_docs/" + v["document2"] + "'>" + v["document2"] + "</a></p>";
            html +="</div>"
            $(".doc-download").append(html);
          });
        }
      })

    });
  });
</script>