<template>
  <div>
    <input class="Form-control" type="text" placeholder="your name" v-model="name_value" required>
    <input class="Form-control" type="text" placeholder="email" v-model="email_value" required>
  </div>
</template>
<script>

    import ticketStorage from '../tickets/ticket-storage';

    export default {

        props: {
            name:  { required: true, },
            email: { required: true, },
        },

        data() {
            return {
                name_value:  this.name,
                email_value: this.email,
            }
        },

        watch: {

            name_value(value) {
                ticketStorage.setName(value);
                this.$emit('update:name', value);
            },

            email_value(value) {
                ticketStorage.setEmail(value);
                this.$emit('update:email', value);
            },

        },

        created() {

            if (!this.name)
                this.name_value = ticketStorage.getName();

            if (!this.email)
                this.email_value = ticketStorage.getEmail();

        },

    }
</script>