<template>

  <div>

    <ul class="TicketTypesNav">
      <li class="TicketTypesNav-item" v-for="type in ticketTypes">
        <router-link class="TicketTypesNav-link" :to="{ name: type.slug }">
          <svg class="TicketTypesNav-icon">
            <use :xlink:href="'#icon-' + type.slug"></use>
          </svg>
        </router-link>
      </li>
    </ul>

    <router-view></router-view>

  </div>

</template>
<script>

    import ticketTypes from '../tickets/ticket-types';

    export default {

        data() {
            return {
                ticketTypes,
            }
        },

    }
</script>