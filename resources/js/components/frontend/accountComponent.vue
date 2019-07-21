<template>
    <main id="tg-main" class="tg-main tg-haslayout">
			<!--************************************
					Contact Us Start
			*************************************-->
			<div class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="tg-contactus">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="tg-sectionhead">
                                    <!-- @if(Session::has('flash-message-s'))
                                    <div class="alert alert-success">
                                        <button type="button" class="close" aria-label="Close">x</button>
                                        {!!session::get('flash-message-s')!!}
                                    </div>
                                    @endif
                                    @if(Session::has('flash-message-e'))
                                    <div class="alert alert-danger">
                                        <button type="button" class="close" aria-label="Close">x</button>
                                        {!!session::get('flash-message-e')!!}
                                    </div>
                                    @endif -->
									<h2><span>Account Settings</span></h2>
								</div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="tg-sectionhead">
									<h2><span>Change Password</span></h2>
								</div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" style="margin-bottom: 30px;">
								<form class="tg-formtheme tg-formcontactus" @submit.prevent="changepassword()" id="update-password">
                                            <div class="form-group">
                                                <input type="text" name="password" v-model="old_pwd" class="form-control" placeholder="Old Password">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="new_password" v-model="new_pwd" class="form-control" placeholder="New Password">
                                            </div>
                                            <input type="hidden" name="_csrf-token" :value="csrf">
                                            <div class="form-group">
											<button type="submit" class="tg-btn tg-active">Change Password</button>
                                            </div>
                                </form>
                                <span style="color: green;">{{password_check}}</span>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="tg-sectionhead">
									<h2><span>Update Profile Information</span></h2>
								</div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
								<form class="tg-formtheme tg-formcontactus" id="update-account">
                                            <div class="form-group">
                                                <input type="text" name="first_name" v-model="form.first_name" class="form-control" placeholder="First Name">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="last_name" v-model="form.last_name" class="form-control" placeholder="Last Name">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="email" v-model="form.email" class="form-control" placeholder="Email" disabled>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="phone" v-model="form.phone" class="form-control" placeholder="Phone number">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="city" v-model="form.city" class="form-control" placeholder="City">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="state" v-model="form.state" class="form-control" placeholder="State">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="zip_code" v-model="form.zip_code" class="form-control" placeholder="Zip Code">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="country" v-model="form.country" class="form-control" placeholder="Country">
                                            </div>
                                            <div class="form-group">
                                                <textarea name="address" class="form-control" v-model="form.address" placeholder="Address" style="height: 150px;"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Profile Picture</label>
                                                <input type="file" name="image" @change="uploadimg">
                                            </div>
                                            <div class="form-group">
											<button type="submit" @click.prevent="update()" class="tg-btn tg-active">Update</button>
                                            </div>
                                </form>
                            </div>
						</div>
					</div>
				</div>
			</div>
    </main>
</template>

<script>
export default {
    props: [
            'userid',
    ],
    data(){
        return {
            password_check: "",
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            new_pwd: "",
            old_pwd: "",
            form: {
                first_name: "",
                last_name: "",
                email: "",
                city: "",
                state: "",
                zip_code: "",
                country: "",
                address: "",
                image: "",
                phone: ""
            }
        }
    },
    methods: {
        getdata(){
            axios.get('/user-details/' + this.userid)
            .then(response => {
                this.form = response.data;
            })
        },
        changepassword(){
            const passchange = $('form[id="update-password"]');
                passchange.validate({
                    rules:{
                        password: {
                            required: true
                        },
                        new_password: {
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

                if(passchange.valid()){
                    axios.post('/update-pwd', {
                       new_pwd: this.new_pwd,
                       old_pwd: this.old_pwd
                    })
                    .then(response =>{
                        this.password_check = response.data;
                    })
                }
        },
        uploadimg(e){
            let file = e.target.files[0];
            let reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onloadend = ()=>{
                this.form.image = reader.result;
            }
        },
        update(){

            const account = $('form[id="update-account"]');
            account.validate({
                rules:{
                    first_name:{
                    required:true,
                    },
                    last_name:{
                    required:true
                    },
                    phone:{
                    required:true
                    },
                    city:{
                    required:true
                    },
                    state:{
                    required:true
                    },
                    country:{
                    required:true
                    },
                    zip_code:{
                    required:true
                    },
                    address:{
                    required:true
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

            if(account.valid()){
                axios.post('/update-profile', {
                    form: this.form,
                })
                .then(()=>{
                    window.location.href = '/';
                })
            }
        }

    },
    mounted(){
        this.getdata();
    }
}
</script>

