
import axios from "axios";
export default {
  state: {
    list_card_visibility : false,
    active_channel_video : []
  },

  mutations: {
    set_list_card_visibility(state, value) {
        state.list_card_visibility = !state.list_card_visibility
    },
    set_active_channel_video(state, value) {
        state.active_channel_video = value
    }
  },

  actions: {
  
    async sync_channel_videos({commit}, payload){
      
        return new Promise((resolve, reject) => {
            axios.post("/php/controllers/sync_youtube_channel.php/storeYTvideos", payload)
            .then(response => {
                resolve(response)
            })
            .catch(error => {
                reject(error.response)
            })
        });
    },

    async get_videos(state, payload){
        return new Promise((resolve, reject) => {
            axios.get("/php/controllers/youtube_channel_json.php/retrieveVideos", {params: payload})
            .then(response => {
                console.log(response);
            })
        })
    },
    
    async viewListVideoCard({commit}, payload){
        return new Promise((resolve, reject) => {
            axios.get("/php/controllers/youtube_channel_json.php/retrieveVideos", {params: payload})
            .then(response => {
                console.log(response);
                commit("set_list_card_visibility", true)
                commit("set_active_channel_video", response.data)
            })
        })
       
    },
    async hideListVideoCard({commit})
    {
        commit("set_list_card_visibility", false)
    }
  },

  getters: {
    get_list_video_view : state => state.list_card_visibility,
    get_active_channel_video : state => state.active_channel_video
  }
}
