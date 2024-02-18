import './bootstrap';

import Alpine from 'alpinejs';
import axios from "axios";
import Cleave from 'cleave.js';

window.axios = axios;
window.Alpine = Alpine;
window.Cleave = Cleave;

Alpine.start();
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
window.axios.defaults.headers.common["X-CSRF-TOKEN"] = csrfToken;


