<template>
     <div class="left_panel">
        <div class="left_panel__card">
            <div class="left_panel__card-title">
                Input Channel
            </div>
            <img src="@/assets/images/videographer.svg" class="left_panel__card-image"/>
            <div class="left_panel__card-body">
                Check the latest videos to your favorite channels by registering them to our website.
                <br>
                <br>
                <form id="form_store_channel" style="line-height: 30px;" method="post" @submit="addChannel">
                    <label class="mb-4"><b>Register Channel ID: </b></label> <br>
                    <small>example:  UCWJ2lWNubArHWmf3FIHbfcQ</small>
                    <input v-model="channel_id" type="text" class="form-inputs" placeholder="Input text here..." name="txt_channel_id"> <br>
                    <label class="error-msg" v-if="channel_id_error!=null">{{channel_id_error}}</label>
                    <label class="success-msg" v-if="channel_id_success!=null">{{channel_id_success}}</label><br>
                    <button type="submit" class="btn-primary" style="margin-top: 20px; width: 50%;">Submit</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "AddChannels",
     data(){
        return{
            channel_id : null,
            channel_id_error: null,
            channel_id_success: null,
        }
    },

    methods: {
        addChannel(e){
            e.preventDefault();
            if(this.channel_id != null)
            {
                this.channel_id_error = null;
                this.channel_id_success = null;
                let formData = new FormData(document.getElementById("form_store_channel"))
                this.$store.dispatch("store_channel_info", formData)
                .then(response => {
                    if(response.data === 1 ){
                        this.channel_id_success = "New Channel Added Successfully";
                        this.channel_id = null;
                        this.get_channel_info();
                    }   
                    else{
                        this.channel_id_error = response.data;
                        this.channel_id = null;
                    }
                })
            }
            else
            {
                this.channel_id_error = "*Please input channel ID";
            }
        },
        get_channel_info(){
            this.$store.dispatch("get_all_channel_info")
            .then(response => {
                console.log(response);
            })
        }
    }
}
</script>
<style lang="scss" scoped>
@import "../assets/sass/general";
@import "../assets/sass/myanimations";
@import "../assets/sass/colors";

.left_panel{
    padding: 50px 10px 10px 10px;
    text-align: center;
    // border: solid 3px red;
    float: left;
    width: 40%;
    position: relative;

    &__card {
        margin: 0 auto;
        background-color: $white;
        width: 20rem;
        border-radius: 10px;
        box-shadow: 0 2px 4px $light-grey;
        padding-bottom: 20px;
        opacity: 0;
        animation: fadeIn 1s;
        animation-fill-mode: forwards;
        &-image{
            width: 90%;
        }
        &-title{
            background-color: $inactive-link;
            color: $white;
            padding: 10px;
            border-radius: 10px 10px 0px 0px;
            margin-bottom: 10px;
        }
        &-body{
            color: $gray;
            padding: 20px;
        }

    }
}


// Small devices (landscape phones, 576px and up)
@media (max-width: 575px) { 
    .left_panel{
        width: 100%;
    }
 }

@media (min-width: 576px) { 
.left_panel{
        width: 100%;
    }

 }

// Extra large devices (large desktops, 1200px and up)
@media (min-width: 1200px) {  
  .left_panel
  {
        width: 40%;
  } 
}
</style>