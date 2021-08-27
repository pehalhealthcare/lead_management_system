
     <?php 
     // echo $user["email"];
     ?>
<div class="col-sm-12 float-left">
     <div class="col-sm-3 float-right text-right mt-3">
          <a href="products/add" class="btn btn-success">ADD PRODUCT</a>
     </div>
</div>

<div class="col-sm-12 float-left">
     <?php foreach($products as $product):  ?>
     <div class="col-sm-12 col-md-4 float-left p-3">
          <div class="card">
               <div class="card-header">
                    <h4><?= $product->product_name?></h4>
               </div>
               <div class="card-body">
                    <img src="<?= base_url()."uploads/".$product->product_image ?>"  class="img-thumbnail" style="width:100%;"/>
                    <p>Product Type : <?= $product->product_type ?></p>
                    <h6>Contact Details</h6>
                    <p class="m-0">Mobile : <?= $product->mobile ?></p>
                    <p class="m-0">E-mail :  <?= $product->email ?></p>
               </div>
               <div class="card-footer">
                    <a href="products/edit/<?= $product->id ?>" class="btn btn-primary mt-2">EDIT</a>
                    <a href="products/delete/<?= $product->id ?>" class="btn btn-danger mt-2">DELETE</a>
               </div>
          </div>
     </div>
     <?php endforeach; ?>
</div>
