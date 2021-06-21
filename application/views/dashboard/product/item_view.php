<div class="main-panel">
  <div class="content-wrapper mt-5">
    <div class="col-sm-12 bg-white ">
      <div class="col-sm-12 text-right pt-2">
        <button class="btn btn-success mb-2" data-toggle="modal" data-target="#importModal">IMPORT ITEM</button>
        <a href="<?= base_url() ?>dashboard/products/item/add" class="btn btn-success mb-2">ADD ITEM</a>
      </div>
      <table class="table table-border">
        <tr>
          <th>SI NO</th>
          <th>Item Name</th>
          <!-- <th>Product Image</th> -->
          <th>PartNumber</th>
          <th>Local PartNumber</th>
          <th>HSN</th>
          <th>Item Price</th>
          <th>Tax Rate</th>
          <th>Actions</th>
        </tr>
        <?php $i = 0;
        foreach ($products as $product) : $i++; ?>
          <tr>
            <td><?= $i; ?></td>
            <td class="text-capitalize"><?= $product["item_name"] ?></td>
            <!-- <td><img style="width:100px;" src="<?= base_url() ?>uploads/<?= ($product["item_image"]) ? $product["item_image"] : "no-image.jpg" ?>" /></td> -->
            <td><?= $product["partnumber"] ?></td>
            <td><?= $product["local_partnumber"] ?></td>
            <td><?= $product["hsn"] ?></td>
            <td><?= $product["unit_price"] ?></td>
            <td><?= $product["tax_rate"] ?></td>
            <td>
              <a href="<?= base_url() ?>dashboard/products/item/edit/<?= $product["item_id"] ?>" class="btn btn-info"><i class="fa fa-pencil"></i></a>
              <button data-toggle="modal" data-target="#confirm-modal" data-toggle="modal" data-target="#confirm-modal" data-id="<?= $product["item_id"] ?>" class="btn btn-danger delete"><i class="fa fa-trash"></i></button>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>

<div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Import Items</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>dashboard/product/import" enctype="multipart/form-data">
        <div class="modal-body">
          <input type="file" name="file" class="form-control" />
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success confirmed">SAVE & CLOSE</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="confirm-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confimation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure want to delete this data ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success confirmed">Yes</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $(".delete").on("click", function() {
      var id = $(this).data("id");
      $(".confirmed").attr("data-id", id);
    });

    $(document).on("click", ".confirmed", function() {
      var id = $(this).data("id");

      window.location.href = "<?= base_url(); ?>dashboard/products/item/delete/" + id;
    });
  });
</script>