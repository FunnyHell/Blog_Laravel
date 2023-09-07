<script>
export default {
    props: ['user', 'id', 'like_count'],
    data() {
        return {
            likeCount: this.like_count
        };
    },
    methods: {
        pressButton() {
            axios.post('/api/post/like', {
                user_id: this.user,
                post_id: this.id
            })
                .then(responce => {
                    if (responce.data.like) {
                        this.likeCount++;
                    } else {
                        this.likeCount--;
                    }
                })
                .catch(error => {
                    console.log(error);
                });
        }
    },
    mounted() {
        console.log(this.likeCount);
    }
}
</script>

<template>
    <button @click="pressButton">
        <div class="like-div">
            <Transition name="like">
                <img src="/img/like_inactive.png" v-if="!likeCount" class="like-btn" alt="">
                <img src="/img/like_active.png" v-else class="like-btn" alt="">
            </Transition>
            <h3 class="like-cnt">{{ likeCount }}</h3>
        </div>
    </button>
</template>

<style scoped>

.like-div {
    cursor: pointer;
    @media (min-width: 768px) {
        width: 4rem;
    }
    width: 3.6rem;
    display: flex;
    flex-direction: column;
    justify-content: center;
    margin: 5px;
    padding: 5px;
}

.like-btn {
    position: absolute;
    width: 2rem;
}

.like-cnt {
    align-self: flex-end;
    @media (prefers-color-scheme: dark) {
        color: white;
    }
}

.like-enter-active,
.like-leave-active {
    transition: all 0.25s ease-out;
}

.like-enter-from {
    opacity: 0;
    transform: translateY(30px);
}

.like-leave-to {
    opacity: 0;
    transform: translateY(-30px);
}
</style>
