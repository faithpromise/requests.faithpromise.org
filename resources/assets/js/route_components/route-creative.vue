<template>

  <ticket-form
          type="creative"
          title="Creative Request"
          intro="The information you provide here will help us kickstart your project and determine the right person on our team to lead it."
          :postscript="postscript"
          :subject-label="subject_label"
          :subject-placeholder="subject_placeholder"
          :message-label="message_label">

    <template slot="tabs">
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
    </template>

    <template slot="extra_fields">
      <div v-if="is_event">

        <p class="Form-label">When is the event?</p>

        <input class="Form-control" type="date" placeholder="event date" v-model="event_date" required>

        <p class="Form-label">What types of advertising do you need?</p>

        <ul class="CheckList" :class="{ 'has-value': advertising.length }">
          <li v-for="option in advertising_options">
            <label><input type="checkbox" v-model="advertising" :value="option.value"> {{ option.value }}</label>
          </li> <!-- TODO: Help icon -  (cards, signs, etc) -->
        </ul>

      </div>
    </template>

  </ticket-form>

</template>
<script>

    import ticketForm from '../tickets/ticket-form';

    const PROJECT_TYPE_EVENT = 'event';

    export default {

        props: {},

        components: {
            ticketForm,
        },

        data() {
            return {

                project_type: PROJECT_TYPE_EVENT,
                advertising:  [],
                event_date:   '',

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

            subject_label() {
                return this.is_event ? 'What\'s the name of your event?' : 'Provide a short name or subject for your project.';
            },

            subject_placeholder() {
                return this.is_event ? 'event name' : 'i.e. Sign for x, Booklet for y, Banner for z';
            },

            message_label() {
                return 'Please help us by describing your ' + (this.is_event ? 'event' : 'project') + ' with as much detail as possible.';
            },

            postscript() {
                if (!this.is_event)
                    return '';

                let result = [
                    !this.event_date ? 'No event date provided.' : 'Event date is: ' + this.event_date,
                    this.advertising.length === 0 ? 'No advertising selected.' : 'Advertising needed: ' + this.advertising.join(', '),
                ];

                return result.join('\n');
            },

        },

    }

</script>