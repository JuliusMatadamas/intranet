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
            name="password"
            placeholder="Ingrese su password"
            type="password"
            v-model="password"

            @keyup="validPassword"
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
                isValid: false,
                password: ''
            }
        },
        methods: {
            validPassword(){
                let v = this.password.trim();
                if( v == null || v.length < 5 || v.length > 10 || /^\s+$/.test(v) ) {
                    this.feedback = "¡Ingrese un texto de 5 a 10 caracteres!"
                    this.isInvalid = true
                    this.isValid = false
                }
                else {
                    this.feedback = "Parece correcta"
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
