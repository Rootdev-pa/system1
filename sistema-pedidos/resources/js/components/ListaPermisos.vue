<template>

<div class="flex flex-wrap w-full justify-center items-center pt-12">
    <div class="container">
        <table class="table-auto">
            <thead>
                <tr style="font-size: 0.9674rem">
                    <th class="px-4 py-2 bg-gray-200" style="background-color:#f8f8f8">Nombre</th>
                    <th class="px-4 py-2" style="background-color:#f8f8f8">Correo</th>
                    <th class="px-4 py-2" style="background-color:#f8f8f8">Roles</th>
                    <th class="px-4 py-2" style="background-color:#f8f8f8">Permisos</th>

                </tr>
            </thead>
            <tbody>
                <tr v-for="user in users" :key="user.id">
                    <td class="border px-4 py-2">{{ user.name }}</td>

                    <td class="border px-4 py-2">{{ user.email}}</td>
                    
                        <td class="border px-4 py-2" v-for="(rol,index) in user.roles" :key="index">
                        {{ rol.nombre }}
                    </td>

                    <div>
                        <td class="border px-4 py-2" v-for="(permiso, index) in user.permisos" :key="index+10">
                            <input type="checkbox" v-model="selected" :value="permiso.id" number>
                            {{ permiso.nombre}}
                        </td>
                    </div>
                </tr>
            </tbody>
        </table> 
        
    </div>
</div>

</template>

<script>
    export default {
        data() {
            return {
            permisos:[],
            users:[],
         selected:[],
            }
        },
        created() {
            this.getPost();
        },
        mounted() {
            
        },
        computed: {
            selectAll: {
                get: function () {
                    return this.permisos ? this.selected.length == this.permisos.length : false;
                },
                set: function (value) {
                    var selected = [];
                    if (value) {
                        this.permisos.forEach(function (permiso) {
                            selected.push(permiso.id.toString());
                        });
                    }

                    this.selected = selected;
                }
            }
        },
        methods: {
            getPost: function () {
                var urlIdeas = 'permiso';
                axios.get(urlIdeas).then(response => {
                    this.users = response.data.users
                    this.permisos = response.data.permisos

                });
            },
            loadRol: function(data){
                this.load = data.user_id
                let url = '/editrol/'+this.load;
                axios.get(url).then((response) => {
                this.comentarios = response.data;
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                }); 
            },
        },

    }

</script>
