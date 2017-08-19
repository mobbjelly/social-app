<template>
  <div>
    <hr>
    <p class="text-center" v-for="like in post.likes">
      <img :src="like.user.avatar" alt="" width="40px" height="40px" class="avatar-likes">
    </p>
    <hr>
    <button class="btn btn-primary">
      Like this post
    </button>
    <button class="btn btn-danger">
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