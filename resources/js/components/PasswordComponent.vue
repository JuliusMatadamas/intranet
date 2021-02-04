<template>
    <div class="fwc">
        <label for="password" class="form-label">Password</label>
        <input
            class="form-control"
            :class="{
                'is-invalid':isInvalid,
                'is-valid':isValid
            }"
            id="password"
            placeholder="Ingrese su password"
            type="password"
        >

        <div
            :class="{
                'invalid-feedback':isInvalid,
                'valid-feedback':isValid
            }"
            v-html="feedback"
        ></div>
    </div>
</template>

<script>
    export default {
        name: "PasswordComponent",
        data(){
            return {
                feedback: '&nbsp;',
                isInvalid: false,
                isValid: false
            }
        }
    }
</script>

<style scoped>
    .fwc {
        width: 100%;
    }
</style>
