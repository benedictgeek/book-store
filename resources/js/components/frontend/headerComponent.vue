<template>
    <div class="tg-wishlistandcart">
        <div class="dropdown tg-themedropdown tg-wishlistdropdown">
            <a href="#" id="tg-wishlisst" class="tg-btnthemedropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="tg-themebadge">{{wishitems.length}}</span>
                <i class="icon-heart"></i>
                <span>Wishlist</span>
            </a>
            <div class="dropdown-menu collapse in tg-themedropdownmenu" aria-labelledby="tg-wishlisst">
                <div v-if="wishitems.length == 0" class="tg-description"><p>No products were added to the wishlist!</p></div>
                <div class="tg-minicartbody">
                    <div class="tg-minicarproduct" v-for="item in wishitems" :key="item.id">
                        <figure>
                            <img style="width: 70px; height: 115px; padding-top: 13px;" :src="'/image/backend_img/books/'+ item.image" alt="image description">
                            
                        </figure>
                        <div class="tg-minicarproductdata">
                            <h5><a :href="'/book/' + item.id"> Title: {{item.book_title}}</a></h5>
                            <h5><a > Price: $ {{item.price}}</a></h5>
                            <h5><a > Type: {{item.type}}</a></h5>
                            <h5><a >Code: {{item.code}}</a></h5>
                        </div>
                    </div>
                        <div class="tg-minicartfoot">
                        <a class="tg-btnemptycart" href="#clearcat" @click.prevent="clearwish()">
                            <i class="fa fa-trash-o"></i>
                            <span>Clear Wishlist</span>
                        </a>
                        </div>
                </div>
            </div>
        </div>

        <div class="dropdown tg-themedropdown tg-minicartdropdown">
            <a href="javascript:void(0);" id="tg-minicart" class="tg-btnthemedropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="tg-themebadge">{{quantity}}</span>
                <i class="icon-cart"></i>
                <span>${{ptotal}}</span>
            </a>
            <div class="dropdown-menu tg-themedropdownmenu" aria-labelledby="tg-minicart">
                <div class="tg-minicartbody">
                    <div class="tg-minicarproduct" v-for="item in cartitems" :key="item.id">
                        <figure>
                            <img style="width: 70px; height: 115px; padding-top: 13px;" :src="'/image/backend_img/books/'+ item.image" alt="image description">
                            
                        </figure>
                        <div class="tg-minicarproductdata">
                            <h5><a :href="'/book/' + item.id">{{item.book_title}}</a></h5>
                            <h5><a > Price: $ {{item.price}}</a></h5>
                            <h5><a > Type: {{item.type}}</a></h5>
                            <h5><a >Code: {{item.code}}</a></h5>
                        </div>
                    </div>
                </div>
                <div class="tg-minicartfoot">
                    <a class="tg-btnemptycart" href="#clearcat" @click.prevent="clearcart()">
                        <i class="fa fa-trash-o"></i>
                        <span>Clear Your Cart</span>
                    </a>
                    <span class="tg-subtotal">Subtotal: <strong>$ {{ptotal}}</strong></span>
                    <div class="tg-btns">
                        <a></a>
                        <a class="tg-btn tg-active" v-bind:href="'/cart'">Checkout</a>
                    </div>
                </div>
            </div>
        </div>


        <!-- <div class="dropdown tg-themedropdown tg-minicartdropdown">
            <a href="javascript:void(0);" class="tg-btnthemedropdown" @click.prevent="cartmodal()">
                <span class="tg-themebadge">{{quantity}}</span>
                <i class="icon-cart"></i>
                <span>$ {{ptotal}}</span>
            </a>
            <div class="modal fade" id="cartlist" tabindex="-1" role="dialog" aria-labelledby="cartlist" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"> My Cart </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" v-if="quantity > 0">
                            <div class="row" v-for="item in cartitems" :key="item.id" style="margin-bottom: 10px;">
                            <div class="col-4 col-sm-2" >
                                    <img :src="'/image/backend_img/books/'+ item.image" class="img-responsive" alt="image description" style="width: 55px;">
                                
                            </div>
                            <div class="col-6 col-sm-4">
                                <div class="tg-minicarproductdata">
                                    <h5><a href="javascript:void(0);">{{item.book_title}}</a></h5>
                                    <h6><a href="javascript:void(0);">$ {{item.price}} ({{item.quantity}})</a></h6>
                                </div>
                            </div>
                            <br>
                            </div>
                        </div>
                        <div class="modal-body" v-if="quantity == 0">
                            Your Cart is empty.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" @click.prevent="clearcart()"><i class="fa fa-trash-o"></i>
                            <span>Clear Your Cart</span></button>
                            <button  type="submit" class="btn btn-success"><a v-bind:href="'/cart'">Checkout</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->



        <!-- <div class="dropdown tg-themedropdown tg-minicartdropdown">
            <a href="javascript:void(0);" id="tg-minicart" class="tg-btnthemedropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="tg-themebadge">{{cartitems.length}}</span>
                <i class="icon-cart"></i>
                <span>$123.00</span>
            </a>
            <div class="dropdown-menu tg-themedropdownmenu" aria-labelledby="tg-minicart">
                <div class="tg-minicartbody">
                    <div class="tg-minicarproduct" v-for="item in cartitems" :key="item.id">
                        <figure>
                            <img :src="'/image/backend_img/books/'+ item.image" alt="image description" style="width: 50px;">
                            
                        </figure>
                        <div class="tg-minicarproductdata">
                            <h5><a href="javascript:void(0);">{{item.book_title}}</a></h5>
                            <h6><a href="javascript:void(0);">$ {{item.price}}</a></h6>
                        </div>
                    </div>
                </div>
                <div class="tg-minicartfoot">
                    <a class="tg-btnemptycart" href="javascript:void(0);">
                        <i class="fa fa-trash-o"></i>
                        <span>Clear Your Cart</span>
                    </a>
                    <span class="tg-subtotal">Subtotal: <strong>35.78</strong></span>
                    <div class="tg-btns">
                        <a class="tg-btn tg-active" href="javascript:void(0);">View Cart</a>
                        <a class="tg-btn" href="javascript:void(0);">Checkout</a>
                    </div>
                </div>
            </div>
        </div> -->
</div>
</template>
<script>
export default {
    data() {
        return {
            quantity: 0,
            ptotal: "",
            cartitems: {},
            wishitems: {}
        }
    },
    methods: {
        cartmodal(){
            $('#cartlist').modal('show');
        },
        clearcart(){
            axios.get('/clear-cart')
            .then(()=>{
                shout.$emit('addedtocart');
                shout.$emit('reloadCart');
                shout.$emit('refreshCart');
            })
        },
        clearwish(){
            axios.get('/clear-wish')
            .then(()=>{
                shout.$emit('updateWish');
            })
        },
        loadcart(){
            axios.get('/get-cart')
            .then(response=>{
                this.cartitems = response.data;
                var total=0;
                this.quantity = 0;
                this.cartitems.forEach(element => {
                    total = total + (element.price * element.quantity);
                    this.quantity = this.quantity + element.quantity;
                });
                this.ptotal = total;
            })
        },
        loadwishlist(){
            axios.get('/wishlist')
            .then(response=>{
                this.wishitems = response.data;
            })
        }
    },
    mounted() {
        this.loadcart();
        this.loadwishlist();
        shout.$on('addedtocart', ()=>this.loadcart());
        shout.$on('updateWish', ()=>this.loadwishlist());
    }

}
</script>