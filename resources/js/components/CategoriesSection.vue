<template>
    <div class="container">
        <h3 class="text-start fw-bold">{{ title }}</h3>
        <div class="categories row flex-wrap justify-content-around">
            <a href="#" class="col-4 col-lg-2 py-3 d-flex flex-column justify-content-center no-decoration"
                v-for="category in categories" :key="category.id">
                <div class="shadow rounded-circle ratio ratio-1x1 bg-dark">
                    <img :src="'/images/categories/' + category.img" alt="">
                </div>
                <p class="shadow btn-primary text-uppercase rounded-pill p-1 mt-2">{{category.name}}</p>
            </a>
        </div>
        <h5 class="link text-end pt-3 pe-1 ms-auto" :class="showAllBtn" @click="showAll()">Mostra tutte <i class="fa fa-solid fa-arrow-down"></i></h5>
        <h5 class="link text-end pt-3 pe-1 ms-auto" :class="backButton" @click="hide()">Nascondi <i class="fa fa-solid fa-arrow-up"></i></h5>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    data() {
        return {
            title: "Categorie più cercate",
            showAllBtn: "d-block",
            backButton: "d-none",
            categories: []
        }
    },
    methods: {
        fetchData() {
            axios.get("/api/categories")
                .then(resp => {
                    this.categories = resp.data.slice(0,6)
                })
        },
        showAll(){
            this.title = "Tutte le categorie";
            this.showAllBtn = "d-none";
            this.backButton = "d-inline-block";
            axios.get("/api/categories")
                .then(resp => {
                    this.categories = resp.data
                })
        },
        hide() {
            this.title = "Categorie più cercate";
            this.showAllBtn = "d-block";
            this.backButton = "d-none";
            this.fetchData();
        }
    },
    mounted() {
        this.fetchData()
    }

}
</script>

<style scoped lang="scss">
.container {
    position: relative;
    z-index: 5;
}
</style>
