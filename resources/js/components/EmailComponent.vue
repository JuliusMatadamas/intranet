<template>
    <div class="fwc">
        <label for="email" class="form-label">Email</label>
        <input
            class="form-control"
            :class="{
                'is-invalid':isInvalid,
                'is-valid':isValid
            }"
            id="email"
            placeholder="Ingrese un correo electrónico válido"
            type="email"
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
        name: "EmailComponent",
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
