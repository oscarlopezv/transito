<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { router } from '@inertiajs/vue3'


defineProps({
    documents:{
        type:Object,
        required:true
    },
    tipoDocumento:{
        type:Object
    },
    storage_path:{
        type:String
    }
})

const deleteDocument = id =>
{
    if(confirm('Esta seguro?'))
    {
        router.delete(route('document.destroy',id))
    }
}

</script>


<template>
    <AppLayout title="Repositorios">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Repositorio
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        
                        <a v-if="$page.props.user.roles.includes('admin')" :href="route('documents.create')" class="text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 m-2.5">Nuevo Documento</a>

                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 mt-3">
                            <thead class="text-xs text-gray-100 uppercase bg-blue-400">
                                <tr class="">
                                    <th scope="col" class="px-6 py-3">
                                        Tipo documento
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nombre
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        archivo
                                    </th>
                                    <th scope="col" class="px-6 py-3" v-if="$page.props.user.roles.includes('admin')" >
                                        Acción
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item,index) in documents" :key="index" class="hover:bg-blue-200">
                                    <td class="px-6 py-4">
                                        {{tipoDocumento[item.document_type_id]}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{item.name}}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a :href="'storage/' + item.ruta " download="normativa" class="underline hover:bg-blue-500 hover:text-white">
                                            Normativa.pdf
                                        </a>
                                    </td>
                                    <td class="px-6 py-4" v-if="$page.props.user.roles.includes('admin')">
                                        <button @click="deleteDocument(item.id)"  class="focus:outline-none text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Borrar</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </AppLayout>
</template>
