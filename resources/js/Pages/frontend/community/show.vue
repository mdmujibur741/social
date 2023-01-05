<template>
             <GuestLayout>
               <template #header>
                    <div class="text-semibold p-2 m-2">
                         <h2>{{ community.name.toUpperCase() }}</h2>
                  </div>
               </template>
             
               <section class="bg-indigo-100 min-h-[90vh] p-5 mx-auto">
                    
             
                    <div v-if="$page.props.auth.auth_check" class="text-end m-1"> 
                        <Link :href="route('backend.post.create',community.slug)" class="bg-indigo-600 px-3 py-2 rounded-2xl text-white">Add Post</Link>     
                    </div>
                 

                    <div class="flex justify-between lg:w-10/12 mx-auto gap-x-8">

                           <div class=""> 
                              <PostCard v-for="post in posts.data" :post="post" :key="post.id" :community="community.slug"></PostCard>
                          </div> 
                          
                          <div class="mx-5 lg:w-8/12">
                              <div>
                                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore magnam iste esse praesentium, eaque accusamus beatae veritatis in tenetur! Quo reiciendis cum dignissimos. Sunt hic facere explicabo, reiciendis quidem beatae!</p>
                              </div>
                            </div>   
                    </div>
                  
                      <!-- pagination -->
                      <Pagination :links="posts.meta.links"/>

               </section>


             </GuestLayout>


</template>



<script setup>
                  import Pagination from '@/Components/Pagination.vue';
                   import PostCard from '@/Components/PostCard.vue';
                  import GuestLayout from '@/Layouts/GuestLayout.vue';
                  import { Link } from '@inertiajs/inertia-vue3';
          defineProps({
               community : Object,
               posts : Object
          })
 
</script>