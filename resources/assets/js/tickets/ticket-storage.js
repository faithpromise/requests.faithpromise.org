import clientStorage from '../common/client-storage';

const CONTACT_NAME  = 'contact_name';
const CONTACT_EMAIL = 'contact_email';
const MESSAGE       = 'message';

let prefix = 'fp_tickets_',

    get    = (key) => {
        return clientStorage.get(prefix + key);
    },

    set    = (key, value) => {
        clientStorage.set(prefix + key, value);
    },

    remove = (key) => {
        clientStorage.remove(prefix + key);
    };

export default {

    getName() {
        return get(CONTACT_NAME);
    },

    setName(value) {
        set(CONTACT_NAME, value);
    },

    getEmail() {
        return get(CONTACT_EMAIL);
    },

    setEmail(value) {
        set(CONTACT_EMAIL, value);
    },

    getMessage() {
        return get(MESSAGE);
    },

    setMessage(value, seconds = null) {
        set(MESSAGE, value, seconds);
    },

    clear() {
        remove(MESSAGE);
    },

    clearAll() {
        this.clear();
        remove(CONTACT_NAME);
        remove(CONTACT_EMAIL);
    },

}