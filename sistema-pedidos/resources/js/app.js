
require('./bootstrap');

window.Vue = require('vue');


Vue.component('example-component', require('./components/ExampleComponent.vue').default);

// componente para iniciar session
Vue.component('login', require('./components/Login.vue').default);

//componente para registrarse
Vue.component('register', require('./components/Register.vue').default);

//componente para listar permisos
Vue.component('lista-permisos', require('./components/PermisosLista.vue').default);

//componente padre de los roles
Vue.component('roles', require('./components/Roles.vue').default);

//componente para listar los roles
Vue.component('list-roles', require('./components/ListRoles.vue').default);

//componente padre de los permisos
Vue.component('permisos', require('./components/Permisos.vue').default);

//componente para listar los permisos
Vue.component('list-permisos', require('./components/ListPermisos.vue').default);

//componente padre de los usuarios
Vue.component('usuarios', require('./components/Usuarios.vue').default);

//componente para listar los usuarios
Vue.component('list-usuarios', require('./components/ListUsuarios.vue').default);



const app = new Vue({
    el: '#app',
});
