<template>
<aside :class="{'w-64': !hide, 'shrinked-aside': hide, 'hidden' : hide && width < 768}" class="slide flex-none pt-16 w-24 text-white bg-gray-700 inset-y-0 overflow-x-hidden overflow-y-auto">
    <ul class="mt-5 border-b-4 border-gray-600">
        <node-tree v-for="node in menu" :node="node" v-bind:key="node.label"/>
    </ul>
</aside>
</template>

<script>
import nodeTree from '../Components/NodeTree.vue';

export default {
    components: {
        nodeTree
    },
    props: ['hide', 'page'],
    data() {
        return {
            width: 0,
            sliding: false,
            menu: JSON.parse(this.$page.data.menu) || []
        }
    },
    created() {
        console.log();
        window.addEventListener('resize', this.handleResize);
        this.handleResize();
    },
    methods: {
        handleResize() {
            this.width = window.innerWidth;
        }
    },
    computed: {

    }
}
</script>
<style lang="scss" scoped>
.slide {
    transition: width 0.5s;
}
</style>
