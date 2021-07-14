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
                    <div class="col-md-6 stretch-card grid-margin">
                         <div class="card bg-gradient-danger card-img-holder text-white">
                              <div class="card-body">
                                   <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image">
                                   <h4 class="font-weight-normal mb-3">Total Leads <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                                   </h4>
                                   <h2 class="mb-5"><?php echo count($leads);?></h2>
                                   <h6 class="card-text"></h6>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-6 stretch-card grid-margin">
                         <div class="card bg-gradient-info card-img-holder text-white">
                              <div class="card-body">
                                   <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image">
                                   <h4 class="font-weight-normal mb-3">Total Orders <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                                   </h4>
                                   <h2 class="mb-5"><?= count($order_forms); ?></h2>
                                   <h6 class="card-text"></h6>
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
                    </div>

               </div>

          </div>

     </div>
</div>
<script>
    localStorage.clear();
     localStorage.setItem("p1",<?= count($leads); ?>)
     localStorage.setItem("p2",<?= count($order_forms); ?>)
     
</script>