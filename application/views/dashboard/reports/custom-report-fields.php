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
          <div class="bg-white">
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