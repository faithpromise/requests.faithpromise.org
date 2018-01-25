<template>

  <ticket-form
          type="facility"
          title="Facilities"
          intro="Just call Levi. There's no project too big or too small."
          message-label="Please help us by describing the issue or project with as much detail as possible.">
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