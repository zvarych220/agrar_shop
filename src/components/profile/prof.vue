<template>
    <section>
        <div class="profil_section">
            <div class="prof-title-container">
                <h2 class="prof-title">
                    <img :src="Xz" alt="" class="xz">Особистий кабінет <img :src="Xz_2" alt="" class="xz">
                </h2>
            </div>
            <div class="menu_profile">
                <ul class="sidebar-menu">
                    
                </ul>
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
            history_hover,
            history,
            order_hover,
            order,
            personal_information_hover,
            personal_information,
            profil_hover,
            profil,
            unlock_hover,
            unlock,
        };
    },
}
</script>

<style>
.profil_section{
    margin-top: -240px;
    display: flex;
    justify-content: center; 
    align-items: center;
}

</style>