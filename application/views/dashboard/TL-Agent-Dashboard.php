<div class="main-panel">
     <div class="content-wrapper mt-5">

          <div class="col-sm-12 bg-white p-3">
               <div class="page-header">
                    <h3 class="page-title">
                         <span class="page-title-icon bg-gradient-primary text-white mr-2">
                              <i class="mdi mdi-home"></i>
                         </span> Dashboard
                    </h3>
               </div>
               <div class="row">

               <?php if($this->session->category=="BTL"):?>
                    <div class="col-md-6 stretch-card grid-margin">
                         <div class="card bg-gradient-success card-img-holder text-white">
                              <div class="card-body">
                                  
                                   <h4 class="font-weight-normal mb-3">Opportunity <i class="mdi mdi-diamond mdi-24px float-right"></i>
                                   </h4>
                                   <div class="table-responsive bg-white">
                                        <table class="table table-bordred">
                                        <tr>
                                             <tH>SI.NO</th>
                                             <th>Opportunity Name</th>
                                             <th>Account Name</th>
                                             <th>Amount</th>
                                             <th>Expected Close Date</th>
                                             <th>Actions</th>
                                        </tr>
                                        <?php $i=0; foreach($dashoppo as $oppo): $i++; ?>
                                        <?php if($i<=5):?>
                                             <tr>
                                                  <td><?= $i ?></td>
                                                  <td><?= $oppo->opportunity_name?></td>
                                                  <td><?= $oppo->opportunity_name?></td>
                                                  <td><?= $oppo->expected_amount?></td>
                                                  <td><?= $oppo->expected_date?></td>
                                                  <td>
                                                       <a href="" class="btn btn-warning">
                                                            <i class="fa fa-pencil"></i>
                                                       </a>
                                                       <a href="" class="btn btn-primary">
                                                            <i class="fa fa-eye"></i>
                                                       </a>
                                                  </td>
                                             </tr>
                                        <?php endif; endforeach;?>
                                        </table>
                                   </div>


                              </div>
                         </div>
                    </div>

                    <div class="col-md-6 stretch-card grid-margin">
                         <div class="card bg-gradient-danger card-img-holder text-white">
                              <div class="card-body">
                                   
                                   <h4 class="font-weight-normal mb-3">Total Leads Punch <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                                   </h4>
                                   <div class="table-responsive bg-white">
                                        <table class="table table-bordred">
                                        <tr>
                                             <tH>Name</th>
                                             <th>Agent Name</th>
                                             <th>Office Phone</th>
                                             <th>Email Address</th>
                                             <th>Date Created</th>
                                             <th>Actions</th>
                                        </tr>
                                        <?php $i=0; foreach($approved_leads as $leads): $i++; ?>
                                        <?php if($i<=5):?>
                                             <tr>
                                                  <td><?= $leads["name"] ?></td>
                                                  <td>&nbsp;</td>
                                                  <td><?= $leads["mobile"]?></td>
                                                  <td><?= $leads["mobile"]?></td>
                                                  <td><?= $leads["created_at"]?></td>
                                                  <td>
                                                       <a href="" class="btn btn-warning">
                                                            <i class="fa fa-pencil"></i>
                                                       </a>
                                                       <a href="" class="btn btn-primary">
                                                            <i class="fa fa-eye"></i>
                                                       </a>
                                                  </td>
                                             </tr>
                                        <?php endif; endforeach;?>
                                        </table>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-6 stretch-card grid-margin">
                         <div class="card bg-gradient-info card-img-holder text-white">
                              <div class="card-body">
                                   
                                   <h4 class="font-weight-normal mb-3">My Accounts(Agents) <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                                   </h4>
                                   <div class="table-responsive bg-white">
                                        <table class="table table-bordred">
                                        <tr>
                                             <tH>Name</th>
                                             <th>Type</th>
                                             <th>Website</th>
                                             <th>Phone</th>
                                             <th>Billing Country</th>
                                             <th>Actions</th>
                                        </tr>
                                        <?php $i=0; foreach($agents as $agent): $i++; ?>
                                        <?php if($i<=5):?>
                                             <tr>
                                                  <td><?= $agent["firstname"] ?></td>
                                                  <td>Agent</td>
                                                  <td>&nbsp;</td>
                                                  <td><?= $agent["mobile"]?></td>
                                                  <td>IN</td>
                                                  <td>
                                                       <a href="" class="btn btn-warning">
                                                            <i class="fa fa-pencil"></i>
                                                       </a>
                                                       <a href="" class="btn btn-primary">
                                                            <i class="fa fa-eye"></i>
                                                       </a>
                                                  </td>
                                             </tr>
                                        <?php endif; endforeach;?>
                                        </table>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <?php else: ?>



                    <div class="col-md-6 stretch-card grid-margin">
                         <div class="card bg-gradient-primary card-img-holder text-white">
                              <div class="card-body">
                                   
                                   <h4 class="font-weight-normal mb-3">Log Calls <i class="mdi mdi-diamond mdi-24px float-right"></i>
                                   </h4>
                                   <div class="table-responsive bg-white">
                                        <table class="table table-bordred">
                                        <tr>
                                             <tH>Close</th>
                                             <th>Subject </th>
                                             <th>Related to</th>
                                             <th>Date & Time</th>
                                             <th>Accept</th>
                                             <th>Status</th>
                                             <th>Actions</th>
                                        </tr>
                                        <?php $i=0; foreach($logcalls as $logs): $i++; ?>
                                        <?php if($i<=5):?>
                                             <tr>
                                                  <td><big>&times;</big></td>
                                                  <td><?= $logs["subject"] ?></td>
                                                  <td><?= $logs["related_to"]?></td>
                                                  <td><?= $logs["start_date_time"]?></td>
                                                  <td>Accepted</td>
                                                  <td><?= $logs["status"]?></td>
                                                  <td>
                                                       <a href="" class="btn btn-warning">
                                                            <i class="fa fa-pencil"></i>
                                                       </a>
                                                       <a href="" class="btn btn-primary">
                                                            <i class="fa fa-eye"></i>
                                                       </a>
                                                  </td>
                                             </tr>
                                        <?php endif; endforeach;?>
                                        </table>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-6 stretch-card grid-margin">
                         <div class="card bg-gradient-warning card-img-holder text-white">
                              <div class="card-body">
                                  
                                   <h4 class="font-weight-normal mb-3">Meetings<i class="mdi mdi-diamond mdi-24px float-right"></i>
                                   </h4>
                                   <div class="table-responsive bg-white">
                                   <table class="table table-bordred">
                                        <tr>
                                             <tH>Close</th>
                                             <th>Subject </th>
                                             <th>Related to</th>
                                             <th>Date & Time</th>
                                             <th>Accept</th>
                                             
                                             <th>Actions</th>
                                        </tr>
                                        <?php $i=0; foreach($meetings as $meet): $i++; ?>
                                        <?php if($i<=5):?>
                                             <tr>
                                                  <td><big>&times;</big></td>
                                                  <td><?= $meet["subject"] ?></td>
                                                  <td><?= $meet["related_to"]?></td>
                                                  <td><?= $meet["start_date_time"]?></td>
                                                  <td>Accepted</td>
                                                  
                                                  <td>
                                                       <a href="" class="btn btn-warning">
                                                            <i class="fa fa-pencil"></i>
                                                       </a>
                                                       <a href="" class="btn btn-primary">
                                                            <i class="fa fa-eye"></i>
                                                       </a>
                                                  </td>
                                             </tr>
                                        <?php endif; endforeach;?>
                                        </table>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <?php endif; ?>
                    <!-- <div class="col-lg-6 grid-margin stretch-card">
                         <div class="card">
                              <div class="card-body">
                                   <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                             <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                             <div class=""></div>
                                        </div>
                                   </div>
                                   <h4 class="card-title">Pie chart</h4>
                                   <canvas id="pieChart" style="height: 343px; display: block; width: 686px;" width="686" height="343" class="chartjs-render-monitor"></canvas>
                              </div>
                         </div>
                    </div>

                    <div class="col-lg-6 grid-margin stretch-card">
                         <div class="card">
                              <div class="card-body">
                                   <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                             <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                             <div class=""></div>
                                        </div>
                                   </div>
                                   <h4 class="card-title">Line chart</h4>
                                   <canvas id="lineChart" style="height: 343px; display: block; width: 686px;" width="686" height="343" class="chartjs-render-monitor"></canvas>
                              </div>
                         </div>
                    </div> -->

               </div>

          </div>

     </div>
</div>

<script>
     localStorage.clear();
     localStorage.setItem("p1", <?= count($quotation); ?>)
     localStorage.setItem("p2", <?= count($approved_leads); ?>)
     localStorage.setItem("p3", <?= count($disapproved_leads) ?>)
     localStorage.setItem("p4", <?= count($complete_leads) ?>)
</script>