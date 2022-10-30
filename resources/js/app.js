
import './bootstrap';
import { createApp } from 'vue';
import CreateCart from './components/CreateCart.vue';
import MenuPermission from './components/MenuPermission';
import measureCart from "./components/measureCart";
import AddPurchase from "./components/AddPurchase";
import UpdatePurchase from "./components/UpdatePurchase";
import AddLabour from "./components/AddLabour";
import Toaster from '@meforma/vue-toaster';
import addAccount from "./components/addAccount";


window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

const app = createApp({});
app.component('create-cart', CreateCart);
app.component('menu-permission', MenuPermission);
app.component('measure-cart', measureCart);
app.component('add-purchase', AddPurchase);
app.component('update-purchase', UpdatePurchase);
app.component('add-labour', AddLabour);
app.component('add-account', addAccount);

app.use(Toaster).mount('#app');

// const abc = createApp({});
// abc.component('create-purchases', CreatePurchase);
// abc.mount('#prc');

