<template>
    <div class="fhw">
        <div class="card shadow">
            <div class="card-header text-center">
                <h4><i class="fas fa-file-contract"></i> Intranet</h4>
                <h6>Grupo Promociones</h6>
            </div>

            <div class="card-body">
                <p>Ingresa tus datos para iniciar sesión en la aplicación.</p>

                <form :action="url">
                    <input type="hidden" name="_token" value="">

                    <div class="row">
                        <div class="col-md-12">
                            <email-component></email-component>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <password-component></password-component>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-block btn-dark" :class="{
                                'is-invalid':inValidFeedBackBtn,
                                'is-valid':validFeedBackBtn
                            }" type="button" @click="validForm">Ingresar</button>

                            <div class="small" :class="{
                                'invalid-feedback':inValidFeedBackBtn,
                                'valid-feedback':validFeedBackBtn
                            }" v-html="feedbackBtn"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Login",
        data(){
            return {
                feedbackBtn: '&nbsp;',
                inValidFeedBackBtn: false,
                validFeedBackBtn: false
            }
        },
        props: {
            url: {
                type: String,
                default: '/login'
            }
        },
        mounted() {
            document.querySelector("input[name='_token']").value = document.querySelector("meta[name=csrf-token]").getAttribute("content");
        },
        methods: {
            validForm(){
                let f = document.querySelector("form");
                let b = Array.from(f.querySelectorAll('button'));
                let inputs = Array.from(f.querySelectorAll('input'));
                let url = f.getAttribute("action");
                let valid = true;

                inputs.forEach(i => {
                    if( i.value.length == 0 ){
                        this.feedbackBtn = "¡Favor de llenar todos los campos!"
                        this.inValidFeedBackBtn = true
                        this.validFeedBackBtn = false
                        valid = false
                        return false
                    }
                    else {
                        if ( i.classList.contains('is-invalid') ){
                            this.feedbackBtn = "¡Favor de cumplir con lo indicado en el campo en rojo!"
                            this.inValidFeedBackBtn = true
                            this.validFeedBackBtn = false
                            valid = false
                            return false
                        }
                    }
                })

                if( valid ){
                    this.feedbackBtn = "Espera mientras se validan los datos"
                    this.inValidFeedBackBtn = false
                    this.validFeedBackBtn = false
                    b[0].disabled = true

                    let data = new FormData(f);

                    axios.post(url, data)
                        .then(response => {
                            if( response.status == 200 ){
                                this.feedbackBtn = "Datos correctos, espera unos segundos para ser redireccionado."
                                this.inValidFeedBackBtn = false
                                this.validFeedBackBtn = true
                                setTimeout(function(){
                                    window.location = "inicio"
                                }, 2000)
                            }
                            else {
                                console.log(response)
                            }
                        })
                        .catch(error => {
                            this.feedbackBtn = "Los datos no fueron encontrados, favor de verificar."
                            this.inValidFeedBackBtn = true
                            this.validFeedBackBtn = false
                            b[0].disabled = false
                            console.log(error)
                        })
                }
            }
        },
        computed: {
        }
    }
</script>

<style scoped>
    .card {
        animation: zoomIn;
        animation-duration: 2s;
    }
    .fhw {
        align-items: center;
        display: flex;
        height: 100vh;
        justify-content: center;
        width: 100%;
    }
</style>
