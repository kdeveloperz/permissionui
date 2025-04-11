<script setup>
import AppLayout from '@/layouts/AppLayout.vue';
import Button from '@/pages/kace-permission/components/Button.vue';
import Modal from '@/pages/kace-permission/components/Modal.vue';
import Success from '@/pages/kace-permission/components/Success.vue';
import { Head, useForm } from "@inertiajs/vue3";
import { onMounted, ref } from "vue";
import VueMultiselect from 'vue-multiselect';
import { Checkbox } from '@/components/ui/checkbox';
import Pagination from '@/pages/kace-permission/components/Pagination.vue';

const props = defineProps({
    permissions: Array,
    roles: Object
});

const addPerm = async () => {
    form.patch(route('permission.assign', { role: form.role }), {
        onSuccess: () => form.reset()
    })
    console.log("Permissions", form.permissions);
    console.log("Role : ", form.role);
    showAssignModal.value = false;
};

const showAssignModal = ref(false)
const selectAllPermissions = (s) => {
    if (s) {
        form.permissions = [];
        form.permissions = props.permissions;
    } else {
        form.permissions = [];
        form.permissions = form.role.permissions;
    }

}
onMounted(() => {
    console.log('Roles data : ', props.roles);
    
})
const showAssignModalTrigger = (role) => {
    form.role = role;
    form.permissions = role.permissions;
    console.log('formPermission : ', form.permissions);
    console.log('rolePermission : ', role.permissions);
    showAssignModal.value = true
}
const form = useForm({
    role: '',
    permissions: []
});




</script>
<template>

    <Head title="Assign Permissions" />
    <AppLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Okay 
            </h2>
        </template>
        <Modal :show="showAssignModal" @close="showAssignModal = false">
            <div class="m-6" style="min-height: 450px;">
                <div class="flex justify-between">
                    <h1 class="my-4"> Assign permissions to {{ roleType }} role</h1>
                    <Button @click="addPerm" class="my-4 p-2 text-xs">
                        Assign permission(s) to role
                    </Button>
                </div>
                
                <span class="border rounded-md items-center flex w-fit px-4 text-xs font-semibold hover:bg-cyan-600 transition-all hover:text-white py-2">
                    <Checkbox id="sall" class="mr-2 text-green-600 shadow-sm focus:ring-green-500"
                        @update:checked="selectAllPermissions($event)"></Checkbox>
                    <label for="sall">Select all permissions</label>
                </span>
                <form action="#" class="flex my-2 gap-4 items-center" method="post">
                    <VueMultiselect v-model="form.permissions" :options="permissions" :multiple="true"
                        :close-on-select="false" placeholder="Pick some" label="name" track-by="id" />

                </form>


            </div>



        </Modal>
        
        <div class="m-16 flex justify-center ">
            <div class="block">
                <div class="mb-4">
                    <Success />

                </div>
                <div class="flex justify-end w-full">
                     <TextLink href="#" as="button" onclick="history.back();return false;" class="mx-8 my-2 transition-all hover:text-blue-700  cursor-pointer text-blue-600 mr-8">Go Back
                </TextLink>
                </div>
               
                <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
                    <thead class="
                  text-xs text-gray-700
                  uppercase
                  bg-gray-50
                  dark:bg-gray-700 dark:text-gray-400
                ">
                        <tr>
                            <th scope="col" class="px-6 border  py-3">
                                <div class="flex items-center justify-center">
                                    Role Type
                                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1"
                                            aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                            <path
                                                d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                        </svg>
                                    </a>
                                </div>
                            </th>

                            <th scope="col" class="px-6 border  py-3">
                                <div class="flex items-center justify-center">
                                    Permission(s)
                                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1"
                                            aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                            <path
                                                d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                        </svg>
                                    </a>
                                </div>
                            </th>


                            <th scope="col" class="px-6 border  py-3">
                                <div class="flex items-center justify-center">
                                    Action
                                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1"
                                            aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                            <path
                                                d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                        </svg>
                                    </a>
                                </div>
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="role in roles.data" :key="role.id" class="
                    bg-white
                    border 
                    dark:bg-gray-800 dark:border-gray-700
                  ">
                            <th scope="row" class="
                      px-6
                      py-4 border text-center
                      font-bold
                      text-gray-900
                      whitespace-nowrap
                      dark:text-white
                    ">
                                {{ role.name }}
                            </th>

                            <td class="px-6 max-w-lg overflow-hidden flex flex-wrap  text-center py-4">
                                <div v-for="(item, index) in role.permissions" :key="index">
                                    <ul class="">
                                        <li class="text-xs m-1 whitespace-nowrap px-3 rounded-full bg-slate-200">
                                            {{
                                                item.name }}</li>
                                    </ul>
                                </div>

                            </td>

                            <td class="px-6 border text-center py-4">
                                <button type="button" @click="showAssignModalTrigger(role)" class="
                          text-white text-xs
                          bg-gradient-to-r
                          from-cyan-400
                          via-cyan-500 whitespace-nowrap
                          to-cyan-600
                          hover:bg-gradient-to-br
                          focus:ring-4 focus:outline-none focus:ring-cyan-300
                          dark:focus:ring-cyan-800
                          hover:shadow-lg shadow-cyan-500/50
                          font-medium
                          rounded-md
                          text-sm
                          px-5
                          py-2.5
                          text-center
                          mr-2
                          mb-2
                        ">
                                    <svg fill="none" class="inline w-4 h-4" stroke="currentColor" stroke-width="1.5"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10">
                                        </path>
                                    </svg>Assign permission<span class="sr-only">Icon description</span>
                                </button>

                            </td>
                        </tr>
                    </tbody>
                </table>
                <Pagination class="mt-4 flex justify-end" :links="roles.meta.links" />
            </div>

        </div>

    </AppLayout>
</template>

<style src="vue-multiselect/dist/vue-multiselect.css"></style>