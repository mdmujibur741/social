<template>

<div class="flex justify-center">
            
       <div v-if="links.length > 3">
        <template  v-for="(link, key) in links" :key="key">
                    <Link :href="link.url" v-html="link.label" class="bg-gray-300 px-2 py-1 border border-indigo-300 rounded-2xl" :class="{'bg-green-200' : link.active}"/>
         </template>
       </div>
</div>

</template>


<script setup>
          import { Link } from '@inertiajs/inertia-vue3';
          defineProps({
              links : Array
          })
</script>