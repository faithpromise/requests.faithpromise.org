<template>

  <ticket-form
          type="tech"
          title="Tech Support"
          intro="Please let us know how we can help."
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