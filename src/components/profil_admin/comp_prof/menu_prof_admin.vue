<template>
    <div class="menu_profile">
        <ul class="sidebar-menu">
            <li class="menu-list" v-for="item in menuItems" :key="item.id">
                <a href="#" class="list-link" :class="{ active: item.active }"
                    @mouseover="item.hover = true" @mouseleave="item.hover = false"
                    @click.prevent="setActive(item)">
                    {{ item.text }}
                </a>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {
            menuItems: [
                {
                    id: 1,
                    text: "Mій кабінет",
                    hover: false,
                    active: false
                },
                {
                    id: 2,
                    text: "Поточні замовлення",
                    hover: false,
                    active: false
                },
                {
                    id: 3,
                    text: "Додати товар",
                    hover: false,
                    active: false
                },
                {
                    id: 4,
                    text: "Додати адміна",
                    hover: false,
                    active: false
                },
                {
                    id: 5,
                    text: "Вихід",
                    hover: false,
                    active: false
                },
                
                
            ],
        };
    },
    methods: {
        setActive(selectedItem) {
            this.menuItems.forEach(item => {
                item.active = item === selectedItem;
            });
            if (selectedItem.id === 5) {
                this.logout();
            }
            else if (selectedItem.id === 3){
                this.addgoods();
            }
            else if (selectedItem.id === 4){
                this.addadmin();
            }
            
        },
        logout() {
            console.log("Logging out...");

            localStorage.removeItem('token'); 
            localStorage.removeItem('role');

            window.location.href = "/login";
        },
        addgoods(){
            window.location.href = "/add_goods";
        },
        addadmin(){
            window.location.href = "/add_admin";
        }
    },
};
</script>

<style scoped>
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

.list-link:hover,
.list-link.active {
    background-color: #84C551;
    border-radius: 20px;
}
</style>
