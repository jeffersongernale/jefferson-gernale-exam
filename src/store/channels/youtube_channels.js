
import axios from "axios";
export default {
  state: {
    channels : []
  },

  mutations: {
    setChannelList(state, channels) {
        state.channels = channels;
      },
  },

  actions: {
   
    async store_channel_info({commit}, payload){
        return new Promise((resolve, reject) => {
            axios.post("/php/controllers/sync_youtube_channel.php/storeYoutubeChannelInfo", payload)
            .then(response => {
                console.log(response);
                resolve(response)
            }).catch(error=> {
                reject(error.response)
            })
        })
    }, 
    async get_all_channel_info({commit}){
        return new Promise((resolve, reject) => {
            axios.get("/php/controllers/youtube_channel_json.php/retrieveYTChannelInfo")
            .then(response => {
                resolve(response)
                commit("setChannelList", response.data)
            })
            .catch(error => {
                reject(error.response)
            })
        });
    }
  
  },

  getters: {
    getChannels: state => state.channels,
  }
}
