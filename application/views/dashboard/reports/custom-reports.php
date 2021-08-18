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

          <div class="bg-white p-3">
               <div class="col-sm-12 text-right mb-3">
                    <button class="btn btn-success">ADD DATA</button>
               </div>

               <div class="table-responsive">
                    <table class="table table-bordered">
                         <tr>
                              <th>SI</th>
                              <th>Report Name</th>
                              <th>Query</th>
                              <th>Actions</th>
                         </tr>

                    </table>
               </div>
          </div>
     </div>
</div>