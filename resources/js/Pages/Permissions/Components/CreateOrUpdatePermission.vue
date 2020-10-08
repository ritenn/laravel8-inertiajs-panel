<template>
<jet-form-section @submitted="runAction">
    <template #title>
        <slot name="title">
            Permission Information
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
        <!-- Display route name -->
        <div class="col-span-6 sm:col-span-4">
            <jet-label for="route_name" value="Route name" />
            <jet-input-select :data="routeNamesList" v-model="form.route_name" autocomplete="route_name" />
            <jet-input-error :message="form.error('route_name')" class="mt-2" />
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
import JetInputSelect from "@/Jetstream/InputSelect";

export default {
    props: ['permission', 'actionType', 'routeNamesList'],

    components: {
        AppLayout,
        JetActionMessage,
        JetButton,
        JetFormSection,
        JetInput,
        JetInputError,
        JetLabel,
        JetSecondaryButton,
        JetInputSelect
    },
    data() {
        return {
            form: this.$inertia.form({
                '_method': 'POST',
                name: this.permission !== undefined ? this.permission.name : new String,
                display_name: this.permission !== undefined ? this.permission.display_name : new String,
                route_name: this.permission !== undefined ? this.permission.route_name : new String
            }, {
                bag: 'runAction',
                resetOnSuccess: false,
            })
        }
    },
    watch: {
      form: {
          handler(form)
          {
            /**
            * Only lower case naems without spaces/numbers should be allowed
            */
            let name = form.name;
            this.form.name = name.replace(/\s+/g, '_').replace(/[^a-z_]/g, '').toLowerCase();
          },
          deep: true
      }
    },
    methods: {
        runAction() {
            return this.actionType === 'create' ? this.createPermission() : this.updatePermission();
        },
        updatePermission() {
            this.form.put('/permissions/' + this.permission.id, {
                preserveScroll: true
            });
        },
        createPermission() {
            this.form.post('/permissions', {
                preserveScroll: true
            });
        }
    }
}
</script>
