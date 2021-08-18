<div class="main-panel page has-sidebar-left height-full">
     <div class="content-wrapper container-fluid relative animatedParent animateOnce p-lg-5">
          <?php if ($this->session->flashdata('message')) :
          ?>

               <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong><?= $this->session->flashdata('message') ?>.</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                    </button>
               </div>
          <?php endif; ?>
          <div class="bg-white p-3">
               <div class="col-sm-12 mb-5 mt-5">
                    <form action="" id="lead-filter" method="POST">
                         <div class="row">
                              <div class="col-sm-12 mb-3">
                                   Filter By
                              </div>
                              <div class="col">
                                   <label for="">From Date</label>
                                   <input type="date" id="fromdate" name="fromdate" class="form-control border">
                              </div>
                              <div class="col">
                                   <label for="">To Date</label>
                                   <input type="date" id="todate" name="todate" class="form-control border">
                              </div>
                              <div class="col">
                                   <label for="">Assigned By</label>
                                   <select name="assigned_by" class="form-control border text-capitalize" id="">
                                        <option value="">Choose</option>
                                        <?php
                                        foreach ($users as $user) :
                                             if ($user->category == "BTL" || $user->category == "CA" || $user->category == "CB" || $user->category == "CC") :
                                        ?>
                                                  <option value="<?= $user->id ?>"><?= $user->firstname ?></option>
                                        <?php
                                             endif;
                                        endforeach;

                                        ?>

                                   </select>
                              </div>
                              <div class="col">
                                   <label for="">Assigned To</label>
                                   <select name="assigned_to" class="form-control border" id="">
                                        <option value="">Choose</option>
                                        <?php
                                        foreach ($users as $user) :
                                             if ($user->category == "BA") :
                                        ?>
                                                  <option value="<?= $user->id ?>"><?= $user->firstname ?></option>
                                        <?php
                                             endif;
                                        endforeach;

                                        ?>
                                   </select>
                              </div>
                              <div class="col">
                                   <label for="">Opportunity</label>
                                   <select name="orders" class="form-control border" id="">
                                        <option value="">Select Option</option>
                                        <option value="0">Yes</option>
                                        <option value="1">No</option>
                                   </select>
                              </div>
                              <div class="col">
                                   <label for="">Status</label>
                                   <select name="status" class="form-control border" id="">
                                        <option value="">Select Status</option>
                                        <option value="New">New</option>
                                        <option value="In Process">In Process</option>
                                        <option value="Complete">Complete</option>
                                   </select>
                              </div>
                              <div class="col-lg-12 col-md-12 col-sm-12">
                                   <button type="submit" class="btn mt-4 btn-primary">Go</button>
                                   <a href="javascript:void(0)" type="button" class="btn mt-4 btn-primary export">Export</a>
                                   <button type="reset" class="btn mt-4 btn-primary">Clear</button>
                              </div>
                         </div>
                    </form>
               </div>
               <div class="table-responsive">
                    <table class="table table-bordered leadsTable">
                         <thead>
                              <tr>
                                   <th>Lead Number</th>
                                   <th>Assigned to</th>
                                   <th>Assigned By</th>
                                   <th>Status</th>
                                   <!-- <th>Amount</th> -->
                                   <th>Customer</th>
                                   <th>Is Opportunity Created</th>
                                   <th>Payment</th>
                              </tr>
                         </thead>
                         <tbody>

                         </tbody>


                    </table>
               </div>
          </div>
     </div>
</div>

<script>
     $(document).ready(function() {

          $(document).on("change","#fromdate",function(){
              $("#todate").attr("min",$(this).val());
          });

          $(document).on("submit", "#lead-filter", function(e) {
               e.preventDefault();
               var formdata = $(this).serializeArray();

               // console.log(formdata);
               $(".leadsTable tbody").html("");
               var html = amount = oppo = assigned_to = customer = email = mobile = assigned_by = "";
               $.ajax({
                    method: "post",
                    url: "<?= base_url() ?>ajax/leadFilter",
                    data: formdata,
                    success: function(status) {

                         var result = JSON.parse(status);

                         $.each(result.leads, function(k, l) {

                              $.each(result.opportunity, function(k1, o) {
                                   if (l["id"] == o["lead_id"]) {
                                        oppo = "Yes"
                                        console.log(o["lead_id"]);
                                   }
                                   else
                                   {
                                        oppo = "No";
                                   }
                              });

                              if (l["journey"] == "New") {
                                   amount = "Not Done";
                              }
                              if (l["journey"] == "In Process") {
                                   amount = "Not Done";
                              }
                              if (l["journey"] == "Completed") {
                                   amount = "Done";
                              }

                              $.each(result.users, function(k2, u) {
                                   if (u["id"] == l["assigned_to"]) {
                                        assigned_to = u["firstname"];
                                   }

                                   if (u["id"] == l["assigned_by"]) {
                                        assigned_by = u["firstname"];
                                   }
                              });

                              $.each(result.lead_customer,function(k5,lc){
                                   if(lc["lead_id"]==l["id"])
                                   {
                                        var customer_id = lc["customer_id"];
                                        $.each(result.customer,function(k6,cu){
                                             if(cu["customer_id"]==customer_id)
                                             {
                                                  customer = cu["name"];
                                                  mobile = cu["mobile"];
                                                  email = cu["email"];
                                             }
                                        });
                                   }
                              });

                              // console.log(mobile+customer+email);
                              html += "<tr>";
                              html += "<td>" + l["id"] + "</td>";
                              html += "<td>" + assigned_to + "</td>";
                              html += "<td>" + assigned_by + "</td>";
                              html += "<td>" + l["journey"] + "</td>";
                              html += "<td class='text-capitalize' data-toggle='tooltip' data-placement='right' title='Name : " + customer + "&#013;Mobile : " + mobile + "&#013;Email : "+ email +"'>" + customer + "</td>";
                              html += "<td>" + oppo + "</td>";
                              html += "<td>" + amount + "</td>";
                              html += "";
                              html += "</tr>";
                         });
                         $(".leadsTable tbody").append(html);
                    }
               })
          });


          $(document).on("click", ".export", function() {
               var table = $(".leadsTable");
               if (table && table.length) {
                    $(table).table2excel({
                         exclude: ".noExl",
                         name: "leads-report",
                         filename: "leads-report" + ".xls",
                         fileext: ".xls",
                         exclude_img: true,
                         exclude_links: true,
                         exclude_inputs: true,
                         preserveColors: false
                    });
               }
          });


     });
</script>