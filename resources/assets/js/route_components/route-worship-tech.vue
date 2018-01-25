<template>

  <ticket-form
          type="worship-tech"
          title="Tech Maintenance"
          intro="Use this form if you have worship tech that needs repair."
          message-label="Please help us by describing the issue with as much detail as possible.">
  </ticket-form>

</template>
<script>

    import ticketForm from '../tickets/ticket-form';

    export default {

        components: {
            ticketForm,
        },

    }

</script>