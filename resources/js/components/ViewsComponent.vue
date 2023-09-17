<script>
export default {
    name: 'ViewsComponent',
    props: ['view_count', 'post_id', 'csrf'],
    data() {
        return {
            'views': 0
        }
    },
    mounted() {
        this.views = this.view_count + 1
        axios.post('/api/post/' + this.post_id + '/add-view', {
            id: this.post_id,
            csrf: this.csrf,
            views: this.views
        }).catch(error => {
            console.log(error)
        })
}}
</script>

<template>
    <img src="/img/views.png" class="h-8 mr-3" alt="">
    <h2 class="dark:text-white">{{ views }}</h2>
</template>

<style scoped>

</style>
