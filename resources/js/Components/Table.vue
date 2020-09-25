<template>
<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="w-full text-right">
                <button v-if="actions.find( x => x === 'add')"
                        class="mb-4 bg-blue-500 hover:bg-gray-400 font-bold text-white py-2 px-4 rounded inline-flex items-center"
                        @click="$inertia.replace(actionsDetails.add.url)" >

                    <span class="material-icons">add</span>
                    {{ actionsDetails.add.label }}
                </button>
            </div>
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                    <tr>
                        <th v-for="value in fields" class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            {{ value }}
                        </th>

                        <th v-if="actions.length" class="px-6 py-3 bg-gray-50"></th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    <tr v-for="element in data">
                        <!--Fields-->
                        <td v-for="( display_name, field ) in fields" class="px-6 py-4 whitespace-no-wrap">
                            <div class="text-sm leading-5 text-gray-900">{{ element[field] }}</div>
                        </td>
                        <!--Actions-->
                        <td v-if="actions.length" class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                            <template v-for="action in actions">
                                <button v-if="action !== 'add'"
                                   @click="execAction(element.id, action)"
                                   :class="[actionsDetails[action].color]" class="px-2 hover:text-indigo-900"
                                >
                                    {{ actionsDetails[action].label }}
                                </button>
                            </template>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</template>
<script>
import { Inertia } from '@inertiajs/inertia'

export default {
    props: {
        data: {
            type: Array,
            default: {}
        },
        fields: {
            type: Object,
            default: {}
        },
        create_url: {
            type: String,
            default: ''
        },
        edit_url: {
            type: String,
            default: ''
        },
        delete_url: {
            type: String,
            default: ''
        },
        actions: {
            type: Array,
            default: () => ['add', 'edit', 'delete']
        }
    },
    components: {
        Inertia
    },
    data() {
        return {
            actionsDetails: {
                add: {
                    label: 'Create new',
                    color: 'text-blue-500',
                    url: this.create_url === '' ? route(route().current()).url() + '/create' : this.create_url
                },
                edit: {
                    label: 'Edit',
                    color: 'text-blue-500',
                    url: this.edit_url === '' ? route(route().current()).url() + '/:id/edit' : this.edit_url
                },
                delete: {
                    label: 'Delete',
                    color: 'text-red-700',
                    url: this.delete_url === '' ? route(route().current()).url() + '/:id' : this.delete_url
                }

            }
        }
    },
    methods: {
        passIdActionGetRoute(id, action)
        {
            return this.actionsDetails[action].url.replace(':id', id);
        },
        execAction(id, action)
        {
            this.[action + 'Data'](id, action);
        },
        editData(id, action)
        {
            this.$inertia.visit(this.passIdActionGetRoute(id, action))
        },
        deleteData(id, action)
        {
            this.$inertia.delete(this.passIdActionGetRoute(id, action))
        }
    }
}
</script>
