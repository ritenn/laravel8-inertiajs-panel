<template>
<jet-form-section @submitted="runAction">
    <template #title>
        <slot name="title">
            Role Information
        </slot>
    </template>

    <template #description>
        <slot name="description"></slot>
    </template>

    <template #form>
        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <jet-label for="name" value="Name" />
            <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" autocomplete="name" />
            <jet-input-error :message="form.error('name')" class="mt-2" />
        </div>
        <!-- Display name -->
        <div class="col-span-6 sm:col-span-4">
            <jet-label for="display_name" value="Display name" />
            <jet-input id="display_name" type="text" class="mt-1 block w-full" v-model="form.display_name" autocomplete="display_name" />
            <jet-input-error :message="form.error('display_name')" class="mt-2" />
        </div>
    </template>

    <template #actions>
        <jet-action-message :on="form.recentlySuccessful" class="mr-3">
            Successful
        </jet-action-message>

        <jet-action-message :on="form.hasErrors()" class="mr-3">
            Fix errors first
        </jet-action-message>

        <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
            <slot name="action-btn-name"></slot>
        </jet-button>
    </template>
</jet-form-section>
</template>
<script>
import AppLayout from '@/Layouts/AppLayout'
import JetActionMessage from "@/Jetstream/ActionMessage";
import JetButton from "@/Jetstream/Button";
import JetFormSection from "@/Jetstream/FormSection";
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError";
import JetLabel from "@/Jetstream/Label";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";

export default {
    props: ['role', 'actionType'],

    components: {
        AppLayout,
        JetActionMessage,
        JetButton,
        JetFormSection,
        JetInput,
        JetInputError,
        JetLabel,
        JetSecondaryButton,
    },
    data() {
        return {
            form: this.$inertia.form({
                '_method': 'POST',
                name: this.role !== undefined ? this.role.name : new String,
                display_name: this.role !== undefined ? this.role.display_name : new String
            }, {
                bag: 'runAction',
                resetOnSuccess: false,
            }),
        }
    },
    methods: {
        runAction() {
            return this.actionType === 'create' ? this.createRole() : this.updateRole();
        },
        updateRole() {
            this.form.put('/roles/' + this.role.id, {
                preserveScroll: true
            });
        },
        createRole() {
            this.form.post('/roles', {
                preserveScroll: true
            });
        }
    }
}
</script>
