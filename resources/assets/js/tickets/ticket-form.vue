<template>

  <section class="Section">
    <div class="Section-container Section-container--narrow">

      <div v-show="is_sent">
        <h1 class="Section-title">Message Sent!</h1>
        <p class="Section-intro">Your message has been sent. We'll be in touch shortly.</p>
      </div>

      <div v-show="error">
        <h1 class="Section-title">An Error Occurred!</h1>
        <p class="Section-intro">Unfortunately your message could not be sent. Error: {{ error }}</p>
        <p style="text-align: center;">
          <button class="Button Button--small" type="button" @click="tryAgain">Try again</button>
        </p>
      </div>

      <div v-show="is_form_visible">

        <h1 class="Section-title">{{ title }}</h1>
        <p class="Section-intro">{{ intro }}</p>

        <div class="Section-body">

          <form class="Form" method="post" @submit.prevent="submit">

            <div class="Form-body">

              <slot name="tabs"></slot>

              <contact-field :name.sync="ticket.name" :email.sync="ticket.email"></contact-field>

              <p class="Form-label">{{ subjectLabel }}</p>
              <input class="Form-control" type="text" :placeholder="subjectPlaceholder" v-model="ticket.subject" required>

              <slot name="extra_fields"></slot>

              <p class="Form-label">{{ messageLabel }}</p>

              <message-field v-model="ticket.message"></message-field>
              <attachments :files.sync="ticket.attachments" :is-uploading-files.sync="is_uploading_files"></attachments>

            </div>

            <div class="Form-footer">
              <button class="Button Button--block" type="submit" :disabled="is_sending || is_uploading_files">{{ is_sending ? 'Sending...' : 'Send' }}</button>
            </div>

          </form>

        </div>

      </div>

    </div>
  </section>

</template>
<script>

    import ticketService from '../tickets/tickets.service';
    import attachments from './attachments';
    import contactField from '../components/contact-field';
    import messageField from '../components/message-field';

    export default {

        props: {
            type:               { required: true },
            title:              { required: true, },
            intro:              { required: true, },
            subjectLabel:       { default: 'What\'s the nature of your request?', },
            subjectPlaceholder: { default: '', },
            messageLabel:       { default: 'Please help us by describing what you need with as much detail as possible.', },
            postscript:         { default: '', },
        },

        components: {
            attachments,
            contactField,
            messageField,
        },

        data() {
            return {

                ticket:             {
                    name:        '',
                    email:       '',
                    subject:     '',
                    message:     '',
                    postscript:  '',
                    ticket_type: this.type,
                    attachments: [],
                },
                is_sending:         false,
                is_sent:            false,
                error:              null,
                is_uploading_files: false,

            }
        },

        computed: {

            is_form_visible() {
                return !this.is_sent && !this.error;
            },

        },

        watch: {

            postscript: {
                immediate: true,
                handler(value) {
                    this.ticket.postscript = value;
                },
            },

        },

        methods: {

            submit() {

                if (this.is_uploading_files)
                    return alert('Files are still uploading. Please wait...');

                if (this.is_sending)
                    return;

                this.is_sending = true;

                ticketService.send(this.ticket).then(() => {
                    this.is_sending = false;
                    this.is_sent    = true;
                })
                    .catch((error) => {
                        this.is_sending = false;
                        this.error      = error.message;
                    });

            },

            tryAgain() {
                this.error = null;
            },

        },

    }
</script>