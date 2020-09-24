<template>
<app-layout>
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Update role
        </h2>
    </template>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    <jet-form-section @submitted="updateRole">
        <template #title>
            Role Information
        </template>

        <template #description>
            Update role data.
        </template>

        <template #form>
            <!-- Name -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="name" value="Name" />
                <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" autocomplete="name" />
                <jet-input-error :message="errors.name" class="mt-2" />
            </div>
            <!-- Display name -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="display_name" value="Display name" />
                <jet-input id="display_name" type="text" class="mt-1 block w-full" v-model="form.display_name" autocomplete="display_name" />
                <jet-input-error :message="errors.display_name" class="mt-2" />
            </div>
        </template>

        <template #actions>

            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                {{ hasErrors ? 'Failed - fix errors' : 'Updated.' }}
            </jet-action-message>

            <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Update
            </jet-button>
        </template>
    </jet-form-section>
    </div>
</app-layout>
</template>
<script>
import AppLayout from './../../Layouts/AppLayout'
import JetActionMessage from "../../Jetstream/ActionMessage";
import JetButton from "../../Jetstream/Button";
import JetFormSection from "../../Jetstream/FormSection";
import JetInput from "../../Jetstream/Input";
import JetInputError from "../../Jetstream/InputError";
import JetLabel from "../../Jetstream/Label";
import JetSecondaryButton from "../../Jetstream/SecondaryButton";

export default {
    props: ['role', 'errors'],

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
              name: this.role.name,
              display_name: this.role.display_name
          }, {
              bag: 'updateRole',
              resetOnSuccess: false,
          }),
      }
    },
    methods: {
        updateRole() {
            this.form.put('/roles/' + this.role.id, {
                preserveScroll: true
            });
        }
    },
    computed: {
        hasErrors()
        {
            return Boolean(Object.keys(this.errors).length);
        }
    }
}
</script>
