<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from '@inertiajs/vue3'

defineProps({
    tipoDocumento:{
        type:Object,
        required:true
    }
   
})

const form = useForm({
    document_type_id:'',
    name:'',
    file:''
})

const obtenerImagen = (e) =>
{
    form.file = e.target.files[0];   
}

</script>


<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Crear documento repositorio
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <form class="max-w-7xl mx-5 p-4" @submit.prevent="form.post(route('document.store'))" enctype="multipart/form-data">
                        <div class="grid grid-cols-3 gap-6">
                            <div class="mb-5">
                                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo Documento*</label>
                                <select id="document_type_id" v-model="form.document_type_id" name="document_type_id" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500" required>
                                    <option value="">------</option>
                                    <option v-for="(item,index) in tipoDocumento" :key="index" :value="item.id">{{ item?.name }}</option>
                                </select>
                            </div>
                            <div class="mb-5">
                                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                                <input type="text" id="name" v-model="form.name"  name="name" placeholder="Decreto 1254 de 2004" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base" required>
                            </div>
                            <div class="mb-5">
                                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Archivo(PDF)*</label>
                                <input type="file" @change="obtenerImagen" accept=".pdf" id="name" name="name" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base " required>
                            </div>                                     
                        </div>                    
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Crear</button>
                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
