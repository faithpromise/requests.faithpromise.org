<template>

  <ticket-form
          type="hr"
          title="Human Resources"
          intro="Contact us regarding things like payroll, benefits, job descriptions, or HR forms."
          message-label="Please help us by describing your inquiry with as much detail as possible.">
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