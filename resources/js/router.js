import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router)

import Index from './components/index.vue'

const routes = [
  {
    path:'/',
    name: 'index',
    component:Index
  },
  {
    path: '/test',
    name: 'test',
    component : () => import(/*webpackChunkName:"test"*/ './components/test.vue')
  }
];

const router = new Router({
    mode:'history',
    routes : routes,
    linkActiveClass : 'active'
});

export default router;