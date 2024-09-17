<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm , Link} from '@inertiajs/vue3'
import { router } from '@inertiajs/vue3'


defineProps({
    permisions:{
        type:Object,
        required:true
    },
    tipoVehiculo:{
        type:Object
    },
    token:{
        type:String
    }
})

const deletePermission = special_permission =>
{
    if(confirm('Esta seguro?'))
    {
        router.get('borrar/'+special_permission);
    }
}

</script>


<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Permiso especial
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        
                        <a :href="route('permission.create')" class="text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 m-2.5">Nuevo permiso</a>

                        <form action='permission' method="get">
                            <div class="pt-6">
                                <input type="hidden" name="_token" :value="token" />
                                <input type="text" maxlength="6" id="placa" name="placa" class="pl-4 ml-2 text-gray-900 border border-gray-300 rounded-lg" placeholder="Placa">
                                <input type="text" maxlength="6" id="lateral" name="lateral" class="pl-4 ml-2 text-gray-900 border border-gray-300 rounded-lg" placeholder="Lateral">
                                <button type="submit" class="pl-4 ml-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buscar</button>
                            </div>  
                        </form>

                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-3">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Tipo vehículo
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Placa
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Lateral
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Permiso
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Acción
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item,index) in permisions" :key="index" class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <td class="px-6 py-4">
                                        {{tipoVehiculo[item.vehicle_type_id]}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{item.placa}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{item.lateral }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ item.permiso }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <button @click="deletePermission(item.id)">Borrar</button>
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
