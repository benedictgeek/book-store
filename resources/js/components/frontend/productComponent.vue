<template>

    
    <div id="tg-content" class="tg-content">
                <div class="tg-productdetail">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <div class="tg-postbook">
                                <figure class="tg-featureimg"><img :src="bookImg()" alt="image description"></figure>
                                <div class="tg-postbookcontent">
                                    <span class="tg-bookprice">
                                        <ins v-if="new_price != null">${{new_price}}</ins>
                                        <ins v-else>${{price}}</ins>
                                        <del v-if="new_price != null">${{price}}</del>
                                    </span>
                                    <span v-if="new_price != null" class="tg-bookwriter">You save ${{price - new_price}}</span>
                                    <ul class="tg-delevrystock">
                                        <li><i class="icon-rocket"></i><span>Free delivery worldwide</span></li>
                                        <li><i class="icon-checkmark-circle"></i><span>Dispatch from the USA in 2 working days </span></li>
                                        <li><i class="icon-store"></i><span>Status: <em id="stock"></em></span></li>
                                    </ul>
                                    <span id="exitem"></span>
                                    <div class="tg-quantityholder" id="qtyholder">
                                        <a id="sub" @click.prevent="qsub()" style="text-underline: none;"><em class="minus" >-</em></a>
                                        <input type="number" class="result" @keyup="Iq()" v-model="hform.quantity" id="quantity1" name="quantity" min="1">
                                        <a @click.prevent="qadd()" style="text-underline: none;"><em class="plus" >+</em></a>
                                    </div>
                                    
                                    <a v-if="isClicked" id="basket" class="tg-btn tg-active tg-btn-lg">Add To Basket</a>
                                    <a v-else id="basket" class="tg-btn tg-active tg-btn-lg" href="#" @click.prevent="cart()">Add To Basket</a>
                                    <a class="tg-btnaddtowishlist" href="#whislist" @click.prevent="wishlist()"> 
                                        <span v-if="wishClicked">Added to wishlist</span>
                                        <span v-else>Add to wishlist</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                            <div class="tg-productcontent">
                                <ul class="tg-bookscategories">
                                    <li><a href="javascript:void(0);">{{book.category}}</a></li>
                                </ul>
                                <div class="tg-themetagbox"><span class="tg-themetag">sale</span></div>
                                <div class="tg-booktitle">
                                    <h3>{{book.book_title}}</h3>
                                </div>
                                <span class="tg-bookwriter">By: <a href="javascript:void(0);">{{author.first_name}} {{author.last_name}}</a></span>
                                <span class="tg-bookwriter" ><star-rating v-bind:star-size="20" :show-rating="false" :read-only="true" :rating="book.rating" :increment="0.01"></star-rating></span>
                                <span class="tg-addreviews"><a href="javascript:void(0);" id="switch" @click.prevent="show ? rateShow() : rateHide()">Add Your Review</a></span>
                                <div v-if="show" class="tg-addreviews" id="show_rate" style="margin-top: 30px; margin-left: 20px; ">
                                <em class="tg-bookwriter" style="color: green; margin-bottom: 6px;">Give this book a rating!</em>
                                <em class="tg-bookwriter" style="color: #DC143C; margin-bottom: 3px;">{{rate_feedback}}</em>
                                <span class="tg-bookwriter" ><star-rating :star-size="20"
                                                                         :show-rating="false"
                                                                          v-model="rating"
                                                            ></star-rating></span>
                                <span class="tg-bookwriter"><textarea type="text" v-model="rating_feedback" rows="5"></textarea></span>
                                <span class="tg-bookwriter"><input type="submit" value="Submit" @click.prevent="submitrate()"></span>
                                </div>
                                <div v-else></div>
                                <!-- <div id="review-box">
                                    <textarea name="rate-feedback" id="rate-feedback"></textarea>
                                    <input type="submit" @click.prevent="review()" value="Submit">
                                </div> -->
                                <div class="tg-share">
                                    <span>Share:</span>
                                    <ul class="tg-socialicons">
                                        <li class="tg-facebook"><a v-bind:href="author.facebook"><i class="fa fa-facebook"></i></a></li>
                                        <li class="tg-twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
                                        <li class="tg-linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                                <div class="tg-description">
                                    <p>{{book.description}}</p>
                                </div>
                                <div class="tg-sectionhead">
                                    <h2>Product Details</h2>
                                </div>
                                <ul class="tg-productinfo">
                                    <li><span>Format:</span><span>{{type}}</span></li>
                                    <li><span>Pages:</span><span>{{book.attributes.pages}} pages</span></li>
                                    <li id="dim"><span>Dimensions:</span><span>{{book.attributes.dimensions}}</span></li>
                                    <li><span>Publication Date:</span><span>{{book.attributes.publication_date}}</span></li>
                                    <li><span>Publisher:</span><span>{{book.attributes.publisher}}</span></li>
                                    <li><span>Language:</span><span>{{book.attributes.language}}</span></li>
                                    <li><span>Illustrations note:</span><span>{{book.attributes.illustration_notes}}</span></li>
                                    <li><span>ISBN:</span><span>{{book.attributes.ISBN}}</span></li>
                                    <li><span>Other Fomats include:</span><span></span></li>
                                    <li v-if="book.cd_audio == 'Yes'"><a href="" @click.prevent="cd()"><span >CD-Audio</span></a></li>
                                    <li v-if="book.paperback == 'Yes'"><a href="" @click.prevent="paper()"><span>Paperback</span></a></li>
                                    <li ><a href="" @click.prevent="ebook()"><span>E-Book</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="tg-productdescription">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="tg-sectionhead">
                                    <h2>Product Description</h2>
                                </div>
                                <ul class="tg-themetabs" role="tablist">
                                    <li role="presentation" class="active"><a href="productdetail.html#description" data-toggle="tab">Description</a></li>
                                    <li role="presentation"><a href="productdetail.html#review" data-toggle="tab">{{book_ratings.length}} Review(s)</a></li>
                                </ul>
                                <div class="tg-tab-content tab-content">
                                    <div role="tabpanel" class="tg-tab-pane tab-pane active" id="description">
                                        <div class="tg-description">
                                            <p>{{book.description}}</p>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tg-tab-pane tab-pane" id="review">
                                        <div class="tg-description">
                                            <div v-for="ratings in book_ratings" :key="ratings.id">
                                            <h5><b>{{ratings.user}}</b></h5>
                                            <star-rating v-bind:star-size="20" :show-rating="false" :read-only="true" :rating="ratings.rating" :increment="0.01"></star-rating>

                                            <p>{{ratings.feedback}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tg-aboutauthor">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="tg-sectionhead">
                                    <h2>About Author</h2>
                                </div>
                                <div class="tg-authorbox">
                                    <figure class="tg-authorimg">
                                        <img v-bind:src="'/image/backend_img/profile/'+ author.image" alt="image description">
                                    </figure>
                                    <div class="tg-authorinfo">
                                        <div class="tg-authorhead">
                                            <div class="tg-leftarea">
                                                <div class="tg-authorname">
                                                    <h2>{{author.first_name}} {{author.last_name}}</h2>
                                                    <span>Author Since: {{author.created_at}}</span>
                                                </div>
                                            </div>
                                            <div class="tg-rightarea">
                                                <ul class="tg-socialicons">
                                                    <li class="tg-facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
                                                    <li class="tg-twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
                                                    <li class="tg-linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
                                                    <li class="tg-googleplus"><a href="javascript:void(0);"><i class="fa fa-google-plus"></i></a></li>
                                                    <li class="tg-rss"><a href="javascript:void(0);"><i class="fa fa-rss"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="tg-description">
                                            <p>{{author.bio}}</p>
                                        </div>
                                        <a class="tg-btn tg-active" :href="'/writer/' + author.id">View All Books</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>

</template>

<script>
    // import RateYo from 'rateyo/src/jquery.rateyo.js';

    export default {
        props: [
                'bookid',
                'authuser'
        ],
        data() {
            return{
                rate_feedback: "",
                wishClicked: false,
                show: false,
                rating: 0,
                rating_feedback: "",
                isClicked: false,
                code: "",
                price: "",
                new_price: "",
                type: "",
                tq: "",
                book_ratings: {},
                relpro: {},
                cartitems: {},
                author: {},
                book: {},
                hform: {
                    quantity: 1,
                }, 
                item_codes: [],
            }
        },
        computed: {
                cart_items: function(){
                    return {
                            book_id: this.book.id,
                            book_title: this.book.book_title,
                            author: this.book.author_name,
                            price: this.price,
                            quantity: this.hform.quantity,
                            type: this.type,
                            image: this.book.image,
                            code: this.code
                        }
                },
                ratings_info: function(){
                    return {
                        book_title: this.book.book_title,
                        book_id: this.book.id,
                        rating: this.rating,
                        feedback: this.rating_feedback,
                        author_email: this.author.email,
                        url: $(location).attr('href')
                    }
                },
                wishlist_info: function(){
                    return {
                        id: this.bookid,
                        price_from_product_page: this.price,
                        type_from_product_page: this.type
                    }
                }
        },
        methods: {
            loadcart(){
                axios.get('/get-cart')
                .then(response=>{
                    this.cartitems = response.data;
                    this.item_codes = [];
                    this.cartitems.forEach(element=> {
                        this.item_codes.push(element.code);
                    })
                    $("#exitem").hide();
                })
            },
            bookImg(){
                return '/image/backend_img/books/'+ this.book.image;
            },
            getAuthor(){
                axios.get('/get-author/'+ this.bookid)
                .then(response => {
                    this.author = response.data;
                    $("#dim").hide();
                    $("#stock").html("<em style='color: green;'> Available </em>");
                    $("#qtyholder").hide();
                })
            },
            getBook(){
                axios.get('/get-book/' + this.bookid)
                .then(response => {
                    this.book = response.data;
                    this.hform.quantity = 1;
                    this.price= this.book.price;
                    this.new_price= this.book.new_price;
                    this.code= this.book.code;
                    this.type= "E-Book";
                })

            },
            getRatings(){
                axios.get('/rating/' + this.bookid)
                .then(response=>{
                    this.book_ratings = response.data;
                })
            },
            cart(){
                if(this.authuser == 1){
                if(this.item_codes.includes(this.code)){
                    $("#exitem").show();
                    $("#exitem").html("<span style='color: green;'>Item already in cart!</span>");
                }else{
                    this.isClicked = true;
                    $("#exitem").hide();
                    axios.post('/add-cart', this.cart_items)
                    .then(()=>{
                        this.isClicked = false;
                        shout.$emit('refreshCart');
                        shout.$emit('addedtocart');
                    })
                }
                }else{
                    window.location.href = '/reg-login';
                }
            },
            wishlist(){
                if(this.authuser == 1){
                    axios.post('/wishlist', this.wishlist_info)
                    .then(response =>{
                        if(typeof(response.data) == 'string'){
                            this.wishClicked = true;
                        }else{
                            shout.$emit('updateWish');
                        }
                    })
                }else{
                    window.location.href = '/reg-login';
                }
            },
            cd(){
                
                this.code = this.book.cd_code;
                this.hform.quantity = 1;
                this.price = this.book.cd_price;
                this.new_price = this.book.cd_Nprice;
                this.type= "CD-Audio";
                this.tq= this.book.cd_quantity;
                $("#dim").hide();
                $("#qtyholder").show();
                $("#exitem").hide();

                if(this.book.cd_quantity > 0){
                    $("#stock").html("<em style='color: green;'> In Stock </em>");
                    $("#basket").show();
                }else{
                    $("#stock").html("<em style='color: red;'> Out of Stock </em>");
                    $("#basket").hide();
                }
            },
            paper(){
                
                this.code = this.book.paper_code;
                this.hform.quantity = 1;
                this.price = this.book.paperback_price; 
                this.new_price = this.book.paper_Nprice; 
                this.type= "PaperBack"; 
                this.tq= this.book.paper_quantity;
                $("#dim").show();   
                $("#qtyholder").show();
                $("#exitem").hide();
                
                if(this.book.paper_quantity > 0){
                    $("#stock").html("<em style='color: green;'> In Stock </em>");
                    $("#basket").show();
                }else{
                    $("#stock").html("<em style='color: red;'> Out of Stock </em>");
                    $("#basket").hide();
                }
            },
            ebook(){
                
                this.code = this.book.code;
                this.hform.quantity = 1;
                this.price = this.book.price; 
                this.new_price = this.book.new_price; 
                this.type= "E-Book"; 
                $("#dim").hide(); 
                $("#qtyholder").hide();
                $("#exitem").hide();
                $("#basket").show();
                $("#stock").html("<em style='color: green;'> Available </em>");
            },
            qsub(){
                if(this.hform.quantity >= 1){
                    if(this.hform.quantity > 1){
                        this.hform.quantity = parseInt(this.hform.quantity) - 1;
                    }
                    if(this.hform.quantity <= this.tq){
                        $("#exitem").hide();
                        $("#basket").show();
                    }
                }else{
                    this.hform.quantity = 1;
                }

            },
            qadd(){
                this.hform.quantity = parseInt(this.hform.quantity) +  1;
                if(this.hform.quantity > this.tq){
                    $("#basket").hide();
                    $("#exitem").show();
                    $("#exitem").html("<span style='color: red;'>Stock exceeded, please reduce quantity.</span>");
                }
            },
            Iq(){
                if(this.hform.quantity > this.tq){
                    $("#basket").hide();
                    $("#exitem").show();
                    $("#exitem").html("<span style='color: red;'>Stock exceeded, please reduce quantity.</span>");
                }else{
                    $("#basket").show();
                    $("#exitem").hide();
                }
                if(this.hform.quantity == " " || this.hform.quantity <= 0 ){
                    this.hform.quantity = 1;
                }
            },
            rateShow(){
                this.show = false;
            },
            rateHide(){
                this.show = true;
            },
            submitrate(){
                if(this.authuser == 1){
                    if(this.rating > 0 ){
                        axios.post('/rating', this.ratings_info)
                        .then( response =>{
                            this.rate_feedback = response.data;
                            this.rating_feedback = ' ';
                        })
                    }else{
                        this.rate_feedback = 'Please give a rating from 1';
                    }
                }else{
                    this.rate_feedback = 'Please log in to rate this Book';
                }
            }
        },
        created() {
            this.loadcart();
            this.getBook();
            this.getAuthor();
            this.getRatings();
            shout.$on('refreshCart', ()=> this.loadcart());
        }
    }
</script>