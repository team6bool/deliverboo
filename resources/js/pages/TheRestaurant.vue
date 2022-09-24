<template>
    <div>
        <main class="container text-start pt-3 px-3">
            <router-link :to="{ name: 'home.index' }">
                <a href="#" class="btn btn-secondary text-white my-btn">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        class="feather feather-activity"
                    >
                        -
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
                <div
                    v-for="dish in restaurant.dishes"
                    :key="dish.id"
                    class="card-box mt-4"
                >
                    <div class="row">
                        <div class="col-3 d-flex align-center">
                            <div class="img-box">
                                <img
                                    :src="'/images/dishes/' + dish.img"
                                    :alt="dish.name"
                                    class="plate-img"
                                />
                            </div>
                        </div>
                        <div class="col-9 text-start ps-0 pt-2">
                            <div
                                class="d-flex align-items-center justify-content-between px-2"
                            >
                                <p class="text-orange plate-name">
                                    {{ dish.name }}
                                </p>
                                <p class="price">€ {{ dish.price }}</p>
                            </div>
                            <div
                                class="d-flex align-items-center justify-content-around px-2"
                            >
                                <a
                                    href="#"
                                    class="btn btn-secondary show-btn text-small"
                                >
                                    Dettagli
                                </a>
                                <!-- add a button that on click add item to the cart on the same page -->
                                <button
                                    class="btn btn-primary show-btn text-small"
                                    @click="addToCart(dish)"
                                >
                                    Aggiungi
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-column justify-content-center">
                <!-- cart header with logo image, restaurant name and restaurant street -->
                <div class="row">
                    <div class="col cart-header">
                        <h2 class="text-orange pt-5 pb-4">Carrello</h2>
                    </div>
                </div>
                <!-- dishes section -->
                <!--
                    Structure:
                        - image on the left
                        - description and price center
                        - delete icon
                        - remove and add icon with number at the center
                    -->
                <div
                    v-for="dish in cart"
                    :key="dish.id"
                    class="row dish-container"
                >
                    <div class="col-3">
                        <div class="dish-image">
                            <!-- image of the dish -->
                            <img
                                :src="'/images/dishes/' + dish.img"
                                :alt="dish.name"
                                class="plate-img"
                            />
                        </div>
                    </div>

                    <div class="col-9 dish-information">
                        <div class="dish-and-price">
                            <!-- title and price -->
                            <h4>{{ dish.name }}</h4>
                            <span>€ {{ dish.price }}</span>
                        </div>

                        <!-- cart quantity handle -->
                        <div
                            class="d-flex align-items-center cart-quantity-button"
                        >
                            <!-- bin icon -->
                            <i class="fa-solid fa-trash"></i>
                            <!-- add and remove item from cart  -->
                            <div
                                @click="removeFromCart(dish)"
                                class="pill-button"
                            >
                                <a
                                    @click="removeOneFromCart(dish)"
                                    href="http://"
                                    >-</a
                                >

                                <div class="display-num-pill-button">
                                    {{ quantity }}
                                </div>
                                <a @click="addFromCart(dish)" href="http://"
                                    >+</a
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <div>
            <img
                class="w-100"
                src="/images/checkout-bg.svg"
                alt="checkout-bg"
            />
            <div class="checkout-section bg-soft">
                <div class="container py-3">
                    <div class="row gy-3">
                        <div class="col-6">
                            <div class="text-start text-checkout-start fs-5">
                                Consegna
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end fs-5 text-checkout-end">
                                € {{ restaurant.delivery_price }}
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-start text-checkout-start fs-5">
                                Prodotti
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end text-checkout-end fs-5">
                                € {{ partialTotal }}
                            </div>
                        </div>
                        <div class="total-line"></div>
                        <div class="col-6">
                            <div class="text-start text-checkout-start fs-2">
                                Totale
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end text-checkout-end fs-2">
                                € {{ total }}
                            </div>
                        </div>
                    </div>

                    <div class="btn btn-primary my-4">Procedi al checkout</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
//axios call to get the restaurant and its dishes
import axios from "axios";

export default {
    name: "TheRestaurant",
    data() {
        return {
            restaurant: {},
            cart: {},
            quantity: 1,
            partialTotal: 0,
            total: 0,
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
        addToCart(dish) {
            if (sessionStorage.getItem("cart") === null) {
                sessionStorage.setItem("cart", JSON.stringify([]));
            }
            this.cart = JSON.parse(sessionStorage.getItem("cart"));
            this.cart.push(dish);
            sessionStorage.setItem("cart", JSON.stringify(this.cart));
            console.log(this.cart);
        },
        updateCart() {
            if (sessionStorage.getItem("cart") !== null) {
                this.cart = JSON.parse(sessionStorage.getItem("cart"));
            }
        },
        removeFromCart(dish) {
            this.cart = JSON.parse(sessionStorage.getItem("cart"));
            this.cart = this.cart.filter((item) => item.id !== dish.id);
            sessionStorage.setItem("cart", JSON.stringify(this.cart));
        },
        addFromCart(dish) {
            this.cart = JSON.parse(sessionStorage.getItem("cart"));
            this.cart.push(dish);
            sessionStorage.setItem("cart", JSON.stringify(this.cart));
        },
        removeOneFromCart(dish) {
            this.cart = JSON.parse(sessionStorage.getItem("cart"));
            this.cart = this.cart.filter((item) => item.id !== dish.id);
            sessionStorage.setItem("cart", JSON.stringify(this.cart));
        },
        getProductsTotal() {
            this.cart = JSON.parse(sessionStorage.getItem("cart"));
            this.cart.forEach((dish) => {
                this.productsTotal += dish.price * dish.quantity;
            });
        },
    },
    mounted() {
        this.getRestaurant();
        this.updateCart();
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

//cart style

.dish-container {
    //border of the container border
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.25);
    border-radius: 15px;
    display: flex;
    align-items: center;
    margin-inline: 0.7rem;
    margin-bottom: 2rem;
    padding-block: 0.5rem;

    .dish-image {
        width: 3.5rem;
        height: 3.5rem;
        border-radius: 50%;
        overflow: hidden;
        align-items: center;
        img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    }
    .dish-information {
        position: relative;
        padding: 0;
        .dish-and-price {
            text-align: start;
            h4 {
                color: var(--orange);
            }
            span {
                font-weight: 600;
                padding-bottom: 1rem;
            }
        }

        .cart-quantity-button {
            position: absolute;
            right: 0;
            bottom: 0;
            .fa-trash {
                color: var(--soft-yellow);
                padding-right: 1rem;
                font-size: larger;
                vertical-align: middle;
            }
        }

        .pill-button {
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            border-radius: 0.5rem;
            margin-right: 0.7rem;

            background: var(--soft-yellow);
            height: 28px;
            width: 100px;
            .display-num-pill-button {
                background-color: white;
                text-align: center;
                width: 33px;
                height: 26px;
                line-height: 28px;
            }
        }
    }
}

.checkout-section {
    position: relative;
    padding-top: 1rem;
    margin-top: -1px;

    .text-checkout-start {
        font-weight: 600;
        color: var(--orange);
    }

    .text-checkout-end {
        font-weight: 600;
    }

    .total-line {
        height: 1px;
        background-color: var(--orange);
    }
}
</style>
