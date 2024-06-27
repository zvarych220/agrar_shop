<template>
    <div class="main-container">
        <Menu />
        <div class="main">
            <div class="menu_z">
                <menu_prof />
            </div>
            <unlock_comp />
        </div>
        <Footer />
    </div>
</template>

<script>
import Menu from '@/components/Menu.vue';
import Footer from '@/components/footer.vue';
import unlock_comp from "@/components/profile/profil-pages/profil-pages_comp/unlock_comp.vue";
import menu_prof from "@/components/profile/comp_prof/menu_prof.vue";
export default {
    components: {
        Menu,
        Footer,
        unlock_comp,
        menu_prof
    },
    data() {
        return {};
    }
};
</script>

<style>
.main {

    margin-top: -100px;
    padding-bottom: 100px;
}
.main {
    display: flex; /* Зміна на flex для розміщення на одній лінії */
    justify-content: center; /* Центрування елементів по горизонталі */
    gap: 15px; /* Відступ між елементами */

}
</style>