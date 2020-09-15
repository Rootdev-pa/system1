<template>
    <div class="flex flex-wrap w-full justify-center items-center pt-12">
        <div class="flex flex-wrap max-w-xl">
            <div class="p-2 text-2xl text-gray-800 font-semibold"> <h1>Iniciar Sesión</h1></div>

            <div class="p-2 w-full">
                <label for="email">Correo electrónico</label>
                <input class="w-full bg-gray-100 rounded border border-gray-400 focus:outline-none focus:border-blue-500 text-base px-4 py-2" 
                type="email" placeholder="Correo Electrónico" v-model="form.email" name="email">
            </div>

            <div class="p-2 w-full">
                <label for="password">Contraseña</label>
                <input class="w-full bg-gray-100 rounded border border-gray-400 focus:outline-none focus:border-blue-500 text-base px-4 py-2" 
                type="password" placeholder="Contraseña" v-model="form.password" name="password">
            </div>
            
            <div class="p-2 w-full mt-4">
                <button v-on:click="loginUser" type="submit" class="flex text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-gray-500 rounded text-lg">
                    Iniciar sesión
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form:{
                email:'',
                password:'',
            },
            errors:{name:''}
        }
    },
    methods: {
        loginUser(){
            axios.post('/login',this.form)
            .then(() =>{
            window.location.href = 'home';
            }).catch((error) =>{
            })
        }
    },
}
</script>