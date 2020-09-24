<template>
    <input :class="{'border border-red-500' : hasErrors}" class="form-input rounded-md shadow-sm" :value="value" @input="$emit('input', $event.target.value)" ref="input">
</template>

<script>
    export default {
        props: ['value', 'errors'],
        methods: {
            focus() {
                this.$refs.input.focus()
            }
        },
        created() {
            // console.log(this.$page.errors[this.$attrs.id]);
        },
        computed: {
            hasErrors() {
                return Boolean(this.$page.errors[this.$attrs.id]);
            }
        }
    }
</script>

