<template>
    <div class="fhw">
        <div class="card shadow">
            <div class="card-header text-center">
                <h4><i class="fas fa-file-contract"></i> Intranet</h4>
                <h6>Grupo Promociones</h6>
            </div>

            <div class="card-body">
                <p>Ingresa tus datos para iniciar sesión en la aplicación.</p>

                <form :action="url" @submit.prevent="validForm">
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
                            }">Ingresar</button>

                            <div :class="{
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
        props: {
            feedbackBtn: {
                type: String,
                default: '&nbsp;'
            },
            inValidFeedBackBtn:{
                type: Boolean,
                default: false
            },
            url: {
                type: String,
                default: '/login'
            },
            validFeedBackBtn: {
                type: Boolean,
                default: false
            }
        },
        mounted() {
        },
        methods: {
            validForm(){
                console.log('Submit atrapado');
            }
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
