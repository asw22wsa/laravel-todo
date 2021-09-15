<template>
  <div>
    <h2>this is test</h2>
    <input v-model="search" type="text" v-on:keyup.enter="searchData">
    <button @click="searchData">search data</button>
    <div :key="i" v-for="(apiData,i) in apiDatas">
      <p>{{ apiData.title }}</p>
      <hr>
    </div>
    <button @click="pageUp">pageUp</button>
  </div>
</template>
<script>
import axios from 'axios';

export default {
  name:'',
  components : {},
  data(){
    return {
      apiDatas:[],
      meta:[],
      page:1,
      search:''
    };
  },
  setup(){},
  created(){
    
  },
  mounted(){
    this.callApiData();
  },
  methods: {
    async callApiData(){
      axios.get("/api/v1/todos/search",{params:{page:this.page,query:this.search}})
      .then(res => {
        this.apiDatas = res.data.data;
        this.meta = res.data.meta;
      })
    },
    pageUp(){
      if(this.page == this.meta.last_page){
        alert("마지막 페이지 입니다.");
      }else{
        this.page = this.page + 1;
        this.callApiData();     
      }
    },
    searchData(){
      this.page = 1;
      this.callApiData();
    }
  },

}
</script>
<style scoped>

</style>