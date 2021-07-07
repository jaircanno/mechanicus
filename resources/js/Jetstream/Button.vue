<template>
    <button :type="type"
            class="inline-flex items-center px-4 py-2 bg-blueMechanic700
            border border-transparent rounded-md
            font-semibold text-xs text-white uppercase tracking-widest
            hover:bg-blueMechanic500 active:bg-blueMechanic700
            focus:outline-none focus:border-blueMechanic700 focus:ring focus:ring-blueMechanic700 disabled:opacity-25 transition">
        <slot></slot>
    </button>
</template>

<script>
    export default {
        props: {
            type: {
                type: String,
                default: 'submit',
            },
        }
    }
</script>
