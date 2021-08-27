<div class="main-panel page has-sidebar-left height-full">
     <div class="content-wrapper container-fluid relative animatedParent animateOnce p-lg-5">
          <div class="col-sm-12 bg-white">
               <?php if ($this->session->flashdata("message")) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                         <strong><?= $this->session->flashdata('message') ?>.</strong>
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                         </button>
                    </div>
               <?php endif; ?>
               <div class="table-responsive bg-white">
                    <p class="alert alert-success">Note: For page responsive do horizontal scroll</p>
                    <table class="table table-border">
                         <tr>
                              <th>SI NO</th>
                              <th>Product Name</th>
                              <th>Product Image</th>
                              <th>Actions</th>
                         </tr>
                         <?php $i = 0;
                         foreach ($products as $product) : $i++; ?>
                              <tr>
                                   <td><?= $i; ?></td>
                                   <td class="text-capitalize"><?= $product->product_name ?></td>
                                   <td><img style="width:100px;" src="<?= base_url() ?>uploads/<?= ($product->product_image) ? $product->product_image : "no-image.jpg" ?>" /></td>
                                   <td>
                                        <a href="<?= base_url() ?>dashboard/products/item/<?= $product->product_id ?>" class="btn btn-primary mt-2"><i class="fa fa-eye"></i></a>
                                        <a href="<?= base_url() ?>dashboard/products/edit/<?= $product->product_id ?>" class="btn btn-info mt-2"><i class="fa fa-pencil"></i></a>
                                        <button data-toggle="modal" data-target="#confirm-modal" data-toggle="modal" data-target="#confirm-modal" data-id="<?= $product->product_id ?>" class="btn btn-danger delete mt-2"><i class="fa fa-trash"></i></button>
                                   </td>
                              </tr>
                         <?php endforeach; ?>
                    </table>
               </div>
          </div>
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
                    <button type="button" class="btn btn-success confirmed mt-2">Yes</button>
                    <button type="button" class="btn btn-danger mt-2" data-dismiss="modal">No</button>
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

               window.location.href = "<?= base_url(); ?>dashboard/products/delete/" + id;
          });
     });
</script>