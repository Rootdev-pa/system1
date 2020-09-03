<template>
    <div>
        <div class="container">

            <form v-on:submit.prevent="createPermiso" id="contact-me"
                class="w-full mx-auto max-w-3xl bg-white shadow p-8 text-gray-700 ">
                <h2 class="w-full my-2 text-3xl font-bold leading-tight my-5">Crear Permiso</h2>
                <!-- name field -->

                <div class="container" v-for="(input,k) in inputs" :key="k">
                    <div class="flex flex-wrap mb-6">

                        <div class="relative w-full appearance-none label-floating">
                            <input class="tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full bg-gray-200 border
            border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500" id="slug" type="text"
                                placeholder="Slug del permiso" v-model="input.slug">
                            <label for="slug"
                                class="absolute tracking-wide py-2 px-4 mb-4 opacity-0 leading-tight block top-0 left-0 cursor-text">
                                Slug
                            </label>
                        </div>

                        <div class="relative w-full appearance-none label-floating">
                            <input class="tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full bg-gray-200 border
            border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500" id="descrip" type="text"
                                placeholder="Descripción del permiso" v-model="input.descrip">
                            <label for="descrip"
                                class="absolute tracking-wide py-2 px-4 mb-4 opacity-0 leading-tight block top-0 left-0 cursor-text">
                                Nombre
                            </label>
                        </div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus float-right" width="40"
                        height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#009688" fill="none"
                        stroke-linecap="round" stroke-linejoin="round" @click="add(k)" v-show="k == inputs.length-1">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <line x1="12" y1="5" x2="12" y2="19" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                    </svg>


                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-minus" width="32"
                        height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#E91E63" fill="none"
                        stroke-linecap="round" stroke-linejoin="round" @click="remove(k)"
                        v-show="k || ( !k && inputs.length > 1)">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                    </svg>
                </div>

                <div class="">
                    <button class="w-full shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none 
                        text-white font-bold py-2 px-4 rounded" type="submit">
                        Agregar
                    </button>
                </div>
            </form>
        </div>
                    <ListPermisos />

    </div>
</template>

<script>
    import ListPermisos from './ListPermisos'
    export default {
        components: {
            ListPermisos
        },
        data() {
            return {
                inputs: [{
                    slug: '',
                    descrip: '',
                }],

            }
        },
        methods: {
            add(index) {
                this.inputs.push({
                    slug: "",
                    descrip: ""
                });
            },
            remove(index) {
                this.inputs.splice(index, 1);
            },

            createPermiso: function () {
                var url = 'crear-permiso';
                axios.post(url, {permiso: JSON.stringify(this.inputs)
                }).then(response => {
                    this.slug = '';
                    this.descrip = '';
                });
            },
        },

    }

</script>
