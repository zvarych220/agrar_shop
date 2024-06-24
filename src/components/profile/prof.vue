<template>
    <section>
        <div class="profil_section">
            <div class="prof-title-container">
                <h2 class="prof-title">
                    <img :src="Xz" alt="" class="xz">Особистий кабінет <img :src="Xz_2" alt="" class="xz">
                </h2>
            </div>
            <div class="profil_menu">
                    <menu_prof />
                <div class="but_menu">
                   
                    <button class="menu-button">
                        <img :src="order" alt="" class="img_but">
                        <p class="text_but">Поточні замовлення</p>
                    </button>
                    <button class="menu-button">
                        <img :src="personal_information" alt="" class="img_but">
                        <p class="text_but">Особисті дані</p>
                    </button>
                    
                    
                    <button class="menu-button">
                        <img :src="history" alt="" class="img_but">
                        <p class="text_but">Історія замовлень</p>
                    </button>
                    <button class="menu-button">
                        <img :src="unlock" alt="" class="img_but">
                        <p class="text_but">Змінити пароль</p>
                    </button>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import history_hover from "@/assets/history-hover.svg";
import history from "@/assets/history.svg";
import order_hover from "@/assets/order-hover.svg";
import order from "@/assets/order.svg";
import personal_information_hover from "@/assets/personal-information-hover.svg";
import personal_information from "@/assets/personal-information.svg";
import unlock_hover from "@/assets/unlock_hover.svg";
import unlock from "@/assets/unlock.svg";
import Xz from "@/assets/xz.svg";
import Xz_2 from "@/assets/xz_2.svg";

import menu_prof from "@/components/profile/comp_prof/menu_prof.vue";

export default {
    components: {menu_prof},
    data() {
        return {
            Xz,
            Xz_2,
            history,
            order,
            unlock,
            personal_information,

           
        };
    },
    methods: {
        setActive(selectedItem) {
            this.menuItems.forEach(item => {
                item.active = item === selectedItem;
            });
        },
    },
};
</script>

<style>
.profil_section {
    display: grid;
    grid-template-columns: 1fr;
    justify-items: center;
    margin-top: -240px;
    margin-bottom: 70px;
}

.menu_profile {
    width: 255px;
    height: 305px;
    margin-right: 15px; 
}

.sidebar-menu {
    list-style: none;
    padding: 0;
    border-radius: 20px;
    background-color: #F4F4F4;
}

.list-link {
    display: flex;
    align-items: center;
    text-decoration: none;
    color: black;
    padding: 20px;
    padding-right: 30px;
    border-radius: 0;
    transition: transform 0.3s ease, background-color 0.3s ease, border-radius 0.3s ease;
}

.list-link img {
    margin-right: 10px;
    transition: transform 0.3s ease;
}

.list-link:hover img,
.list-link.active img {
    transform: scale(1.1);
}

.list-link:hover,
.list-link.active {
    background-color: #84C551;
    border-radius: 20px;
}

.but_menu {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 15px;
    width: 100%; /* Розтягує but_menu на всю ширину контейнера */
}
.profil_menu {
    display: flex; /* Зміна на flex для розміщення на одній лінії */
    justify-content: center; /* Центрування елементів по горизонталі */
    gap: 15px; /* Відступ між елементами */

}

.menu_profile {
    width: 255px;
    height: 305px;
    margin-right: 15px; /* Відступ між секціями menu_profile і but_menu */
}

.menu-button {
    background-color: #1E6140;
    border: none;
    height: 170px;
    width: 400px;
    border-radius: 20px;
    color: #fff;
    text-transform: uppercase;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    align-items: center;
    position: relative;
    padding-bottom: 20px;
    margin-top: 10px;
    transition: background-color 0.3s ease;
}

.menu-button:hover {
    background-color: #84C551;
}

.img_but {
    position: absolute;
    bottom: 15px;
    height: 50px;
    width: 50px;
    transition: filter 0.3s ease;
}

.menu-button img {
    margin-bottom: 60px;
}

.menu-button:hover .img_but {
    filter: brightness(0) invert(1);
}
</style>

