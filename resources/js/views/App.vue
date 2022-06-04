<template>
  <div>
      <header-section></header-section>
      <container-posts></container-posts>
  </div>
</template>

<script>
    import HeaderSection from '../components/HeaderSection.vue';
    import ContainerPosts from '../components/ContainerPosts.vue';

export default {
    name: 'App',
    components: {
        HeaderSection,
        ContainerPosts
    }
}
</script>

<style>

</style>
