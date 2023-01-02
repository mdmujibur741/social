<template>
  <AuthenticatedLayout>
    <section class="min-h-[95vh] bg-slate-300 p-10">
      <div
        class="p-3 bg-slate-100 drop-shadow-xl rounded-2xl mb-12 w-7/12 mx-auto text-center text-2xl"
      >
        <b>Community Table</b>
      </div>

      <div class="bg-slate-100 rounded-xl drop-shadow-xl p-5 mx-auto ">
      <div class="flex px-3 justify-end m-2">  <Link :href="route('community.create')" class="bg-blue-700 rounded-2xl text-white px-3 py-1">Community Add</Link></div>
        <div class="overflow-x-auto relative sm:rounded-lg drop-shadow-2xl rounded-xl p-3">
          <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead
              class="text-md text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 py-11"
            >
              <tr>
                <th scope="col" class="py-2 px-3 border border-slate-500 rounded-xl">Serial</th>
                <th scope="col" class="py-2 px-3 border border-slate-500 rounded-xl">Name</th>
                <th scope="col" class="py-2 px-3 border border-slate-500 rounded-xl">Description</th>
                <th scope="col" class="py-2 px-3 border border-slate-500 rounded-xl">Action</th>
              </tr>
            </thead>
            <tbody class="">
              <tr v-for="(community, index) in communities.data" :key="community.index"
                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
              >
                <th scope="row" class="py-2 px-3 border border-slate-500 rounded-xl font-medium text-gray-900 whitespace-nowrap dark:text-white" >
                  {{ index+1 }}
                </th>
                <td class="py-2 px-3 border border-slate-500 rounded-xl">{{community.name}}</td>
                <td class="py-2 px-3 border border-slate-500 rounded-xl">{{ community.description }}</td>
                <td class="py-2 px-3 border border-slate-500 rounded-xl">
                     <Link :href="route('community.edit',community.id)" class="bg-indigo-600 rounded-xl px-3 py-1 mx-1 text-white">edit</Link>                        
                     <Link :href="route('community.destroy',community.id)" as="button" method="delete" onclick="return confirm('Are You Sure Want To Delete')" class="bg-red-500 rounded-xl px-3 py-1 mx-1 text-white">Delete</Link>                        
                </td>
             
              </tr>
            </tbody>
          </table>
        </div>
          <Pagination :links="communities.meta.links" />
          
      </div>
    </section>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Link } from "@inertiajs/inertia-vue3";
import Pagination from "@/Components/Pagination.vue";

defineProps({
    communities : Object
})
</script>
