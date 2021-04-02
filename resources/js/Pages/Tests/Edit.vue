<template>
    <breeze-authenticated-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ test.name }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <inertia-link class="mr-5 bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-7 rounded-lg" :href="route('tests')" tabindex="-1">
                                Go back
                        </inertia-link>
                        <!-- <input type="text" name="addComment-{{ $post->id }}" placeholder="Add your comment" class="form-control" v-bind="comment"> -->
                    </div>
                    <table class="w-full whitespace-nowrap">
                        <tr class="text-left font-bold">
                            <th class="px-6 pt-6 pb-4">{{ test.name }}</th>
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
            test: Object,
        },
    }
</script>
