<template>

    <div class="container" id="paypal-c">
        <div style="text-align: center; padding: 30% 0px">
            <p>Your Order have been placed, please make payment</p>
        <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
            <input type="hidden" name="cmd" value="_xclick">
            <input type="hidden" name="business" value="new-me@yahoo.com">
            <input type="hidden" name="item_name" :value="order.id">
            <input type="hidden" name="item_number" :value="order.id">
            <input type="hidden" name="amount" :value="order.grand_total">
            <input type="hidden" name="currency_code" :value="currency">
            <input type="hidden" name="email" :value="order.email">
            <input type="hidden" name="first_name" :value="order.first_name">
            <input type="hidden" name="last_name" :value="order.last_name">
            <input type="hidden" name="address1" :value="order.address">
            <!-- <input type="hidden" name="address2" :value="Apt 5"> -->
            <input type="hidden" name="city" :value="order.city">
            <input type="hidden" name="state" :value="order.state">
            <input type="hidden" name="zip" :value="order.zip_code">
            <input type="hidden" name="night_phone_a" :value="order.phone">
            <!-- <input type="hidden" name="night_phone_b" value="555">
            <input type="hidden" name="night_phone_c" value="1234">
            <input type="hidden" name="email" value="jdoe@zyzzyu.com"> -->
            <input type="hidden" name="return" value="http://127.0.0.1:8282/thanks">
            <input type="hidden" name="cancel_return" value="http://127.0.0.1:8282/error">
            <input id="submit-pay" type="image" name="submit"
                :src="'https://www.paypalobjects.com/en_US/i/btn/btn_paynow_LG.gif'"
                alt="PayPal - The safer, easier way to pay online">
          </form>
          </div>
    </div>

</template>

<script>
    export default {
        data (){
            return {
                currency: "USD",
                order: {},
                n: "",
            }    

        },
        methods: {
            async loadinfo(){
                await axios.get('/get-order')
                .then( response =>{
                    this.order = response.data;
                })
                this.n = 1;
            },
            do(){
                 $("#submit-pay").trigger('click');
            }
        },
        watch: {
            immediate: true,
            n: function(){
                if(this.n == 1){
                    shout.$emit('check');
                }
            }
        },
        mounted(){
            this.loadinfo();
            $("#paypal-c").hide();
            shout.$on('check', ()=>{this.do()})
        }
    }
</script>