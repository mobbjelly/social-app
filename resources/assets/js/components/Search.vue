<template>
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-lg-offset-3">
        <input type="text" v-model="query" class="input-lg form-control" placeholder="Search for other users" @keyup.enter="search()">
        <br>
        <hr>
        <div class="row" v-if="results.length">
          <div class="text-center" v-for="user in results">
            <img :src="user.avatar" alt="" width="50px" height="50px" class="search-user">
            <h4 class="text-center">{{ user.name }}</h4>
            <friend :profile_user_id="user.id"></friend>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
  import Friend from './Friend.vue'
  var algoliasearch = require('algoliasearch');
  var client = algoliasearch("MWWZ8W43L8", "7280d0e1c14e637867948901643b142e");
  var index = client.initIndex('users');
  export default {
    mounted() {
      
    },
    components: {
      Friend
    },
    data() {
      return {
        query: '',
        results: []
      }
    },
    methods: {
      search() {
        index.search(this.query, (err, content) => {
          this.results = content.hits
        })
      }
    }
  }
</script>

<style>
  .search-user {
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
  }
</style>