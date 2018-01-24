<template>

  <ticket-form
    title="Creative Request">

    <template slot="intro">
      The information you provide here will help us kickstart your project and determine the right person on our team to lead it.
    </template>

  </ticket-form>

  <section class="Section">
    <div class="Section-container Section-container--narrow">

      <h1 class="Section-title">Creative Request</h1>
      <p class="Section-intro">The information you provide here will help us kickstart your project and determine the right person on our team to lead it.</p>

      <div class="Section-body">

        <form class="Form" method="post" @submit.prevent="submit">

          <div class="Form-body">

            <ul class="Tabs Tabs--center">
              <li class="Tabs-item">
                <input type="radio" id="project_type_event" value="event" v-model="project_type">
                <label for="project_type_event">Event</label>
              </li>
              <li class="Tabs-item">
                <input type="radio" id="project_type_other" value="other" v-model="project_type">
                <label for="project_type_other">Other Project</label>
              </li>
            </ul>

            <contact-field :name.sync="ticket.name" :email.sync="ticket.email"></contact-field>

            <p class="Form-label" v-show="is_event">What's the name of your event?</p>
            <p class="Form-label" v-show="is_project">Provide a short name or subject for your project.</p>
            <input class="Form-control" type="text" :placeholder="is_event ? 'event name' : 'i.e. Sign for x, Booklet for y, Banner for z'" v-model="ticket.subject" required>

            <div v-if="is_event">

              <p class="Form-label">When is the event?</p>

              <input class="Form-control" type="date" name="email" placeholder="event date" v-model="ticket.event_date" required>

              <p class="Form-label">What types of advertising do you need?</p>

              <ul class="CheckList" :class="{ 'has-value': advertising.length }">
                <li v-for="option in advertising_options">
                  <label><input type="checkbox" v-model="advertising" :value="option.value"> {{ option.value }}</label>
                </li> <!-- TODO: Help icon -  (cards, signs, etc) -->
              </ul>

            </div>

            <p class="Form-label">Please help us by describing your {{ is_event ? 'event' : 'project' }} with as much detail as possible.</p>

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

    import contactField from '../components/contact-field';
    import messageField from '../components/message-field';
    import attachments from '../components/attachments';
    import ticketService from '../tickets/tickets.service';

    const PROJECT_TYPE_EVENT = 'event';

    export default {

        props: {},

        components: {
            contactField,
            messageField,
            attachments,
        },

        data() {
            return {

                ticket: {
                    name:        '',
                    email:       '',
                    event_date:  '',
                    subject:     '',
                    message:     '',
                    postscript:  '',
                    ticket_type: 'creative',
                    files:       [],
                },

                project_type:       PROJECT_TYPE_EVENT,
                advertising:        [],
                is_saving:          false,
                is_uploading_files: false,

                advertising_options: [
                    { value: 'Promotional Materials' },
                    { value: 'T-Shirts or Apparel' },
                    { value: 'Social Media Post' },
                    { value: 'Website Post' },
                    { value: 'Email Blast' },
                    { value: 'Video' },
                    { value: 'fpTV Video' },
                    { value: 'fpTV Slides' },
                    { value: 'Host Mention' },
                ],

            }
        },

        computed: {

            is_event() {
                return this.project_type === PROJECT_TYPE_EVENT;
            },

            is_project() {
                return this.project_type !== PROJECT_TYPE_EVENT;
            },

        },

        watch: {
            advertising(value) {
                this.ticket.postscript = buildPostscript(value);
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

                });

            },

        },

    }

    function buildPostscript(advertising) {
        return advertising.length === 0 ? '' : 'Selected Advertising: ' + advertising.join(', ');
    }

</script>