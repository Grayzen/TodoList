<template>
    <breeze-authenticated-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ task.name }}
            </h2>
        </template>
        <div class="bg-white rounded-md shadow overflow-hidden max-w-3xl">
            <form @submit.prevent="update">
                <div class="p-8 -mr-6 -mb-8 flex flex-wrap">
                <input v-model="form.name" :error="form.errors.name" class="pr-6 pb-8 w-full lg:w-1/2" label="Name" />
                <input v-model="form.body" :error="form.errors.body" class="pr-6 pb-8 w-full lg:w-1/2" label="Body" />
                </div>
                <div class="px-8 py-4 bg-gray-50 border-t border-gray-100 flex items-center">
                <!-- <button v-if="!organization.deleted_at" class="text-red-600 hover:underline" tabindex="-1" type="button" @click="destroy">Delete Organization</button> -->
                <!-- <loading-button :loading="form.processing" class="btn-indigo ml-auto" type="submit">Update Organization</loading-button> -->
                <button class="mr-5 bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-7 rounded-lg" type="submit">Submit</button>
                </div>
            </form>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <inertia-link class="mr-5 bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-7 rounded-lg" :href="route('tasks')" tabindex="-1">
                                Go back
                        </inertia-link>
                        <!-- <input type="text" name="addComment-{{ $post->id }}" placeholder="Add your comment" class="form-control" v-bind="comment"> -->
                    </div>
                    <table class="w-full whitespace-nowrap">
                        <tr class="text-left font-bold">
                            <th class="px-6 pt-6 pb-4">{{ task.name }}</th>
                            <th class="px-6 pt-6 pb-4">{{ task.body }}</th>
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
            task: Object,
        },
        remember: 'form',
        data() {
            return {
            form: this.$inertia.form({
                name: this.task.name,
                body: this.task.body
            }),
            }
        },
        methods: {
            update() {
                this.form.put(this.route('tasks.update', this.task.id))
            },
            destroy() {
                if (confirm('Are you sure you want to delete this task?')) {
                    this.$inertia.delete(this.route('tasks.destroy', this.task.id))
                }
            },
        },
    }
</script>
