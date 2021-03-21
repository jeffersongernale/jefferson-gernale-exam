
import axios from "axios";
export default {
  state: {
  },

  mutations: {

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
    }
  },

  getters: {
 
  }
}
