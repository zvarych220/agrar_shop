<template>
    <section class="seed">
        <div class="seed-container">
            <div class="section">
                <div class="seed-container-title">
                    <h2 class="product-title">
                        <img :src="Xz" alt="Xz" /> Засоби захисту рослин
                    </h2>
                </div>
                <div class="seed-container-info">

                    <p>Засоби захисту рослин поділяють на чотири основні види: механічні, хімічні, біологічні та
                        агротехнічні. Проте найраціональніше - це їх одночасне, правильне поєднання. Найпоширеніший
                        метод - це хімічний. Існують тисячі різних видів препаратів хімічного захисту. Але не варто їх
                        плутати, а тим більше об′єднувати з хімічними добривами. Методи їх впливу на рослини абсолютно
                        протилежні.
                    </p>

                    <p>Необхідно знати і розрізняти хімічні засоби захисту рослин. Адже ці препарати мають суоро
                        визначений об′єкт впливу (збудник хвороби, комахи-шкідники, вид або родина бур′янів).
                    </p>

                    <p>Отрутохімікати не терплять халатності. Це той тип препарату, який недостатньо просто розвести у
                        воді і обприскати ним рослини. Якщо отрутохімікати неправильно застосувати, то вони можуть
                        завдати шкоди вам, корисним комахам, урожаю.</p>
                </div>
            </div>
        </div>

    </section>
</template>

<script>
import Xz from "@/assets/xz.svg";

export default {

    data() {
        return {
            Xz,
        };
    }
};
</script>

<style scoped>


:root {
    --font-family: "Montserrat", sans-serif;
    --second-family: "Roboto", sans-serif;
}

.section {
    margin-left: 425px;
    margin-right: 425px;
    height: 450px;
}

.seed-container {
    background-image: url(@/assets/Plants_protecting_tools-info-bg.png);
    background-size: cover;
    background-position: center;
}

.product-title {
    padding-top: 100px;
    color: rgb(255, 255, 255);
    font-family: '--font-family';
    font-size: 45px;
    font-weight: 700;
    line-height: 55px;
    letter-spacing: 0%;
    text-align: left;
}

.seed-container-info {
    padding-bottom: 50px;
    color: rgb(255, 255, 255);
    font-family: '--font-family';
    font-size: 16px;
    font-weight: 400;
    line-height: 20px;
    letter-spacing: 0%;
    text-align: left;
}
</style>