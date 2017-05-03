<template>
    <div class="row">
        <p class="text-center" v-if="loading">
            Loading...
        </p>
        <p class="text-center" v-else>
            <button class="btn btn-success" v-if="status === 0">Add Friend</button>
            <button class="btn btn-success" v-if="status === 'pending'">Accept Friend</button>
            <span class="text-success" v-if="status === 'waiting'">Waiting for response</span>
            <span class="btn btn-success" v-if="status === 'friends'">Friends</span>
        </p>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.$http.get('/check_relationship_status/' + this.profile_user_id)
                .then((res) => {
                    console.log(res)
                    this.status = res.body.status
                    this.loading = false
                })
        },
        props: ['profile_user_id'],
        data() {
            return {
                status: '',
                loading: true
            }
        }
    }
</script>