<template>
  <div>
    <Header />
      <router-view></router-view>
    <Footer />
  </div>
</template>
<script>
import Header from '../inc/header.vue'
import Footer from '../inc/footer.vue'
export default {
  name:'',
  components : {Header,Footer},
  data(){
    return {
      sampleData:''
    };
  },
  setup(){},
  created(){},
  mounted(){},
  methods: {
  },
}
</script>
<style scoped>

</style>