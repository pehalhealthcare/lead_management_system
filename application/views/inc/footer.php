</div>
</body>

</html>

<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"></h4>
        <button type="button" class="close myModal" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="close" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<div class="modal" id="closeBoxConfirm">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Confirmation Box</h4>
        <button type="button" class="close" id="closeBox" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <?php $lead_id = "";
        if ($lead_id) $lead_id = $lead_id; ?>
        <input type="hidden" id="close_lead_id" value="<?= ($lead_id) ? $lead_id : "" ?>" />
        <select class="form-control border lead-reasons">
          <option value="">Select Reasons</option>
          <option value="Already Purchased">Already Purchased</option>
          <option value="Not Interested Now">Not Interested Now</option>
          <option value="Will Ask Relative">Will Ask Relative</option>
          <option value="Rental Unit Taken">Rental Unit Taken</option>
          <option value="Competition Price Issue">Competition Price Issue</option>
          <option value="Budget is Low">Budget is Low</option>
          <option value="Outside and Local Service Request">Outside and Local Service Request</option>
          <option value="Unrelated Product">Unrelated Product</option>
          <option value="Competition Brand Lead">Competition Brand Lead</option>
          <option value="Need Service">Need Service</option>
          <option value="Seller Ready & Promotion">Seller Ready & Promotion</option>
          <option value="Product Not Available">Product Not Available</option>
          <option value="Just Raised Enquiry for Price">Just Raised Enquiry for Price</option>
          <option value="Buy Back">Buy Back</option>
          <option value="Don't Make Query">Don't Make Query</option>
          <option value="Not Comfortable">Not Comfortable</option>
          <option value="Next Month Purchase">Next Month Purchase</option>
          <option value="1st time Call">1st time Call</option>
          <option value="Hold the Requirement">Hold the Requirement</option>
          <option value="Number Not Valid">Number Not Valid</option>
          <option value="Purchase Locally">Purchase Locally</option>
          <option value="Purchase Online">Purchase Online</option>
          <option value="MOP Problem">MOP Problem</option>
          <!-- <option value=""></option> -->
        </select>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-success closeBox" id="close" data-dismiss="modal">Yes</button>
        <button type="button" class="btn btn-danger" id="closeBox" data-dismiss="modal">No</button>
      </div>

    </div>
  </div>
</div>




<script src="<?= base_url() ?>assets/js/ckeditor.js"></script>


<script src="<?= base_url() ?>assets/js/app.js"></script>

<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/jquery.table2excel.min.js"></script>






<script>
  $(document).ready(function() {


    setInterval(function() {
      $(".date").html("<?= date("d-m-Y h:s:i") ?>");
    }, 1000);


    $(".myModal").click(function() {
      $("#myModal").hide();
      // window.location.href="<?= base_url() ?>";
    });
    $("#close").click(function() {
      $("#myModal").hide();
      // window.location.href="<?= base_url() ?>";
    });

    $(".closeBox").click(function() {
      var data = {
        lead_id: $("#close_lead_id").val(),
        reason: $(".lead-reasons").find(":selected").val()
      };
      $.ajax({
        method: "post",
        url: "<?= base_url() ?>ajax/leadclose",
        data: data,
        success: function(status) {

        }
      })
      window.location.href = "<?= base_url() ?>dashboard/leads"
      // location.reload();
    });


    $("#closeBox").click(function() {
      $("#closeBoxConfirm").hide();
      // window.location.href="<?= base_url() ?>";
    });

    setInterval(function() {
      notifications()
    }, 10000);

    notifications();

    function notifications() {

      var user_id = "<?= $this->session->userID ?>";
      $(".notifications").html('');
      $.ajax({
        method: "post",
        url: "<?= base_url() ?>ajax/usernotifications",
        data: {
          user_id: user_id
        },
        success: function(status) {
          var result = JSON.parse(status);
          $.each(result, function(k, v) {
            if(v)
            {
              $(".notifications").append('<h6 title="'+v["action"]+'" class="col-sm-12 text-gray ellipsis mb-0">' + v["action"] + '  </h6><p class="text-gray mb-0 text-center"> <small>18 Minutes ago</small></p><div class="dropdown-divider"></div>');
            }
            else
            {
              return false;
            }
            
          });

        }

      })

    }

    $(document).on("click", ".noti-count", function() {
      var read = 1;
      $.ajax({
        method: "post",
        url: "<?= base_url() ?>ajax/readnotifications",
        data: {
          read: read
        },
        success: function(status) {
          notifications();
        }
      })
    })


  })
</script>