<template>
    <div class="fwc">
        <label for="nombre_plan" class="form-label">Ingrese el nombre del plan:</label>
        <input
            class="form-control"
            :class="{
                'is-invalid':isInvalid,
                'is-valid':isValid
            }"
            id="nombre_plan"
            name="nombre_plan"
            placeholder="Nombre del plan"
            type="text"
            v-model="nombre_plan"

            @keyup="validNombrePlan"
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
                nombre_plan: '',
                feedback: '&nbsp;',
                isInvalid: false,
                isValid: false,
                resp: null
            }
        },
        methods: {
            validNombrePlan(){
                if ( this.nombre_plan.length < 5 ){
                    this.feedback = "¡El nombre del plan debe tener 5 caracteres mínimo!"
                    this.isInvalid = true
                    this.isValid = false
                }
                else {
                    let self = this;
                    let uri = location.protocol + '//' + location.hostname + ':' + location.port + '/api/planes/' + this.nombre_plan.trim();
                    axios.get(uri)
                        .then(function(response){
                            if(response.data.plan.length == 1)
                            {
                                self.feedback = "¡El nombre del plan ya está registrado!"
                                self.isInvalid = true
                                self.isValid = false
                            }
                            else
                            {
                                self.feedback = "El nombre del plan parece válido"
                                self.isInvalid = false
                                self.isValid = true
                            }
                        })
                        .catch(function(error){
                            console.log( error )
                        })
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
