<template>
  <GuestLayout>
    <section class="min-h-[90vh] bg-indigo-200 p-5">
      <div class="flex flex-wrap flex-col-reverse md:flex-row justify-center space-x-4 overflow-hidden">
        <div class="md:basis-2/4 overflow-hidden">
         

          <div class="bg-gray-100 rounded-2xl p-4 drop-shadow-xl">
            <div class="flex justify-between">   <span><b><Link :href="route('frontend.community.show',community_slug)">#{{community_slug.toLocaleUpperCase()}}</Link></b></span> </div> 
          </div>
          <!-- Post Card Detail -->
            <div class="bg-indigo-100 rounded-2xl p-4 my-6 drop-shadow-xl">
                    <div>
                    <div class="flex justify-between"> 
                        <span>by <b>{{post.data.username}}</b></span> 
                         <span v-if="$page.props.auth.auth_check && post.data.owner">
                             <Link :href="route('backend.post.edit',post.data.id)" class="mx-1 text-gray-800 bg-gray-50 rounded-2xl drop-shadow-lg px-2 py-1">Edit</Link>  
                             <Link :href="route('backend.post.destroy',post.data.id)" as="button" method="delete" class="mx-1 text-gray-800 bg-red-200 rounded-2xl drop-shadow-lg px-2 py-1" onclick="return confirm('Are You Sure Want To Delete')">Delete</Link>  
                        </span>
                    
                    </div>
                         <h2 class="text-slate-800 text-bold my-2 text-xl"> {{ post.data.title }} </h2> 
                         <p class="text-justify"> {{ post.data.description }} </p>
                         <span> <a :href="post.data.url">{{ post.data.url }}</a> </span>
                    
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
import Pagination from "@/Components/Pagination.vue";
import PostCard from "@/Components/PostCard.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { Link } from "@inertiajs/inertia-vue3";

defineProps({
  community_slug: String,
  post: Object,
});
</script>
