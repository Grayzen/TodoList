<template>
    <breeze-authenticated-layout>
    <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Task
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <inertia-link class="mr-5 bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-7 rounded-lg" :href="route('tasks')" tabindex="-1">
                                Go back
                        </inertia-link>
                        <div v-if="Object.keys(errors).length > 0" class="bg-red-100 border border-red-400 text-red-700 mt-5 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">Error! </strong>
                            <span class="block sm:inline"> {{ errors[Object.keys(errors)[0]] }}</span>
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                            </span>
                        </div>
                        <!-- <input type="text" name="addComment-{{ $post->id }}" placeholder="Add your comment" class="form-control" v-bind="comment"> -->
                    </div>
                    <form @submit.prevent="submit">
                    <table class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5">
                        <tr class="bg-indigo-100 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                            <th class="px-6 pt-6 pb-4"><label for="name">Task Name:</label></th>
                            <th class="px-6 pt-6 pb-4"><input class="shadow appearance-none border rounded py-2 px-3 text-grey-darker" id="name" v-model="form.name" /></th>
                            <!-- component -->
                            <th class="px-6 pt-6 pb-4"><label for="body">Task Subject:</label></th>
                            <th class="px-6 pt-6 pb-4"><textarea class="shadow appearance-none border rounded py-2 px-3 text-grey-darker resize-none border rounded-md" id="body" v-model="form.body" /></th>
                            <th><button class="mr-5 bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-7 rounded-lg" type="submit">Submit</button></th>
                        </tr>
                    </table>
                    </form>
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
    props: ['errors'],
    data() {
        return {
            form: {
                name: null,
                body: null,
            },
        }
    },
    methods: {
        submit() {
            this.$inertia.post('/tasks/store', this.form)
        },
    },
}
</script>
