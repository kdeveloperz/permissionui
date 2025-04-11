<script setup>
defineProps({
    type: {
        type: String,
        default: 'button',
    },
    variant:{
        type: String,
        default: 'success'
    },
    classes:{
        type: String,
        default: ''
    }
});
</script>

<template>
    <button :type="type"
        class="inline-flex items-center bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700  tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150
         text-white text-xs  hover:bg-gradient-to-br
                          focus:ring-2 focus:outline-none focus:ring-cyan-300
                          dark:focus:ring-cyan-800
                          hover:shadow-lg shadow-cyan-500/50

                          font-medium
                          rounded-md
                          text-sm
                          text-center

                         
        "
        :class=" variant == 'danger' ? 'text-white text-xs bg-gradient-to-r from-orange-400 via-red-500 to-red-600 '+classes : 'bg-gradient-to-r  from-cyan-500  via-cyan-600  to-cyan-700 '+classes ">
        <slot />
    </button>
</template>
