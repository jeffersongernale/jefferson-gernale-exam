<template>
    <div class="container" v-show="get_list_video_view">
        <div class="mymodal">
            <div class="mymodal__header">
              List of Videos
            <div style="float:right;"><button class="btn-times" type="button" @click="hideListCard()">&times;</button></div>

            </div>
            <div class="mymodal__body">
                <table class="list_videos_table">
                    <thead>
                        <th style="width: 20%">Thumbnail</th>
                        <th>Title</th>
                    </thead>
                    <tbody>
                        <tr v-if="active_video_count == 0">
                            <td colspan="2" style="text-align: center"> 
                                <img src="@/assets/images/nothing.svg" alt="nothing" class="image-nothing">
                                <br>
                                <span class="video_subtext">No Videos to Display.</span> 
                            </td>
                        </tr>
                        <tr v-for="row in get_active_channel_video" :key="row.id">
                            <td>
                                <a :href="row.video_link" target="_blank">
                                    <img :src="row.thumbnail" alt="Thumbanil Image"/>
                                </a>
                            </td>
                            <td>
                                <a :href="row.video_link" target="_blank">
                                    <span class="video_header">{{row.title}}</span> <br>
                                   
                                </a>
                                 <span class="video_subtext">{{row.description}}</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import {mapGetters} from "vuex"
export default {
    name: "ListofVideos",
    computed: {
        ...mapGetters(["get_list_video_view", "get_active_channel_video"]),
        active_video_count(){
            return this.get_active_channel_video.length;
        }
    },
    methods: {
        hideListCard()
        {
            this.$store.dispatch("hideListVideoCard")
        },
 
    }
}
</script>

<style lang="scss" scoped>
@import "../assets/sass/general";
@import "../assets/sass/myanimations";
@import "../assets/sass/colors";

    .container
    {   
        align-items: center;
        background: rgba(0, 0, 0, 0.5);
        bottom: 0;
        display: block;
        justify-content: center;
        left: 0;
        position: fixed;
        right: 0;
        top: 0;
        z-index: 100;
        overflow: auto;
        transition: 1s ease-in-out;
        animation: fadeIn 0.5s;
        .mymodal{
            background: white;
            border-top:5px solid $inactive-link;
            width: 60%;
            position: relative; 
            top: 10%;
            left: 20%;
            bottom: 10%;
            &__header
            {
                font-size: 20px;
                color: $black;
                font-weight: bold;
                padding: 10px;

                .btn-times{
                    background-color: transparent;
                    color: $inactive-link;
                    border:unset;
                    outline: unset;
                    font-size: 25px;
                    font-weight: bold;
                    cursor: pointer;
                }

            }
            &__body {
                .list_videos_table {
                    width: 100%;
                    border: solid 1px $light-grey;
                    border-collapse: collapse;
                    border-radius: 10px;
                    text-align: left;
                    background-color: $white;

                    // border: solid 3px red;
                     th{
                        background-color: $inactive-link;
                        color: $white;
                        padding: 10px;
                    }
                    td {
                        border-bottom: 1px solid $light-grey;
                        padding: 10px;
                        
                        .image-nothing {
                            width: 250px;
                        }

                        .video_header {
                            font-weight: bold;
                        }
                        .video_subtext {
                            font-size: 10px;
                            color: $gray;

                        }
                    }
                }
            }
        }
    }
</style>