<template>
    <div>
        <div class="flex flex-wrap w-full justify-center items-center pt-12">
            <div class="container">
                    <div class="">
                      <button class="outline-none focus:outline-none"></button>
                      <input type="search" v-model="search" id="" placeholder="Buscar roles" class="tracking-wide py-2 px-4 leading-relaxed appearance-none block w-full bg-white border
                        border-gray-500 rounded focus:outline-none focus:bg-white focus:border-black">
                    </div>
<!--                     
                <input  class="tracking-wide py-2 px-4 leading-relaxed appearance-none block w-full bg-gray-200 border
                                border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
                type="text" v-model="search" placeholder="Buscar rol"> -->
                <table class="table-auto">
                    <thead>
                        <tr style="font-size: 0.9674rem">
                            <th class="px-4 py-2 bg-gray-200" style="background-color:#f8f8f8">Slug</th>
                            <th class="px-4 py-2 bg-gray-200" style="background-color:#f8f8f8">Descripción</th>
                            <th class="px-4 py-2 bg-gray-200" style="background-color:#f8f8f8">Permisos</th>
                            <th class="px-4 py-2 bg-gray-200" style="background-color:#f8f8f8">Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="rol in filterRoles" :key="rol.id">

                            <!-- slug -->
                            <td class="border px-4 py-2">
                                <a v-if="editmode == false || editmode != rol.id">{{rol.slug}}</a>
                                <input class="tracking-wide py-2 px-4 leading-relaxed appearance-none block w-full bg-white border
                                border-black rounded focus:outline-none focus:bg-white focus:border-gray-500"
                                    v-if="editmode == rol.id" v-model="rol.slug" type="text">
                            </td>

                            <!-- descripcion -->
                            <td class="border px-4 py-2">
                                <input class="tracking-wide py-2 px-4 leading-relaxed appearance-none block w-full bg-gray-200 border
                                border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
                                    v-if="editmode == false || editmode != rol.id" v-model="rol.descrip" />
                                <input class="tracking-wide py-2 px-4 leading-relaxed appearance-none block w-full bg-withe border
                                border-black rounded focus:outline-none focus:bg-white focus:border-gray-500"
                                    v-if="editmode == rol.id" v-model="rol.descrip" type="text">
                            </td>

                            <!-- relacion del rol con los roles -->
                            <!-- ciclo for de la relacion roles
                            v-if="editmode == rol.id" -->
                            <td class="border px-4 py-2">

                                <div v-if="editmode ==false || editmode != rol.id">
                                    <div v-for="perm in rol.permisos" :key="perm.id">
                                        {{perm.slug}}
                                    </div>
                                </div>


                                <div v-if="editmode == rol.id">
                                    <div v-for="perms in permisos" :key="perms.id">

                                        <input type="checkbox" v-bind:id="perms.id" v-bind:value="perms.id"
                                            v-model="checkPerm">
                                        <span>{{perms.slug}}</span>

                                    </div>
                                </div>
                            </td>

                            <div>
                                <td class="border px-4 py-2">
                                    <div class="ml-auto mr-2 d-flex align-items-center">
                                        <span>
                                            <svg v-on:click="uR(rol); editmode = rol.id" v-if="editmode != rol.id"
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-edit" width="32" height="32"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="#2196F3" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" />
                                                <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                                <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                                <line x1="16" y1="5" x2="19" y2="8" />
                                            </svg>


                                            <svg v-if="editmode == rol.id" v-on:click="updateRol(rol)"
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
                                        <svg v-on:click="deleteRol(rol)" xmlns="http://www.w3.org/2000/svg"
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
        props: ["list"],
        data() {
            return {
                editmode: false,
                update: 0,
                slug: '',
                descrip: '',
                search: '',
                relation: '',
                roles: [],
                permisos: [],
                checkPerm: [],
                currentPerm: null,
            }
        },
        created() {
            this.getRoles();
            // this.$http.get().then(function(data){
            // this.roles = data.body.slice(0,10);
            // })
        },
        computed: {
            filterRoles(){
                // return this.pemrisos.filter((permiso)=>{
                //     return permiso.slug.match(this.relation) || permiso.descrip.match(this.relation);
                // });
                return this.roles.filter((rol)=>{
                    return rol.slug.match(this.search) || rol.descrip.match(this.search);
                });
            }

        },
        methods: {
            getRoles: function () {
                var urlIdeas = 'getroles';
                axios.get(urlIdeas).then(response => {
                    this.roles = response.data.roles
                    this.permisos = response.data.permisos
                });
            },
            deleteRol(rol) {
                axios.post('/rol/borrar/', {
                    id: rol.id
                }).then(response => {
                    this.getRoles();
                });
            },
            updateRol(permiso) {
                this.editmode = false
                axios.post('/rol/actualizar/', {
                    id: permiso.id,
                    slug: permiso.slug,
                    descrip: permiso.descrip,
                    permisos: this.checkPerm,
                }).then(response => {
                    this.getRoles();
                });
            },
            uR: function (rol) {
                this.editmode = false
                this.currentPerm = rol;
                this.checkPerm = _.map(rol.permisos, function (perm) {
                    return perm.id;
                });
            }
        },
    }

</script>
