<template>

  <section class="Section">
    <div class="Section-container Section-container--narrow">

      <h1 class="Section-title">Tech Support</h1>
      <p class="Section-intro">Please let us know how we can help.</p>

      <div class="Section-body">

        <form class="Form" method="post" @submit.prevent="submit">

          <div class="Form-body">

            <contact-field :name.sync="ticket.name" :email.sync="ticket.email"></contact-field>

            <p class="Form-label">What's the nature of the issue?</p>
            <input class="Form-control" type="text" placeholder="i.e. Computer Repair, Ministry Platform Help, etc" v-model="ticket.subject" required>

            <p class="Form-label">Please help us by describing the issue with as much detail as possible.</p>

            <message-field v-model="ticket.message"></message-field>

          </div>

          <div class="Form-footer">
            <button type="submit" :disabled="is_saving">{{ is_saving ? 'Sending...' : 'Send' }}</button>
          </div>

        </form>

      </div>

    </div>
  </section>

</template>
<script>

    import contactField from '../components/contact-field';
    import messageField from '../components/message-field';
    import ticketService from '../tickets/tickets.service';

    export default {

        components: {
            contactField,
            messageField,
        },

        data() {
            return {

                ticket: {
                    name:        '',
                    email:       '',
                    event_date:  '',
                    subject:     '',
                    message:     '',
                    ticket_type: 'tech',
                },

                is_saving: false,

            }
        },

        methods: {

            submit() {

                if (this.is_saving)
                    return;

                this.is_saving = true;

                ticketService.send(this.ticket).then((result) => {

                });

            },

        },

    }

</script>