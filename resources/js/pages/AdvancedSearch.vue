<template>
    <div class="search-section bg-primary">
        <div class="container py-3">
            
        <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class="fa fa-solid fa-search"></i> Seleziona categoria
            </a>

            <ul class="dropdown-menu">
                <li v-for="category in categories" :key="category"><a class="dropdown-item" href="#"
                        @click="changeCategory(category)">{{category}}</a></li>
            </ul>
        </div>
            <h1 v-for="restaurant in restaurants" :key="restaurant.id">{{restaurant.name}}</h1>
        </div>

    </div>
</template>

<script>
import axios from 'axios';
import { state } from './../store'

export default {
    data() {
        return {
            restaurants: [],
            categories: [],
            selectedCategory: state.selectedCategory,
        }
    },
    methods: {
        fetchRestaurants() {
            const th = this;
            axios.get("/api/restaurants")
                .then(resp => {
                    const data = resp.data;
                    for (let i = 0; i < data.length; i++) {
                        for (let j = 0; j < data[i].categories.length; j++) {
                            if (data[i].categories[j].name === th.selectedCategory) {
                                th.restaurants.push(data[i]);
                            }
                        }
                    }
                })
        },
        fetchCategories() {
            axios.get("/api/categories")
                .then(resp => {
                    for (let i = 0; i < resp.data.length; i++) {
                        this.categories.push(resp.data[i].name);
                    }
                })
        },

        changeCategory(value) {
            this.selectedCategory = value;
            this.restaurants = [];
            this.fetchRestaurants();
        },

    },
    mounted() {
        this.fetchRestaurants(),
            this.fetchCategories()
    }

};
</script>

<style scoped lang="scss">
.search-section {

    .container {

        .search-bar {
            max-width: 500px;
            margin: auto;
            border-radius: 10px;
            overflow: hidden;

            .icon {
                padding: 0.6rem 0.5rem 0.3rem 0.6rem;

                * {
                    transition: 200ms ease-out;
                }

                &:hover {
                    g {
                        path {
                            fill: white;
                        }
                    }
                }
            }

            input {
                flex-grow: 1;
                border: none;
                outline: none;
                padding-left: 0.5rem;
                font-weight: bold;
                font-size: 1.2rem;
                transition: 200ms ease-out;

                &::placeholder {
                    font-weight: bold;
                    color: var(--sand);
                    font-size: 1.2rem;
                }

                &:focus {
                    border-radius: 0 6px 6px 0;
                    box-shadow: inset -4px 4px 4px var(--soft-yellow), inset 0 -4px 4px var(--soft-yellow);

                    &::placeholder {
                        opacity: 0.5;
                    }
                }
            }
        }
    }
}
</style>