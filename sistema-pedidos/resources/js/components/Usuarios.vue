<template>
    <div>
        <div class="container">

            <form v-on:submit="createUsuario" id="contact-me"
                class="w-full mx-auto max-w-3xl bg-white shadow p-8 text-gray-700 ">
                <h2 class="w-full my-2 text-3xl font-bold leading-tight my-5">Crear Usuario</h2>
                <!-- name field -->
                <div class="flex flex-wrap mb-6">

                    <div class="relative w-full appearance-none label-floating">
                        <input class="tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full bg-gray-200 border
            border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500" id="name" type="text"
                            placeholder="Nombre" v-model="name">
                        <label for="name"
                            class="absolute tracking-wide py-2 px-4 mb-4 opacity-0 leading-tight block top-0 left-0 cursor-text">
                            nombre
                        </label>
                    </div>

                    <div class="relative w-full appearance-none label-floating">
                        <input class="tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full bg-gray-200 border
            border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500" id="email" type="text"
                            placeholder="Correo" v-model="email">
                        <label for="email"
                            class="absolute tracking-wide py-2 px-4 mb-4 opacity-0 leading-tight block top-0 left-0 cursor-text">
                            email
                        </label>
                    </div>
    
                    <div class="relative w-full appearance-none label-floating">
                        <input class="tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full bg-gray-200 border
            border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500" id="password" type="password"
                            placeholder="Contraseña" v-model="contraseña">
                        <label for="Contraseña"
                            class="absolute tracking-wide py-2 px-4 mb-4 opacity-0 leading-tight block top-0 left-0 cursor-text">
                            Contraseña
                        </label>
                    </div>

                    <!-- roles -->
                    <li style="list-style: none;">
                        <div v-for="rols in roles" :key="rols.index">
                            <div>
                                <input type="checkbox" name="checkr[]" v-bind:id="rols.id" :value="rols.id"
                                    v-model="checkRol">

                                <!-- <input type="checkbox"
                                :value="rols.id" v-model="checkRol" number>-->
                                <b>{{rols.descrip}}</b><span>({{rols.slug}})</span>
                                <br>
                            </div>
                        </div>
                    </li>

                    <!-- permisos -->
                    <li style="list-style: none;">
                        <div v-for="perm in permisos" :key="perm.index">
                            <div>
                                <input type="checkbox" name="checkp[]" v-bind:id="perm.id" :value="perm.id"
                                    v-model="checkPer">

                                <!-- <input type="checkbox"
                                :value="rols.id" v-model="checkRol" number>-->
                                <b>{{perm.descrip}}</b><span>({{perm.slug}})</span>
                                <br>
                            </div>
                        </div>
                    </li>

                </div>
                <div class="">
                    <button
                        class="w-full shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                        type="submit">
                        Agregar
                    </button>
                </div>
            </form>
        </div>
        <ListUsuarios />


    </div>
</template>

<script>
    import ListUsuarios from './ListUsuarios'
    export default {
        components: {
            ListUsuarios
        },
        data() {
            return {
                name: '',
                email: '',
                contraseña: '',
                checkRol: [],
                checkPer: [],
                roles: [],
                permisos: [],
                checkr: [],
                checkp: [],
            }
        },
        created() {
            this.getUsuarios();
        },
        methods: {
            getUsuarios: function () {
                var urlIdeas = 'getusuarios';
                axios.get(urlIdeas).then(response => {
                    this.roles = response.data.roles
                    this.permisos = response.data.permisos
                });
            },
            createUsuario: function () {
                var url = 'crear-usuario';
                axios.post(url, {
                    name: this.name,
                    email: this.email,
                    contraseña: this.contraseña,
                    roles: this.checkRol,
                    permisos: this.checkPer,

                }).then(response => {
                    this.name = '';
                    this.email = '';
                    this.contraseña = '';
                    // console.log({rol: JSON.stringify(this.checkRol)})

                });
            },
        },

    }

</script>
