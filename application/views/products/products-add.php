
<div class="col-sm-12">
<div class="col-sm-6 mx-auto mt-3">
<?php echo $error;?>
<?php echo form_open_multipart('/products/add');?>
<div class="form-group">
<label for="">Select Product Image</label>
<input type="file" name="userfile" size="20" accept="image/*" class="form-control"/>
</div>
<div class="form-group">
<label for="">Product Name</label>
<input type="text" name="fullname" id="" class="form-control">
</div>
<div class="form-group">
<label for="">Email</label>
<input type="email" name="email" id="" class="form-control">
</div>
<div class="form-group">
<label for="">Mobile Number</label>
<input type="number" name="mobile" id="" class="form-control">
</div>
<div class="form-group">
<label for="">Product Type</label>
<select name="product_type" id="" class="form-control">
     <option value="">Select Product Type</option>
     <option value="design_work">Design Work</option>
     <option value="electronics">Electronics</option>
     <option value="mobile">Mobiles</option>
</select>
</div>
<div class="form-group">
<input type="submit" class="mx-auto btn btn-success" value="ADD DATA" />
</div>
</div>

</div>

