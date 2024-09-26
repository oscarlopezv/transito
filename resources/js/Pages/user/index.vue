<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { router } from '@inertiajs/vue3'


defineProps({
    usuarios:{
        type:Object,
        required:true
    },
    token:{
        type:String
    }
})

const deleteUsuario = (id) =>
{
    if(confirm('Esta seguro?'))
    {
        router.delete(route('user.destroy',id));
    }
}

</script>


<template>
    <AppLayout title="Usuarios">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Usuarios
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        
                        <a :href="route('user.create')" class="text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 m-2.5">Nuevo usuario</a>

                        <form action='user' method="get">
                            <div class="pt-6">
                                <input type="hidden" name="_token" :value="token" />
                                <input type="text" maxlength="6" id="placa" name="placa" class="pl-4 ml-2 text-gray-900 border border-gray-300 rounded-lg" placeholder="Nombre">
                                <input type="text" maxlength="6" id="lateral" name="lateral" class="pl-4 ml-2 text-gray-900 border border-gray-300 rounded-lg" placeholder="Documento">
                                <button type="submit" class="pl-4 ml-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buscar</button>
                            </div>  
                        </form>

                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-3">
                            <thead class="text-xs text-gray-100 uppercase bg-blue-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Nombre
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                       Documento
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Acción
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item,index) in usuarios" :key="index" class="hover:bg-blue-200">
                                    <td class="px-6 py-4">
                                        {{item.name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ item.document }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <button @click="deleteUsuario(item.id)" class="focus:outline-none text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 ">Borrar</button>

                                        <a :href="route('user.edit',item.id)" class="text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 m-2.5">Editar</a>

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
