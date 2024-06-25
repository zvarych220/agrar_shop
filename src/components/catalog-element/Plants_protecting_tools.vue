<template>
  <section>
    <div class="section">
      <div class="Plants_protecting_tools">
        <div class="Plants_protecting_tools-title">
          <h1 class="Plants-title">
            <img :src="Xz" alt="Xz" /> Засоби захисту рослин <img :src="Xz_2" alt="Xz_2" />
          </h1>
        </div>
        <div class="Plants_protecting_tools-categorii">
          <div class="Plants_protecting_tools-categorii-elemets girbicidu" @click="navigateToGoods('/gerbicidu')">
            <div class="Plants_protecting_tools-categorii-elemets-title">Гербіциди</div>
          </div>
          <div class="Plants_protecting_tools-categorii-elemets fyngicudu" @click="navigateToGoods('/fungicidu')">
            <div class="Plants_protecting_tools-categorii-elemets-title">Фунгіциди</div>
          </div>
          <div class="Plants_protecting_tools-categorii-elemets insecticidu" @click="navigateToGoods('/insecticidu')">
            <div class="Plants_protecting_tools-categorii-elemets-title">Інсектициди</div>
          </div>
          <div class="Plants_protecting_tools-categorii-elemets desicantu" @click="navigateToGoods('/desicantu')">
            <div class="Plants_protecting_tools-categorii-elemets-title">Десиканти</div>
          </div>
          <div class="Plants_protecting_tools-categorii-elemets Protryuvach" @click="navigateToGoods('/protruvach')">
            <div class="Plants_protecting_tools-categorii-elemets-title">Протруювачі</div>
          </div>
          <div class="Plants_protecting_tools-categorii-elemets Rodentrucudu" @click="navigateToGoods('/rodenticidu')">
            <div class="Plants_protecting_tools-categorii-elemets-title">Родентицити</div>
          </div>
          <div class="Plants_protecting_tools-categorii-elemets retandantu" @click="navigateToGoods('/retardantu')">
            <div class="Plants_protecting_tools-categorii-elemets-title">Ретарданти</div>
          </div>
          <div class="Plants_protecting_tools-categorii-elemets Aduvantu" @click="navigateToGoods('/adjuvantu')">
            <div class="Plants_protecting_tools-categorii-elemets-title">Ад’юванти</div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import Xz from "@/assets/xz.svg";
import Xz_2 from "@/assets/xz_2.svg";

export default {
  data() {
    return {
      Xz,
      Xz_2,
    };
  },
  methods: {
    navigateToGoods(route) {
      this.$router.push(route).catch(err => {
        if (err.name !== 'NavigationDuplicated') {
          console.error(err);
        }
      });
    }
  }
};
</script>

<style>
.section {
    margin-left: 405px;
    margin-right: 405px;
    margin-bottom: 120px;
}

:root {
    --font-family: "Montserrat", sans-serif;
    --second-family: "Roboto", sans-serif;
}

.Plants_protecting_tools {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 500px;
    margin-top: -180px;
}

.Plants_protecting_tools-title {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    margin-bottom: 20px;
}

.Plants-title {
    font-weight: 700;
    font-size: 45px;
    color: #000;
    font-family: var(--font-family);
    text-align: center;
    margin-top: 0;
}

.Plants_protecting_tools-categorii {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 20px;
    justify-items: center;
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
}

.Plants_protecting_tools-categorii-elemets {
    position: relative;
    background-size: cover;
    background-position: center;
    width: 100%;
    height: 175px;
    display: flex;
    justify-content: center;
    align-items: flex-end;
    transition: transform 0.3s ease;
    cursor: pointer;
}

.Plants_protecting_tools-categorii-elemets:hover {
    transform: scale(1.1);
}

.Plants_protecting_tools-categorii-elemets.girbicidu {
    background-image: url('@/assets/gerbicudu.png');
}


.Plants_protecting_tools-categorii-elemets.fyngicudu {
    background-image: url('@/assets/fyngicudu.png');
}

.Plants_protecting_tools-categorii-elemets.insecticidu {
    background-image: url('@/assets/insectucudu.png');
}

.Plants_protecting_tools-categorii-elemets.desicantu {
    background-image: url('@/assets/desukantu.png');
}

.Plants_protecting_tools-categorii-elemets.Protryuvach {
    background-image: url('@/assets/Protryuvach.png');
}

.Plants_protecting_tools-categorii-elemets.Rodentrucudu {
    background-image: url('@/assets/Rodentrucudu.png');
}

.Plants_protecting_tools-categorii-elemets.retandantu {
    background-image: url('@/assets/retandantu.png');
}

.Plants_protecting_tools-categorii-elemets.Aduvantu {
    background-image: url('@/assets/Aduvantu.png');
}

.Plants_protecting_tools-categorii-elemets-title {
    position: absolute;
    border-radius: 20px;
    bottom: 8px;
    left: 2px;
    width: 255px;
    height: 49px;
    text-align: center;
    color: #000;
    background-color: rgba(255, 255, 255, 0.8);
    display: flex;
    justify-content: center;
    align-items: center;
    font-weight: 600;
    font-size: 22px;
    font-family: var(--font-family);
}
</style>
