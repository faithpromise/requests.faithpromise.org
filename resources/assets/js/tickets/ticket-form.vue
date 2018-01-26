<template>

  <section class="Section">
    <div class="Section-container Section-container--narrow">

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
            <attachments :files.sync="ticket.files" :is-uploading-files.sync="is_uploading_files"></attachments>

          </div>

          <div class="Form-footer">
            <button type="submit" :disabled="is_saving || is_uploading_files">{{ is_saving ? 'Sending...' : 'Send' }}</button>
          </div>

        </form>

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
                    name:        'Barney Fife',
                    email:       'barney@maybery.com',
                    subject:     'Easter Sunday',
                    message:     'Lorm ipsum means that its really importent for you to stay off drugs and stay in scool. You need to no things that will help you in life. Like MATHS and gym. You don\'t want to be dum.',
                    postscript:  '',
                    ticket_type: this.type,
                    files:       [],
                },
                is_saving:          false,
                is_uploading_files: false,

            }
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

                if (this.is_saving)
                    return;

                this.is_saving = true;

                ticketService.send(this.ticket).then((result) => {
                    this.is_saving = false;
                });

            },
        },

    }
</script>