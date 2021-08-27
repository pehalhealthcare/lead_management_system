<div class="main-panel page has-sidebar-left height-full">
  <div class="content-wrapper container-fluid relative animatedParent animateOnce p-lg-5">
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
              <a href="<?= base_url() ?>dashboard/operation/order/view/<?= $order->order_id ?>" title="Assign Leads" class="btn btn-primary mt-2">
                <i class="fa fa-eye"></i>
              </a>
              <button data-order-id="<?= $order->order_id ?>" data-toggle="modal" data-target="#orderdocform" class="btn btn-primary documents mt-2">
                <i class="fa fa-file"></i>
              </button>
              <button data-order-id="<?= $order->order_id ?>" data-toggle="modal" data-target="#downloadbox" class="btn btn-primary downloads mt-2">
                <i class="fa fa-download"></i>
              </button>
              <?php if ($order->payment == "no") : ?>
                <button class="btn btn-danger select-admin" data-order-id="<?= $order->order_id ?>" data-lead-id="<?= $order->lead_id ?>" data-qid="<?= $order->lead_id ?>"  ><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></button>
              <?php endif; ?>
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
          <button type="button" class="btn btn-info mt-2 confirm-delete">YES</button>

          <button type="button" class="btn btn-danger mt-2" data-dismiss="modal">No</button>
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
          <button type="submit" class="btn btn-info mt-2">UPLOAD</button>
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
        <button type="button" class="btn btn-info mt-2" data-dismiss="modal">close</button>
      </div>
      </form>

    </div>
  </div>
</div>
</div>

<div class="modal" id="selectAdmin">
  <div class="modal-dialog"> 
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Admin Selection</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form action="" method="post" id="admin-order">
      <!-- Modal body -->
      <div class="modal-body">
        <div class="form-group">
          <select class="form-control text-capitalize" name="admin">
            <option value="">Select Admin</option>
            <?php foreach ($admins as $admin) : ?>
              <option value="<?= $admin["id"]?>"><?= $admin["firstname"]?></option>
            <?php endforeach; ?>
          </select>
          <input type="hidden" id="order_id" name="order_id"/>
          <input type="hidden" id="agent_id" name="agent_id" value="<?= $this->session->userID; ?>" />
          <input type="hidden" id="lead_id" name="lead_id"/>
          <input type="hidden" id="qid" name="qid"/>
        </div>
        <div class="form-group">
          <label>Reason</label>
          <input type="text" class="form-control" name="reason"/>
        </div>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-info mt-2">Submit</button>
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
        <button type="button" onclick="window.location.reload()" data-dismiss="modal" class="btn btn-info mt-2">Close</button>
      </div>

    </div>
  </div>
</div>
</div>
<script>
  $(document).ready(function() {

    $(document).on("click",".select-admin",function(){
      var order_id = $(this).data("order-id");
      var qid = $(this).data("qid");
      var lead_id = $(this).data("lead-id");

      $("#order_id").val(order_id);
      $("#lead_id").val(lead_id);
      $("#qid").val(qid);

      $("#selectAdmin").modal("show");

    });

    $(document).on("submit","#admin-order",function(e){
        e.preventDefault();
        var formdata = $("#admin-order").serializeArray();

        $.ajax({
          method:"post",
          url:"<?= base_url()?>ajax/adminorderintimate",
          data:formdata,
          success:function(Status)
          {
            alert("Data added successfully");
            location.reload();
          }
        })
    }); 

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
            html += "<p class='alert alert-info'><a download href='<?= base_url() ?>uploads/order_docs/" + v["document1"] + "'>" + v["document1"] + "</a></p>";
            html += "<p class='alert alert-info'><a download href='<?= base_url() ?>uploads/order_docs/" + v["document2"] + "'>" + v["document2"] + "</a></p>";
            html += "</div>"
            $(".doc-download").append(html);
          });
        }
      })

    });
  });
</script>