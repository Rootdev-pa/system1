
require('./bootstrap');

window.Vue = require('vue');


Vue.component('example-component', require('./components/ExampleComponent.vue').default);

// componente para iniciar session
Vue.component('login', require('./components/Login.vue').default);

//componente para registrarse
Vue.component('register', require('./components/Register.vue').default);

//componente para listar permisos
Vue.component('lista-permisos', require('./components/ListaPermisos.vue').default);

//componente padre de los roles
Vue.component('roles', require('./components/Roles.vue').default);

//componente para listar los roles
Vue.component('list-roles', require('./components/ListRoles.vue').default);


const app = new Vue({
    el: '#app',
});
