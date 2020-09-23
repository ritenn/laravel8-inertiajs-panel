<template>
<app-layout>
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Roles
        </h2>
    </template>
    <template #description>
        Update your account's profile information and email address.
    </template>
<!--    <div>-->
<!--        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">-->
<!--            <update-profile-information-form-->
<!--                :name="$page.user.name"-->
<!--                :email="$page.user.email" />-->

<!--            <jet-section-border />-->

<!--            <update-password-form class="mt-10 sm:mt-0" />-->

<!--            <div v-if="$page.jetstream.canManageTwoFactorAuthentication">-->
<!--                <jet-section-border />-->

<!--                <two-factor-authentication-form class="mt-10 sm:mt-0" />-->
<!--            </div>-->

<!--            <jet-section-border />-->

<!--            <logout-other-browser-sessions-form :sessions="sessions" class="mt-10 sm:mt-0" />-->

<!--            <jet-section-border />-->

<!--            <delete-user-form class="mt-10 sm:mt-0" />-->
<!--        </div>-->
<!--    </div>-->
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
    props: [],

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
}
</script>
