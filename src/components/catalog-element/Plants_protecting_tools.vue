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
                    <div class="Plants_protecting_tools-categorii-elemets girbiciudu">
                        <div class="Plants_protecting_tools-categorii-elemets-title">Гербіциди</div>
                    </div>
                    <div class="Plants_protecting_tools-categorii-elemets fyngicudu">
                        <div class="Plants_protecting_tools-categorii-elemets-title">Фунгіциди</div>
                    </div>
                    <div class="Plants_protecting_tools-categorii-elemets insectucudu">
                        <div class="Plants_protecting_tools-categorii-elemets-title">Інсектициди</div>
                    </div>
                    <div class="Plants_protecting_tools-categorii-elemets desukantu">
                        <div class="Plants_protecting_tools-categorii-elemets-title">Десиканти</div>
                    </div>
                    <div class="Plants_protecting_tools-categorii-elemets Protryuvach">
                        <div class="Plants_protecting_tools-categorii-elemets-title">Протруювачі</div>
                    </div>
                    <div class="Plants_protecting_tools-categorii-elemets Rodentrucudu">
                        <div class="Plants_protecting_tools-categorii-elemets-title">Родентицити</div>
                    </div>
                    <div class="Plants_protecting_tools-categorii-elemets retandantu">
                        <div class="Plants_protecting_tools-categorii-elemets-title">Ретарданти</div>
                    </div>
                    <div class="Plants_protecting_tools-categorii-elemets Aduvantu">
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
}

.Plants_protecting_tools-categorii-elemets:hover {
    transform: scale(1.1);
}

.Plants_protecting_tools-categorii-elemets.girbiciudu {
    background-image: url('@/assets/gerbicudu.png');
}

.Plants_protecting_tools-categorii-elemets.fyngicudu {
    background-image: url('@/assets/fyngicudu.png');
}

.Plants_protecting_tools-categorii-elemets.insectucudu {
    background-image: url('@/assets/insectucudu.png');
}

.Plants_protecting_tools-categorii-elemets.desukantu {
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
