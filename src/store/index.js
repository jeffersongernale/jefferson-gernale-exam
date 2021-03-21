import Vue from 'vue'
import Vuex from 'vuex'
import youtube_channels from "./channels/youtube_channels";
import youtube_videos from "./videos/youtube_videos";
import general from "./general";
Vue.use(Vuex)

export default new Vuex.Store({
  state: {
  },
  mutations: {
  },
  actions: {
  },
  modules: {
    youtube_channels,
    youtube_videos,
    general
  }
})
