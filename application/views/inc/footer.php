

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
        <button type="button" class="close closeBox" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <input type="hidden" id="close_lead_id" value="<?= ($lead_id) ? $lead_id : ""?>" />
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
<script>

$(document).ready(function(){
    $(".myModal").click(function(){
    $("#myModal").hide();
    // window.location.href="<?= base_url() ?>";
  });
  $("#close").click(function(){
    $("#myModal").hide();
    // window.location.href="<?= base_url() ?>";
  });

  $(".closeBox").click(function(){
    var data = {
      lead_id:$("#close_lead_id").val(),
      reason:$(".lead-reasons").find(":selected").val()
    };
    $.ajax({
      method:"post",
      url:"<?= base_url()?>ajax/leadclose",
      data:data,
      success:function(status)
      {
        
      }
    })
    $("#closeBoxConfirm").hide();
    // location.reload();
  });


  $("#closeBox").click(function(){
    $("#closeBoxConfirm").hide();
    // window.location.href="<?= base_url() ?>";
  });
  
})
</script>
