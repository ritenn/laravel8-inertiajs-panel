<template>
<app-layout>
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create role
        </h2>
    </template>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <create-or-update-role action-type="create">
            <template #description>
                Create new cool role!
            </template>

            <template #action-btn-name>
                Create
            </template>
        </create-or-update-role>
    </div>
</app-layout>
</template>
<script>
import AppLayout from '@/Layouts/AppLayout'
import CreateOrUpdateRole from "./Components/CreateOrUpdateRole";

export default {
    components: {
        AppLayout,
        CreateOrUpdateRole
    }
}
</script>
