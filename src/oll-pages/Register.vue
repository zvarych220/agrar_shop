<template>
  <div class="main-container">
      <Menu />
      <Reg />
      <Footer />
  </div>
</template>

<script>
import Menu from '@/components/Menu.vue';
import Footer from '@/components/footer.vue';
import Reg from '@/components/register/reg.vue';

export default {
  components: {
      Menu,
      Footer,
      Reg
  },
  data() {
      return {};
  }
};
</script>

<style>
.main-container {
  background-image: url('@/assets/register_bg.png');
  background-size: cover;
  background-position: center top;
  background-repeat: no-repeat;
  height: 100%;

  flex-direction: column;

}

.main-container > * {
  z-index: 1;
}





</style>
