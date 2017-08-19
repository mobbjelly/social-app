<template>
  <div></div>
</template>

<script>
  export default {
    mounted() {
      this.listen()
    },
    props: ['id'],
    methods: {
      listen() {
        Echo.private('App.User.' + this.id)
            .notification(notification => {
               new Noty({
                type: 'success',
                layout: 'bottomLeft',
                timeout: 5000,
                text: notification.name + " " + notification.message
              }).show();

              this.$store.commit("add_not", notification)

              document.getElementById("noty_audio").play()
            })
      }
    }

  }
</script>