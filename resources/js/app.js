import './bootstrap';

import Alpine from 'alpinejs';

import focus from '@alpinejs/focus';

import { createApp } from 'vue';
import LikeComponent from './components/LikeComponent.vue';

createApp({
    components: {
        LikeComponent,
    }
}).mount('#app');

window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();
