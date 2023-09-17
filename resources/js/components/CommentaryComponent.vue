<script>
let apiEndpoint;
export default {
    name: 'CommentaryComponent',
    props: ['comment', 'user_id', 'csrf'],
    data() {
        return {
            answers: [],
            page: 1,
            finished: false,
            replies_toggler: false,
            answer_toggler: false,
        };
    },
    methods: {
        getAnswers() {
            apiEndpoint = '/api/post/' + this.comment.id + '/comment?page=' + this.page;
            if (!this.finished) {
                axios.get(apiEndpoint)
                    .then(response => {
                        console.log(response.data);
                        this.answers = this.answers.concat(response.data.data);
                        this.page++;
                        if (response.data.length == 0) {
                            this.finished = true;
                        }
                    })
                    .catch(error => {
                        console.log(error);
                    })
            }
        },
        toggleReplies() {
            this.replies_toggler = !this.replies_toggler;
        },
        toggleAnswers() {
            this.answer_toggler = !this.answer_toggler;
        }
    },
}

</script>

<template>
    <div
        class="w-full bg-gray-200
        dark:bg-gray-800 dark:bg-opacity-30 p-4 mb-8 rounded-lg"
        :id="comment.id">
        <div class="grid grid-cols-6 sm:grid-cols-12 mb-4">
            <div class="w-full col-span-5">
                <a href="" class="flex">
                    <div v-if="comment.post_author">
                        <img src="/img/star.png" class="h-4 mr-3 self-start" alt="">
                    </div>
                    <div class="flex flex-col sm:flex-row items-center sm:space-x-4">
                        <div class="flex space-x-2">
                            <img src="comment.profile_photo_path" class="h-8 rounded" alt="">
                            <h1 class="font-semibold dark:text-white text-xl sm:text-2xl break-all">
                                {{ comment.nickname }}</h1>
                        </div>
                        <h4 class="text-gray-500 dark:text-gray-400 text-sm self-start">{{ comment.role }}</h4>
                    </div>
                </a>
            </div>

            <div v-if="comment.was_updated"
                 class="text-gray-800 dark:text-gray-200 text-sm font-bold underline row-start-2 sm:row-start-1 sm:col-start-11">
                <p>
                    Updated
                </p>
            </div>
            <p class="text-gray-800 dark:text-gray-200 text-sm sm:text-base text-right sm:col-start-12 row-start-1 col-span-1 sm:col-span-2 col-start-6">
                {{ comment.time }}
            </p>
        </div>

        <div v-if="comment.reply_id !== null" class="mb-4">
            <h6 class="text-gray-500 dark:text-gray-400 text-sm truncate"> TO: <a
                :href="'#' + comment.reply_id">{{ comment.reply_user_name }}: {{ comment.reply_text }}</a></h6>
        </div>

        <p class="text-gray-800 dark:text-gray-200 text-sm sm:text-base break-all">{{ comment.text }}</p>

        <div class="flex justify-between mb-4">
            <button @click="toggleAnswers"
                    class="bg-gray-50 dark:bg-gray-600 hover:bg-gray-300 hover:dark:bg-gray-500 border-2 rounded-lg border-gray-100 dark:border-gray-500 dark:text-white mt-3 px-4 py-2">
                <h2>Answer</h2>
            </button>
            <div v-if="comment.has_replies">
                <button @click="toggleReplies(); getAnswers()"
                        class="dark:text-white mt-3 px-4 flex items-center">
                    <img src="/img/down_arrow.svg" class="h-4 mr-3" alt="" v-if="replies_toggler === false">
                    <img src="/img/down_arrow.svg" class="h-4 mr-3 inverted" alt="" v-else>
                    <h2>Replies</h2>
                </button>
            </div>
        </div>
        <div :class="{ visible : answer_toggler, hidden : !answer_toggler }">
            
            #TODO: remake form: remove action field, make method, add @click to submit button, move all hidden input
            fields to method like variables

            <form method="post" :action="'/api/post/' + comment.id + '/reply'">
                <input type="hidden" name="_token" :value="csrf">
                <input type="hidden" name="reply_id" :value="comment.id">
                <input type="hidden" name="post_id" :value="comment.post_id">
                <input type="hidden" name="user_id" :value="user_id">
                <input type="hidden" name="reply_author_id" :value="comment.user_id">
                <div
                    class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                    <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
                        <textarea id="comment" rows="4"
                                  class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800
                                  focus:ring-0 dark:text-white dark:placeholder-gray-400"
                                  placeholder="Write a comment..." required></textarea>
                    </div>
                    <div class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600">
                        <input type="submit"
                               class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white
                                bg-gray-700 rounded-lg focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-900 hover:bg-gray-800"
                               value="Post comment">

                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="dark:bg-opacity-30 bg-opacity-25 bg-gray-200 dark:bg-gray-700 sm:ml-6 rounded-lg">
        <div :id="'answers-' + comment.id" :class="{ visible : replies_toggler, hidden : !replies_toggler }">
            <div v-for="answer in answers">
                <commentary-component :comment="answer" :user_id="user_id" :csrf="csrf"></commentary-component>
            </div>
        </div>
    </div>
</template>


<style scoped>
@tailwind base;
@tailwind components;
@tailwind utilities;

.inverted {
    transform: rotate(180deg);
}

</style>
