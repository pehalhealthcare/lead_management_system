
<div class="col-sm-12">
<div class="col-sm-6 mx-auto mt-3">

<?php echo $error;?>

<?php echo form_open_multipart('/products/update/'.$products->id);?>
<div class="form-group">
<label for=""><img src="<?= base_url()."uploads/".$products->product_image ?>"   width="100"/></label>
<input type="file" name="userfile" size="20" accept="image/*" class="form-control"/>

</div>
<div class="form-group">
<label for="">Product Name</label>
<input type="text" name="fullname" id="" value="<?= $products->product_name ?>" class="form-control">
</div>
<div class="form-group">
<label for="">Email</label>
<input type="email" name="email" id="" value="<?= $products->email ?>" class="form-control">
</div>
<div class="form-group">
<label for="">Mobile Number</label>
<input type="number" name="mobile" id="" value="<?= $products->mobile ?>" class="form-control">
</div>
<div class="form-group">
<label for="">Product Type</label>
<select name="product_type" id="" class="form-control">
     <option value="">Select Product Type</option>
     <option <?= ($products->product_type=="design_work") ? "selected" : ""?> value="design_work">Design Work</option>
     <option <?= ($products->product_type=="electronics") ? "selected" : ""?> value="electronics">Electronics</option>
     <option <?= ($products->product_type=="mobile") ? "selected" : ""?> value="mobile">Mobiles</option>
</select>
</div>

<input type="submit" value="UPDATE PRODUCT" class="btn btn-primary mt-2" />
