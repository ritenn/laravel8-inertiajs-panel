<template>
    <div>
        <div class="relative">
        <input :class="{'border border-red-500' : hasErrors}"
               class="form-input rounded-md shadow-sm mt-1 block w-full"
               @focus="isListVisible = true"
               @blur="visibilityTimeout"
               v-model="selected"
        >
            <button @click="isListVisible = !isListVisible" type="button" class="absolute right-0 top-0 bottom-0 bg-gray-700 rounded-r-md">
                <span class="text-white material-icons">keyboard_arrow_down</span>
            </button>
        </div>
        <div
            v-show="isListVisible"
            class="mt-2 cursor-pointer overflow-auto max-h-64 h-auto border border-gray-300"
             v-if="searchableList.length"
        >
            <ul class="selectable bg-gray-100">
                <li class="selectable-item p-2 border-b border-gray-200"
                    @click="setOption(data.key, data.value)"
                    v-for="(data, key) in searchableList">{{ data.value }}
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['value', 'errors', 'data'],
        data() {
            return {
                searchBoxHideDelay: 250,
                isListVisible: false,
                selected: '',
                searchableList: {
                    type: Array,
                    default: this.dataArray
                }
            }
        },
        methods: {
            visibilityTimeout() {
                setTimeout(() => this.isListVisible = false, this.searchBoxHideDelay);
            },
            focus() {
                this.$refs.input.focus()
            },

            setOption(key, value)
            {
                this.selected = value;
                this.$emit('input', key);
                this.isListVisible = false;
            }
        },
        created() {
            this.searchableList = this.dataArray;
            this.selected = this.value.length > 0 ? this.dataArray
                .find((x) => x.key === this.value).value : '';
        },
        watch: {
            selected: function(newValue) {
                this.searchableList = this.dataArray
                        .filter((x) => x.value.includes(newValue))
            }
        },
        computed: {
            hasErrors() {
                return Boolean(this.$page.errors[this.$attrs.id]);
            },
            dataArray()
            {
                return Object.entries(this.data)
                    .map(([key, value]) => ({key,value}));
            }
        }
    }
</script>
<style scoped lang="scss">
.selectable {
    &-item {
        &:hover {
            color: #ffffff;
            background-color: #3f83f8;
            transition: all 100ms linear;
        }
    }
}
</style>

