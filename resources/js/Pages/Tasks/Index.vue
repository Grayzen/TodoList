<template>
    <breeze-authenticated-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Tasks
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <inertia-link class="mr-5 bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-7 rounded-lg" :href="route('tasks.create')" :active="route().current('tasks')">
                            Add New Task
                        </inertia-link>
                        <!-- <input type="text" name="addComment-{{ $post->id }}" placeholder="Add your comment" class="form-control" v-bind="comment"> -->
                    </div>
                    <table class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5">
                        <thead class="text-black">
                            <tr v-for="task in tasks" :key="task.id" class="bg-indigo-100 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                                <th class="py-5 text-left px-7">Task Name</th>
                                <th class="py-5 text-left px-7">Task Subject</th>
                                <th class="py-5 text-left px-7">Task Priority</th>
                            </tr>
                        </thead>
                        <tbody class="flex-1 sm:flex-none">
                            <tr v-for="task in tasks" :key="task.id" class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
                                <td class="border-grey-light border hover:bg-gray-100 p-3">
                                    <inertia-link class="px-6 py-2 flex items-center focus:text-indigo-500" :href="route('tasks.edit', task.id)">
                                        {{ task.name }}
                                    </inertia-link>
                                </td>
                                <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">
                                    <inertia-link class="px-6 py-2 flex items-center focus:text-indigo-500" :href="route('tasks.edit', task.id)">
                                        {{ task.body }}
                                    </inertia-link>
                                </td>
                                <td class="border-grey-light border hover:bg-gray-100 p-3 text-red-400 hover:text-red-600 hover:font-medium cursor-pointer">
                                    <inertia-link class="px-6 py-2 flex items-center focus:text-indigo-500" :href="route('tasks.edit', task.id)">
                                        {{ task.name }}
                                    </inertia-link>
                                </td>
                            </tr>
                        </tbody>
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
            tasks: Object,
        },
    }
</script>
