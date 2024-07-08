<template>
    <div id="calendar"></div>
</template>

<script>
import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';

export default {
    mounted() {
        let calendarEl = document.getElementById('calendar');
        let calendar = new Calendar(calendarEl, {
            plugins: [dayGridPlugin, interactionPlugin],
            events: this.events,
        });
        calendar.render();
    },
    data() {
        return {
            events: [],
        };
    },
    created() {
        axios.get('/api/events').then(response => {
            this.events = response.data;
        });
    },
};
</script>

<style scoped>
#calendar {
    max-width: 900px;
    margin: 0 auto;
}
</style>
