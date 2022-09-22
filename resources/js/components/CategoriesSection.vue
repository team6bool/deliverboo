<template>
    <div class="container">
        <h3 class="text-start fw-bold">Categorie più cercate</h3>
        <div class="categories row flex-wrap justify-content-around">
            <a href="#" class="col-4 col-lg-2 py-3 d-flex flex-column justify-content-center" v-for="category in categories" :key="category">
                <div class="shadow rounded-circle ratio ratio-1x1 bg-dark"></div>
                <p class="shadow btn-primary text-uppercase rounded-pill p-1 mt-2">{{category}}</p>
            </a>
        </div>
        <h5 class="link text-end pt-3 pe-1 ms-auto">Mostra tutte <i class="fa fa-solid fa-arrow-right"></i></h5>
    </div>
</template>

<script>
export default {
    data() {
        return {
            categories:[
                "pesce",
                "carne",
                "pizza",
                "gelato",
                "burger",
                "torte"
            ]
        }
    }
}
</script>

<style scoped lang="scss">
.container{
    position: relative;
    z-index: 5;
}
</style>
