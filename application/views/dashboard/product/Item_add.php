<div class="main-panel">
     <div class="content-wrapper mt-5">
          <div class="col-sm-12 mx-auto mt-3">
               <div class="card">
                    <div class="card-header">
                         <h4>ADD ITEMS</h4>
                    </div>
                    <div class="card-body">
                         <?php echo $error; ?>
                         <?php echo form_open_multipart(''); ?>
                         <!-- <div class="form-group">
                    <label for="">Select Item Image</label>
                    <input type="file" name="userfile" size="20" accept="image/*" class="form-control" />
               </div> -->
                         <div class="form-group">
                              <label for="">Select Product</label>
                              <select name="product" id="" class="form-control text-capitalize">
                                   <option value="">Select Product</option>
                                   <?php foreach ($products as $product) : ?>
                                        <option value="<?= $product->product_id  ?>"><?= $product->product_name ?></option>
                                   <?php endforeach; ?>
                              </select>
                         </div>
                         <div class="form-group">
                              <label for="">Item Name</label>
                              <input type="text" name="fullname" id="" class="form-control border-bottom">
                         </div>
                         <div class="form-group">
                              <label for="">Part Number</label>
                              <input type="text" name="partnumber" id="" class="form-control border-bottom">
                         </div>
                         <div class="form-group">
                              <label for="">Local Part Number</label>
                              <input type="text" name="local_partnumber" id="" class="form-control border-bottom">
                         </div>
                         <div class="form-group">
                              <label for="">HSN</label>
                              <input type="text" name="hsn" id="" class="form-control border-bottom">
                         </div>
                         <div class="form-group">
                              <label for="">Item Price</label>
                              <input type="text" name="item_price" id="" class="form-control border-bottom">
                         </div>
                         <div class="form-group">
                              <label for="">Tax Rate</label>
                              <input type="text" name="tax_rate" id="" class="form-control border-bottom">
                         </div>
                         <div class="form-group">
                              <input type="submit" class="mx-auto btn btn-success" value="SAVE & CLOSE" />
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>