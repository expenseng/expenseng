/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import VueApexCharts from 'vue-apexcharts';
import TextareaAutosize from 'vue-textarea-autosize'

window.Vue = require('vue');
Vue.use(TextareaAutosize);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component('apexchart', VueApexCharts);
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('comments', require('./components/Comment/Comments.vue').default);
Vue.component('chart', require('./components/Payments/Chart.vue').default);
Vue.component('govt-expense', require('./components/Home/GovtExpenses.vue').default);
Vue.component('ministry-expense', require('./components/Home/MinistryExpense.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
