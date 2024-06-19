<template>
    <section>
        <div class="profil_section">
            <div class="prof-title-container">
                <h2 class="prof-title">
                    <img :src="Xz" alt="" class="xz">Особистий кабінет <img :src="Xz_2" alt="" class="xz">
                </h2>
            </div>
            <div class="profil_menu">
                <div class="menu_profile">
                    <ul class="sidebar-menu">
                        <li class="menu-list" v-for="item in menuItems" :key="item.id">
                            <a href="#" class="list-link" 
                               :class="{ active: item.active }"
                               @mouseover="item.hover = true" 
                               @mouseleave="item.hover = false" 
                               @click.prevent="setActive(item)">
                                <img :src="item.hover || item.active ? item.hoverImage : item.image" alt="">
                                {{ item.text }}
                            </a>
                        </li>
                    </ul>
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
import profil_hover from "@/assets/profil-hover.svg";
import profil from "@/assets/profile.svg";
import unlock_hover from "@/assets/unlock_hover.svg";
import unlock from "@/assets/unlock.svg";
import Xz from "@/assets/xz.svg";
import Xz_2 from "@/assets/xz_2.svg";

export default {
    data() {
        return {
            Xz,
            Xz_2,
            menuItems: [
                {
                    id: 1,
                    text: "Mій кабінет",
                    image: profil,
                    hoverImage: profil_hover,
                    hover: false,
                    active: false,
                },
                {
                    id: 2,
                    text: "Поточні замовлення",
                    image: order,
                    hoverImage: order_hover,
                    hover: false,
                    active: false,
                },
                {
                    id: 3,
                    text: "Особисті дані",
                    image: personal_information,
                    hoverImage: personal_information_hover,
                    hover: false,
                    active: false,
                },
                {
                    id: 4,
                    text: "Змінити пароль",
                    image: unlock,
                    hoverImage: unlock_hover,
                    hover: false,
                    active: false,
                },
                {
                    id: 5,
                    text: "Історія замовлень",
                    image: history,
                    hoverImage: history_hover,
                    hover: false,
                    active: false,
                },
            ],
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
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: -240px;
}

.menu_profile {
    width: 255px;
    height: 305px;
}

.sidebar-menu {
    list-style: none;
    padding: 0;
    border-radius: 20px;
    background-color: #ECECEC;
}

.list-link {
    display: flex;
    align-items: center;
    text-decoration: none;
    color: black;
    padding: 20px;
    padding-right: 30px;
    border-radius: 0; /* Initial border radius */
    transition: transform 0.3s ease, background-color 0.3s ease, border-radius 0.3s ease; /* Added border-radius transition */
}

.list-link img {
    margin-right: 10px;
    transition: transform 0.3s ease; /* Transition for the image */
}

.list-link:hover img, .list-link.active img {
    transform: scale(1.1); /* Enlarge image on hover */
}

.list-link:hover, .list-link.active {
    background-color: #84C551;
    border-radius: 20px; /* Rounded corners on hover */
}
</style>
