<template>
  <div>
    <h1>this is index page</h1>
    <button @click="plusNum">plus</button>
    <p>{{num}}</p>
  </div>
</template>
<script>

import {mapState} from 'vuex'

export default {
  name:'',
  components : {},
  data(){
    return {
      sampleData:''
    };
  },
  computed:{
    ...mapState([
      'num'
    ])
  },
  setup(){},
  created(){},
  mounted(){},
  methods: {
    plusNum(){
      this.$store.commit('plusNum');
    }
  },
}
</script>
<style scoped>

</style>