import axios from 'axios';

export default {

    send(ticket) {
        return axios.post('/tickets', ticket);
    }

}