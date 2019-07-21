<template>
<a class="tg-btn tg-btnstyletwo" style="padding-left: 1px;" href="#addtowishlist" @click.prevent="add()">
    <em v-if="buttonClicked" id="inwish">Added to wishlist</em>
    <i v-if="!buttonClicked" class="fa fa-shopping-basket"></i>
    <em v-if="!buttonClicked">Add to wishlist</em>
</a>
</template>

<script>
export default {
    props: [
        'bookid',
        'isadmin'
    ],
    computed: {
        book_id: function(){
            return {
                id: this.bookid,
            }
        } 
    },
    data() {
        return {
            buttonClicked: false,
        }
    },
    methods: {
        add(){
            if(this.isadmin == 1){
            axios.post('/wishlist', this.book_id)
            .then(response =>{
                if(typeof(response.data) == 'string'){
                    this.buttonClicked =  true;
                }else{
                    shout.$emit('updateWish');
                }
            })
            }else{
                window.location.href = '/reg-login';
            }
        }
    },
    mounted(){
    }
}
</script>

