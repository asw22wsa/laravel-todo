import Vuex from 'vuex'
import Vue from 'vue'
Vue.use(Vuex)

const store = new Vuex.Store({
  state:{
    num : 0
  },
  mutations:{
    plusNum(){
      this.state.num = this.state.num + 1
    }
  },
  getters:{

  },
  actions:{

  }
})

export default store;