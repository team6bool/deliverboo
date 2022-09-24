<template>
    <div id="app">
        <NavBar />
        <router-view></router-view>
        <TheFooter />
    </div>
</template>

<script>
import NavBar from "../components/NavBar.vue";
import Main from "../pages/TheMain.vue";
import Restaurant from "../pages/TheRestaurant.vue";
import TheFooter from "../components/TheFooter.vue";

export default {
    name: "App",
    components: {
        NavBar,
        Main,
        Restaurant,
        TheFooter,
    },
    data() {
        return {
            page: "home",
        };
    },
};
</script>

<style lang="scss">
@import url("https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap");

:root {
    --yellow: #ffc244;
    --orange: #fd5f25;
    --dark-orange: #e83e00;
    --black: #1d1d1d;
    --soft-yellow: #ffdc95;
    --sand: #c7a58b;
}

#app {
    font-family: "Inter", Avenir, Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: var(--black);
    min-width: 320px;
}

#app * {
    &:focus {
        border: none;
        outline: none;
        border-bottom: 2px solid var(--orange);
        margin-bottom: -2px;
    }
}

.bg-primary {
    background-color: var(--yellow) !important;
}

.bg-dark {
    background-color: var(--black) !important;
}

.bg-light {
    background-color: white !important;
}

.bg-soft {
    background: var(--soft-yellow);
}

.bg-sand {
    background: var(--sand);
}

.text-orange{
    color: var(--orange) !important;
}

.text-soft{
    color: var(--soft-yellow) !important;
}

.text-yellow{
    color: var(--yellow) !important;
}

.text-sand{
    color: var(--sand) !important;
}

.shadow {
    box-shadow: 0px 4px 7px rgba(0, 0, 0, 0.25);
}

.text-shadow {
    text-shadow: 0px 4px 7px rgba(0, 0, 0, 0.25);
}

.drop-shadow {
    filter: drop-shadow(0px 4px 7px rgba(0, 0, 0, 0.25));
}

a {
    text-decoration: none;
    color: inherit;

    &:hover {
        text-decoration: underline;
        color: inherit;
    }
}

.no-decoration:hover{
    text-decoration: none;
}

.link {
    border-bottom: 2px solid var(--sand);
    color: var(--sand);
    cursor: pointer;
    width: max-content;

    &:hover {
        opacity: 0.8;
    }
}

button,
.btn {
    text-align: center;
    text-decoration: none;
    padding: 0.5rem 1.5rem;
    border: none;
    outline: none;
    box-shadow: 0px 4px 7px rgba(0, 0, 0, 0.25);
    border-radius: 28px;
    font-weight: bold;
    transition: 200ms ease-out;

    &:hover {
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
        text-decoration: none !important;
    }

    &:active {
        box-shadow: inset 0px 4px 7px rgba(0, 0, 0, 0.25);
        text-decoration: none;
    }

    &:focus-visible {
        text-decoration: none;
        color: white !important;
        background-color: var(--orange) !important;
        border: 4px solid var(--soft-yellow) !important;
        box-shadow: none !important;
    }
}

.large {
    padding: 0.5rem 3.5rem;
}

.btn-primary {
    background: var(--orange) !important;
    color: white !important;

    &:hover,
    &:active {
        background: var(--dark-orange) !important;
        color: white !important;
    }
}

.btn-secondary {
    background: var(--soft-yellow) !important;
    color: var(--orange) !important;

    &:hover,
    &:active {
        background: var(--yellow) !important;
        color: white !important;
    }
}

.btn-cart {
    background: white;
    color: var(--orange);
    padding: 0.5rem 0.8rem;
    aspect-ratio: 1/1 !important;

    &:hover,
    &:active {
        color: var(--yellow);
        background: white;
    }
}

h1 {
    font-size: 2rem;
    font-weight: 800;
    text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    padding-bottom: 1rem;
}

p {
    font-weight: 600;
    padding-bottom: 1rem;
    margin-bottom: 0;
}

@media screen and (min-width: 1200px) {
    h1 {
        font-size: 3rem;
    }

    p {
        font-size: 1.2rem;
    }
}
</style>
