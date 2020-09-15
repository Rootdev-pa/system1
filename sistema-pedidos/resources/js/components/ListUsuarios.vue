<template>
    <div>
        <div class="flex flex-wrap w-full justify-center items-center pt-12">
            <div class="container">
                    <div class="">
                      <button class="outline-none focus:outline-none"></button>
                      <input type="search" v-model="search" id="" placeholder="Buscar roles" class="tracking-wide py-2 px-4 leading-relaxed appearance-none block w-full bg-white border
                        border-gray-500 rounded focus:outline-none focus:bg-white focus:border-black">
                    </div>
                <table class="table-auto">
                    <thead>
                        <tr style="font-size: 0.9674rem">
                            <th class="px-4 py-2 bg-gray-200" style="background-color:#f8f8f8">Nombre</th>
                            <th class="px-4 py-2 bg-gray-200" style="background-color:#f8f8f8">Email</th>
                            <th class="px-4 py-2 bg-gray-200" style="background-color:#f8f8f8">Roles</th>
                            <th class="px-4 py-2 bg-gray-200" style="background-color:#f8f8f8">Permisos</th>
                            <th class="px-4 py-2 bg-gray-200" style="background-color:#f8f8f8">Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- inicio del ciclo for por medio de la variable (usuarios) que viene del controller (permisoController) -->
                        <tr v-for="usuario in filterUsuarios" :key="usuario.id">

                            <!-- slug -->
                            <td class="border px-4 py-2">
                                <a v-if="editmode == false || editmode != usuario.id">{{usuario.name}}</a>
                                <input class="tracking-wide py-2 px-4 leading-relaxed appearance-none block w-full bg-white border
                                border-black rounded focus:outline-none focus:bg-white focus:border-gray-500"
                                    v-if="editmode == usuario.id" v-model="usuario.name" type="text">
                            </td>

                            <!-- descripcion -->
                            <td class="border px-4 py-2">
                                <input class="tracking-wide py-2 px-4 leading-relaxed appearance-none block w-full bg-gray-200 border
                                border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
                                    v-if="editmode == false || editmode != usuario.id" v-model="usuario.email" />
                                <input class="tracking-wide py-2 px-4 leading-relaxed appearance-none block w-full bg-withe border
                                border-black rounded focus:outline-none focus:bg-white focus:border-gray-500"
                                    v-if="editmode == usuario.id" v-model="usuario.email" type="text">
                            </td>

                            <!-- relacion del usuario con los roles -->
                            <!-- ciclo for de la relacion roles
                            v-if="editmode == usuario.id" -->

<!-- usuarios roles -->
                            <td class="border px-4 py-2">

                                <div v-if="editmode ==false || editmode != usuario.id">
                                    <div v-for="rols in usuario.roles" :key="rols.id">
                                        {{rols.slug}}
                                    </div>
                                </div>

                                <div v-if="editmode == usuario.id">
                                    <div v-for="rols in roles" :key="rols.id">

                                        <input type="checkbox" v-bind:id="rols.id" v-bind:value="rols.id"
                                            v-model="checkRol">
                                        <span>{{rols.slug}}</span>

                                    </div>
                                </div>
                            </td>
<!-- usuarios permisos -->
                            <td class="border px-4 py-2">

                                <div v-if="editmode ==false || editmode != usuario.id">
                                    <div v-for="perm in usuario.permisos" :key="perm.id">
                                        {{perm.slug}}
                                    </div>
                                </div>

                                <div v-if="editmode == usuario.id">
                                    <div v-for="perm in permisos" :key="perm.id">

                                        <input type="checkbox" v-bind:id="perm.id" v-bind:value="perm.id"
                                            v-model="checkPer">
                                        <span>{{perm.slug}}</span>

                                    </div>
                                </div>
                            </td>

                            <div>
                                <td class="border px-4 py-2">
                                    <div class="ml-auto mr-2 d-flex align-items-center">
                                        <span>
                                            <svg v-on:click="uR(usuario); uP(usuario); editmode = usuario.id"
                                                v-if="editmode != usuario.id" xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-edit" width="32" height="32"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="#2196F3" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" />
                                                <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                                <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                                <line x1="16" y1="5" x2="19" y2="8" />
                                            </svg>

                                            <svg v-if="editmode == usuario.id" v-on:click="updateUsuario(usuario)"
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-edit" width="32" height="32"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="#9E9E9E" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" />
                                                <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                                <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                                <line x1="16" y1="5" x2="19" y2="8" />
                                            </svg>
                                        </span>
                                    </div>

                                    <span>
                                        <svg v-on:click="deleteUsuario(usuario)" xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-trash" width="32" height="32"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="#E91E63" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <line x1="4" y1="7" x2="20" y2="7" />
                                            <line x1="10" y1="11" x2="10" y2="17" />
                                            <line x1="14" y1="11" x2="14" y2="17" />
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                        </svg>
                                    </span>
                                </td>
                            </div>
                            <td>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                editmode: false,
                update: 0,
                slug: '',
                name: '',
                search: '',
                email: '',
                usuarios: [],
                checkRol: [],
                checkPer: [],
                roles: [],
                permisos: [],
                currentRole: null,
                currentPerm: null,
            }
        },
        created() {
            this.getUsuarios();
        },
        computed: {
            filterUsuarios(){
                // return this.pemrisos.filter((usuario)=>{
                //     return usuario.slug.match(this.relation) || usuario.email.match(this.relation);
                // });
                return this.usuarios.filter((user)=>{
                    return user.name.match(this.search) || user.email.match(this.search);
                });
            }
        },
        methods: {
            getUsuarios: function () {
                var urlIdeas = 'getusuarios';
                axios.get(urlIdeas).then(response => {
                    this.usuarios = response.data.usuarios
                    this.roles = response.data.roles
                    this.permisos = response.data.permisos

                });
            },
            deleteUsuario(usuario) {
                axios.post('/usuario/borrar/', {
                    id: usuario.id
                }).then(response => {
                    this.getUsuarios();
                });
            },
            updateUsuario(usuario) {
                this.editmode = false
                axios.post('/usuario/actualizar/', {
                    id: usuario.id,
                    name: usuario.name,
                    email: usuario.email,
                    roles: this.checkRol,
                    permisos: this.checkPer,
                }).then(response => {
                    this.getUsuarios();
                    console.log(this.checkPer)
                });
            },
            uR: function (usuario){
                this.editmode = false
                this.currentRole = usuario;
                this.checkRol = _.map(usuario.roles, function (rol) {
                    return rol.id;
                });
            }, 
            uP: function (usuario){
                this.editmode = false
                this.currentPerm = usuario;
                this.checkPer = _.map(usuario.permisos, function (per) {
                    return per.id;
                });
            }
        },
    }

</script>
