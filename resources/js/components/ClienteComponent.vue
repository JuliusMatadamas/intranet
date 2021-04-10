<template>
    <div class="fwc">
        <label for="cliente_id" class="form-label">Seleccione el cliente</label>
        <select v-model="cliente_id" name="cliente_id" id="cliente_id" class="form-control">
            <option value="0">Seleccione...</option>
            <option v-for="cliente in clientes" :value="cliente.id">{{ cliente.cliente }}</option>
        </select>
    </div>
</template>

<script>
    import { mapActions } from 'vuex'
    import { mapGetters } from 'vuex'

    export default {
        name: "ClienteComponent",
        data(){
            return {
                cliente_id: 0
            }
        },
        methods: {
        },
        computed: {
            ...mapGetters([
                'clientes'
            ])
        },
        mounted(){
        }
    }
</script>

<style scoped>
    .fwc {
        width: 100%;
    }
</style>
