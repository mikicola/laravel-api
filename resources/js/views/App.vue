<template>
  <div>
      <header-section></header-section>
      <card></card>
  </div>
</template>

<script>
    import HeaderSection from '../components/HeaderSection.vue';
    import Card from '../components/Card.vue';

export default {
    name: 'App',
    components: {
        HeaderSection,
        Card
    }
}
</script>

<style>

</style>
