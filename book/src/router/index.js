import Vue from 'vue';
import Router from 'vue-router';
import Index from '@/components/Index.vue';
import Regist from '@/components/Regist.vue';
import Login from '@/components/Login.vue';
import BookMes from '@/components/BookMes.vue';
import ShoppingCar from '@/components/ShoppingCar.vue';
import Buy from '@/components/Buy.vue';

Vue.use(Router);

let router = new Router({
  routes: [
    {
      path: '/',
      component: Index
    },
    {
      name: 'index',
      path: '/index',
      component: Index
    },
    {
      name: 'regist',
      path: "/regist",
      component: Regist
    },
    {
      name: 'login',
      path: "/login",
      component: Login
    },
    {
      name: 'bookmes',
      path: "/bookmes/:bookId",
      component: BookMes
    },
    {
      name: 'ShoppingCar',
      path: "/shoppingcar",
      component: ShoppingCar
    },
    {
      name: 'Buy',
      path: "/buy",
      component: Buy
    }
  ]
});

export default router;
