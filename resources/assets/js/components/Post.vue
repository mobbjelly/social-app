<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <textarea rows="5" class="form-control" v-model="content"></textarea>
                        <br>
                        <button class="btn btn-success pull-right" :disabled="not_working" @click="create_post()">Create a post</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {

        },
        data() {
            return {
                not_working: true,
                content: ""
            }
        },
        methods: {
            create_post() {
                this.$http.post('/create/post', { content: this.content})
                    .then(res => {
                        this.content = ''
                        new Noty({
                            type: 'success',
                            layout: 'topCenter',
                            timeout: 3000,
                            text: "Your post has been published!"
                        }).show();
                        console.log(res)
                    })
            }
        },
        watch: {
            content() {

                this.not_working = this.content.trim().length <= 0;
            }
        }
    }
</script>