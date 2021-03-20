<template>
  <div class="home">
    <welcome-banner/>
  </div>
</template>

<script>
// @ is an alias to /src
import WelcomeBanner from '@/components/WelcomeBanner.vue';

export default {
  name: 'Home',
  components: {
    WelcomeBanner
  }
}
</script>

<style lang="scss">

</style>
