<template>
  <li>
    <a href="/notification">
      Unread notification
      <span class="badge">7</span>
    </a>  
  </li>  
</template>

<script>
  export default {
    mounted() {
      this.get_unread()
    },
    methods: {
      get_unread() {
        this.$http.get("/get_unread")
            .then(nots => {
              console.log(nots);
            })
      }
    }
  }
</script>
