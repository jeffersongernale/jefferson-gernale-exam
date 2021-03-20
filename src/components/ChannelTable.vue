<template>
    <div class="right_panel">
        <table class="channel_table" border="1">
            <thead>
                <tr>
                    <th style="width: 25%">Name</th>
                    <th  style="width: 50%">Description</th>
                    <th style="width: 15%"> Controls</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="row in getChannels" :key="row.id">
                    <td>
                        <div class="name__wrapper">
                             <img :src="row.profile_picture" alt="Image" class="profile_picture">
                            <div class="name__details">
                                <span class="name__details-header">{{row.name}}</span>
                                <br>
                                <span class="name__details-subtext">{{row.subscribers}} Subscribers</span>
                            </div>
                        </div>
                       
                       
                    </td>
                    <td>{{row.description}}</td>
                    <td>
                        <button class="btn-sync" type="button"> Sync Videos</button>
                        <!-- {{row.id}} -->
                    </td>
                </tr>
                
            </tbody>
        </table>
    </div>
</template>

<script>
import {mapGetters} from "vuex"
export default {
    name: "ChannelTable",
    methods:{
        get_channel_info(){
            this.$store.dispatch("get_all_channel_info")
            .then(response => {
                console.log(response);
            })
        }
    },
    mounted() {
        this.get_channel_info()
    },
    computed:{
        ...mapGetters(["getChannels"])
    }
}
</script>

<style lang="scss" scoped>
@import "../assets/sass/general";
@import "../assets/sass/myanimations";
@import "../assets/sass/colors";

.btn-sync{
    background-color: transparent;
    color: $inactive-link;
    border:unset;
    outline: unset;
    font-size: 12px;
}
.btn-sync:hover{
    font-weight:bold;
    cursor:pointer;
}

.name__wrapper{
    display: inline-flex; 
    text-align:left;
}
.right_panel{
    padding: 50px 10px 10px 10px;
    text-align: center;
    float: right;
    width: 55%;
    position: relative; right: -150%;
    animation: slideToLeft 1s;
    animation-fill-mode: forwards;
    animation-delay: 0.3s;

    .channel_table{
        width: 100%;
        border: solid 1px $light-grey;
        border-collapse: collapse;
        border-radius: 10px;
        text-align: center;
        
        th{
            background-color: $inactive-link;
            color: $white;
            padding: 10px;
        }
        td {
            border-bottom: 1px solid $light-grey;
            padding: 10px;

            .profile_picture{
                border-radius: 50%;
                box-shadow: 0 2px 3px $light-grey;
                width: 50px;
                margin-right: 10px;
            }

            .name__details{
               
                &-subtext{
                    font-size: 10px;
                    color: $gray;
                }
                &-header{
                    font-weight: bold;
                }
            }
        }
    }
}


// Small devices (landscape phones, 576px and up)
@media (max-width: 575px) { 
     .right_panel{
        width: 100%;
    }
 }

@media (min-width: 576px) { 
 .right_panel{
        width: 100%;
    }

 }

// Extra large devices (large desktops, 1200px and up)
@media (min-width: 1200px) {  

  .right_panel{
        width: 55%;
    }
}
</style>