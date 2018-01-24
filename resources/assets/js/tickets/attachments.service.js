import axios from 'axios';

export default {

    upload(formData) {
        return axios.post('/attachments', formData);
    },

}