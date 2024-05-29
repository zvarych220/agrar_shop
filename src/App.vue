<script>

</script>

<template>
    <main>
        <div class="section">
            <div class="menu">
                <div class="menu-pole">
                    <a href="" class="menu-pole-link">Про нас</a>
                    <a href="" class="menu-pole-link">Каталог продукції</a>
                    <a href="" class="menu-pole-link">Оплата і доставка</a>
                    <a href="" class="menu-pole-link">Партнери</a>
                    <a href="" class="menu-pole-link">Новини</a>
                    <a href="" class="menu-pole-link">Контакти</a>
                </div>
                <div class="menu-login">
                    <img src="/public/Group.svg" class= "menu-pole-login-img" alt="">
                    <a href="" class="menu-pole-login">Вхід | Реєстрація</a>
                </div>
            </div>
        </div>
    </main>
</template>

<style scoped>
:root {
  --font-family: "Montserrat", sans-serif;
  --second-family: "Roboto", sans-serif;
}
.section {
    padding-left: 286px ;
    padding-right: 286px ;
}
.menu-pole {
    display: flex;
    justify-content: space-around; /* Рівномірний розподіл елементів */
    flex-grow: 1;
    
}
.menu{
    display: flex;
    justify-content: space-around; /* Рівномірний розподіл елементів */
    align-items: center; /* Центрування елементів по вертикалі */
   
    padding: 14px 0; /* Відступи всередині меню */
    border-radius: 5px; /* Закруглені кути */
}
.menu-pole-link{
    font-weight: 300;
font-size: 16px;
color: #fff;
font-family: var(--font-family);
text-decoration: none;
}
.menu-login {
    padding-left: 20px;
    display: flex;
    align-items: center;
    padding-left: 20px; /* Відступ зліва для вертикальної лінії */
    border-left: 1px solid #ccc; /* Вертикальна лінія */
}
.menu-pole-login{
    font-weight: 300;
font-size: 16px;
color: #fff;
font-family: var(--font-family);
text-decoration: none;
margin-top:1px ;
}
.menu-pole-login-img{
    margin-left:15px;
    margin-right: 10px;
}
main {
    height: 50px;
    background: #1e6140;
}
</style>
