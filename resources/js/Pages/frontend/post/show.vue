<template>
  <GuestLayout>
    <section class="min-h-[90vh] bg-indigo-200 p-5">
      <div class="flex flex-col-reverse md:flex-row justify-center">
        <div class="md:basis-2/4">
         
          <!-- Post Card Detail -->
            <div class="bg-indigo-300 rounded-2xl p-4 m-2">
                    <div>
                         <div class="flex justify-between"> <span>by <b>{{post.data.username}}</b></span>  <span><b><Link :href="route('frontend.community.show',community_slug)">#{{community_slug.toLocaleUpperCase()}}</Link></b></span> </div>
                         <h2 class="text-slate-800 text-bold my-2 text-xl"> {{ post.data.title }} </h2> 
                         <p class="text-justify"> {{ post.data.description }} </p>
                         <span> <a :href="post.data.url">{{ post.data.url }}</a> </span>
                    
                    </div>

            </div>


        </div>
        <div class="md:basis-1/4">
          <p class="p-5 m-5">
               <h2>Thisa Is side bar Lorem ipsum, dolor sit amet consectetur adipisicing elit. Neque tempora officia fugit nihil voluptas maiores esse ducimus veniam voluptates, eum quos, perspiciatis quidem deserunt, est sit qui laboriosam nostrum. Sapiente.</h2>
          </p>
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
