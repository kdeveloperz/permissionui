<script setup>
import AppLayout from '@/layouts/AppLayout.vue';
import Modal from "@/components/Modal.vue";
import { Head, Link, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import Button from '@/components/Button.vue';
import Success from '@/components/Success.vue';
import Pagination from '@/pages/kace-permission/components/Pagination.vue';

const form = useForm({

id: null
});
const show = ref(false);
const selectedId = ref();

const confirmDelete = (id) => {
  selectedId.value = id;
  show.value = true

  console.log(id);

}
const deletePermission = () => {
  if (selectedId.value !== null) {
    form.delete(route('permission.destroy', { 'id': selectedId.value }));

    show.value = false
  }
  else {
    console.log('invalid id selected');
  }
  // show.value = false
}



const props = defineProps({
    permissions: Object
});
</script>

<template>

    <Head title="Permissions" />

    <AppLayout>
        <Modal :show="show" @close="show = false">
            <div class="">


                <div class="flex justify-center my-8">
                    <h1>Are you sure you want to delete this permission?</h1>

                    <br />

                </div>

                <div class="flex justify-center">
                    <button @click="show = false" type="button" class="
                          text-black text-xs
                          bg-gradient-to-r
                          from-gray-200
                          via-gray-300
                          to-gray-400
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
                        </svg>Cancel<span class="sr-only">Icon description</span>
                    </button>
                    <button @click="deletePermission()" type="button" class="
                          text-white text-xs
                          bg-gradient-to-r
                          from-orange-400
                          via-pink-500
                          to-red-600
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
                        </svg>Proceed<span class="sr-only">Icon description</span>
                    </button>
                </div>
            </div>
        </Modal>
        <div class="w-full px-16 pt-4 pb-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Permissions
            </h2>

        </div>



        <div class="py-1 px-12">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <Success></Success>
                <div class="bg-white overflow-hidden mt-4   border-gray-200   sm:rounded-sm dark">
                    <div class="flex justify-between">
                        <h1 class="py-4  font-bold text-teal-500">Manage Permissions</h1>
                        <Link :href="route('permission.create')"><Button class="m-4 px-4 py-2.5">Create New</Button></Link>
                        

                        </div>




                    <div class="">
                        <table class="w-full text-sm text-left text-gray-500 ">
                            <thead class="text-xs border border-gray-400 text-gray-700 uppercase bg-gray-50 ">
                                <tr>
                                    <th scope="col" class="px-6 border  border-gray-300 text-center py-3">
                                        S/N
                                    </th>
                                    <th scope="col" class="px-6 border border-gray-300 text-center py-3">
                                        Permission name
                                    </th>

                                    
                                    <th scope="col" class="px-6 border border-gray-300 text-center py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border border-gray-300" v-for="(item, index) in permissions.data" :key="index">
                                    <th scope="row"
                                        class="px-6 py-2 border border-gray-300 text-center font-medium text-gray-900 whitespace-nowrap ">
                                        {{ ++index }}
                                    </th>
                                    <td class="px-6 border border-gray-300 text-center py-2">
                                        {{ item.name }}
                                    </td>

                                    
                                    <td class="px-6 border border-gray-300 text-center py-2">

                                        <Link :href="route('permission.edit', { permission: item })">
                                        <Button class=" px-2 py-1">Edit</Button>

                                        </Link>

                                        <Button @click="confirmDelete(item.id)" variant="danger"
                                            class="ml-1 px-2 py-1">Delete</Button>

                                    </td>
                                </tr>

                            </tbody>
                        </table>
                        
                        <Pagination class="mt-4 flex justify-end" :links="permissions.meta.links"/>
                    </div>

                </div>
            </div>
        </div>
    </AppLayout>
</template>
