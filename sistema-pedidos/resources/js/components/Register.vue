<template>
    <div class="flex flex-wrap w-full justify-center items-center pt-12">
        <div class="flex flex-wrap max-w-xl">
            <div class="p-2 text-2xl text-gray-800 font-semibold"> <h1>Crear Cuenta</h1></div>
            <div class="p-2 w-full">
                <label class="w-full" for="name">Nombre</label>
                <span class="w-full text-red-500" v-if="errors.name">{{errors.name[0]}}</span>
                <input class="w-full bg-gray-100 rounded border border-gray-400 focus:outline-none focus:border-blue-500 text-base px-4 py-2" 
                placeholder="Nombre completo" type="text" name="text" v-model="form.name">
            </div>

            <div class="p-2 w-full">
                <label for="email">Correo electrónico</label>
                <input class="w-full bg-gray-100 rounded border border-gray-400 focus:outline-none focus:border-blue-500 text-base px-4 py-2" 
                placeholder="Correo electrónico" type="email" name="email" v-model="form.email">
            </div>

            <div class="p-2 w-full">
                <label for="password">Contraseña</label>
                <input class="w-full bg-gray-100 rounded border border-gray-400 focus:outline-none focus:border-blue-500 text-base px-4 py-2" 
                type="password" placeholder="Contraseña" v-model="form.password" name="password">
            </div>

            <div class="p-2 w-full">
                <label for="confirm_password">Confirmar contraseña</label>
                <input class="w-full bg-gray-100 rounded border border-gray-400 focus:outline-none focus:border-blue-500 text-base px-4 py-2" 
                type="password" placeholder="Confirmar contraseña" name="password_confirmation" v-model="form.password_confirmation">
            </div>

            <div class="p-2 w-full mt-4">
                <button @click="loginUser" type="submit" class="flex text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-gray-500 rounded text-lg">
                    Crear Cuenta
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
                name:'',
                email:'',
                password:'',
                password_confirmation:'',
            },
            errors:{name:''}
        }
    },
    methods: {
        saveForm(){
            axios.post('/register',this.form)
            .then(() =>{
            window.location.href = 'home';
            }).catch((error) =>{
                this.errors = error.response.data.errors;
            })
        }
    },
}
</script>