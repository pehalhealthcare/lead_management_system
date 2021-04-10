<div class="col-md-9 col-sm-12 mt-5 mx-auto">

<table class="table table-bordered mt-5">
     <thead>
          <tr>
               <th>SI.No</th>
               <th>Firstname</th>
               <th>Lastname</th>
               <th>Mobile</th>
               <th>Email</th>
               <th>Role</th>
               <th>Category</th>
               <th>Actions</th>
          </tr>
          <?php $i=1; foreach($userdetails as $user):?>
          <tr>
               <td><?= $i++; ?></td>
               <td><?= $user->firstname ?></td>
               <td><?= $user->lastname ?></td>
               <td><?= $user->mobile ?></td>
               <td><?= $user->email ?></td>
               <td><?= ($user->role==1) ? "Admin" : "Group"?></td>
               <td><?= ($user->category=="BA") ? "Business Agent" : ""?>
                    <?= ($user->category=="OA") ? "Operation Agent" : ""?></td>
               <td>
               <a href="" class="btn btn-sm btn-primary">EDIT</a>
               <a href="" class="btn btn-sm btn-danger">DELETE</a></td>
          </tr>
          <?php endforeach;?>
     </thead>
     
</table>

</div>