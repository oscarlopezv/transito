<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from '@inertiajs/vue3'

const props = defineProps({
    vehicle_type:{
        type:Object,
        required:true
    },
})

const form = useForm({
    name:props.vehicle_type.name
})
</script>


<template>
    <AppLayout title="Tipo Vehiculo">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Actualizar tipo vehículo
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <form class="max-w-7xl mx-5 p-4" @submit.prevent="form.put(route('vehicle_type.update',vehicle_type))">
                        <div class="grid grid-cols-3 gap-6">
                            <div class="mb-5">
                                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo*</label>
                                <input type="text" maxlength="6" id="name" v-model="form.name"  name="name" value="" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base " required>
                            </div>                                  
                        </div>                    
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
