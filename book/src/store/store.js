import Vue from 'vue';
import Vuex from "vuex";
Vue.use(Vuex);
const store = new Vuex.Store({
  state: {
    loginUser: "",
    total: 0
  },
  mutations: {
  	addPrice(state, price){
  		state.total += price;
  	},
  	supPrice(state, price){
  		state.total -= price;
  	},
    resetPrice(state){
      state.total = 0;
    }
  }
});
export default store;
