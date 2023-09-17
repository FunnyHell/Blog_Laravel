<script>
let apiEndpoint;
export default {
    name: 'CommentariesComponent',
    props: ['user_id', 'post_id', 'csrf'],
    data() {
        return {
            comments: [],
            page: 1,
            finished: false,
        };
    },
    methods: {
        infiniteHandler() {
            apiEndpoint = '/api/post/' + this.post_id + '/comments?page=' + this.page;
            if (!this.finished) {
                axios.get(apiEndpoint).then(response => {
                    console.log(response.data);
                    this.comments = this.comments.concat(response.data.data);
                    this.page++;
                    if (response.data.length == 0) {
                        this.finished = true;
                    }
                })
                .catch(error => {
                    console.log(error);
                })
            }
        }
    },
}
</script>

<template>
    <div v-for="comment in comments">
        <commentary-component :comment="comment" :user_id="user_id" :csrf="csrf" />
    </div>
        <div style="opacity: 0">
            <infinite-loading :distance="200" @infinite="infiniteHandler"></infinite-loading>
        </div>
</template>


<style scoped>
@tailwind base;
@tailwind components;
@tailwind utilities;
</style>
