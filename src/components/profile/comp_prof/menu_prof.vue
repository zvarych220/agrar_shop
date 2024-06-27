<template>
    <div class="menu_profile">
        <ul class="sidebar-menu">
            <li class="menu-list" v-for="item in menuItems" :key="item.id">
                <a href="#" class="list-link" :class="{ active: item.active }" @mouseover="item.hover = true"
                    @mouseleave="item.hover = false" @click.prevent="setActive(item)">
                    <img :src="item.hover || item.active ? item.hoverImage : item.image" alt="">
                    {{ item.text }}
                </a>
            </li>
        </ul>
    </div>
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
import groupImage from '@/assets/Group.svg';
import un_log from '@/assets/un_log.svg';

export default {
    data() {
        return {
            menuItems: [
                {
                    id: 1,
                    text: "Mій кабінет",
                    image: personal_information,
                    hoverImage: personal_information_hover,
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
                {
                    id: 6,
                    text: "Вихід",
                    image: groupImage,
                    hoverImage: un_log,
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
            if (selectedItem.id === 6) {
                this.logout();
            }
            else if (selectedItem.id === 4) {
                this.reset_pass();
            }
        },
        logout() {
            console.log("Logging out...");

            localStorage.removeItem('token');


            window.location.href = "/login";
        },
        reset_pass() {
            window.location.href = "/reset_pas";
        },

    },
};
</script>
<style>
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
</style>