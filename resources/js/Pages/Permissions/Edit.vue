<template>
<app-layout>
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Update permission
        </h2>
    </template>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <create-or-update-permission action-type="update" :route-names-list="permissionRouteNamesList" :permission="permission">
            <template #description>
                Update permission!
            </template>

            <template #action-btn-name>
                Update
            </template>
        </create-or-update-permission>
    </div>
</app-layout>
</template>
<script>
import AppLayout from '@/Layouts/AppLayout'
import CreateOrUpdatePermission from "./Components/CreateOrUpdatePermission";

export default {
    components: {
        AppLayout,
        CreateOrUpdatePermission
    },
    props: ['permissionRouteNamesList', 'permission']
}
</script>
