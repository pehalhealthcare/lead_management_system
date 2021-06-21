<div class="main-panel">
     <div class="content-wrapper mt-5">
          <div class="page-header">
               <h3 class="page-title">
                    <span class="page-title-icon bg-gradient-primary text-white mr-2">
                         <i class="mdi mdi-home"></i>
                    </span> Dashboard
               </h3>
          </div>
     </div>
<?php if($this->session->flashdata('message')): 
?>

<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong><?= $this->session->flashdata('message') ?>.</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
 <?php endif; ?>

 <div class="row">
    <div class="col-sm-12 mb-2 text-right">
        <a href="javascript:void(0)" class="btn btn-success addCategory">ADD DATA</a>
    </div>
 </div>

 <table class="table table-bordered">
  <tr>
    <th>SI NO</th>
    <th>CATEGORY</th>
    <th>STATUS</th>
    <th>ACTIONS</th>
  </tr>
  <?php $i=0; foreach($categories as $category): $i++?>
    <tr>
      <td><?= $i;?></td>
      <td><?= $category->category ?></td>
      <td><?= ($category->is_active==1) ? "ACTIVE" : "INACTIVE" ?></td>
      <td>
      <a href="javascript:void(0)" data-category="<?= $category->category ?>" data-status="<?= $category->is_active ?>" data-id="<?= $category->id ?>" class="btn btn-info editCategory"><i class="fa fa-pencil"></i></a>
      <button type="button" class="btn btn-danger delete-data" data-id="<?= $category->id ?>"
      data-toggle="modal" data-target="#confirm-modal"><i class="fa fa-trash"></i></button>
      </td>
      
    </tr>
  <?php endforeach;?>
 </table>

</div>


<div class="modal" id="editModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Category</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <form action="" id="edit-category" method="post">
      <div class="modal-body">
          
          <div class="row">
               <div class="col-sm-6">
                    <label for="">Category</label>
                    <input type="text" name="category" id="editCat" class="form-control border-bottom" >
                    <input type="hidden" name="id" id="category_id">
               </div>     
               <div class="col-sm-6">
                    <label for="">Status</label>
                    <select class="form-control border-bottom" name="status" id="editStatus">
                         <option value="">Select Status</option>
                         <option value="1">ACTIVE</option>
                         <option value="0">INACTIVE</option>
                    </select>
               </div>  
          </div>
         
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="Submit"  class="btn btn-info">Update & Close</button>

        <button type="button"  class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
      </form>

    </div>
  </div>
</div>

<div class="modal" id="addModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">ADD Category</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <form action="" id="add-category" method="post">
      <div class="modal-body">
          
          <div class="row">
               <div class="col-sm-6">
                    <label for="">Category</label>
                    <input type="text" name="category" class="form-control border-bottom" id="">.
                    
               </div>     
               <div class="col-sm-6">
                    <label for="">Status</label>
                    <select class="form-control border-bottom" name="status">
                         <option value="">Select Status</option>
                         <option value="1">ACTIVE</option>
                         <option value="0">INACTIVE</option>
                    </select>
               </div>  
          </div>
          
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="Submit"  class="btn btn-info">Save & Close</button>

        <button type="button"  class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
      </form>
    </div>
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

    $(document).on("click",".editCategory",function(){
          $("#editModal").modal("show")
          var category = $(this).data("category");
          var status = $(this).data("status");
          var id = $(this).data("id");
          $("#editCat").val(category);
          $("#editStatus option").each(function(v){
               if($(this).val()==status)
               {
                    $(this).attr("selected","selected");
               }
             
          })
          $("#category_id").val(id);
    });
//     
     $(document).on("click",".addCategory",function(){
          $("#addModal").modal("show")
    });

    $(document).on("submit","#edit-category",function(e){
         e.preventDefault();
          var formdata = $(this).serializeArray();
          var id = $("#category_id").val();
          $.ajax({
               method:"post",
               url:"<?= base_url() ?>ajax/editcategory/"+id,
               data:formdata,
               success:function(status)
               {
                    console.log(status);
                    location.reload();
               }
          })
    });

    $(document).on("submit","#add-category",function(e){
          e.preventDefault();
          var formdata = $(this).serializeArray();
          
          $.ajax({
               method:"post",
               url:"<?= base_url() ?>ajax/addcategory",
               data:formdata,
               success:function(status)
               {
                    console.log(status);
                    location.reload();
               }
          })
     });

    $(document).on("click",".confirm-delete",function(){
      var id = $(this).data("id");

      window.location.href = "<?= base_url();?>dashboard/delete/category/"+id;
    });
});
</script>
