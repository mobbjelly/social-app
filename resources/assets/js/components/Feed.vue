<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="panel panel-default" v-for="post in posts">
                    <div class="panel-heading text-center">
                        {{ post.user.name }}
                    </div>

                    <div class="panel-body">
                        <p class="text-center">
                            {{ post.content }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.get_feed()
        },

        methods: {
            get_feed() {
                this.$http.get('/feed')
                    .then(res => {
                        res.body.forEach(post => {
                            this.$store.commit("add_post", post)
                        })
                    })
            }
        },

        computed: {
            posts() {
                return this.$store.getters.all_posts
            }
        }
    }
</script>