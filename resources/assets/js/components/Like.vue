<template>
  <div>
    <hr>
    <p class="text-center">
      //Avatars of post likes
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
  }

</script>