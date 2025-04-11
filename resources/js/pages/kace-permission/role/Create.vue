<script setup>
import AppLayout from '@/layouts/AppLayout.vue';
import { Head,  useForm } from "@inertiajs/vue3";
import Button from '@/pages/kace-permission/components/Button.vue';
import Label from '@/components/ui/label/Label.vue';
import Input from '@/components/ui/input/Input.vue';
import TextLink from '@/components/TextLink.vue';



const submit = () => {
  console.log('submit');

  form.post(route("role.store"), {
    onFinish: () => {
      form.name = '';
    }
  });



};

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
      <div class="max-w-3xl  mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden border shadow-sm sm:rounded-lg ">
          <div class="flex justify-between">
            <h1 class="p-6 ml-8  text-teal-500">Create Role</h1>
            <!-- <Link href="#" class="p-4 " onclick="history.back();return false;">
            <Button class="px-4 py-1" variant="danger">
              Back
            </Button>
            </Link> -->
            
          </div>



          <Success></Success>

          <form class="px-12 pt-0" @submit.prevent="submit">

            <div class="mb-4">
              <Label for="name"  class="mb-2">Role Name</Label>
              <Input id="name" class="" type="text" v-model="form.name" />
              <InputError :message="form.errors.name" />
            </div>

            <div class="flex items-center justify-end mt-4 mb-4">
              <Button type="submit" class="ml-4 px-4 py-2" :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing">
                Create
              </Button>
            </div>
          </form>


        </div>
      </div>
    </div>
  </AppLayout>
</template>
