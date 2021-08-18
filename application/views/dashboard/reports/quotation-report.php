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
                    <form action="" id="quotation-filter" method="POST">
                         <div class="row">
                              <div class="col-sm-12 mb-3">
                                   Filter By
                              </div>
                              <div class="col-md-2 col-sm-12">
                                   <label for="">From Date</label>
                                   <input type="date" id="fromdate" name="fromdate" class="form-control border">
                              </div>
                              <div class="col-md-2 col-sm-12">
                                   <label for="">To Date</label>
                                   <input type="date" id="todate" name="todate" class="form-control border">
                              </div>
                              <div class="col-md-2 col-sm-12">
                                   <label for="">In Order Generated</label>
                                   <select name="orders" class="form-control border" id="">
                                        <option value="">Select Option</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                   </select>
                              </div>
                              <div class="col-md-2 col-sm-12">
                                   <label for="">Status</label>
                                   <select name="status" class="form-control border" id="">
                                        <option value="">Select Status</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                   </select>
                              </div>
                              <div class="col-md-4 col-sm-12">
                                   <button type="submit" class="btn mt-4 btn-primary">Go</button>
                                   <a href="javascript:void(0)" type="button" class="btn mt-4 btn-primary export">Export</a>
                                   <button type="reset" class="btn mt-4 btn-primary">Clear</button>
                              </div>
                         </div>
                    </form>
               </div>
               <div class="table-responsive">
                    <table class="table table-bordered quotationTable">
                         <thead>
                              <tr>
                                   <th>Lead Number</th>
                                   <th>Customer</th>
                                   <th>In Order Generated</th>
                                   <th>Payment</th>
                                   <th>Status</th>
                                   <th>Amount</th>
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

          $(document).on("submit", "#quotation-filter", function(e) {

               e.preventDefault();

               var formdata = $(this).serializeArray();
               $(".quotationTable tbody").html("");
               $.ajax({
                    method: "post",
                    url: "<?= base_url() ?>ajax/quotationfilter",
                    data: formdata,
                    success: function(status) {
                         // console.log(status);
                         var result = JSON.parse(status);
                         var order = payment = amount = status = mobile = email = customer =  "";
                         var html = "";
                         $.each(result.quotation, function(k, q) {
                              $.each(result.orders, function(k1, o) {
                                   if (o["lead_id"] == q["lead_id"] && o["quotation_id"] == q["quotation_id"]) {
                                        order = "yes"
                                        payment = o["payment"];

                                        status = (o["status"] == "1") ? "ACTIVE" : "INACTIVE";
                                   }
                                   amount = q["item_total"];
                              });
                              $.each(result.customer,function(k3,c){
                                   if(q["customer_id"] == c["customer_id"])
                                   {
                                        customer = c["name"]
                                        mobile = c["mobile"];
                                        email = c["email"];
                                   }
                              });
                              html += "<tr>";
                              html += "<td>" + q["lead_id"] + "</td>";
                              html += "<td class='text-capitalize' data-toggle='tooltip' data-placement='right' title='Email : "+email+"&#013;Mobile : "+mobile+"'>" + customer + "</td>";
                              html += "<td>" + order + "</td>";
                              html += "<td>" + payment + "</td>";
                              html += "<td>" + status + "</td>";
                              html += "<td>" + amount + "</td>";

                              html += "</tr>";

                         })
                         $(".quotationTable tbody").append(html);
                    }
               })

          });

          $(document).on("click", ".export", function() {
               var table = $(".quotationTable");
               if (table && table.length) {
                    $(table).table2excel({
                         exclude: ".noExl",
                         name: "quotation-report",
                         filename: "quotation-report" + ".xls",
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