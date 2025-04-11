<script setup>
import AppLayout from '@/layouts/AppLayout.vue';
import { Head, Link, useForm } from "@inertiajs/vue3";
import Button from '@/pages/kace-permission/components/Button.vue';
import Label from '@/components/ui/label/Label.vue';
import Input from '@/components/ui/input/Input.vue';
import { onMounted } from 'vue';

const props = defineProps({
    role: Object
    
})

onMounted(() => {
    form.name = props.role.name
    console.log(form.name);
    
});

const submit = () =>{
    form.patch(route('role.update', {role: props.role}), {
        onSuccess: () => form.reset('name'),
    });
}




const form = useForm({

  name: '',
});

</script>
<template>

  <Head title="Add Role" />
  <AppLayout>
    <template #header>

    </template>

    <div class="w-full px-16 pt-8 pb-16 flex justify-between">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Roles
      </h2>
      <TextLink href="#" as="button" onclick="history.back();return false;" class="mx-8 text-black mr-8">Go Back
      </TextLink>
    </div>



    <div class="py-1 px-12">
      <div class="max-w-3xl shadow-sm border mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden shadow-sm sm:rounded-lg ">
          <div class="flex justify-between">
            <h1 class="p-6 ml-8  text-teal-500">Create Role</h1>
            
          </div>



          <Success></Success>

          <form class="px-12 pt-0" @submit.prevent="submit">

            <div class="mb-4">
              <Label for="name"  class="mb-2">Role Name</Label>
              <Input id="name" class="" type="text" v-model="form.name"
                />
              <InputError :message="form.errors.name" />
            </div>

            <div class="flex items-center justify-end mt-4 mb-4">
              <Button type="submit" class="ml-4 px-4 py-2" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Create
              </Button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </AppLayout>
</template>
