<template>
             <AuthenticatedLayout>
                


<section class="bg-slate-300 min-h-[100vh] flex items-center justify-center">
           <form @submit.prevent="submit"  class="lg:w-5/12 md:w-11/12 w-full bg-slate-200 p-10 rounded-3xl drop-shadow-2xl justify-center m-5">

                <div class="p-3 bg-slate-100 drop-shadow-xl rounded-2xl mb-12 w-7/12 mx-auto text-center text-2xl"> <b>Community Edit</b> </div>

            <div class="mb-3">
                    <InputLabel for="Name" value="Name"/>
                    <TextInput v-model="form.name" placeholder="Enter  Name"/>
                    <InputError :message="form.errors.name"/>
                </div>

                <div class="mb-3">
                    <InputLabel for="description" value="Description"/>
                    <TextInput v-model="form.description" id="description" placeholder="Enter  Description"/>
                    <InputError :message="form.errors.description"/>
                </div>
 

                 <div class="text-center">
                    <PrimaryButton class="ml-4 " :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                  Update
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

           const form = useForm(props.community)

           const props =  defineProps({
                community : Object
             })

           const submit = () => {
                  form.put(route('backend.community.update',props.community?.id),{
                      onSuccess: () => toastr.success('Community Data Update Successfully'),
                  });    
           }


           


</script>