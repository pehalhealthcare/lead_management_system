<div class="col-sm-9 row">
     <div class="col-sm-6 mx-auto mt-3">
          <div class="card">
               <div class="card-header">
                    <h4>EDIT ITEMS</h4>
               </div>
               <div class="card-body">
               <?php echo $error; ?>
               <?php echo form_open_multipart(''); ?>
               <div class="form-group">
                    <label for="">Select Item Image</label>
                    <input type="file" name="userfile" size="20" accept="image/*" class="form-control" />
               </div>
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
                    <input type="submit" class="mx-auto btn btn-success" value="UPDATE DATA" />
               </div>
               </div>
          </div>
     </div>
</div>