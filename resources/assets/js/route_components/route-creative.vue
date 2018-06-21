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

      <p>If a purchase is required, please indicate which
        <strong>category, department, event, and location</strong> items should be filed under.</p>
      <input class="Form-control" type="text" placeholder="Budget (category/department/event/location)" v-model="budget_source">


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

                project_type:  PROJECT_TYPE_EVENT,
                advertising:   [],
                event_date:    '2018-04-01',
                budget_source: '',

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

            // TODO: Computed `teamwork_tasks` based on advertising that gets sent with `ticket` and auto add them to teamwork

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
                return 'Please help us by describing your ' + (this.is_event ? 'event' : 'project') + ' and needs with as much detail as possible.';
            },

            postscript() {
                if (!this.is_event)
                    return '';

                let result = [];

                if (this.is_event)
                    result.push('Event Date: ' + (this.event_date || 'No event date provided.'));

                if (!this.is_event)
                    result.push('Advertising: ' + (this.advertising.length ? this.advertising.join(', ') : 'none selected.'));

                result.push('Budget to Use: ', this.budget_source.length ? this.budget_source : 'none provided');

                return result.join('\n');
            },

        },

    }

</script>