<template>
  <div class="PageList">
    <ul class="PageList-menu">
      <li class="PageList-item" v-for="type in ticketTypes">
        <router-link class="PageList-link" :to="{ name: type.slug }">
          <svg class="PageList-icon">
            <use :xlink:href="'#icon-' + type.slug"></use>
          </svg>
          <h2 class="PageList-title">{{ type.name }}</h2>
          <p class="PageList-description">{{ type.description }}</p>
        </router-link>
      </li>
    </ul>
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