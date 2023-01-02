<template>
    <AuthenticatedLayout>
       


<section class="bg-slate-300 min-h-[100vh] flex items-center justify-center">
  <form @submit.prevent="submit"  class="lg:w-5/12 md:w-11/12 w-full bg-slate-200 p-10 rounded-3xl drop-shadow-2xl justify-center m-5">

       <div class="p-3 bg-slate-100 drop-shadow-xl rounded-2xl mb-12 w-7/12 mx-auto text-center text-2xl"> <b>{{ community.name.toUpperCase() }} Post Create</b> </div>

   <div class="mb-3">
           <InputLabel for="title" value="Title"/>
           <TextInput type="text" v-model="form.title" placeholder="Enter  Title"/>
           <InputError :message="form.errors.title"/>
       </div>

       <div class="mb-3">
           <InputLabel for="url" value="Url"/>
           <TextInput type="url" v-model="form.url" placeholder="Enter  Url"/>
           <InputError :message="form.errors.url"/>
       </div>


       <div class="mb-3">
           <InputLabel for="description" value="Description"/>
           <TextInput type="text" v-model="form.description" id="description" placeholder="Enter  Description"/>
           <InputError :message="form.errors.description"/>
       </div>


        <div class="text-center">
           <PrimaryButton class="ml-4 " :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
          Submit
       </PrimaryButton>
        </div>
  </form>
  </section>


    
    
    </AuthenticatedLayout>
</template>


<script setup>
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
  import TextInput from '@/Components/TextInput.vue';
  import InputError from '@/Components/InputError.vue';
  import InputLabel from '@/Components/InputLabel.vue';
  import PrimaryButton from '@/Components/PrimaryButton.vue';
  import { useForm } from '@inertiajs/inertia-vue3';
  import {useToastr} from '../../toster';

  
  const toastr = useToastr();


 const props = defineProps({
         community : Object
  })


  const form = useForm({
         title : '',
         description : '',
         url : '',
         community_id : props.community?.id
  })


  const submit = () => {
         form.post(route('post.store'),{
             onSuccess: () => cleanForm(),
         });    
  }


  function cleanForm() {
        form.reset();
        toastr.success( props.community?.name.toUpperCase() +" Post Add Successfully");
  }  


</script>