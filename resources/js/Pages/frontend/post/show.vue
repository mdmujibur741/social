<template>
  <GuestLayout>
    <section class="min-h-[90vh] bg-indigo-200 p-5">
      <div class="flex flex-wrap flex-col-reverse md:flex-row justify-center space-x-4 overflow-hidden">
        <div class="md:basis-2/4 overflow-hidden">
         

          <div class="bg-gray-100 rounded-2xl p-4 drop-shadow-xl">
            <div class="flex justify-between">   <span><b><Link :href="route('frontend.community.show',props.community_slug)">#{{props.community_slug.toLocaleUpperCase()}}</Link></b></span> </div> 
          </div>
          <!-- Post Card Detail -->
            <div class="bg-indigo-100 rounded-2xl p-4 my-6 drop-shadow-xl">
                    <div>
                    <div class="flex justify-between"> 
                        <span>by <b>{{props.post.data.username}}</b></span> 
                         <span v-if="$page.props.auth.auth_check && props.post.data.owner">
                             <Link :href="route('backend.post.edit',props.post.data.id)" class="mx-1 text-gray-800 bg-gray-50 rounded-2xl drop-shadow-lg px-2 py-1">Edit</Link>  
                             <Link :href="route('backend.post.destroy',props.post.data.id)" as="button" method="delete" class="mx-1 text-gray-800 bg-red-200 rounded-2xl drop-shadow-lg px-2 py-1" onclick="return confirm('Are You Sure Want To Delete')">Delete</Link>  
                        </span>
                    
                    </div>
                         <h2 class="text-slate-800 text-bold my-2 text-xl"> {{ props.post.data.title }} </h2> 
                         <p class="text-justify"> {{ props.post.data.description }} </p>
                         <span> <a :href="post.data.url">{{ props.post.data.url }}</a> </span>
                    </div>
            </div>
                  
            <!-- Comment  -->
            <div class="bg-gray-100 rounded-2xl p-4 my-6 drop-shadow-lg">
                   <form v-if="$page.props.auth.auth_check"  @submit.prevent="submit">
                    <div class="mb-3">
                      <InputLabel for="content" value="Comment" class="px-3 font-semibold text-lg"/>
                      <textarea v-model="form.content"  class="border border-gray-400 rounded-xl w-full" rows="2" placeholder="Enter Your Comment" spellcheck="false"/>
                      
                    </div>
                      <div class="mb-3 ">
                          <PrimaryButton class="px-3" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">Submit</PrimaryButton>
                      </div>

                   </form>

                   <div v-id="post.data.comments.length > 0" v-for="(comment, index) in post.data.comments" :key="comment.index" class="m-2 p-3 bg-gray-300 rounded-xl">
                      <h4 class="m-2  text-lg">{{comment.username}}</h4>
                      <p class="m-2 text-md">{{comment.content}}</p>
                   </div>
            </div>


        </div>
        <div class="md:basis-1/4">
            <div class="m-5">
              <p class="p-5 m-5">
              <h2>Thisa Is side bar.</h2>
               </p>
        </div>
        </div>
      </div>
    </section>
  </GuestLayout>
</template>

<script setup>
import InputLabel from "@/Components/InputLabel.vue";
import Pagination from "@/Components/Pagination.vue";
import PostCard from "@/Components/PostCard.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { Link, useForm } from "@inertiajs/inertia-vue3";

const props =defineProps({
  community_slug: String,
  post: Object,
});


const form = useForm({
      content : ''
})

const submit = () => {
      form.post(route('frontend.comment.store',[props.community_slug,props.post.data.slug]),{
          onSuccess : () => form.reset(),
      });
}
</script>
