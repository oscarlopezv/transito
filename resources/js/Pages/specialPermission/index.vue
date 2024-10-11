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

const deletePermission = (id) =>
{
    if(confirm('Esta seguro?'))
    {
        router.post(route('borrar', id))
    }
}

</script>


<template>
    <AppLayout title="Permisos Especiales">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Permiso especial
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        
                        <a :href="route('specialpermission.create')" v-if="$page.props.user.roles.includes('admin')" class="text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 m-2.5">Nuevo permiso</a>

                        <form action='specialpermission' method="get">
                            <div class="pt-6">
                                <input type="hidden" name="_token" :value="token" />
                                <input type="text" maxlength="6" id="placa" name="placa" class="pl-4 ml-2 text-gray-900 border border-gray-300 rounded-lg" placeholder="Placa">
                                <button type="submit" class="pl-4 ml-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buscar</button>
                            </div>  
                        </form>

                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-3">
                            <thead class="text-xs text-gray-100 uppercase bg-blue-400">
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
                                    <th scope="col" class="px-6 py-3" v-if="$page.props.user.roles.includes('admin')" >
                                        Acción
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item,index) in permisions" :key="index" class="hover:bg-blue-200">
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
                                    <td v-if="$page.props.user.roles.includes('admin')"  class="px-6 py-4">
                                        <button @click="deletePermission(item.id)"  class="focus:outline-none text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Borrar</button>
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
