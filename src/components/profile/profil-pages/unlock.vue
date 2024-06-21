<template>
    <div class="main-container">
        <Menu />
        <div class="main">
            <unlock_comp />
        </div>
        <Footer />
    </div>
</template>

<script>
import Menu from '@/components/Menu.vue';
import Footer from '@/components/footer.vue';
import unlock_comp from "@/components/profile/profil-pages/profil-pages_comp/unlock_comp.vue";

export default {
    components: {
        Menu,
        Footer,
        unlock_comp
    },
    data() {
        return {};
    }
};
</script>

<style>
.main{
    margin-left: 200px;
    margin-top: -100px;
    padding-bottom:100px ;
}
</style>