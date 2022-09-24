<template>
    <main class="container text-start pt-3 px-3">
        <router-link :to="{ name: 'home.index' }">
            <a href="#" class="btn btn-secondary text-white my-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-activity">-
                    <line x1="20" y1="12" x2="4" y2="12"></line>
                    <polyline points="10 18 4 12 10 6"></polyline>
                </svg>
                Indietro
            </a>
        </router-link>

        <div class="text-center pt-4">
            <h2 class="text-orange name">{{ restaurant.name }}</h2>
            <h3 class="text-yellow">{{ restaurant.address }}</h3>
            <p class="text-start pt-4">
                {{ restaurant.description }}
            </p>
        </div>

        <div class="text-center pt-2">
            <h2 class="text-yellow">I nostri piatti</h2>
            <div v-for="dish in restaurant.dishes" :key="dish.id" class="card-box mt-4">
                <div class="row">
                    <div class="col-3 d-flex align-center">
                        <div class="img-box">
                            <img :src="'/images/dishes/' + dish.img" :alt="dish.name" class="plate-img" />
                        </div>
                    </div>
                    <div class="col-9 text-start ps-0 pt-2">
                        <div class="d-flex align-items-center justify-content-between px-2">
                            <p class="text-orange plate-name">
                                {{ dish.name }}
                            </p>
                            <p class="ps-1 price text-nowrap">€ {{dish.price}}</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-around px-2">
                            <a href="#" class="btn btn-secondary show-btn text-small" @click="showDetails(dish.id)">
                                Dettagli
                            </a>
                            <button class="btn btn-primary show-btn text-small">
                                Aggiungi
                            </button>
                        </div>
                    </div>
                </div>
                <div :id="'modal-' + dish.id" class="dish-details position-fixed top-0 bottom-0 end-0 start-0 d-none align-items-center justify-content-center px-3">
                    <div class="bg-white rounded p-3" style="max-width: 600px">
                        <div class="rounded overflow-hidden mx-5 mb-3" style="max-width: 400px">
                            <img :src="'/images/dishes/' + dish.img" :alt="dish.name" class="w-100">
                        </div>
                        <h3 class="text-orange fw-bold">{{dish.name}}</h3>
                        <h3 class="text-yellow fw-bold">€ {{dish.price}}</h3>
                        <p>{{dish.description}}</p>
                        <button class="btn btn-secondary mt-3" @click="hideDetails(dish.id)">
                            Nascondi
                        </button>
                    </div>
                </div>
            </div>
            <a href="#" class="btn btn-primary my-4">
                Aggiungi al carrello
            </a>
        </div>
    </main>
</template>

<script>
//axios call to get the restaurant and its dishes
import axios from "axios";

export default {
    name: "TheRestaurant",
    data() {
        return {
            restaurant: {},
        };
    },
    methods: {
        //get the restaurant and the dishes with axios call and set the data
        getRestaurant() {
            axios
                .get("/api/restaurants/" + this.$route.params.slug)
                .then((response) => {
                    this.restaurant = response.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        showDetails(id){
            let modal = document.getElementById("modal-" + id);
            modal.classList.replace("d-none", "d-flex");
        },
        hideDetails(id){
            let modal = document.getElementById("modal-" + id);
            modal.classList.replace("d-flex", "d-none");
        }
    },
    mounted() {
        this.getRestaurant();
    },
};
</script>

<style scoped lang="scss">
h2 {
    font-size: 1.8rem;
}

h3 {
    font-size: 1.3rem;
}

p {
    font-size: 0.9rem;
}

.dish-details{
    backdrop-filter: blur(2px) brightness(0.9);
}

.show-btn {
    padding: 5px 20px;
}

.text-orange {
    color: #fd5f25;
}

.text-yellow {
    color: #ffc244;
}

.text-small {
    font-size: 0.8rem;
}

.text-mid {
    font-size: 1.3rem;
}

.name {
    font-weight: 700;
    text-shadow: 2px 2px 5px rgb(174, 174, 174);
}

.card-box {
    border: 1px solid transparent;
    border-radius: 20px;
    box-shadow: 2px 2px 5px rgb(174, 174, 174);
    padding: 10px;
}

.img-box {
    border: 1px solid transparent;
    border-radius: 50%;
    overflow: hidden;
    height: 3.7rem;
    width: 3.7rem;
}

.plate-img {
    object-fit: cover;
    height: 3.7rem;
    width: 3.7rem;
}

.plate-name {
    font-weight: 600;
}
</style>
