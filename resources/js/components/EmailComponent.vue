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
            name="email"
            placeholder="Ingrese un correo electrónico válido"
            type="email"
            v-model="email"

            @keyup="validEmail"
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
                email: '',
                feedback: '&nbsp;',
                isInvalid: false,
                isValid: false
            }
        },
        methods: {
            validEmail(){
                let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                if ( !re.test(this.email) ){
                    this.feedback = "¡Ingresa un correo electrónico válido!"
                    this.isInvalid = true
                    this.isValid = false
                }
                else {
                    this.feedback = "Parece correcto"
                    this.isInvalid = false
                    this.isValid = true
                }
            }
        }
    }
</script>

<style scoped>
    .fwc {
        width: 100%;
    }
</style>
