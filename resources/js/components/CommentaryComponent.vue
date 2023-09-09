<script>
let apiEndpoint;
export default {
    name: 'CommentaryComponent',
    props: ['comment', 'user_id'],
    data() {
        return {
            comments: [],
            page: 1,
            finished: false,
        };
    },
    // methods: {
        // infiniteHandler() {
        //     apiEndpoint = '/api/post/' + this.post_id + '/comments?page=' + this.page;
        //     if (!this.finished) {
        //         axios.get(apiEndpoint).then(response => {
        //             console.log(response.data);
        //             this.comments = this.comments.concat(response.data);
        //             this.page++;
        //             if (response.data.length == 0) {
        //                 this.finished = true;
        //             }
        //         })
        //         .catch(error => {
        //             console.log(error);
        //         })
        //     }
        // }
    // },
    // mounted() {
    //     axios.get('/api/post/' + this.post_id + '/comments?page=' + this.page)
    //         .then(response => {
    //             console.log(response.data);
    //             this.comments = this.comments.concat(response.data);
    //         })
    //         .catch(error => {
    //             console.log(error);
    //         })
    // }
}
</script>

<template>
    <div
        class="w-full bg-white
        dark:bg-gray-800 dark:bg-opacity-30 border-b border-gray-200 dark:border-gray-600 p-4 mb-8 rounded-lg"
        :id="comment.id">
        <div class="grid grid-cols-6 sm:grid-cols-12 mb-4">
            <div class="w-full col-span-5">
                <a href="" class="flex">
                    <div v-if="comment.post_author">
                        <img src="/img/star.png" class="h-4 mr-3 self-start" alt="">
                    </div>
                    <div class="flex flex-col sm:flex-row items-center sm:space-x-4">
                        <div class="flex space-x-2">
                            <img src="{{comment.profile_photo_path}}" class="h-8 rounded" alt="">
                            <h1 class="font-semibold dark:text-white text-xl sm:text-2xl break-all">
                                {{ comment.nickname }}</h1>
                        </div>
                        <h4 class="text-gray-500 dark:text-gray-400 text-sm self-start">{{ comment.role }}</h4>
                    </div>
                </a>
            </div>

            <div v-if="comment.was_updated"
                 class="text-gray-800 dark:text-gray-200 text-sm font-bold underline row-start-2 sm:row-start-1 sm:col-start-11">
                <p class="">
                    Updated
                </p>
            </div>
            <p class="text-gray-800 dark:text-gray-200 text-sm sm:text-base text-right sm:col-start-12 row-start-1 col-span-1 sm:col-span-2 col-start-6">
                {{ comment.time }}
            </p>

        </div>

        <p class="text-gray-800 dark:text-gray-200 text-sm sm:text-base break-all">{{ comment.text }}</p>
        <div v-if="comment.reply_id">
            <h4 class="text-gray-500 dark:text-gray-400 text-sm self-start">
                <a :href="'#' + comment.reply_id">Go to commentary</a>
            </h4>
        </div>
        <br>
    </div>
</template>


<style scoped>
@tailwind base;
@tailwind components;
@tailwind utilities;
</style>
