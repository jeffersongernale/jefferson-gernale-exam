
import axios from "axios";
export default {
  state: {

  },

  mutations: {

  },

  actions: {
    async get_channel_info ({commit}) {
        return new Promise((resolve, reject) => {
            axios.get("http://localhost/codalify/php/controllers/sync_youtube_channel.php/getYoutubeChannelInfo").then(response => {
                console.log(response);
            })
        })
    }
  },

  getters: {

  }
}
