import Vue from 'vue'
import Vuex from 'vuex'
import youtube_api from "./sync_youtube/youtube_api";
Vue.use(Vuex)

export default new Vuex.Store({
  state: {
  },
  mutations: {
  },
  actions: {
  },
  modules: {
    youtube_api
  }
})
