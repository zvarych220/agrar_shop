<template>
    <section class="footer">
        <div class="section-footer">
            <div class="footer-elements">
                <div class="logo_brend">
                    <img :src="Logo_brend" alt="" class="logo_brend_img">
                    <p class="logo_brend_text">Пропонуємо покупцям широкий вибір насіння овочів</p>
                </div>
                <div class="information">
                    <h2 class="information-title">Інформація</h2>
                    <ul class="information-list">
                        <li>Про компанію</li>
                        <li>Оплата і доставка</li>
                        <li>Партнери</li>
                    </ul>
                </div>

                <div class="Goods">
                    <h2 class="Goods-title">Товари</h2>
                    <ul class="Goods-list">
                        <li>Каталог продукції</li>
                        <li>Засоби захисту рослин</li>
                        <li>Насіння</li>
                        <li>Добрива</li>
                        <li>Агроному в поміч</li>
                    </ul>
                </div>

                <div class="Contacts">
                    <h2 class="Contacts-title">Контакти</h2>
                    <div>
                        <PhoneLogik />
                        <Email />
                    </div>
                </div>
            </div>
        </div>
        <p class="footer-DAT">© 2022 DAT</p>
    </section>
</template>

<script>
import Logo_brend from '../assets/Logo-brend.svg';

import PhoneLogik from './PhoneLogik.vue';
import Email from './Email.vue';
export default {
    components: {
        PhoneLogik,
        Email
    },
    data() {
        return {
            Logo_brend,
        }
    }
}
</script>

<style>
:root {
    --font-family: "Montserrat", sans-serif;
    --second-family: "Roboto", sans-serif;
}
.footer{
    padding-top: 50px;
    background-color: #fff;
}


.footer-elements {
    margin-bottom: 118px;

    display: flex;
    justify-content: space-between;
    gap: 70px; 
}

.logo_brend_img {
    width: 109px;
    height: 49px;
}

.logo_brend_text {
    width: 215px;
    height: 66px;
    font-family: var(--font-family);
    font-weight: 400;
    font-size: 16px;
    color: rgba(0, 0, 0, 0.6);
}

.information-title,
.Goods-title,
.Contacts-title {
    font-weight: 600;
    font-size: 18px;
    color: #000;
    font-family: var(--font-family);
}

.information-list,
.Goods-list,
.Contacts-list {
    margin-left: 15px;
    font-weight: 400;
    font-size: 18px;
    color: #000;
    font-family: var(--font-family);
    list-style: none;
    padding: 0;
}

.information-list li,
.Goods-list li {
    margin-top: 10px;
}

.Contacts div {
    margin-left: -40px;
}

.information-list li:hover,
.Goods-list li:hover,
.Contacts-list li:hover {
    color: #84BE51;
}

.section-footer {
    display: flex;
    flex-direction: column;
    align-items: center;
    border-bottom: 1px solid rgba(0, 0, 0, 0.2);
}

.footer-DAT {
    margin-top: 20px;
    font-family: var(--font-family);
    font-weight: 400;
    font-size: 14px;
    color: rgba(0, 0, 0, 0.6);
    text-align: center;
}

</style>