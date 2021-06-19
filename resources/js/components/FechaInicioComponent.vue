<template>
    <div class="dp-container">
        <VueDatePicker
            v-model = "date"
            :color = "color"
            @onChange="setFechaInicio"
        />
    </div>
</template>

<script>
    import { VueDatePicker } from '@mathieustan/vue-datepicker';
    import '@mathieustan/vue-datepicker/dist/vue-datepicker.min.css';
    import { mapActions } from 'vuex'
    import { mapGetters } from 'vuex'

    export default {
        name: "FechaInicioComponent",
        data: function () {
            return {
                date: new Date(),
                color: "#454545"
            }
        },
        methods: {
            ...mapActions({
                getFechaInicio: 'GET_FECHA_INICIO'
            }),
            setFechaInicio(){
                this.getFechaInicio(this.date);
            }
        }
    }
</script>

<style scoped>
    .dp-container {
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
    }
</style>
