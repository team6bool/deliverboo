import Vue from "vue";
import App from "./views/App.vue";
import router from "./router";

import vueBraintree from "vue-braintree";

import AOS from 'aos';
import 'aos/dist/aos.css';
AOS.init();

new Vue({
    el: "#app",
    render: (renderComponent) => renderComponent(App),
    //router must have as value and instance of VueRouter()
    router,
});

Vue.use(vueBraintree);
