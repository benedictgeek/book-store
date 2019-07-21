<template>
    <form class="tg-formtheme tg-formnewsletter" @submit.prevent="register()">
        <span v-if="note" style="color: greeb;">{{info}}</span>
        <fieldset>
            <input type="email" name="email" v-model="email" class="form-control" placeholder="Enter Your Email ID">
            <button type="button"><i class="icon-envelope"></i></button>
        </fieldset>
    </form>
</template>

<script>
export default {
    data (){
        return {
            note: false,
            info: "",
            email: ""
        }
    },
    methods: {
        register(){
            const newsletter = $('form[id="update-password"]');
                newsletter.validate({
                    rules:{
                        email: {
                            required: true
                        }
                    },
                    errorClass: "help-inline",
                    errorElement: "span",
                    highlight:function(element, errorClass, validClass) {
                        $(element).parents('.control-group').addClass('error');
                    },
                    unhighlight: function(element, errorClass, validClass) {
                        $(element).parents('.control-group').removeClass('error');
                        $(element).parents('.control-group').addClass('success');
                    }
                });
                if(newsletter.isValid()){
                    axios.post('/newsletter', {email: this.email})
                    .then(response=>{
                        this.note = true;
                        this.info = response.data;
                        this.email = "";
                    })
                }
        }
    },
    mounted(){

    }
}
</script>

