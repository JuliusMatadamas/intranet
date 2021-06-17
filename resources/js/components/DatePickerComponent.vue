<template>
    <div class="dp-container">
        <VueDatePicker
            v-model:id="id"
            v-model:name="name"
            v-model = "date"
            :color = "color"
            format="YYYY-MM-DD"
        />
    </div>
</template>

<script>
    import { VueDatePicker } from '@mathieustan/vue-datepicker';
    import '@mathieustan/vue-datepicker/dist/vue-datepicker.min.css';
    export default {
        name: "DatePickerComponent",
        props: {
            id: {
                type: String,
                required: true
            },
            name: {
                type: String,
                required: true
            }
        },
        data: function () {
            return {
                date: new Date(),
                color: "#454545"
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
