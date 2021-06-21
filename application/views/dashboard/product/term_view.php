<div class="main-panel">
     <div class="content-wrapper mt-5">
     <div class="col-sm-12 bg-white">
          <?php if ($this->session->flashdata("message")) : ?>
               <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong><?= $this->session->flashdata('message') ?>.</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                    </button>
               </div>
          <?php endif; ?>
          <table class="table table-border">
               <tr>
                    <th>SI NO</th>
                    <th>Term Name</th>
                    <th>Actions</th>
               </tr>
               <?php $i = 0;
               foreach ($terms as $term) : $i++; ?>
                    <tr>
                         <td><?= $i; ?></td>
                         <td class="text-capitalize"><?= $term->term_name ?></td>
                         <td>
                              <a href="<?= base_url() ?>dashboard/terms/edit/<?= $term->term_id ?>" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                              <button data-toggle="modal" data-target="#confirm-modal" data-toggle="modal" 
                              data-target="#confirm-modal" data-id="<?= $term->term_id ?>" class="btn btn-danger delete"><i class="fa fa-trash"></i></button>
                         </td>
                    </tr>
               <?php endforeach; ?>
          </table>
     </div>
</div>

<div class="modal fade" id="confirm-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title">Confimation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                    </button>
               </div>
               <div class="modal-body">
                    <p>Are you sure want to delete this data ?</p>
               </div>
               <div class="modal-footer">
                    <button type="button" class="btn btn-success confirmed">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
               </div>
          </div>
     </div>
</div>

<script>
     $(document).ready(function() {
          $(".delete").on("click", function() {
               var id = $(this).data("id");
               $(".confirmed").attr("data-id", id);
          });

          $(document).on("click", ".confirmed", function() {
               var id = $(this).data("id");

               window.location.href = "<?= base_url(); ?>dashboard/products/terms/delete/" + id;
          });
     });
</script>