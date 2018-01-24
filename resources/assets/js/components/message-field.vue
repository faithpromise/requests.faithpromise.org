<template>
  <div>
    <textarea class="Form-control" name="body" placeholder="" @input="updateValue($event.target.value)" required>{{ value }}</textarea>
  </div>
</template>
<script>

    import ticketStorage from '../tickets/ticket-storage';

    export default {

        props: {
            value: { required: true, },
        },

        data() {
            return {
                message_value: this.message,
            }
        },

        watch: {

            message_value(value) {
                ticketStorage.setMessage(value, 86400);
                this.$emit('update:message', value);
            },

        },

        created() {

            if (!this.message)
                this.message_value = ticketStorage.getMessage();
        },

        methods: {

            updateValue(value) {
                this.$emit('input', value);
            }

        },

    }
</script>