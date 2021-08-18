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
                    <form action="" id="product-filter" method="POST">
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
                                   <label for="">Item</label>
                                   <select name="item" class="form-control border" id="">
                                        <option value="">Choose</option>
                                        <?php
                                        foreach ($items as $item) :

                                        ?>
                                             <option value="<?= $item->item_id ?>"><?= $item->item_name ?></option>
                                        <?php

                                        endforeach;

                                        ?>
                                   </select>
                              </div>


                              <div class="col">
                                   <label for="">Customer</label>
                                   <select name="customer" class="form-control border text-capitalize" id="">
                                        <option value="">Choose</option>
                                        <?php
                                        foreach ($customers as $customer) :

                                        ?>
                                             <option value="<?= $customer->customer_id ?>"><?= $customer->name ?></option>
                                        <?php

                                        endforeach;

                                        ?>

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
                    <table class="table table-bordered productTable">
                         <thead>
                              <tr>
                                   <th>Product Name</th>
                                   <th>Item Name</th>
                                   <th>Item Amount</th>
                                   <!-- <th>Amount</th> -->
                                   <th>Customer</th>
                                   <th>Lead Number</th>
                                   <th>Status</th>
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

          $(document).on("submit", "#product-filter", function(e) {
               e.preventDefault();
               var formdata = $(this).serializeArray();
               console.log(formdata);
               var html = customer = email = mobile = product = status = item_name =  "";
               $(".productTable tbody").html("");
               $.ajax({
                    method: "post",
                    url: "<?= base_url() ?>ajax/productfilter",
                    data: formdata,
                    success: function(status) {
                         var results = JSON.parse(status);
                         $.each(results.customer_item, function(k1, ci) {

                              $.each(results.items,function(k4,i){
                                   if(i["item_id"]==ci["item_id"])
                                   {
                                        item_name = i["item_name"];
                                   } 
                                   $.each(results.products, function(k3, p) {
                                   if (i["product_id"] == p["product_id"]) {
                                        product = p["product_name"];
                                   }
                              });
                              });
                              $.each(results.customers, function(k, c) {
                                   customer = c["name"];
                                   mobile = c["mobile"];
                                   email = c["email"];
                              });
                              
                              // i["lead_id"]
                              html += "<tr>";
                              html += "<td>" + product + "</td>";
                              html += "<td>" + item_name + "</td>";
                              html += "<td>" + ci["unit_price"] + "</td>";
                              
                              html += "<td class='text-capitalize' data-toggle='tooltip' data-placement='right' title='Email : "+email+"&#013;Mobile : "+mobile+"'>" + customer + "</td>";
                              html += "<td>" + ci["lead_id"] + "</td>";
                              html += "<td>" + "ACTIVE" + "</td>";
                              html += "</tr>";
                              $(".productTable tbody").append(html);
                         });

                    }
               })
          });
          $(document).on("click", ".export", function() {
               var table = $(".productTable");
               if (table && table.length) {
                    $(table).table2excel({
                         exclude: ".noExl",
                         name: "product-report",
                         filename: "product-report" + ".xls",
                         fileext: ".xls",
                         exclude_img: true,
                         exclude_links: true,
                         exclude_inputs: true,
                         preserveColors: false
                    });
               }
          });
     })
</script>