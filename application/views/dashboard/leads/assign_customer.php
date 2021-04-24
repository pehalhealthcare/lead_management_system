    <div class="col-md-9 col-sm-12 mt-5 mx-auto">


         <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
              <li class="nav-item">

                   <a class="nav-link active nav-tabs pills-home-tab" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Customer</a>
              </li>
              <li class="nav-item">
                   <a class="nav-link nav-tabs pills-profile-tab <?= (count($lead_customer) == 0) ? "disabled" : "" ?>" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Product</a>
              </li>
              <li class="nav-item">
                   <a class="nav-link nav-tabs pills-home-tab <?= (count($lead_customer) == 0) ? "disabled" : "" ?>" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Activity</a>
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
                                  <li class="list-group-item">
                                       <input type="search" class="form-control" placeholder="Enter Customer Name" />
                                  </li>
                                  <ul class="list-group">
                                       <?php $active = "";
                                        foreach ($customers as $customer) : ?>
                                            <?php if ($lead_customer) : if ($lead_customer[0]["customer_id"] == $customer->customer_id) : $active = "active"; ?>

                                            <?php endif;
                                             endif; ?>
                                            <li class="list-group-item customers <?= $active ?>" data-customer="<?= $customer->customer_id ?>" style="cursor: pointer;"><?= $customer->name ?></li>
                                       <?php endforeach; ?>
                                  </ul>
                             </ul>
                        </div>
                        <div class="col-sm-9">

                             <form action="" method="post" class="add-customer" enctype="multipart/form-data">
                                  <div class="row">
                                       <input type="hidden" name="lead_id" value="<?= $lead_id ?>" class="lead_id">
                                       <input type="hidden" name="customer_id" id="customer_id">
                                       <div class="col-sm-12">
                                            <button type="reset" class="btn btn-success create">CREATE CUSTOMER</button>
                                       </div>
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
                   <div class="tab-content bg-white p-3" style="height: 100vh;" id="pills-tabContent">
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
                                                           <input type="search" class="form-control" placeholder="Enter Customer Name" />
                                                      </li>
                                                      <ul class="list-group">
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
                              review tab
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
                   Activity page
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
                   $(".button").val("ADD CUSTOMERS")
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

                             $(".button").val("UPDATE CUSTOMERS")

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
                             $(".nav-tabs").removeClass("active");
                             $(".nav-tabs").removeClass("show");
                             $(".nav-tabs#pills-profile-tab").removeClass("disabled")
                             $(".nav-tabs#pills-profile-tab").addClass("active");
                             $(".nav-tabs#pills-profile-tab").addClass(" show");
                             $("#pills-home").removeClass("show");
                             $("#pills-home").removeClass("active");
                             $("#pills-profile").addClass("show");
                             $("#pills-profile").addClass("active");
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
                             lead_id:$(".lead_id").val()
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
                                  $.each(status["customer_item"], function(k1, v1) {
                                       // return false;
                                       if (status["customer_item"] && v["item_name"] && v["item_id"] == v1["item_id"]) {
                                            checked = (v["item_id"] == v1["item_id"]) ? "checked" : "";
                                            total_price = (v1["total_price"]) ? v1["total_price"] : "";
                                            tax_amount = (v1["tax_amount"]) ? v1["tax_amount"] : "";
                                            quantity = (v1["quantity"]) ? v1["quantity"] : "";
                                            console.log(v1);
                                       }

                                  });
                                  if (v["item_name"] && status["customer_item"]) {

                                       var html = '<tr><td><input type="checkbox" ' + checked + ' data-id="' + v["item_id"] + '" class="add" value="' + v["item_id"] + '" /></td><td><input readonly data-id="' + v["item_id"] + '" type="text" value="' + v["item_name"] + '" name="customeritem[]" class="item_name form-control item_name_' + v["item_id"] + '""></td>';
                                       html += '<td><input type="text" name="quantity[]" data-id="' + v["item_id"] + '" placeholder="Enter Your Quantity" value="' + quantity + '" class="quantity form-control quantity_' + v["item_id"] + '"></td>';
                                       html += '<td><input readonly type="text" data-id="' + v["item_id"] + '"  value="' + v["unit_price"] + '" name="unit_price[]"  class="unit_price form-control unit_price_' + v["item_id"] + '"></td>';
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

              $(".pills-terms-tab").click(function(){
                    var customer_id = $(".pcustomer_id").val();
                    $.ajax({
                         method:"post",
                         url:"<?= base_url() ?>ajax/getTerms",
                         data:{customer_id:customer_id},
                         success:function(status){
                              status = JSON.parse(status);
                              $(".terms").html('');
                              
                              $.each(status["master_term"],function(k,v){
                                 var checked = "";
                                 $.each(status["customer_term"],function(k1,v1){
                                      if(v["term_id"]==v1["term_id"] && v1["is_active"]==1)
                                      {
                                        checked = (v["term_id"]==v1["term_id"]) ? "checked" : "";
                                      }
                                   
                                 });
                              k = k+1;
                              var html = "";
                              
                              html+="<div class='col-sm-12'><input "+checked+" type='checkbox' class='term-check' value='"+v["term_id"]+"'> "+ k + ' ' + v["term_name"] +"</div>";
                              $(".terms").append(html);
                              
                              });

                         }
                    });
              });

              $(document).on("change",".term-check",function(){
                    if($(this).prop("checked"))
                    {
                         var data = {
                              term_id:$(this).val(),
                              customer_id:$(".pcustomer_id").val(),
                              is_active:1,
                              lead_id:$(".lead_id").val()
                         }
                      $.ajax({
                           method:"post",
                           url:"<?= base_url()?>ajax/submitCustomerTerm",
                           data:data,
                           success:function(status)
                           {

                           }
                      })
                    }
                    else
                    {
                         var data = {
                              term_id:$(this).val(),
                              customer_id:$(".pcustomer_id").val(),
                              is_active:0,
                              lead_id:$(".lead_id").val()
                         }

                         $.ajax({
                           method:"post",
                           url:"<?= base_url()?>ajax/submitCustomerTerm",
                           data:data,
                           success:function(status)
                           {
                                
                           }
                      })
                    }
              });
         })
    </script>