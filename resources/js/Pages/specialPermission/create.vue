<script>
export default{
    name:'specialPermissionCreate'
}
</script>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from '@inertiajs/vue3'

defineProps({
    tipoVehiculo:{
        type:Object,
        required:true
    }
   
})
const form = useForm({
    vehicle_type_id:'',
    placa:'',
    lateral:'',
    permiso:''

})

</script>


<template>
    <AppLayout title="Permisos Especiales">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Crear Permiso especial
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <form class="max-w-7xl mx-5 p-4" @submit.prevent="form.post(route('specialpermission.store'))">
                        <div class="grid grid-cols-3 gap-6">
                            <div class="mb-5">
                                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo vehiculo*</label>
                                <select id="vehicle_type_id" v-model="form.vehicle_type_id" name="vehicle_type_id" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    <option value="">------</option>
                                    <option v-for="(item,index) in tipoVehiculo" :key="index" :value="item.id">{{ item?.name }}</option>
                                </select>
                            </div>
    
                            <div class="mb-5">
                                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Placa*</label>
                                <input type="text" maxlength="6" id="placa" v-model="form.placa"  name="placa" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            </div>                    
                        
                            <div class="mb-5">
                                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lateral</label>
                                <input type="number" maxlength="6" id="lateral" v-model="form.lateral" name="lateral" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                            </div>                    
                        
                        </div>
                        
                            <div class="mb-5">
                                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Permiso especial*</label>
                                <input type="text" id="permiso" v-model="form.permiso" name="permiso"  class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            </div>                    
                       
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Crear</button>
                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
