<div class="main-panel">
     <div class="content-wrapper mt-5">
          <div class="table-responsive bg-white">
               <p class="alert alert-success">Note: For page responsive do horizontal scroll</p>
               <table class="table table-bordered bg-white">
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
                         <?php $i = 1;
                         foreach ($userdetails as $user) : if ($user->role != "1") : ?>
                                   <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $user->firstname ?></td>
                                        <td><?= $user->lastname ?></td>
                                        <td><?= $user->mobile ?></td>
                                        <td><?= $user->email ?></td>
                                        <td><?= ($user->role == 1) ? "Admin" : "Group" ?></td>
                                        <td>
                                             <?= ($user->category == "BTL") ? "Business Team Leader" : "" ?>
                                             <?= ($user->category == "OTL") ? "Operation Team Leader" : "" ?>
                                             <?= ($user->category == "BA") ? "Business Agent" : "" ?>
                                             <?= ($user->category == "OA") ? "Operation Agent" : "" ?>
                                        </td>
                                        <td>
                                             <a href="<?= base_url() ?>dashboard/edit/user/<?= $user->id ?>" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                                             <a href="<?= base_url() ?>dashboard/delete/user/<?= $user->id ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                        </td>
                                   </tr>
                         <?php endif;
                         endforeach; ?>
                    </thead>

               </table>
          </div>
     </div>
</div>