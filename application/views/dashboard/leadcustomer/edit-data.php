<div class="col-md-9 col-sm-12 mx-auto mt-5">
     <div class="card bg-light">
          <div class="card-header">
               <h4>Edit Lead Customer</h4>
          </div>
          <form action="" method="post" enctype="multipart/form-data">
          <div class="card-body">
               
                    <div class="row">
                         
                              <div class="form-group col-sm-6">
                                   <label for="">Surname</label>
                                   <select class="form-control" name="surname">
                                        <option <?= ($leadcustomer[0]["prefix"]=="Mr") ? "selected" : ""?> value="Mr">Mr</option>
                                        <option <?= ($leadcustomer[0]["prefix"]=="Miss") ? "selected" : ""?> value="Miss">Miss</option>
                                        <option <?= ($leadcustomer[0]["prefix"]=="Mrs") ? "selected" : ""?> value="Mrs">Mrs</option>
                                   </select>
                              </div>
                              <div class="form-group col-sm-6">
                                   <label for="">Name</label>
                                   <input type="text" name="name" value="<?= $leadcustomer[0]["name"]?>" id="" class="form-control">
                              </div>
                              <div class="form-group col-sm-6">
                                   <label for="">Email</label>
                                   <input type="text" name="email" value="<?= $leadcustomer[0]["email"]?>" id="" class="form-control">
                              </div>
                              <div class="form-group col-sm-6">
                                   <label for="">Mobile</label>
                                   <input type="text" name="mobile" value="<?= $leadcustomer[0]["mobile"]?>" id="" class="form-control">
                              </div>
                              <div class="form-group col-sm-6">
                                   <label for="">Alternate Mobile</label>
                                   <input type="text" name="alternate_mobile" value="<?= $leadcustomer[0]["alternate_mobile"]?>" id="" class="form-control">
                              </div>
                              <div class="form-group col-sm-6">
                                   <label for="">Status</label>
                                   <select name="status" id="" class="form-control">
                                   <option <?= ($leadcustomer[0]["is_active"]=="1") ? "selected" : ""?>  value="1">Active</option>
                                   <option <?= ($leadcustomer[0]["is_active"]=="0") ? "selected" : ""?> value="0">Inactive</option>
                                   </select>
                              </div>
                    
                    </div>
               
          </div>
          <div class="card-footer">
               <input type="submit" value="UPDATE" class="btn btn-success">
          </div>
          </form> 
     </div>    
</div>