<template>
    <div>
        <div class="container">

            <form v-on:submit="createPermiso" id="contact-me"
                class="w-full mx-auto max-w-3xl bg-white shadow p-8 text-gray-700 ">
                <h2 class="w-full my-2 text-3xl font-bold leading-tight my-5">Crear Permiso</h2>
                <!-- name field -->
                <div class="flex flex-wrap mb-6">

                    <div class="relative w-full appearance-none label-floating">
                        <input class="tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full bg-gray-200 border
            border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500" id="slug" type="text"
                            placeholder="Slug del permiso" v-model="slug">
                        <label for="slug"
                            class="absolute tracking-wide py-2 px-4 mb-4 opacity-0 leading-tight block top-0 left-0 cursor-text">
                            Slug
                        </label>
                    </div>

                    <div class="relative w-full appearance-none label-floating">
                        <input class="tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full bg-gray-200 border
            border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500" id="descrip" type="text"
                            placeholder="Descripción del permiso" v-model="descrip">
                        <label for="descrip"
                            class="absolute tracking-wide py-2 px-4 mb-4 opacity-0 leading-tight block top-0 left-0 cursor-text">
                            Nombre
                        </label>
                    </div>
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
        <ListPermisos/>

        
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
                slug: '',
                descrip: '',
            }
        },
        methods: {
            createPermiso: function () {
                var url = 'crear-permiso';
                axios.post(url, {
                    slug: this.slug,
                    descrip: this.descrip
                }).then(response => {
                    this.slug = '';
                    this.descrip = '';
                });
            },
        },

    }

</script>

