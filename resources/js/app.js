
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

window.shout = new Vue();

window.rateYo = require('rateyo');

var StarRating = require('vue-star-rating');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('header-component', require('./components/frontend/headerComponent.vue').default);
Vue.component('product-component', require('./components/frontend/productComponent.vue').default);
Vue.component('account-component', require('./components/frontend/accountComponent.vue').default);
Vue.component('cart-component', require('./components/frontend/cartComponent.vue').default);
Vue.component('paypal-component', require('./components/frontend/paypalComponent.vue').default);
Vue.component('contact-component', require('./components/frontend/contactComponent.vue').default);
Vue.component('wishlistbutton-component', require('./components/frontend/wishlistbuttonComponent.vue').default);
Vue.component('newsletter-component', require('./components/frontend/newsletterComponent.vue').default);
Vue.component('star-rating', StarRating.default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});

