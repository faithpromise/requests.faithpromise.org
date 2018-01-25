<template>

  <ticket-form
          type="web"
          title="Website Change"
          intro="Let's change the interwebs!"
          message-label="Please help us by describing the issue or change with as much detail as possible.">
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