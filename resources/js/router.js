import Vue from 'vue';
import VueRouter from 'vue-router';
import DomainComponent from "./components/DomainComponent.vue";

Vue.use(VueRouter)

export default new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/domains',
            component: DomainComponent,
        }
    ]
})
