<template>

    <div class="">
        <div class="flex justify-start gap-x-2 m-2">
            <Link :href="route('frontend.post.like',post.data.slug)" as="button" method="post" type="button" :class="{'bg-blue-800 text-white': post.data.postVotes[0] && post.data.postVotes[0].vote==1}" class="bg-gray-300 p-2 hover:bg-blue-600 hover:text-white font-bold rounded-xl" preserve-scroll>Like   </Link>
            <Link :href="route('frontend.post.dislike',post.data.slug)" as="button" method="post" type="button" :class="{'bg-red-400 text-white' :post.data.postVotes[0] && post.data.postVotes[0].vote == -1}" class="bg-gray-300 p-2 hover:bg-blue-600 hover:text-white font-bold rounded-xl" preserve-scroll><i class="fa-solid fa-thumbs-down"></i>Dislike</Link>
        </div>
          <p class="font-semibold text-md mx-3"><b class="text-lg">{{ post.data.votes }}</b> Support here</p>
        </div>
        
</template>

<script setup>
      import { Link } from '@inertiajs/inertia-vue3';
      defineProps({
          post : Object
      })
</script>