<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Permissions
            </h2>
        </template>
        <div class="max-w-full mx-auto py-10 sm:px-6 lg:px-8">
            <action-table :data="permissions"
              :fields="{ display_name: 'Display name', route_name: 'Route name', updated_at: 'Updated at'}"
            />
        </div>
    </app-layout>
</template>
<script>
import AppLayout from "../../Layouts/AppLayout";
import JetSectionBorder from "../../Jetstream/SectionBorder";
import ActionTable from "../../Components/Table";

export default {
    props: ['permissions'],

    components: {
        AppLayout,
        JetSectionBorder,
        ActionTable
    },
}
</script>
