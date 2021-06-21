<div class="main-panel">
     <div class="content-wrapper mt-5">
     <div class="col-sm-12 mx-auto mt-3">
          <div class="card">
               <div class="card-header">
                    <h4>EDIT ITEMS</h4>
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
                              <option <?= ($items[0]["product_id"]==$product->product_id) ? "selected" : "" ?> value="<?= $product->product_id  ?>"><?= $product->product_name ?></option>
                         <?php endforeach; ?>
                    </select>
               </div>
               <div class="form-group">
                    <label for="">Item Name</label>
                    <input type="text" name="fullname" id="" value="<?= $items[0]["item_name"]?>" class="form-control border-bottom">
               </div>
               <div class="form-group">
                    <label for="">Part Number</label>
                    <input type="text" name="partnumber" id="" value="<?= $items[0]["partnumber"]?>" class="form-control border-bottom">
               </div>
               <div class="form-group">
                    <label for="">Local Part Number</label>
                    <input type="text" name="local_partnumber" id="" value="<?= $items[0]["local_partnumber"]?>" class="form-control border-bottom">
               </div>
               <div class="form-group">
                    <label for="">HSN</label>
                    <input type="text" name="hsn" id="" value="<?= $items[0]["hsn"] ?>" class="form-control border-bottom">
               </div>
               <div class="form-group">
                    <label for="">Item Price</label>
                    <input type="text" name="item_price" id="" value="<?= $items[0]["unit_price"]?>" class="form-control border-bottom">
               </div>
               <div class="form-group">
                    <label for="">Tax Rate</label>
                    <input type="text" name="taxrate" readonly id="" value="<?= $items[0]["tax_rate"]?>" class="form-control border-bottom">
                    <input type="hidden" name="tax_rate" readonly id="" value="<?= $items[0]["tax_rate"]?>" class="form-control border-bottom">
               </div>
               <div class="form-group">
                    <input type="submit" class="mx-auto btn btn-success" value="UPDATE & CLOSE" />
               </div>
               </div>
          </div>
     </div>
</div>
</div>