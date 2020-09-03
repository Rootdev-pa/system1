<template>
    <div>
        <div class="flex flex-wrap w-full justify-center items-center pt-12">
            <div class="container">
                <table class="table-auto">
                    <thead>
                        <tr style="font-size: 0.9674rem">
                            <th class="px-4 py-2 bg-gray-200" style="background-color:#f8f8f8">Slug</th>
                            <th class="px-4 py-2 bg-gray-200" style="background-color:#f8f8f8">Descripción</th>
                            <th class="px-4 py-2 bg-gray-200" style="background-color:#f8f8f8">Roles</th>
                            <th class="px-4 py-2 bg-gray-200" style="background-color:#f8f8f8">Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- inicio del ciclo for por medio de la variable (permisos) que viene del controller (permisoController) -->
                        <tr v-for="permiso in permisos" :key="permiso.id">

                            <!-- slug -->
                            <td class="border px-4 py-2">
                                <span v-if="editmode ==false || editmode != permiso.id">{{permiso.slug}}</span>
                                <input class="tracking-wide py-2 px-4 leading-relaxed appearance-none block w-full bg-gray-200 border
                                border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500" 
                                    v-if="editmode == permiso.id"
                                    v-model="permiso.slug" type="text">
                            </td>

                            <!-- descripcion -->
                            <td class="border px-4 py-2">
                                <span v-if="editmode ==false || editmode != permiso.id">{{permiso.descrip}}</span>
                                <input class="tracking-wide py-2 px-4 leading-relaxed appearance-none block w-full bg-gray-200 border
                                border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500" 
                                v-if="editmode == permiso.id"
                                v-model="permiso.descrip" type="text">
                            </td>

                            <!-- relacion del permiso con los roles -->
                            <!-- ciclo for de la relacion roles
                            v-if="editmode == permiso.id" -->

                            <td class="border px-4 py-2" v-for="rol in permiso.roles" :key="rol.id">
                            <span v-if="editmode ==false || editmode != permiso.id">{{rol.slug}}</span>

                            <div v-if="editmode == permiso.id" >

                                <div v-for="rols in roles" :key="rols.id">
                                    <div v-if="rol.slug == rols.slug" >
                                            <input type="checkbox" name="check[]"
                                            v-model="checkRol[rols.id]"
                                            :value="rol.id" checked> {{rols.slug}}
                                    </div>
                                    <div v-if="rol.slug != rols.slug" >
                                            <input type="checkbox" name="check[]"
                                            v-model="checkRol[rols.id]"
                                            :value="rol.id"> {{rols.slug}}
                                        <!-- <input type="checkbox" name="check[]" :value="rols.id" v-model="checkRol[rols.id]" :checked="true">
                                        {{rols.slug}} -->
                                    </div>
                                </div>

                            </div>

                            </td>

                            <div>
                                <td class="border px-4 py-2">
                                    <div class="ml-auto mr-2 d-flex align-items-center">
                                        <span>
                                            <svg v-on:click="editmode = permiso.id" v-if="editmode != permiso.id"
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-edit" width="32" height="32"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="#2196F3" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" />
                                                <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                                <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                                <line x1="16" y1="5" x2="19" y2="8" />
                                            </svg>

                                            <svg v-if="editmode == permiso.id" v-on:click="updatePermiso(permiso)"
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
                                        <svg v-on:click="deletePermiso(permiso)" xmlns="http://www.w3.org/2000/svg"
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
                permisos: [],
                checkRol: [],
                roles: [],

            }
        },
        created() {
            this.getPermisos();
        },
        methods: {
            getPermisos: function () {
                var urlIdeas = 'getpermisos';
                axios.get(urlIdeas).then(response => {
                    this.permisos = response.data.permisos
                    this.roles = response.data.roles
                });
            },
            deletePermiso(permiso) {
                axios.post('/permiso/borrar/', {
                    id: permiso.id
                    }).then(response => {
                    this.getPermisos();
                });
            },
            updatePermiso(permiso) {
                this.editmode = false
                axios.post('/permiso/actualizar/', {
                    id: permiso.id,
                    slug: permiso.slug,
                    descrip: permiso.descrip,
                    roles: permiso.checkRol,
                    }).then(response => {
                    console.log({'check':this.checkRol})
                });
            },
        },
    }

</script>
