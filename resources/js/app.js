import './bootstrap';

import Alpine from 'alpinejs';

import focus from '@alpinejs/focus';

import { createApp } from 'vue';
import InfiniteLoading from 'v3-infinite-loading';
import LikeComponent from './components/LikeComponent.vue';
import CommentariesComponent from "./components/CommentariesComponent.vue";
import CommentaryComponent from "./components/CommentaryComponent.vue";

const app= createApp({});
app.component('infinite-loading', InfiniteLoading);
app.component('like-component', LikeComponent);
app.component('commentaries-component', CommentariesComponent);
app.component('commentary-component', CommentaryComponent);

app.mount('#app');
// createApp({
//     components: {
//         InfiniteLoading,
//         LikeComponent,
//         CommentariesComponent,
//         CommentaryComponent,
//     }
// }).mount('#app');

window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();
