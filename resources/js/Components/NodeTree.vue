<template>
    <li class="menu-item text-base shadow-2xl" :class="{'has-submenu' : isParent}">
        <inertia-link
            :href="labelOrValidUrl"
            :class="{
                'bg-blue-500 active' : route().current(node.routeName),
                ['pl-' + (4 + 2*depth)] : true
            }"
            class="flex relative p-4 menu-item-link"
        >
            <span class="menu-icon material-icons mr-4">{{ node.icon }}</span>
            <span class="menu-label">{{ node.label }}</span>
            <span v-if="isParent"
                  class="menu-switch menu-switch-closed absolute m-auto inset-y-0 p-4 right-0 material-icons"
                  v-on:click.prevent="openSubMenu"
            >
                keyboard_arrow_right
            </span>
        </inertia-link>

        <ul
            v-if="isParent" v-bind:key="node.label"
            class="hidden menu-submenu bg-gray-800 border-b-4 border-gray-600"
        >
            <node v-for="childNode in node.child" v-bind:key="childNode.label" :node="childNode" :depth="depth + 1" ></node>
        </ul>
    </li>
</template>

<script>
export default {
    name: 'node',
    props: {
        node: {
            type: Object,
            default: {}
        },
        depth: {
            type: Number,
            default: 0
        }
    },
    data() {
        return {
        }
    },
    mounted() {
        this.findCurrentRouteNodeToggleUntilVisible();

    },
    methods: {
        /**
         * Unfold all menu nodes until current route is visible
         */
        findCurrentRouteNodeToggleUntilVisible()
        {
            const currentNode = this.node.routeName;

            if(route().current(currentNode)) {
                const activeMenuItem = document.querySelectorAll('.menu-item .active')[0];

                this.findParentMenuElements(activeMenuItem);
            }
        },
        findParentMenuElements(closestUlElement)
        {
            if (closestUlElement != null) {
                closestUlElement = closestUlElement.closest('.menu-submenu');

                if (closestUlElement != null) {
                    if (closestUlElement.classList.contains('hidden')) {
                        //Find and flip submenu arrow
                        let switchArrow = closestUlElement.closest('.has-submenu').querySelector('.menu-switch');
                        this.toggleMenuArrow(switchArrow);

                        //Display hidden submenu
                        closestUlElement.classList.remove('hidden');
                    }

                    let nextParent = closestUlElement.parentNode;

                    if (nextParent !== null) {
                        this.findParentMenuElements(nextParent.closest('.menu-submenu'));
                    }
                }
            }
        },
        openSubMenu(event) {
            if (this.isParent)
            {
                const target = event.target
                const parentMenu = target.parentNode.nextSibling.nextSibling.classList;
                this.toggleMenuArrow(target);
                parentMenu.toggle('hidden');
            }
        },
        toggleMenuArrow(element)
        {
            element.classList.toggle('menu-switch-closed');
            element.classList.toggle('menu-switch-open');
        }
    },
    computed: {
        isParent()
        {
            return Boolean(this.node.child && this.node.child.length);
        },
        labelOrValidUrl()
        {
            const currentNodeRoute = this.node.routeName;
            return currentNodeRoute === '#' ? '#' : route(this.node.routeName).url();
        }
    }
}
</script>
<style lang="scss" scoped>
.menu-item-link {
    cursor: pointer;

    &:hover {
        background-color: #4b5563 !important;
        -webkit-transition: background-color 1000ms linear;
        -ms-transition: background-color 1000ms linear;
        transition: background-color 0.2s linear;
    }
}
.menu-switch {
    transition: transform 0.3s linear;

    &-closed {
        transform: rotate(0deg);
    }
    &-open {
        transform: rotate(90deg);
    }
}
.shrinked-aside {
    .menu-label, .menu-switch {
        display: none;
    }
    .menu-item-link {
        padding-left: 1rem;
    }
    .menu-icon {
        font-size: 25px;
        margin: auto;
    }
}
</style>
