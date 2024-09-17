<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm , Link} from '@inertiajs/vue3'
import { router } from '@inertiajs/vue3'


defineProps({
    tipoVehiculo:{
        type:Object,
        required:true
    },
})

const deleteVehicle = id =>
{
    if(confirm('Esta seguro?'))
    {
        router.delete(route('vehicle_type.destroy', id))
    }
}

</script>


<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Crear Tipo vehiculo
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        
                        <a :href="route('vehicle_type.create')" class="text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 m-2.5">Nuevo tipo vehiculo</a>

                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-3">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Tipo vehículo
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Acción
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item,index) in tipoVehiculo" :key="index" class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <td class="px-6 py-4">
                                        {{item.name}}
                                    </td>
                                    <td class="px-6 py-4">
                                        <button type="button" @click="deleteVehicle(item.id)" class="focus:outline-none text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 ">Borrar</button>
                                        <a :href="route('vehicle_type.edit',item.id)" class="text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 m-2.5">Editar</a>
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
