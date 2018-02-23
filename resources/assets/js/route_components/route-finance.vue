<template>

  <ticket-form
          type="finance"
          title="Finance"
          intro="Contact us regarding things like PO's, CC's, bills, invoices, budgets, or expenses."
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