<template>
  <div>
      <header-section></header-section>
      <card-post></card-post>
  </div>
</template>

<script>
    import HeaderSection from '../components/HeaderSection.vue';
    import CardPost from '../components/CardPost.vue';

export default {
    name: 'App',
    components: {
        HeaderSection,
        CardPost
    }
}
</script>

<style>

</style>
