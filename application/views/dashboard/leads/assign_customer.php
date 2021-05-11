    <div class="col-md-9 col-sm-12 mt-5 mx-auto">


         <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
              <li class="nav-item">
                   <a class="nav-link active nav-tabs pills-home-tab" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Customer</a>
              </li>
              <li class="nav-item">
                   <a class="nav-link nav-tabs pills-oppo-tab <?= (count($lead_customer) == 0) ? "disabled" : "" ?>" id="pills-oppo-tab" data-toggle="pill" href="#pills-oppo" role="tab" aria-controls="pills-oppo" aria-selected="true">Opportunity</a>
              </li>
              <li class="nav-item">
                   <a class="nav-link nav-tabs pills-profile-tab <?= (count($lead_customer) == 0) ? "disabled" : "" ?>" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Product</a>
              </li>
              <li class="nav-item">
                   <a class="nav-link nav-tabs pills-activity-tab <?= (count($lead_customer) == 0) ? "disabled" : "" ?>" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Activity</a>
              </li>
              <li class="nav-item">
                   <a class="nav-link nav-tabs pills-history-tab <?= (count($lead_customer) == 0) ? "disabled" : "" ?>" id="pills-history-tab" data-toggle="pill" href="#pills-history" role="tab" aria-controls="pills-history" aria-selected="false">History</a>
              </li>
         </ul>
         <div class="tab-content bg-white p-3" style="height: 100vh;" id="pills-tabContent">
              <!-- tab 1111111111111111111111111111111111111111111111111111 -->
              <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                   <!-- <div class="form-group">
                        <input type="radio" class="customer" name="customer" value="new">New Customer
                        <input type="radio" class="customer custom1" name="customer" checked value="old">Existing Customer
                   </div> -->


                   <div class="row">
                        <div class="col-sm-3">

                             <ul class="list-group">
                                  <li class="list-group-item text-right"><button title="Add New Customer" type="reset" class="btn btn-success create">+</button></li>
                                  <li class="list-group-item">
                                       <input type="search" id="customer-search" class="form-control" placeholder="Enter Customer Name" />
                                  </li>
                                  <ul class="list-group  customer-list">
                                       <?php $active = "";
                                        foreach ($customers as $customer) : ?>
                                            <?php if ($lead_customer) : ?>

                                                 <li class="list-group-item customers <?= ($lead_customer[0]["customer_id"] == $customer->customer_id) ? "active" : "" ?>" data-customer="<?= $customer->customer_id ?>" style="cursor: pointer;"><?= $customer->name ?></li>
                                            <?php else : ?>
                                                 <li class="list-group-item customers" data-customer="<?= $customer->customer_id ?>" style="cursor: pointer;"><?= $customer->name ?></li>
                                            <?php endif; ?>


                                       <?php endforeach; ?>
                                  </ul>
                             </ul>
                        </div>
                        <div class="col-sm-9">

                             <form action="" method="post" class="add-customer" enctype="multipart/form-data">
                                  <div class="row">
                                       <input type="hidden" name="lead_id" value="<?= $lead_id ?>" class="lead_id">
                                       <input type="hidden" name="customer_id" id="customer_id">

                                       <div class="form-group col-sm-6">
                                            <label for="">Surname</label>
                                            <input type="text" name="surname" id="surname" placeholder="for example 'Mr or Miss or Mrs'" class="form-control  border">
                                       </div>
                                       <div class="form-group col-sm-6">
                                            <label for="">Address 1</label>
                                            <input type="text" name="address_1" id="address_1" placeholder="for example door no" class="form-control  border">
                                       </div>
                                       <div class="form-group col-sm-6">
                                            <label for="">Full Name</label>
                                            <input type="text" name="customer-name" id="customer-name" placeholder="Enter Customer Name" class="form-control  border">
                                       </div>
                                       <div class="form-group col-sm-6">
                                            <label for="">Address 2</label>
                                            <input type="text" name="address_2" id="address_2" placeholder="for example street/block" class="form-control  border">
                                       </div>
                                       <div class="form-group col-sm-6">
                                            <label for="">Mobile</label>
                                            <input type="text" name="mobile" id="mobile" placeholder="Enter Mobile" class="form-control  border">
                                       </div>
                                       <div class="form-group col-sm-6">
                                            <label for="">Address 3</label>
                                            <input type="text" name="address_3" id="address_3" class="form-control  border">
                                       </div>
                                       <div class="form-group col-sm-6">
                                            <label for="">Email</label>
                                            <input type="text" name="email" id="email" placeholder="Enter Email" class="form-control  border">
                                       </div>
                                       <div class="form-group col-sm-6">
                                            <label for="">State</label>
                                            <input type="text" name="state" id="state" class="form-control  border">
                                       </div>
                                       <div class="form-group col-sm-6">
                                            <label for="">Alternate Mobile</label>
                                            <input type="text" name="alternate_mobile" id="alternate_mobile" class="form-control  border">
                                       </div>
                                       <div class="form-group col-sm-6">
                                            <label for="">City</label>
                                            <input type="text" name="city" id="city" class="form-control  border">
                                       </div>
                                       <div class="form-group col-sm-6">
                                            <label for="">Zip Code</label>
                                            <input type="text" name="zip" id="zipcode" class="form-control  border">
                                       </div>
                                       <div class="form-group col-sm-6">
                                            <label for="">&nbsp;</label>

                                       </div>

                                  </div>
                                  <input type="submit" class="btn btn-success button" value="SAVE">

                             </form>
                        </div>

                   </div>





              </div>
              <!-- tab 2222222222222222222222222222222222222222222222 -->
              <div class="tab-pane fade bg-white p-3" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                   <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                             <a class="nav-link sub-nav-tabs pills-item-tab " id="pills-item-tab" data-toggle="pill" href="#pills-item" role="tab" aria-controls="pills-item" aria-selected="true">Items</a>
                        </li>
                        <li class="nav-item">
                             <a class="nav-link sub-nav-tabs pills-review-tab" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-selected="true">Review</a>
                        </li>
                        <li class="nav-item">
                             <a class="nav-link sub-nav-tabs pills-terms-tab" id="pills-terms-tab" data-toggle="pill" href="#pills-terms" role="tab" aria-controls="pills-terms" aria-selected="true">Terms</a>
                        </li>
                   </ul>
                   <div class="tab-content bg-white p-3" id="pills-tabContent">
                        <!-- tab 1111111111111111111111111111111111111111111111111111 -->
                        <div class="tab-pane fade active show" id="pills-item" role="tabpanel" aria-labelledby="pills-item-tab">
                             <form action="" method="post" class="assign-product" enctype="multipart/form-data">
                                  <div class="row">
                                       <?php if (!empty($lead_customer)) : ?>
                                            <div class="form-group col-sm-6">

                                                 <label for="">Customer Name</label>
                                                 <?php foreach ($customers as $customer) : ?>
                                                      <?php if ($customer->customer_id == $lead_customer[0]["customer_id"]) : ?>
                                                           <input type="text" readonly value="<?= $customer->name ?>" class="form-control pcustomer" />
                                                           <input type="hidden" name="pcustomer_id" class="pcustomer_id" value="<?= $customer->customer_id ?>">
                                                      <?php else : ?>
                                                           <!-- <input type="text" readonly  class="form-control pcustomer"/>
                                             <input type="hidden" name="pcustomer_id" class="pcustomer_id" value="<?= $customer->customer_id ?>" > -->
                                                      <?php endif; ?>
                                                 <?php endforeach; ?>

                                            </div>
                                       <?php endif; ?>
                                       <div class="form-group col-sm-12 row">
                                            <div class="col-sm-3">
                                                 <ul class="list-group">
                                                      <li class="list-group-item">
                                                           <input type="search" id="product-search" class="form-control" placeholder="Enter Product Name" />
                                                      </li>
                                                      <ul class="list-group product-list">
                                                           <?php foreach ($products as $product) : ?>
                                                                <li class="list-group-item select-product" style="cursor: pointer;" data-product="<?= $product->product_id ?>"><?= $product->product_name ?></li>
                                                           <?php endforeach; ?>
                                                      </ul>
                                                 </ul>
                                                 <input type="hidden" name="lead_id" value="<?= $lead_id ?>" class="lead_id">
                                            </div>
                                            <div class="col-sm-9 productDetails">
                                                 <caption>Product Details</caption>
                                                 <table class="table table-bordered">
                                                      <thead>
                                                           <th><input type="checkbox" name="" id="all-data"></th>
                                                           <th>Item Name</th>
                                                           <th>Quantity</th>
                                                           <th>Unit Price</th>
                                                           <th>Tax Rate</th>
                                                           <th>Tax Amount</th>
                                                           <th>Total Price</th>
                                                      </thead>
                                                      <tbody>

                                                      </tbody>
                                                 </table>
                                            </div>


                                       </div>

                                  </div>
                             </form>

                        </div>
                        <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
                             <div class="row customer-items">

                             </div>
                             <div class="row total-items border border-success p-3">

                             </div>

                        </div>
                        <div class="tab-pane fade" id="pills-terms" role="tabpanel" aria-labelledby="pills-terms-tab">
                             <h4>Terms and conditions</h4>
                             <div class="col-sm-12 terms row">

                             </div>

                        </div>
                   </div>

              </div>
              <!-- tab 3333333333333333333333333333333333333333333333333333333333333 -->
              <div class="tab-pane fade bg-white p-3" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                   <div class="col-sm-12">
                        <div class="row">
                             <div class="col-sm-12">
                                  <div class="col-sm-3">
                                       <div class="form-group">
                                            <select class="form-control activity">
                                                 <option value="">Select Activity</option>
                                                 <?php foreach ($activity as $activities) : ?>
                                                      <option data-activity="<?= strtolower(str_replace(" ", "_", $activities->name)) ?>" value="<?= $activities->id ?>"><?= $activities->name ?></option>
                                                 <?php endforeach; ?>
                                            </select>
                                       </div>
                                  </div>
                             </div>

                             <div class="col-sm-12 meeting d-none">

                                  <form method="post" action="">
                                       <div class="row">
                                            <div class="col-sm-8 mx-auto row">

                                                 <div class="form-group col-sm-6">
                                                      <label for="">Subject</label>
                                                      <input type="text" name="subject" class="form-control border-bottom">
                                                 </div>
                                                 <div class="form-group col-sm-6">
                                                      <label for="">Status</label>
                                                      <select name="status" class="form-control border-bottom">
                                                           <option>Planned</option>
                                                           <option>Held</option>
                                                           <option>Not Held</option>
                                                      </select>
                                                 </div>
                                                 <div class="form-group col-sm-6">
                                                      <label for="">Start date</label>
                                                      <input type="text" id="startDate" name="fromdate" class="form-control border-bottom">
                                                 </div>
                                                 <div class="form-group col-sm-6">
                                                      <label for="">Related to</label>
                                                      <select class="form-control border-bottom" name="related_to">
                                                           <option>Account</option>
                                                           <option value="">Contact</option>
                                                           <option value="">Task</option>
                                                           <option value="">Opportunity</option>
                                                           <option value="">Bug</option>
                                                           <option value="">Case</option>
                                                           <option value="">Lead</option>
                                                           <option value="">Project</option>
                                                           <option value="">Project Task</option>
                                                           <option value="">Target</option>
                                                           <option value="">Contract</option>
                                                           <option value="">Invoice</option>
                                                           <option value="">Quote</option>
                                                           <option value="">Product</option>
                                                      </select>
                                                 </div>
                                                 <div class="form-group col-sm-6">
                                                      &nbsp;
                                                 </div>
                                                 <div class="form-group col-sm-6">
                                                      <input type="text" name="" value="<?= $this->session->name ?>" class="form-control border-bottom" id="">
                                                 </div>

                                                 <div class="form-group col-sm-6">
                                                      <label for="">End date</label>
                                                      <input type="text" id="endDate" class="form-control border-bottom">
                                                 </div>
                                                 <div class="form-group col-sm-6">
                                                      <label for="">Location</label>
                                                      <input type="text" class="form-control border-bottom">
                                                 </div>
                                                 <div class="form-group col-sm-6">
                                                      <label for="">Duration</label>
                                                      <select name="" class="form-control" id="">
                                                           <option>15 mins</option>
                                                           <option>30 mins</option>
                                                           <option>1 hour</option>
                                                           <option>1.5 hour</option>
                                                           <option>2 hour</option>
                                                           <option>3 hour</option>
                                                           <option>4 hour</option>
                                                           <option>5 hour</option>
                                                           <option>6 hour</option>
                                                           <option>1 day</option>
                                                           <option>2 days</option>
                                                           <option>3 days</option>
                                                           <option>1 week</option>
                                                      </select>
                                                 </div>
                                                 <div class="form-group col-sm-6">
                                                      <label for="">Reminder</label>
                                                      <input type="text" class="form-control border-bottom">
                                                 </div>
                                                 <div class="form-group col-sm-6">
                                                      <label for="">Assigned to</label>
                                                      <input type="text" class="form-control border-bottom">
                                                 </div>
                                                 <div class="form-group col-sm-12">
                                                      <label for="">Description</label>
                                                      <textarea class="form-control border-bottom" rows="5"></textarea>
                                                 </div>
                                                  <div class="form-group col-sm-12">
                                                    <input type="submit" class="btn btn-success" value="ADD DATA">
                                                  </div>
                                            </div>
                                       </div>
                                  </form>

                             </div>

                             <div class="col-sm-12 log_call d-none">

                                  <form method="post" action="">
                                       <div class="row">
                                            <div class="col-sm-8 mx-auto row">
                                                 <div class="form-group col-sm-6">
                                                      <label for="">Subject</label>
                                                      <input type="text" name="subject" class="form-control border-bottom">
                                                 </div>
                                                 <div class="form-group col-sm-6">
                                                      <label for="">Status</label>
                                                      <div class="row">
                                                           <div class="col-sm-6">
                                                                <select name="status" class="form-control border-bottom">
                                                                     <option>Inbound</option>
                                                                     <option>Outbound</option>
                                                                </select>
                                                           </div>
                                                           <div class="col-sm-6">
                                                                <select name="status" class="form-control border-bottom">
                                                                     <option>Planned</option>
                                                                     <option>Held</option>
                                                                     <option>Not Held</option>
                                                                </select>
                                                           </div>
                                                      </div>
                                                 </div>
                                                 <div class="form-group col-sm-6">
                                                      <label for="">Communication Preferred</label>
                                                      <select name="" id="" class="form-control border-bottom">
                                                           <option value="whatsapp">Whatsapp</option>
                                                           <option value="email">Email</option>
                                                           <option value="call">Call</option>
                                                      </select>
                                                 </div>
                                                 <div class="form-group col-sm-6">
                                                      <label for="">Lead Possibility</label>
                                                      <select name="" id="" class="form-control border-bottom">
                                                           <option value="qualified">Qualified</option>
                                                           <option value="disqualified">Disqualified</option>
                                                      </select>
                                                 </div>
                                                 <div class="form-group col-sm-6">
                                                      <label for="">Start date</label>
                                                      <input type="text" id="startDate" class="form-control border-bottom">
                                                 </div>
                                                 <div class="form-group col-sm-6">
                                                      <label for="">Related to</label>
                                                      <input type="text" name="" class="form-control border-bottom" id="">
                                                 </div>

                                                 <div class="form-group col-sm-6">
                                                      <label for="">Duration</label>
                                                      <div class="row">
                                                           <div class="col-sm-6">
                                                                <input type="text" name="" class="form-control border-bottom" id="">
                                                           </div>
                                                           <div class="col-sm-6">
                                                                <select name="" class="form-control  border-bottom" id="">
                                                                     <option>15 mins</option>
                                                                     <option>30 mins</option>
                                                                </select>
                                                           </div>
                                                      </div>

                                                 </div>
                                                 <div class="form-group col-sm-6">
                                                      <label for="">Reminder</label>
                                                      <input type="text" class="form-control border-bottom">
                                                 </div>
                                                 <div class="form-group col-sm-6">
                                                      <label for="">Assigned to</label>
                                                      <input type="text" class="form-control border-bottom">
                                                 </div>
                                                 <div class="form-group col-sm-12">
                                                      <label for="">Description</label>
                                                      <textarea class="form-control border-bottom" rows="5"></textarea>
                                                 </div>
                                                 <div class="form-group col-sm-12">
                                                      <input type="submit" class="btn btn-success" value="ADD DATA">
                                                 </div>
                                            </div>
                                       </div>
                                  </form>

                             </div>

                             <div class="col-sm-12 compose_email d-none">

                             </div>
                        </div>
                   </div>
              </div>
         </div>





    </div>

    <script>
         $(document).ready(function() {

              if (localStorage.getItem("tabs")) {
                   var tabs = localStorage.getItem("tabs");



                   if (tabs == $(tabs + "-tab").attr("href")) {

                        $(".nav-tabs").removeClass("active");
                        $(tabs + "-tab").addClass("active")

                        $(".tab-pane").removeClass("active show");

                        $(tabs).addClass("active");
                        $(tabs).addClass("show");
                   }

              }







              $(".nav-tabs").click(function() {
                   localStorage.setItem("tabs", $(this).attr("href"));
              });




              //     defaultCheck();

              $(".create").on("click", function() {
                   $(".add-customer").trigger("reset");
                   $(".button").val("SAVE")
                   $(".customers").removeClass("active");
              });

              $(".customers").click(function() {
                   var id = $(this).data("customer");
                   $(".customers").removeClass("active");
                   $(this).addClass("active");
                   $.ajax({
                        method: "post",
                        url: "<?= base_url() ?>ajax/getcustomer",
                        data: {
                             id: id
                        },
                        success: function(status) {

                             var res = JSON.parse(status);

                             $(".button").val("UPDATE")

                             $("#surname").val(res["customer"][0]["prefix"]);
                             $("#customer-name").val(res["customer"][0]["name"]);
                             $("#email").val(res["customer"][0]["email"]);
                             $("#mobile").val(res["customer"][0]["mobile"]);
                             $("#alternate_mobile").val(res["customer"][0]["alternate_mobile"]);
                             $("#address_1").val(res["address"][0]["address_1"]);
                             $("#address_2").val(res["address"][0]["address_2"]);
                             $("#address_3").val(res["address"][0]["address_3"]);
                             $("#state").val(res["address"][0]["state"]);
                             $("#city").val(res["address"][0]["city"]);
                             $("#zipcode").val(res["address"][0]["zip"]);

                        }
                   })
              });


              $(document).on("submit", ".add-customer", function(e) {
                   e.preventDefault();
                   var formdata = $(".add-customer").serialize();


                   $.ajax({
                        url: "<?= base_url() ?>ajax/addcustomerdata",
                        method: "post",
                        data: formdata,
                        success: function(status) {

                             $(".customers").removeClass("active");


                             $(".nav-tabs#pills-profile-tab").removeClass("disabled")
                             //     $(".nav-tabs").removeClass("active");
                             //     $(".nav-tabs").removeClass("show");
                             //     $(".nav-tabs#pills-profile-tab").addClass("active");
                             //     $(".nav-tabs#pills-profile-tab").addClass(" show");
                             //     $("#pills-home").removeClass("show");
                             //     $("#pills-home").removeClass("active");
                             //     $("#pills-profile").addClass("show");
                             //     $("#pills-profile").addClass("active");
                             status = JSON.parse(status);
                             $(".new-customer").removeClass("d-none");
                             $(".pcustomer").val(status[0]["name"]);
                             $(".pcustomer_id").val(status[0]["customer_id"]);

                             // $(".customer_id").val();

                             $(".add-customer").trigger("reset");
                             location.reload();
                             //     getcusotmer();
                        }
                   })
              });

              $(".assign-customer").on("submit", function(e) {
                   e.preventDefault();
                   var formdata = $(".assign-customer").serialize();


                   $.ajax({
                        url: "<?= base_url() ?>ajax/assigncustomerdata",
                        method: "post",
                        data: formdata,
                        success: function(status) {

                        }
                   })
              });

              $(document).on("click", "#pills-review-tab", function(e) {

                   var leadID = $(".lead_id").val();
                   var custID = $(".pcustomer_id").val();
                   $.ajax({
                        url: "<?= base_url() ?>ajax/getcustomeritem",
                        method: "post",
                        data: {
                             lead_id: $(".lead_id").val()
                        },
                        success: function(status) {
                             $(".customer-items").html('');

                             // return false;
                             var status = JSON.parse(status);
                             var total_amount = 0;
                             var total_tax = 0;
                             $.each(status["item_new"], function(k, v) {

                                  var checked = "";
                                  var tax_amount = "";
                                  var total_price = "";
                                  var quantity = "";
                                  var product_id = "";
                                  var item_id = "";
                                  var unit_price = "";
                                  $.each(status["customer_item"], function(k1, v1) {
                                       // return false;
                                       if (status["customer_item"] && v["item_name"] && v["item_id"] == v1["item_id"]) {
                                            checked = (v["item_id"] == v1["item_id"]) ? "checked" : "";
                                            total_price = (v1["total_price"]) ? v1["total_price"] : "";
                                            tax_amount = (v1["tax_amount"]) ? v1["tax_amount"] : "";
                                            quantity = (v1["quantity"]) ? v1["quantity"] : "";
                                            product_id = v1["product_id"] ? v1["product_id"] : "";
                                            item_id = v["item_id"] ? v["item_id"] : "";
                                            unit_price = (v1["unit_price"]) ? v1["unit_price"] : "";
                                            console.log(v1);
                                       }

                                  });
                                  if (v["product_id"] == product_id && v["item_id"] == item_id && status["customer_item"]) {

                                       var html = '<div class="col-sm-12 col-md-3 mb-3 bg-white item_' + v["item_id"] + '"><div class="card bg-light text-dark border border-success"><div class="card-title p-3 border-bottom border-success">' + v["item_name"] + '<input readonly data-id="' + v["item_id"] + '" type="hidden" value="' + v["item_name"] + '" name="customeritem[]" class="item_name form-control ritem_name_' + v["item_id"] + '""></div>';
                                       html += '<div class="card-body"><label>Quantity</label><input type="text" name="quantity[]" data-id="' + v["item_id"] + '"  placeholder="Enter Your Quantity" value="' + quantity + '" class="rquantity form-control rquantity_' + v["item_id"] + '">';
                                       html += '<label>Unit Price</label><input type="text" data-id="' + v["item_id"] + '"  value="' + unit_price + '" name="unit_price[]"  class="runit_price form-control runit_price_' + v["item_id"] + '">';
                                       html += '<label>Tax Rate</label><input readonly type="text" data-id="' + v["item_id"] + '" value="' + v["tax_rate"] + '" name="tax_rate[]"  class="tax_rate form-control rtax_rate_' + v["item_id"] + '">';
                                       html += '<label>Tax Amount</label><input readonly type="text" data-id="' + v["item_id"] + '"  name="tax_amount[]" value="' + tax_amount + '" class="tax_amount form-control rtax_amount_' + v["item_id"] + '">';
                                       html += '<label>Total Price</label><input readonly type="text" data-id="' + v["item_id"] + '"  name="total_price[]" value="' + total_price + '"  class="total_price form-control rtotal_price_' + v["item_id"] + '">';
                                       html += '<input type="hidden" name="item_id[]" class="item_id_' + v["item_id"] + '" value="' + v["item_id"] + '"/>';
                                       html += '<input type="hidden" name="product_id" class="product_id" value="' + v["product_id"] + '"></div>';
                                       html += '<div class="card-footer"><button data-id="' + v["item_id"] + '" class="btn btn-danger remove remove_' + v["item_id"] + '">Remove</button></div></div></div>';
                                       total_amount = total_amount + parseFloat(total_price);
                                       total_tax = total_tax + parseFloat(tax_amount);
                                       $(".customer-items").append(html);

                                  }

                             });
                             if (total_amount) {
                                  var alltotal = '<hr /><div class="col-sm-12 col-md-4 total-price-amount">Total Amount ' + total_amount + '</div>';
                                  alltotal += '<div class="col-sm-12 col-md-4 total-tax-amount">Total Tax Amount ' + total_tax + '</div>';
                                  alltotal += '<div class="col-sm-12 col-md-4"><a href="<?= base_url() ?>dashboard/lead/generate_pdf/' + leadID + '/' + custID + '" class="btn btn-success"> PDF GENERATION</a></div>';
                                  $(".total-items").html(alltotal);
                             }

                        }
                   });
              });

              $(".select-product").on("click", function(e) {
                   e.preventDefault();
                   var product_id = $(this).data("product");
                   $(".select-product").removeClass("active");
                   $(this).addClass("active");
                   $.ajax({
                        url: "<?= base_url() ?>ajax/getProductItem",
                        method: "post",
                        data: {
                             product_id: product_id,
                             lead_id: $(".lead_id").val()
                        },
                        success: function(status) {
                             $("table tbody").html('');

                             // return false;
                             var status = JSON.parse(status);
                             $.each(status["item_new"], function(k, v) {

                                  var checked = "";
                                  var tax_amount = "";
                                  var total_price = "";
                                  var quantity = "";
                                  var unit_price = "";
                                  $.each(status["customer_item"], function(k1, v1) {
                                       // return false;
                                       if (status["customer_item"] && v["item_name"] && v["item_id"] == v1["item_id"]) {
                                            checked = (v["item_id"] == v1["item_id"]) ? "checked" : "";
                                            total_price = (v1["total_price"]) ? v1["total_price"] : "";
                                            tax_amount = (v1["tax_amount"]) ? v1["tax_amount"] : "";
                                            quantity = (v1["quantity"]) ? v1["quantity"] : "";
                                            unit_price = (v1["unit_price"]) ? v1["unit_price"] : "";
                                            console.log(v1);
                                       }

                                  });
                                  if (v["item_name"] && status["customer_item"]) {
                                       unit_price = (unit_price) ? unit_price : v["unit_price"];
                                       var html = '<tr><td><input type="checkbox" ' + checked + ' data-id="' + v["item_id"] + '" class="add" value="' + v["item_id"] + '" /></td><td><input readonly data-id="' + v["item_id"] + '" type="text" value="' + v["item_name"] + '" name="customeritem[]" class="item_name form-control item_name_' + v["item_id"] + '""></td>';
                                       html += '<td><input type="text" name="quantity[]" data-id="' + v["item_id"] + '" placeholder="Enter Your Quantity" value="' + quantity + '" class="quantity form-control quantity_' + v["item_id"] + '"></td>';
                                       html += '<td><input readonly type="text" data-id="' + v["item_id"] + '"  value="' + unit_price + '" name="unit_price[]"  class="unit_price form-control unit_price_' + v["item_id"] + '"></td>';
                                       html += '<td><input readonly type="text" data-id="' + v["item_id"] + '" value="' + v["tax_rate"] + '" name="tax_rate[]"  class="tax_rate form-control tax_rate_' + v["item_id"] + '"></td>';
                                       html += '<td><input readonly type="text" data-id="' + v["item_id"] + '"  name="tax_amount[]" value="' + tax_amount + '" class="tax_amount form-control tax_amount_' + v["item_id"] + '"></td>';
                                       html += '<td><input readonly type="text" data-id="' + v["item_id"] + '"  name="total_price[]" value="' + total_price + '"  class="total_price form-control total_price_' + v["item_id"] + '">';
                                       html += '<input type="hidden" name="item_id[]" class="item_id_' + v["item_id"] + '" value="' + v["item_id"] + '"/>';
                                       html += '<input type="hidden" name="product_id" class="product_id" value="' + product_id + '"></td></tr>';
                                       $("table tbody").append(html);
                                  }

                             });

                        }
                   });



              });

              $(document).on("keyup", ".quantity", function() {

                   var id = $(this).data("id");

                   var tax_rate = $(".unit_price_" + id).val() * ($(".tax_rate_" + id).val() / 100);

                   // return false;

                   total_tax = tax_rate * $(this).val();



                   $(".tax_amount_" + id).val(total_tax);

                   var total_price = ($(".unit_price_" + id).val() * $(this).val()) + total_tax;



                   $(".total_price_" + id).val(total_price);

                   var total = 0;

                   $(".total_price").each(function() {
                        var id = $(this).data("id");

                        total = total + parseFloat($(this).val());

                        if (total) {
                             $(".total_amount").val(total);
                        }



                   });


                   //data update when quantity value change

                   var id = $(this).data("id");

                   formdata = {
                        item_id: $(".item_id_" + id).val(),
                        quantity: $(".quantity_" + id).val(),
                        tax_rate: $(".tax_rate_" + id).val(),
                        tax_amount: $(".tax_amount_" + id).val(),
                        unit_price: $(".unit_price_" + id).val(),
                        total_price: $(".total_price_" + id).val(),
                        product_id: $(".product_id").val(),
                        pcustomer_id: $(".pcustomer_id").val(),
                        lead_id: $(".lead_id").val(),
                        is_active: "1"
                   };

                   $.ajax({
                        method: "post",
                        url: "<?= base_url() ?>ajax/singleproductsubmit",
                        data: formdata,
                        success: function(status) {
                             //     console.log(status);
                        }
                   })
              });


              $(document).on("keyup", ".quantity", function() {

                   var id = $(this).data("id");

                   var tax_rate = $(".unit_price_" + id).val() * ($(".tax_rate_" + id).val() / 100);

                   // return false;

                   total_tax = tax_rate * $(this).val();



                   $(".tax_amount_" + id).val(total_tax);

                   var total_price = ($(".unit_price_" + id).val() * $(this).val()) + total_tax;



                   $(".total_price_" + id).val(total_price);

                   var total = 0;

                   $(".total_price").each(function() {
                        var id = $(this).data("id");

                        total = total + parseFloat($(this).val());

                        if (total) {
                             $(".total_amount").val(total);
                        }



                   });


                   //data update when quantity value change

                   var id = $(this).data("id");

                   formdata = {
                        item_id: $(".item_id_" + id).val(),
                        quantity: $(".quantity_" + id).val(),
                        tax_rate: $(".tax_rate_" + id).val(),
                        tax_amount: $(".tax_amount_" + id).val(),
                        unit_price: $(".unit_price_" + id).val(),
                        total_price: $(".total_price_" + id).val(),
                        product_id: $(".product_id").val(),
                        pcustomer_id: $(".pcustomer_id").val(),
                        lead_id: $(".lead_id").val(),
                        is_active: "1"
                   };

                   $.ajax({
                        method: "post",
                        url: "<?= base_url() ?>ajax/singleproductsubmit",
                        data: formdata,
                        success: function(status) {
                             //     console.log(status);
                        }
                   })
              });

              $(document).on("keyup", ".rquantity", function() {

                   var id = $(this).data("id");

                   var tax_rate = $(".runit_price_" + id).val() * ($(".rtax_rate_" + id).val() / 100);

                   // return false;

                   total_tax = tax_rate * $(this).val();



                   $(".rtax_amount_" + id).val(total_tax);

                   var total_price = ($(".runit_price_" + id).val() * $(this).val()) + total_tax;



                   $(".rtotal_price_" + id).val(total_price);

                   var total = 0;

                   $(".rtotal_price").each(function() {
                        var id = $(this).data("id");

                        total = total + parseFloat($(this).val());

                        console.log(total);

                        if (total) {
                             $(".total-price-amount").html('Total Amount ' + total + '');
                        }
                   });


                   //data update when quantity value change

                   var id = $(this).data("id");

                   formdata = {
                        item_id: $(".item_id_" + id).val(),
                        quantity: $(".rquantity_" + id).val(),
                        tax_rate: $(".rtax_rate_" + id).val(),
                        tax_amount: $(".rtax_amount_" + id).val(),
                        unit_price: $(".runit_price_" + id).val(),
                        total_price: $(".rtotal_price_" + id).val(),
                        product_id: $(".product_id").val(),
                        pcustomer_id: $(".pcustomer_id").val(),
                        lead_id: $(".lead_id").val(),
                        is_active: "1"
                   };

                   $.ajax({
                        method: "post",
                        url: "<?= base_url() ?>ajax/singleproductsubmit",
                        data: formdata,
                        success: function(status) {
                             //     console.log(status);
                        }
                   })
              });

              $(document).on("keyup", ".runit_price", function() {

                   var id = $(this).data("id");

                   var tax_rate = $(".runit_price_" + id).val() * ($(".rtax_rate_" + id).val() / 100);

                   // return false;

                   total_tax = tax_rate * $(".rquantity_" + id).val();



                   $(".rtax_amount_" + id).val(total_tax);

                   var total_price = ($(".rquantity_" + id).val() * $(this).val()) + total_tax;



                   $(".rtotal_price_" + id).val(total_price);

                   var total = 0;

                   $(".rtotal_price").each(function() {
                        var id = $(this).data("id");

                        total = total + parseFloat($(this).val());

                        console.log(total);

                        if (total) {
                             $(".total-price-amount").html('Total Amount ' + total + '');
                        }
                   });


                   //data update when quantity value change

                   var id = $(this).data("id");

                   formdata = {
                        item_id: $(".item_id_" + id).val(),
                        quantity: $(".rquantity_" + id).val(),
                        tax_rate: $(".rtax_rate_" + id).val(),
                        tax_amount: $(".rtax_amount_" + id).val(),
                        unit_price: $(".runit_price_" + id).val(),
                        total_price: $(".rtotal_price_" + id).val(),
                        product_id: $(".product_id").val(),
                        pcustomer_id: $(".pcustomer_id").val(),
                        lead_id: $(".lead_id").val(),
                        is_active: "1"
                   };


                   //     console.log(formdata); return false;

                   $.ajax({
                        method: "post",
                        url: "<?= base_url() ?>ajax/singleproductsubmit",
                        data: formdata,
                        success: function(status) {
                             //     console.log(status);
                        }
                   })

              });

              $(document).on("click", ".remove", function() {

                   var id = $(this).data("id");

                   formdata = {
                        item_id: $(".item_id_" + id).val(),
                        quantity: $(".quantity_" + id).val(),
                        tax_rate: $(".tax_rate_" + id).val(),
                        tax_amount: $(".tax_amount_" + id).val(),
                        unit_price: $(".unit_price_" + id).val(),
                        total_price: $(".total_price_" + id).val(),
                        product_id: $(".product_id").val(),
                        pcustomer_id: $(".pcustomer_id").val(),
                        lead_id: $(".lead_id").val(),
                        is_active: "0"
                   };

                   $.ajax({
                        method: "post",
                        url: "<?= base_url() ?>ajax/singleproductsubmit",
                        data: formdata,
                        success: function(status) {
                             $(".item_" + id).html('');
                        }
                   })
              });

              $(document).on("change", "#all-data", function() {
                   var formdata = $(".assign-product").serializeArray();
                   // console.log(formdata);
                   // return false;
                   $.ajax({
                        method: "post",
                        url: "<?= base_url() ?>ajax/submitProductItem",
                        data: formdata,
                        success: function(status) {
                             console.log(status);
                        }
                   })
              });

              $(document).on("change", ".add", function() {

                   console.log($(this).prop("checked"));

                   var id = $(this).data("id");

                   var formdata;

                   if ($(this).prop("checked") == false) {
                        formdata = {
                             item_id: $(".item_id_" + id).val(),
                             quantity: $(".quantity_" + id).val(),
                             tax_rate: $(".tax_rate_" + id).val(),
                             tax_amount: $(".tax_amount_" + id).val(),
                             unit_price: $(".unit_price_" + id).val(),
                             total_price: $(".total_price_" + id).val(),
                             product_id: $(".product_id").val(),
                             pcustomer_id: $(".pcustomer_id").val(),
                             lead_id: $(".lead_id").val(),
                             is_active: "0"
                        };
                   } else {
                        formdata = {
                             item_id: $(".item_id_" + id).val(),
                             quantity: $(".quantity_" + id).val(),
                             tax_rate: $(".tax_rate_" + id).val(),
                             tax_amount: $(".tax_amount_" + id).val(),
                             unit_price: $(".unit_price_" + id).val(),
                             total_price: $(".total_price_" + id).val(),
                             product_id: $(".product_id").val(),
                             pcustomer_id: $(".pcustomer_id").val(),
                             lead_id: $(".lead_id").val(),
                             is_active: "1"
                        };
                   }

                   // console.log(formdata); return false;

                   $.ajax({
                        method: "post",
                        url: "<?= base_url() ?>ajax/singleproductsubmit",
                        data: formdata,
                        success: function(status) {
                             console.log(status);
                        }
                   })
              });

              //terms and conditions

              $(".pills-terms-tab").click(function() {
                   var customer_id = $(".pcustomer_id").val();
                   $.ajax({
                        method: "post",
                        url: "<?= base_url() ?>ajax/getTerms",
                        data: {
                             customer_id: customer_id
                        },
                        success: function(status) {
                             status = JSON.parse(status);
                             $(".terms").html('');

                             $.each(status["master_term"], function(k, v) {
                                  var checked = "";
                                  $.each(status["customer_term"], function(k1, v1) {
                                       if (v["term_id"] == v1["term_id"] && v1["is_active"] == 1) {
                                            checked = (v["term_id"] == v1["term_id"]) ? "checked" : "";
                                       }

                                  });
                                  k = k + 1;
                                  var html = "";

                                  html += "<div class='col-sm-12'><input " + checked + " type='checkbox' class='term-check' value='" + v["term_id"] + "'> " + k + ' ' + v["term_name"] + "</div>";
                                  $(".terms").append(html);

                             });

                        }
                   });
              });

              $(document).on("change", ".term-check", function() {
                   if ($(this).prop("checked")) {
                        var data = {
                             term_id: $(this).val(),
                             customer_id: $(".pcustomer_id").val(),
                             is_active: 1,
                             lead_id: $(".lead_id").val()
                        }
                        $.ajax({
                             method: "post",
                             url: "<?= base_url() ?>ajax/submitCustomerTerm",
                             data: data,
                             success: function(status) {

                             }
                        })
                   } else {
                        var data = {
                             term_id: $(this).val(),
                             customer_id: $(".pcustomer_id").val(),
                             is_active: 0,
                             lead_id: $(".lead_id").val()
                        }

                        $.ajax({
                             method: "post",
                             url: "<?= base_url() ?>ajax/submitCustomerTerm",
                             data: data,
                             success: function(status) {

                             }
                        })
                   }
              });

              $("#customer-search").on("keyup", function() {
                   var value = $(this).val().toLowerCase();

                   $(".customer-list li").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                   });
              })

              $("#product-search").on("keyup", function() {
                   var value = $(this).val().toLowerCase();

                   $(".product-list li").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                   });
              })

              $(".activity").on("change", function() {
                   var activity = $(this).find(":selected").data("activity");

                   if (activity == "schedule_meeting") {
                        $(".log_call").addClass("d-none");
                        $(".meeting").removeClass("d-none");
                   } else if (activity == "log_call") {
                        $(".log_call").removeClass("d-none");
                        $(".meeting").addClass("d-none");
                   } else {
                        $(".log_call").addClass("d-none");
                        $(".meeting").addClass("d-none");
                   }
              });


              $("#startDate").datepicker({
                   format: 'dd-mm-yyyy',
                   todayBtn: true,
                   todayHighlight: true,
                   autoclose: true,
                   sta
              }).on('changeDate', function(selected) {
                   var minDate = new Date();
                   $('#endDate').datepicker('setStartDate', minDate);
              }).datepicker("setDate", "1");;

              $("#endDate").datepicker({
                   format: 'dd-mm-yyyy',
                   autoclose: true,
              }).on('changeDate', function(selected) {
                   var minDate = new Date(selected.date.valueOf());
                   $('#startDate').datepicker('setEndDate', minDate);
              });
         });
    </script>