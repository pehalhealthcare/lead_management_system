<div class="main-panel page has-sidebar-left height-full">
     <div class="content-wrapper container-fluid relative animatedParent animateOnce p-lg-5">
          <div class="col-sm-12 mx-auto mt-3 ">
               <div class="card">
                    <div class="card-header">
                         <h4><?= $title ?></h4>
                    </div>
                    <div class="card-body">
                         <?php echo $error; ?>
                         <?php echo form_open_multipart(''); ?>
                         <div class="form-group">
                              <label for="">Select Product Image</label>
                              <input type="file" name="userfile" size="20" accept="image/*" class="form-control" />
                         </div>
                         <div class="form-group">
                              <label for="">Product Name</label>
                              <input type="text" name="fullname" value="<?= $products[0]["product_name"]; ?>" id="" class="form-control border-bottom">
                         </div>
                         <div class="form-group">
                              <input type="submit" class="mx-auto btn btn-success" value="UPDATE & CLOSE" />
                         </div>
                    </div>

               </div>
          </div>

     </div>
</div>