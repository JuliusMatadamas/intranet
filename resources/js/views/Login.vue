<template>
    <div class="fhw">
        <div class="card shadow">
            <div class="card-header text-center">
                <h4><i class="fas fa-file-contract"></i> Intranet</h4>
                <h6>Grupo Promociones</h6>
            </div>

            <div class="card-body">
                <p>Ingresa tus datos para iniciar sesión en la aplicación.</p>

                <form :action="url"></form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Login",
        props: {
            url: {
                type: String,
                default: '/login'
            }
        },
        mounted() {
            console.log('Ok')
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
        border: solid 1px red;
        display: flex;
        height: 100vh;
        justify-content: center;
        width: 100%;
    }
</style>
