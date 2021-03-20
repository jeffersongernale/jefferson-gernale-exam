<template>
  <div class="about">
    <h1>This is an about page</h1>sync_youtube_channels
  </div>
</template>

<script>
export default {
  name: "Videos", 
  methods: {
    sync_youtube_channels(){
      this.$store.dispatch("get_channel_info");
    }
  }
}
</script>
