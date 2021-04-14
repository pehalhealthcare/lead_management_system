

</div>
</body>
</html>

<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
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
<script>
$(document).ready(function(){
  $(".close").click(function(){
    $("#myModal").hide();
    // window.location.href="<?= base_url() ?>";
  });
  $("#close").click(function(){
    $("#myModal").hide();
    // window.location.href="<?= base_url() ?>";
  });
})
</script>
