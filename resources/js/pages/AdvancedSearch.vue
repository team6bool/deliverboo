<template>
    <div class="search-section bg-primary">
        <div class="container py-3">
            <div class="category-jumbo m-auto mb-3" style="max-width: 300px">
                <img :src="'/images/categories/' + jumbo" alt="" class="w-100" />
            </div>

            <div class="dropdown dropdown-center mb-2">
                <a class="btn btn-primary dropdown-toggle mb-2" href="javascript:void(0)" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-solid fa-search pe-3"></i> Seleziona una categoria
                </a>

                <ul class="dropdown-menu bg-soft m-auto">
                    <li v-for="category in categories" :key="category"><a
                            class="dropdown-item text-orange fw-semibold text-center" href="javascript:void(0)"
                            @click="addCategories(category)">{{category}}</a></li>
                </ul>
            </div>

            <div class="mx-auto">
                <ul class="categories-container text-start gap-2 justify-content-evenly">
                    <li v-for="(list, i) in selectedCategories" :key="list"
                        class="list-unstyled d-inline-block bg-sand categories-style px-3 py-1 me-1 mb-2 text-nowrap">{{list}}
                        <span @click="clearCategory(list)" class="d-inline-block">
                            <i class="fa-solid fa-xmark"></i>
                        </span>
                    </li>
                    <div class="link" @click="clearRestaurants()">
                        <a href="javascript:void(0)" class="text-decoration-none">Cancella tutto</a>
                    </div>
                </ul>

            </div>

            <div class="d-flex justify-content-center pt-3">
                <hr />
            </div>
            <div class="row px-2 mt-4 pb-5">
                <div v-for="restaurant in restaurants" :key="restaurant.id"
                    class="col-12 col-sm-6 col-lg-4 col-xl-3 px-3 pb-4">
                    <div class="p-3 rounded shadow bg-white">
                        <div class="rounded overflow-auto ratio ratio-4x3">
                            <img :src="'Storage/' + restaurant.img" alt="" class="w-100 h-100"
                                style="object-fit: cover" />
                        </div>
                        <div class="p-3 text-start">
                            <h4 class="text-orange fw-semibold">
                                {{ restaurant.name }}
                            </h4>
                            <p class="fw-bold">
                                <span v-for="category in restaurant.categories" :key="category.id" class="category-span">
                                    {{ category.name }}</span>
                            </p>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <p class="text-orange pb-0 pe-1">
                                        €{{
                                        restaurant.delivery_price ? restaurant.delivery_price.toFixed(2) : 0
                                        }}
                                    </p>
                                    <svg style="height: 2rem" viewBox="0 0 20 19" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6.32345 9.67377C6.26657 9.60461 6.16661 9.57145 6.06866 9.59253C5.49561 9.76377 4.85563 9.59844 4.50663 9.18514C4.85189 8.77208 5.49589 8.60439 6.06866 8.78061C6.19447 8.80524 6.32114 8.74248 6.35245 8.63755C6.3694 8.58189 6.35446 8.52031 6.3108 8.47484C5.82162 7.88389 4.98833 7.54922 4.12085 7.59611C2.98509 7.74295 1.974 8.27823 1.33977 9.07025C1.28117 9.13799 1.28175 9.22942 1.33948 9.29739C1.49804 9.47977 1.67614 9.65125 1.87089 9.81183C2.53385 10.4224 3.48204 10.7727 4.47706 10.7765C5.22245 10.7247 5.90006 10.4004 6.32201 9.89191C6.38578 9.82654 6.38952 9.73535 6.33379 9.66477L6.32345 9.67377ZM19.0291 9.18663C19.0276 9.07934 18.8648 8.99431 18.8648 8.99431C18.6493 8.76977 18.417 8.55637 18.1737 8.35291C16.5984 7.02702 14.4472 6.27691 12.1981 6.26553C11.9201 6.26553 11.6449 6.27784 11.3709 6.30389C11.0819 5.65587 10.4882 5.12935 9.72668 4.84442C8.47458 4.43348 6.89015 4.89627 5.35943 5.45736C5.24137 5.50023 5.18938 5.61511 5.24137 5.71245C5.27412 5.77687 5.34651 5.81856 5.42837 5.82732C6.47423 5.95452 7.36756 6.51301 7.79986 7.30907L6.83961 7.75789C6.74971 7.79982 6.70346 7.88484 6.72558 7.96751C6.8692 8.77706 6.8695 9.59822 6.72875 10.4049C6.70635 10.4902 6.75231 10.5755 6.8425 10.6176L7.80018 11.0667C7.37506 11.8706 6.47628 12.4345 5.4244 12.5543C5.29571 12.5662 5.20121 12.664 5.21787 12.7687C5.22649 12.8378 5.28078 12.8968 5.35546 12.9243C6.88475 13.4842 8.47034 13.948 9.71812 13.5387C10.4796 13.2538 11.0719 12.728 11.3606 12.0807C11.6355 12.1027 11.9141 12.1126 12.1904 12.1112C14.8043 12.0928 17.262 11.0876 18.8633 9.38487C18.8633 9.38487 19.0262 9.29748 19.0259 9.18876L19.0291 9.18663ZM17.8399 8.62766C18.055 8.80506 18.2604 8.99146 18.4529 9.18757C18.1866 9.4564 17.8979 9.70959 17.59 9.94407C17.38 9.72925 17.2666 9.46279 17.2637 9.18662C17.2637 8.90998 17.3774 8.64376 17.5865 8.42918C17.6719 8.49194 17.756 8.55613 17.8382 8.62387L17.8399 8.62766ZM12.197 6.65396C14.0399 6.65918 15.822 7.19542 17.2341 8.17219C17.002 8.40762 16.8552 8.6916 16.8104 8.99524L14.7446 8.99381C14.6205 8.13168 13.6703 7.51634 12.6247 7.61865C11.7509 7.70486 11.0612 8.27354 10.9564 8.99427L8.5447 8.99378C8.53608 8.49072 8.47317 7.98741 8.35626 7.49121C9.52591 6.94362 10.8504 6.65632 12.1967 6.65372L12.197 6.65396ZM13.8691 10.0269C13.3069 10.4905 12.3955 10.4921 11.8331 10.0284C11.2675 9.56437 11.2692 8.81308 11.8319 8.34909C12.394 7.88558 13.3055 7.88393 13.8679 8.34768L13.8693 8.34887C14.4303 8.81144 14.4286 9.56273 13.8688 10.0267L13.8691 10.0269ZM6.18641 5.58692C7.41035 5.17268 8.62222 4.89865 9.54887 5.20324C10.1529 5.43275 10.6289 5.84511 10.8771 6.35529C9.94672 6.48389 9.04736 6.73898 8.22182 7.11414C7.8461 6.38512 7.10444 5.82757 6.18813 5.5855L6.18641 5.58692ZM7.2208 10.3497C7.33598 9.5788 7.33511 8.7979 7.22079 8.0253L7.92108 7.6975C8.13997 8.68185 8.13797 9.69202 7.92283 10.679L7.2208 10.3497ZM9.55324 13.1711C8.62257 13.4766 7.41414 13.2054 6.19019 12.7912C7.10563 12.5494 7.84614 11.9904 8.21984 11.2602C9.04912 11.6351 9.94934 11.8919 10.8846 12.0188C10.6359 12.5295 10.1576 12.9442 9.54979 13.1711L9.55324 13.1711ZM8.35484 10.8827C8.47261 10.3881 8.53752 9.88647 8.54786 9.38151L10.9596 9.38199C11.0837 10.2441 12.0321 10.8609 13.0794 10.7572C13.9547 10.6721 14.6443 10.1035 14.7474 9.38177L16.8153 9.38155C16.8601 9.68235 17.0052 9.96775 17.2358 10.202C15.8249 11.1778 14.0428 11.7169 12.2013 11.7233C10.853 11.7195 9.53111 11.431 8.36087 10.8829L8.35484 10.8827Z"
                                            fill="#FD5F25" />
                                    </svg>
                                </div>
                                <router-link :to="restaurant.slug" class="btn btn-primary ms-1">Visita</router-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import { state } from "./../store";

export default {
    data() {
        return {
            restaurants: [],
            categories: [],
            selectedCategory: state.selectedCategory,
            selectedCategories: [],
            jumbo: "sushi.png",
        };
    },
    methods: {
        fetchRestaurants() {
            const th = this;

            axios.get("/api/restaurants").then((resp) => {
                const data = resp.data;

                for (let i = 0; i < data.length; i++) {
                    for (let j = 0; j < data[i].categories.length; j++) {
                        const index = th.restaurants.findIndex(
                            (object) => object.id === data[i].id
                        );

                        if (
                            data[i].categories[j].name ===
                            th.selectedCategory &&
                            index === -1
                        ) {
                            th.restaurants.push(data[i]);
                        }
                    }
                }
            });
        },

        fetchCategories() {
            axios.get("/api/categories").then((resp) => {
                for (let i = 0; i < resp.data.length; i++) {
                    this.categories.push(resp.data[i].name);
                }
            });
        },

        addCategories(value) {
            this.selectedCategory = value;
            this.fetchRestaurants();
            this.arrCategories();
        },

        arrCategories() {
            if (!this.selectedCategories.includes(this.selectedCategory))
                this.selectedCategories.push(this.selectedCategory);
        },

        clearRestaurants() {
            this.restaurants = [];
            this.selectedCategories = [];
        },
        clearCategory(category) {
            const index = this.selectedCategories.indexOf(category);
            this.selectedCategories.splice(index, 1);
            const newCateg = [];
            this.selectedCategories.forEach(element => newCateg.push(element));
            const newRestaurants = this.restaurants;
            this.restaurants = [];
            for(let i = 0; i < newRestaurants.length; i++){
                for(let j = 0; j < newCateg.length; j++){
                    for(let y = 0; y < newRestaurants[i].categories.length; y++){
                        if(newRestaurants[i].categories[y].name === newCateg[j]){
                            if(!this.restaurants.includes(newRestaurants[i])){
                                this.restaurants.push(newRestaurants[i]);
                            }
                        }
                    }
                }
            }
        },

        categoryImageChange() {
            const th = this;
            let data = [];
            axios.get("/api/categories").then((resp) => {
                data = resp.data;
            });
            let counter = 0;
            setInterval(function () {
                if (counter < data.length - 1) {
                    counter = counter + 1;
                } else {
                    counter = 0;
                }
                th.jumbo = data[counter].img;
            }, 1000);
        },
    },
    mounted() {
        this.fetchRestaurants(),
            this.fetchCategories(),
            this.categoryImageChange()
    },

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
                    box-shadow: inset -4px 4px 4px var(--soft-yellow),
                        inset 0 -4px 4px var(--soft-yellow);

                    &::placeholder {
                        opacity: 0.5;
                    }
                }
            }
        }

        .categories-container {
            .categories-style {
                border-radius: 15px;
                color: white;

                .fa-xmark {
                    cursor: pointer;
                }
            }
        }
        .category-span:not(:first-child)::before{
            content: " - ";
        }

    }

    hr {
        width: 90%;
    }

}
</style>
