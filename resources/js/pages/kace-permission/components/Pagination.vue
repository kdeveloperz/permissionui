<script setup>
import { Link } from '@inertiajs/vue3';
import { onMounted } from 'vue';

const props = defineProps({
    links: Array
})

onMounted(() => {
    console.log(props.links);
    
})
</script>

<template>
    <div v-if="links.length > 0">
        <div class="flex flex-wrap -mb-1">
            <template v-for="(link, i) in links" :key="i">
                <div v-if="link === null" class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded"
                    v-html="link.label">
                </div>
                <Link v-else class="mr-1 mb-1 px-4 py-2 text-sm leading-4 hover:bg-white border border-gray-300 rounded-sm focus:border-indigo-500
                    focus:text-indigo-500 inline-block
                "
                :class="{ 'bg-gradient-to-r  from-green-500  via-green-600  to-green-700  text-white': link.active}"
                :href="link.url"
                >
                    <span v-html="link.label" class="hover:text-blue-700"></span>
                </Link>
            </template>
        </div>
    </div>
</template>