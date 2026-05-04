import {createApp} from 'vue';
import './bootstrap';
import router from "./router.js";

const app = createApp({});
/* auto import components */
/*Object.entries(import.meta.glob('./!**!/!*.vue', {eager: true}))
    .forEach(([path, definition]) => {
        app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
    });*/

app.use(router).mount('#app');
