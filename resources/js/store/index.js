import Vue from 'vue';
import Vuex from 'vuex';

import {state} from './state';
import {actions} from './actions';
import {mutations} from './mutations';
import {getters} from './getters';
import chatModule from "./modules/cart/index";
import productsModule from "./modules/products/index";

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        chat: chatModule,
        products: productsModule
    },
    state,
    mutations,
    actions,
    getters
});