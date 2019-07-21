<template>
  <div class="container">
    <div class="row" style="margin: 0 0 10px 0; padding-top: 25px;">
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-8" style="padding-top: 25px;">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">Your cart</span>
          <span class="badge badge-secondary badge-pill">{{quantity}}</span>
        </h4>
        <div class="table-responsive">
          <table class="table table-bordered">
            <tbody>
              <tr style="background-color: #b22565; color: #ffffff;">
                <th>Image</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Delete</th>
              </tr>
              <tr v-for="(item,index) in cartitems" :key="index">
                <td style="text-align: left;width: 40%;">
                  <div class="row" style="margin: 0 0 0 0px;padding: 0 0 0 0px;">
                    <div
                      class="col-4 col-sm-2 tg-minicarproductdata"
                      style="width: 100px;margin: 0 0 0 0px;padding: 0 0 0 0px;"
                    >
                      <img :src="'image/backend_img/books/' + item.image" alt="image description">
                    </div>
                    <div class="col-12 col-sm-4">
                      <div
                        class="tg-minicarproductdata"
                        style="width: 200px;margin: 0 0 0 0px;padding: 0 0 0 0px;"
                      >
                        <h5>
                          <a href="javascript:void(0);">{{item.book_title}}</a>
                        </h5>
                        <h5>
                          <a href="javascript:void(0);">{{item.code}}</a>
                        </h5>
                        <h6>
                          <a href="javascript:void(0);">$ {{item.price}}</a>
                        </h6>
                      </div>
                    </div>
                  </div>
                </td>
                <td style="width: 40%;padding-top: 20px;">
                  <div class="tg-quantityholder" id="qtyholder" v-if="item.type != 'E-Book'">
                    <span :id="index"></span>
                    <a
                      id="sub"
                      @click.prevent="qsub(index,item.code)"
                      style="text-decoration: none;"
                    >
                      <em class="minus">-</em>
                    </a>
                    <input
                      type="number"
                      class="result"
                      @keyup="Iq(index,item.code)"
                      v-model="item.quantity"
                      id="quantity1"
                      name="quantity"
                      min="1"
                    >
                    <a
                      :id="item.code"
                      @click.prevent="qadd(index,item.code)"
                      style="text-decoration: none;"
                    >
                      <em class="plus">+</em>
                    </a>
                  </div>
                  <div v-else>-</div>
                </td>
                <td
                  style="width: 15%; text-align: left; padding-top: 35px;"
                >$ {{item.price * item.quantity}}</td>
                <td style="width: 5%; text-align: left; padding-top: 35px;">
                  <div class="tg-quantityholder">
                    <a @click.prevent="delitem(item.code)" style="text-decoration: none;">
                      <em class="minus">X</em>
                    </a>
                  </div>
                </td>
              </tr>
              <tr>
                <td colspan="2" style="text-align: right;">Sub Total</td>
                <td colspan="2" style="text-align: left;">$ {{ptotal}}</td>
              </tr>
              <tr>
                <td colspan="2" style="text-align: right;">Coupon (-)</td>
                <td colspan="2" style="text-align: left;">$ {{coupon_details.coupon_amount}}</td>
              </tr>
              <tr>
                <td colspan="2" style="text-align: right;">Grand Total</td>
                <td
                  colspan="2"
                  style="text-align: left;"
                >$ {{ptotal - coupon_details.coupon_amount}}</td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- <div>
                <h6 class="my-0">Product name</h6>
                <small class="text-muted">Brief description</small>
            </div>
        <span class="text-muted">$12</span>-->
        <!-- <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
                <h6 class="my-0">Second product</h6>
                <small class="text-muted">Brief description</small>
            </div>
            <span class="text-muted">$8</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
                <h6 class="my-0">Third item</h6>
                <small class="text-muted">Brief description</small>
            </div>
            <span class="text-muted">$5</span>
            </li>
            <li class="list-group-item d-flex justify-content-between bg-light">
            <div class="text-success">
                <h6 class="my-0">Promo code</h6>
                <small>EXAMPLECODE</small>
            </div>
            <span class="text-success">-$5</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
            <span>Total (USD)</span>
            <strong>$20</strong>
            </li>
        </ul>-->
        <span style="color: red;" id="coupon_err"></span>
        <form>
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
            <input type="text" class="form-control" v-model="coupon_code" placeholder="Promo code">
          </div>
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
            <button type="submit" class="btn btn-secondary" @click.prevent="coupon()">Redeem</button>
          </div>
        </form>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" style="padding-top: 25px;">
        <h4 class="mb-3">Billing address</h4>
        <form class="needs-validation" id="make-payment" @submit.prevent="pay()" method="post">
          <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <input
              v-model="billing.first_name"
              type="text"
              name="billing_first_name"
              id="billing_first_name"
              class="form-control"
              placeholder="First Name"
            >
          </div>
          <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <input
              v-model="billing.last_name"
              type="text"
              name="billing_last_name"
              id="billing_last_name"
              class="form-control"
              placeholder="Last Name"
            >
          </div>
          <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <input
              v-model="billing.city"
              type="text"
              name="billing_city"
              id="billing_city"
              class="form-control"
              placeholder="City"
            >
          </div>
          <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <input
              v-model="billing.zipcode"
              type="text"
              name="billing_zipcode"
              id="billing_zipcode"
              class="form-control"
              placeholder="Zipcode"
            >
          </div>
          <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <input
              v-model="billing.state"
              type="text"
              name="billing_state"
              id="billing_state"
              class="form-control"
              placeholder="State"
            >
          </div>
          <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <input
              v-model="billing.country"
              type="text"
              name="billing_country"
              id="billing_country"
              class="form-control"
              placeholder="country"
            >
          </div>
          <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <input
              v-model="billing.address"
              type="text"
              name="billing_address"
              id="billing_address"
              class="form-control"
              placeholder="Address"
            >
          </div>
          <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <input
              v-model="billing.phone"
              type="text"
              name="billing_phone"
              id="billing_phone"
              class="form-control"
              placeholder="Phone"
            >
          </div>
          <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <input
              v-model="billing.email"
              type="email"
              name="billing_email"
              id="billing_email"
              class="form-control"
              placeholder="Email"
            >
          </div>

          <div class="custom-control custom-checkbox">
            <label class="custom-control-label" for="same-address">
              <input
                type="checkbox"
                class="custom-control-input"
                id="same-address"
                v-model="status"
              > Shipping address is the same as my billing address
            </label>
          </div>

          <hr class="mb-4">
          <div id="hide-ship">
            <h4 class="mb-3">Shipping address</h4>
            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
              <input
                v-model="shipping.first_name"
                type="text"
                name="shipping_first_name"
                id="shipping_first_name"
                class="form-control"
                placeholder="First Name"
              >
            </div>
            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
              <input
                v-model="shipping.last_name"
                type="text"
                name="shipping_last_name"
                id="shipping_last_name"
                class="form-control"
                placeholder="Last Name"
              >
            </div>
            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
              <input
                v-model="shipping.city"
                type="text"
                name="shipping_city"
                id="shipping_city"
                class="form-control"
                placeholder="City"
              >
            </div>
            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
              <input
                v-model="shipping.zipcode"
                type="text"
                name="shipping_zipcode"
                id="shipping_zipcode"
                class="form-control"
                placeholder="Zipcode"
              >
            </div>
            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
              <input
                v-model="shipping.state"
                type="text"
                name="shipping_state"
                id="shipping_state"
                class="form-control"
                placeholder="State"
              >
            </div>
            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
              <input
                v-model="shipping.country"
                type="text"
                name="shipping_country"
                id="shipping_country"
                class="form-control"
                placeholder="country"
              >
            </div>
            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
              <input
                v-model="shipping.address"
                type="text"
                name="shipping_address"
                id="shipping_address"
                class="form-control"
                placeholder="Address"
              >
            </div>
            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
              <input
                v-model="shipping.phone"
                type="text"
                name="shipping_phone"
                id="shipping_phone"
                class="form-control"
                placeholder="Address"
              >
            </div>
            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
              <input
                v-model="shipping.email"
                type="email"
                name="shipping_email"
                id="shipping_email"
                class="form-control"
                placeholder="Email"
              >
            </div>
            <hr class="mb-4">
          </div>

          <hr class="mb-4">

          <h4 class="mb-3">Payment</h4>

          <div class="d-block my-3">
            <div class="custom-control custom-radio">
              <input
                id="credit"
                name="paymentMethod"
                type="radio"
                class="custom-control-input"
                value="credit_card"
                v-model="payment_type"
              >
              <label class="custom-control-label" for="credit">Credit card</label>
            </div>
            <div class="custom-control custom-radio">
              <input
                id="debit"
                name="paymentMethod"
                type="radio"
                class="custom-control-input"
                value="paystack"
                v-model="payment_type"
              >
              <label class="custom-control-label" for="debit">Paystack</label>
            </div>
            <div class="custom-control custom-radio">
              <input
                id="paypal"
                name="paymentMethod"
                type="radio"
                class="custom-control-input"
                value="paypal"
                v-model="payment_type"
                checked
              >
              <label class="custom-control-label" for="paypal">PayPal</label>
            </div>
          </div>
          <hr class="mb-4">
          <button
            class="btn-lg btn-block"
            type="submit"
            style="background-color: #b22565; color: #ffffff;"
          >Continue to checkout</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
// import { validate } from "../public/js/frontend_js/vendor/jquery.validate";
export default {
  props: [],
  data() {
    return {
      payment_type: "paypal",
      billing: {
        first_name: "",
        last_name: "",
        city: "",
        zipcode: "",
        state: "",
        country: "",
        address: "",
        phone: "",
        email: ""
      },
      shipping: {
        first_name: "",
        last_name: "",
        city: "",
        zipcode: "",
        state: "",
        country: "",
        address: "",
        phone: "",
        email: ""
      },
      status: true,
      coupon_code: "",
      coupon_details: {
        coupon_amount: 0,
        type: ""
      },
      quantity: 0,
      ptotal: "",
      cartitems: {}
    };
  },
  methods: {
    getuser() {
      axios.get("/get-user").then(response => {
        this.billing.first_name = response.data.first_name;
        this.billing.last_name = response.data.last_name;
        this.billing.city = response.data.city;
        this.billing.zipcode = response.data.zip_code;
        this.billing.state = response.data.state;
        this.billing.country = response.data.country;
        this.billing.address = response.data.address;
        this.billing.phone = response.data.phone;
        this.billing.email = response.data.email;

        this.shipping = this.billing;
      });
    },
    loadcart() {
      axios.get("/get-cart").then(response => {
        this.cartitems = response.data;
        var total = 0;
        this.quantity = 0;
        this.cartitems.forEach(element => {
          total = total + element.price * element.quantity;
          this.quantity = this.quantity + element.quantity;
        });
        this.ptotal = total;
        if (this.quantity == 0) {
          this.coupon_details.coupon_amount = 0;
        }
      });
    },
    coupon() {
      if (this.quantity > 0) {
        axios.get("/coupon/" + this.coupon_code).then(response => {
          if (typeof response.data == "string") {
            this.coupon_details.coupon_amount = 0;
            $("#coupon_err").html(response.data);
          } else {
            $("#coupon_err").html(" ");
            this.coupon_details = response.data;
            if (this.coupon_details.type == "percentage") {
              this.coupon_details.coupon_amount =
                (this.ptotal * this.coupon_details.coupon_amount) / 100;
            }
          }
        });
      }
    },
    qsub(id, id2) {
      var n = this.cartitems[id].quantity;
      n = n - 1;

      if (this.cartitems[id].quantity >= 1) {
        if (this.cartitems[id].quantity > 1) {
          this.cartitems[id].quantity =
            parseInt(this.cartitems[id].quantity) - 1;
        }
        if (this.cartitems[id].quantity <= this.cartitems[id].tq && n >= 1) {
          $("#" + id).html("");
          $("#" + id2).removeClass("disable-add");

          var total = 0;
          this.quantity = 0;
          this.cartitems.forEach(element => {
            total = total + element.price * element.quantity;
            this.quantity = this.quantity + element.quantity;
          });
          this.ptotal = total;
          if (this.quantity == 0) {
            this.coupon_details.coupon_amount = 0;
          }
          axios.get("/red-qty/" + id2).then(() => {
            shout.$emit("addedtocart");
          });
        } else {
        }
      } else {
        this.cartitems[id].quantity = 1;
      }
    },
    qadd(id, id2) {
      if (this.cartitems[id].quantity >= this.cartitems[id].tq) {
        // $("#basket").hide();
        // $("#exitem").show();
        $("#" + id).html(
          "<span style='color: red;'>Requested Quantity not availabble.</span>"
        );
        $("#" + id2).addClass("disable-add");
      } else {
        this.cartitems[id].quantity = parseInt(this.cartitems[id].quantity) + 1;
        var total = 0;
        this.quantity = 0;
        this.cartitems.forEach(element => {
          total = total + element.price * element.quantity;
          this.quantity = this.quantity + element.quantity;
        });
        this.ptotal = total;
        axios.get("/inc-qty/" + id2).then(() => {
          shout.$emit("addedtocart");
        });
      }
    },
    Iq(id, id2) {
      if (
        this.cartitems[id].quantity == " " ||
        this.cartitems[id].quantity <= 0
      ) {
        this.cartitems[id].quantity = 1;
      }
      if (this.cartitems[id].quantity > this.cartitems[id].tq) {
        $("#" + id).html(
          "<span style='color: red;'>Requested Quantity not availabble.</span>"
        );
        $("#" + id2).addClass("disable-add");
      } else {
        $("#" + id).html("");
        $("#" + id2).removeClass("disable-add");
        var total = 0;
        this.cartitems.forEach(element => {
          total = total + element.price * element.quantity;
        });
        this.ptotal = total;
        axios
          .post("/put-qty/", {
            id: id2,
            qty: this.cartitems[id].quantity
          })
          .then(() => {
            shout.$emit("reloadCart");
            shout.$emit("addedtocart");
          });
      }
    },
    delitem(id2) {
      axios.get("/del-item/" + id2).then(() => {
        shout.$emit("reloadCart");
        shout.$emit("addedtocart");
      });
    },
    billship() {
      if (this.status) {
        $("#hide-ship").hide();
        this.shipping = this.billing;
      } else {
        $("#hide-ship").show();
        this.shipping = {};
      }
    },
    pay() {
      const form = $('form[id="make-payment"]');
      // form.validate({
      //   rules: {
      //     //blinng validation
      //     billing_first_name: {
      //       required: true
      //     },
      //     billing_last_name: {
      //       required: true
      //     },
      //     billing_city: {
      //       required: true
      //     },
      //     billing_state: {
      //       required: true
      //     },
      //     billing_country: {
      //       required: true
      //     },
      //     billing_phone: {
      //       required: true
      //     },
      //     billing_address: {
      //       required: true
      //     },
      //     billing_email: {
      //       required: true
      //     },
      //     //shipping validation
      //     shipping_first_name: {
      //       required: true
      //     },
      //     shipping_last_name: {
      //       required: true
      //     },
      //     shipping_city: {
      //       required: true
      //     },
      //     shipping_state: {
      //       required: true
      //     },
      //     shipping_country: {
      //       required: true
      //     },
      //     shipping_phone: {
      //       required: true
      //     },
      //     shipping_address: {
      //       required: true
      //     },
      //     shipping_email: {
      //       required: true
      //     }
      //   },
      //   errorClass: "help-inline",
      //   errorElement: "span",
      //   highlight: function(element, errorClass, validClass) {
      //     $(element)
      //       .parents(".control-group")
      //       .addClass("error");
      //   },
      //   unhighlight: function(element, errorClass, validClass) {
      //     $(element)
      //       .parents(".control-group")
      //       .removeClass("error");
      //     $(element)
      //       .parents(".control-group")
      //       .addClass("success");
      //   }
      // });

      if (form.valid()) {
        axios
          .post("/pay", {
            quantity: this.quantity,
            coupon_code: this.coupon_code,
            coupon_amount: this.coupon_details.coupon_amount,
            grand_total: this.ptotal - this.coupon_details.coupon_amount,
            payment_method: this.payment_type,
            bill: this.billing,
            ship: this.shipping,
            ordered_products: this.cartitems
          })
          .then(response => {
            shout.$emit("paypal");
            window.location.href = response.data.paypal;
          });
      }
    }
  },
  watch: {
    status: function() {
      this.billship();
    }
  },
  mounted() {
    $("#paypal").prop("checked", true);
    this.billship();
    this.getuser();
    this.loadcart();
    shout.$on("reloadCart", () => this.loadcart());
  }
};
</script>