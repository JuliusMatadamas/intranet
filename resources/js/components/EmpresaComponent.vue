<template>
    <div class="fwc">
        <label for="empresa_id" class="form-label">Seleccione la empresa</label>
        <select name="empresa_id" id="empresa_id" class="form-control">
        </select>
    </div>
</template>

<script>
    export default {
        name: "EmpresaComponent",
        data(){
            return {
            }
        },
        methods: {
        }
    }
</script>

<style scoped>
    .fwc {
        width: 100%;
    }
</style>
