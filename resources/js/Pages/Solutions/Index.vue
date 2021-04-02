<template>
    <breeze-authenticated-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Solutions
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <inertia-link class="mr-5 bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-7 rounded-lg" :href="route('solutions.create')">
                            Add New Solution
                        </inertia-link>
                        <!-- <input type="text" name="addComment-{{ $post->id }}" placeholder="Add your comment" class="form-control" v-bind="comment"> -->
                    </div>
                    <table class="w-full whitespace-nowrap">
                        <tr class="text-left font-bold">
                            <th class="px-6 pt-6 pb-4">Solution Name</th>
                        </tr>
                        <tr v-for="solution in solutions" :key="solution.id" class="hover:bg-blue-100 focus-within:bg-gray-100">
                            <td class="border-t">
                                <inertia-link class="px-6 py-4 flex items-center focus:text-indigo-500" :href="route('solutions.edit', solution.id)" tabindex="-1">
                                    {{ solution.name }}
                                </inertia-link>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </breeze-authenticated-layout>
</template>

<script>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated'

    export default {
        components: {
            BreezeAuthenticatedLayout,
        },
        props: {
            solutions: Object,
        },
    }
</script>
