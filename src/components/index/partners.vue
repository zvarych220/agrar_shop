<template>
  <section>
    <div class="partners">
      <h2 class="product-title">
        <img :src="Xz" alt="Xz" /> Партнери <img :src="Xz_2" alt="Xz_2" />
      </h2>
      <div class="partners-section">
        <button
          class="btn-left"
          @click="previous"
          @mouseover="leftImage = left_hover"
          @mouseleave="leftImage = left"
        >
          <img :src="leftImage" alt="Left Arrow" />
        </button>
        <div class="partners-list">
          <div
            class="partners-container"
            v-for="(partner, index) in displayedPartners"
            :key="index"
          >
            <img :src="partner" alt="" />
          </div>
        </div>
        <button
          class="btn-right"
          @click="next"
          @mouseover="rightImage = right_hover"
          @mouseleave="rightImage = right"
        >
          <img :src="rightImage" alt="Right Arrow" />
        </button>
      </div>
    </div>
  </section>
</template>

<script>
import Xz from "@/assets/xz.svg";
import Xz_2 from "@/assets/xz_2.svg";
import left from "@/assets/slider/left.svg";
import right from "@/assets/slider/right.svg";
import left_hover from "@/assets/slider/left-hover.svg";
import right_hover from "@/assets/slider/right-hover.svg";

import partners_1 from "@/assets/partners/partners_1.png";
import partners_2 from "@/assets/partners/partners_2.png";
import partners_3 from "@/assets/partners/partners_3.png";
import partners_4 from "@/assets/partners/partners_4.png";
import partners_5 from "@/assets/partners/partners_5.png";
import partners_6 from "@/assets/partners/partners_6.png";

export default {
  data() {
    return {
      Xz,
      Xz_2,
      left,
      right,
      left_hover,
      right_hover,
      partners: [
        partners_1,
        partners_2,
        partners_3,
        partners_4,
        partners_5,
        partners_6
      ],
      leftImage: left,
      rightImage: right,
      currentIndex: 0
    };
  },
  computed: {
    displayedPartners() {
      const partnersToShow = 5;
      const extendedPartners = [...this.partners, ...this.partners];
      const startIndex = this.currentIndex % this.partners.length;
      return extendedPartners.slice(startIndex, startIndex + partnersToShow);
    }
  },
  methods: {
    next() {
      this.currentIndex = (this.currentIndex + 1) % this.partners.length;
    },
    previous() {
      this.currentIndex = (this.currentIndex - 1 + this.partners.length) % this.partners.length;
    }
  }
};
</script>

<style>
:root {
  --font-family: "Montserrat", sans-serif;
  --second-family: "Roboto", sans-serif;
}

.partners {
  height: 400px;
  background-color: #f8f8f8;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

.product-title {
  font-family: var(--font-family);
  font-weight: 700;
  font-size: 45px;
  color: #000;
  text-align: center;
  margin: 0;
  margin-bottom: 25px;
} 

.partners-section {
  display: flex;
  align-items: center;
  position: relative;
}

.btn-right,
.btn-left {
  border: none;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 0;
  background-color: rgba(0, 0, 0, 0);
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  z-index: 1;
}

.btn-left {
  left: -145px; /* Added space to minimize the gap */
}

.btn-right {
  right: -145px; /* Added space to minimize the gap */
}

.partners-list {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 20px; /* Adjust the gap between items as needed */
  overflow: hidden;
  width: 100%;
}

.partners-container {
  display: flex;
  justify-content: center; /* Center the content horizontally */
  align-items: center; /* Center the content vertically */
  width: 200px;
  height: 100px;
  border-radius: 20px;
  background: rgb(255, 255, 255);
}

.partners-container img {
  max-width: 100%;
  max-height: 100%;
  object-fit: contain;
}
</style>
