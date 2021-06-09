

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
        Are you sure want to close the leads ?
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
    $("#closeBoxConfirm").hide();
    location.reload();
  });
  $("#closeBox").click(function(){
    $("#closeBoxConfirm").hide();
    // window.location.href="<?= base_url() ?>";
  });
  
})
</script>
