<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        Jeremy Chen
                    </div>

                    <div class="panel-body">
                        <p class="text-center">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est ex fugiat laboriosam omnis, porro quidem ratione repellat rerum sunt voluptatibus.
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
        }
    }
</script>