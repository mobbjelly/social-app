<template>
  <div>
    <hr>
    <span class="text-center" v-for="like in post.likes">
      <img :src="like.user.avatar" alt="" width="40px" height="40px" class="avatar-likes">
    </span>
    <hr>
    <button class="btn btn-primary" v-if="!auth_user_likes_post">
      Like this post
    </button>
    <button class="btn btn-danger" v-else>
      Unlike this post
    </button>
  </div>
</template>

<script>

  export default {
    mounted() {

    },
    props: ["id"],
    computed: {
      likers() {
        let likers = []

        this.post.likes.forEach(like => {
          likers.push(like.user.id)
        })

        return likers
      },

      auth_user_likes_post() {
        let check_index = this.likers.indexOf(
          this.$store.state.auth_user.id
        )

        if (check_index === -1) {
          return false
        } else {
          return true
        }
      },

      post() {
        return this.$store.state.posts.find(post => {
          return post.id === this.id
        })
      }
    }
  }

</script>

<style>
  .avatar-likes {
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
  } 
</style>