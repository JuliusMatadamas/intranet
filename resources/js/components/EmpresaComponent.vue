<template>
    <div class="fwc">
        <label for="empresa_id" class="form-label">Seleccione la empresa</label>
        <select v-model="empresa_id" name="empresa_id" id="empresa_id" class="form-control">
            <option value="0">Seleccione...</option>
            <option v-for="empresa in empresas" :value="empresa.id">{{ empresa.nombre_corto }}</option>
        </select>
    </div>
</template>

<script>
    import { mapActions } from 'vuex'
    import { mapGetters } from 'vuex'

    export default {
        name: "EmpresaComponent",
        data(){
            return {
                empresa_id: 0
            }
        },
        methods: {
            ...mapActions([
                'GET_EMPRESAS'
            ])
        },
        computed: {
            ...mapGetters([
                'empresas'
            ])
        },
        mounted(){
            this.GET_EMPRESAS()
        }
    }
</script>

<style scoped>
    .fwc {
        width: 100%;
    }
</style>
