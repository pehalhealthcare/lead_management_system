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
     </div>
</div>