<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from '@inertiajs/vue3'
import { reactive, ref } from 'vue';



const form = useForm({
    name:'',
    description:'',
    files:[]
})

const inputs = ref([
    { 
        label:"Archivo",
        id : Math.floor(Math.random() * 10000)
    }
]);

const agregarCampo = () =>
{
    inputs.value.push({
        label: "Archivo",
        id: Math.floor(Math.random() * 10000)
    });   
}

const eliminarCampo = (id) =>
{
    const arr = inputs.value.filter(elem => elem.id !== id);
    inputs.value = arr;
}

let flag = 0;
const obtenerArchivos = (e) =>
{
    form.files[flag++] = e.target.files[0];   
}

const cortina = () =>
{
    alert();
}
</script>


<template>
    <AppLayout title="Ejecuciones SMM">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Crear ejecución SMM
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <form class="max-w-7xl mx-5 p-4" @submit.prevent="form.post(route('ejecution.store'))" enctype="multipart/form-data" @submit="cortina()">
                        
                        <div class="mb-5">
                            <label for="" class="block mb-2 text-sm font-medium text-gray-900 ">Nombre ejecución*</label>
                            <input type="text" id="name" v-model="form.name" name="name" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base" required>
                        </div>

                        <div class="mb-5">
                            <label for="" class="block mb-2 text-sm font-medium text-gray-900 ">Descripción*</label>
                            <textarea id="" name="" v-model="form.description" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base" required></textarea>
                        </div>

                        <svg @click="agregarCampo()" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-9 text-blue-800 ">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        
                        <div class="grid grid-cols-3 gap-6">
                            <div class="" v-for="(item, index) in inputs" :key="index" >
                                <div :id="item.id">
                                    <label for="" class="block text-sm font-medium text-gray-900">Archivo(PDF)*</label>
                                    <input type="file" @change="obtenerArchivos" :id="'file-' + index" name="files[]" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base" required >                                
                                    <label for="" class="block text-sm font-medium text-red-950 text-right hover:cursor-pointer" @click="eliminarCampo(item.id)">[X]</label>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Crear</button>
                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
