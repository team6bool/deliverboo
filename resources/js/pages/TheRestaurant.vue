<template>
    <div>
        <main class="container text-start pt-3 px-3">
            <router-link :to="{ name: 'search.index' }">
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

            <div
                id="modal-cart"
                style="z-index: 5"
                tabindex="-1"
                class="modal-bg position-fixed top-0 bottom-0 end-0 start-0 d-none align-items-center justify-content-center px-3"
            >
                <div class="modal-dialog bg-white rounded p-3">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">
                                Hai degli elementi nel carrello
                            </h5>
                        </div>
                        <div class="modal-body">
                            <p>
                                Per accedere ad altro ristorante bisogna
                                svuotare il carrello.
                            </p>
                        </div>
                        <div class="modal-footer">
                            <!-- button to close the modal -->
                            <button
                                class="btn btn-secondary"
                                @click="closeModalCart()"
                            >
                                Continua sulla pagina
                            </button>

                            <button
                                class="btn btn-danger mt-3"
                                @click="removeAllFromSession()"
                            >
                                Svuota carrello
                            </button>
                        </div>
                    </div>
                </div>
            </div>

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
                                <!-- use the function getImagePath(image) -->
                                <img
                                    :src="getImagePath(dish.img)"
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
                                <p class="ps-1 price text-nowrap">
                                    € {{ dish.price }}
                                </p>
                            </div>
                            <div
                                class="d-flex align-items-center justify-content-around px-2"
                            >
                                <a
                                    href="#"
                                    class="btn btn-secondary show-btn text-small"
                                    @click="showDetails(dish.id)"
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
                    <div
                        :id="'modal-' + dish.id"
                        style="z-index: 5"
                        class="modal-bg position-fixed top-0 bottom-0 end-0 start-0 d-none align-items-center justify-content-center px-3"
                    >
                        <div
                            class="bg-white rounded p-3"
                            style="max-width: 600px"
                        >
                            <div
                                class="rounded overflow-hidden mx-5 mb-3"
                                style="max-width: 400px"
                            >
                                <img
                                    :src="
                                        './storage/public/images/dishes/' +
                                        dish.img
                                    "
                                    :alt="dish.name"
                                    class="w-100"
                                />
                            </div>
                            <h3 class="text-orange fw-bold">{{ dish.name }}</h3>
                            <h3 class="text-yellow fw-bold">
                                € {{ dish.price }}
                            </h3>
                            <p>{{ dish.description }}</p>
                            <button
                                class="btn btn-secondary mt-3"
                                @click="hideDetails(dish.id)"
                            >
                                Nascondi
                            </button>
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
                                :src="getImagePath(dish.img)"
                                :alt="dish.name"
                                class="plate-img"
                            />
                        </div>
                    </div>

                    <div class="col-9 dish-information">
                        <div class="dish-and-price">
                            <p class="text-orange">{{ dish.name }}</p>
                            <p class="ps-1 price text-nowrap">
                                € {{ (dish.price * dish.quantity).toFixed(2) }}
                            </p>
                        </div>

                        <div
                            class="d-flex align-items-center cart-quantity-button"
                        >
                            <!-- bin icon -->
                            <a
                                class="no-decoration"
                                @click="removeAllFromCart(dish)"
                                ><i class="fa-solid fa-trash"></i
                            ></a>
                            <!-- add and remove item from cart  -->
                            <div class="pill-button">
                                <a
                                    @click="removeOneFromCart(dish)"
                                    class="no-decoration"
                                    >-
                                </a>

                                <div class="display-num-pill-button">
                                    {{ dish.quantity }}
                                </div>
                                <a
                                    @click="addToCart(dish)"
                                    class="no-decoration"
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

                    <div class="checkout-open mt-3">
                        <h2 class="pt-3 text-white text-shadow">Checkout</h2>
                        <form
                            action=""
                            method="post"
                            enctype="multipart/form-data"
                        >
                            <div class="form-group my-3">
                                <label class="fw-semibold text-orange fs-5 pb-1"
                                    >Nome*</label
                                >
                                <input
                                    type="text"
                                    name="name"
                                    class="form-control"
                                    required
                                />
                            </div>
                            <div class="form-group my-3">
                                <label class="fw-semibold text-orange fs-5 pb-1"
                                    >Cognome*</label
                                >
                                <input
                                    type="text"
                                    name="lastname"
                                    class="form-control"
                                    required
                                />
                            </div>
                            <div class="form-group my-3">
                                <label class="fw-semibold text-orange fs-5 pb-1"
                                    >Indirizzo*</label
                                >
                                <input
                                    type="text"
                                    name="address"
                                    class="form-control"
                                    required
                                />
                            </div>
                            <div class="form-group my-3">
                                <label class="fw-semibold text-orange fs-5 pb-1"
                                    >Email*</label
                                >
                                <input
                                    type="text"
                                    name="email"
                                    class="form-control"
                                    required
                                />
                            </div>
                            <div class="form-group my-3">
                                <label class="fw-semibold text-orange fs-5 pb-1"
                                    >Numero di telefono*</label
                                >
                                <input
                                    type="text"
                                    name="phone"
                                    class="form-control"
                                    required
                                />
                            </div>
                            <div id="dropin-container"></div>
                            <button id="submit-button" class="btn btn-primary">
                                Ordina
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
//axios call to get the restaurant and its dishes
import axios from "axios";

export function round(number, precision) {
    "use strict";
    precision = precision ? +precision : 0;

    var sNumber = number + "",
        periodIndex = sNumber.indexOf("."),
        factor = Math.pow(10, precision);

    if (periodIndex === -1 || precision < 0) {
        return Math.round(number * factor) / factor;
    }

    number = +number;

    // sNumber[periodIndex + precision + 1] is the last digit
    if (sNumber[periodIndex + precision + 1] >= 5) {
        // Correcting float error
        // factor * 10 to use one decimal place beyond the precision
        number += (number < 0 ? -1 : 1) / (factor * 10);
    }

    return +number.toFixed(precision);
}

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
        showDetails(id) {
            let modal = document.getElementById("modal-" + id);
            modal.classList.replace("d-none", "d-flex");
        },
        hideDetails(id) {
            let modal = document.getElementById("modal-" + id);
            modal.classList.replace("d-flex", "d-none");
        },
        getImagePath(img) {
            return "/storage/public/images/dishes/" + img;
        },
        addToCart(dish) {
            if (
                localStorage.getItem("cart") != null &&
                this.cart[0].user_id != this.restaurant.id
            ) {
                this.checkCart();
                this.addToCart().preventDefault();
            }
            if (localStorage.getItem("cart") == null) {
                localStorage.setItem("cart", JSON.stringify([]));
            }
            let cart = JSON.parse(localStorage.getItem("cart"));
            let index = cart.findIndex((item) => item.id == dish.id);
            if (index == -1) {
                dish.quantity = 1;
                cart.push(dish);
            } else {
                cart[index].quantity++;
            }
            localStorage.setItem("cart", JSON.stringify(cart));
            this.cart = JSON.parse(localStorage.getItem("cart"));
            this.partialTotal = round(
                this.cart.reduce(
                    (acc, dish) => acc + dish.price * dish.quantity,
                    0
                ),
                2
            );
            localStorage.setItem(
                "partialTotal",
                JSON.stringify(this.partialTotal)
            );
            this.total = round(
                this.partialTotal + this.restaurant.delivery_price,
                2
            );
            localStorage.setItem("total", JSON.stringify(this.total));
        },
        checkCart() {
            if (this.cart.length > 0) {
                if (this.cart[0].user_id != this.restaurant.id) {
                    let modal = document.getElementById("modal-cart");
                    modal.classList.replace("d-none", "d-flex");
                }
            }
        },
        closeModalCart() {
            let modal = document.getElementById("modal-cart");
            modal.classList.replace("d-flex", "d-none");
        },
        removeAllFromSession() {
            localStorage.removeItem("cart");
            localStorage.removeItem("partialTotal");
            localStorage.removeItem("total");
            this.cart = [];
            this.partialTotal = 0;
            this.total = 0;
            this.closeModalCart();
        },
        removeOneFromCart(dish) {
            if (this.cart && this.cart.length > 0) {
                let cart = JSON.parse(localStorage.getItem("cart"));
                let index = cart.findIndex((item) => item.id == dish.id);
                if (index !== -1) {
                    cart[index].quantity--;
                    if (cart[index].quantity == 0) {
                        cart.splice(index, 1);
                    }
                }
                localStorage.setItem("cart", JSON.stringify(cart));
                this.cart = JSON.parse(localStorage.getItem("cart"));
                this.partialTotal = round(
                    this.cart.reduce(
                        (acc, dish) => acc + dish.price * dish.quantity,
                        0
                    ),
                    2
                );
                localStorage.setItem(
                    "partialTotal",
                    JSON.stringify(this.partialTotal)
                );
                this.total = round(
                    this.partialTotal + this.restaurant.delivery_price,
                    2
                );
                localStorage.setItem("total", JSON.stringify(this.total));
                if (this.cart.length == 0) {
                    localStorage.removeItem("cart");
                    localStorage.removeItem("partialTotal");
                    localStorage.removeItem("total");
                    this.partialTotal = 0;
                    this.total = 0;
                }
            }
        },
        removeAllFromCart(dish) {
            let cart = JSON.parse(localStorage.getItem("cart"));
            let index = cart.findIndex((item) => item.id == dish.id);
            if (index !== -1) {
                cart.splice(index, 1);
            }
            localStorage.setItem("cart", JSON.stringify(cart));
            this.cart = JSON.parse(localStorage.getItem("cart"));
            this.partialTotal = round(
                this.cart.reduce(
                    (acc, dish) => acc + dish.price * dish.quantity,
                    0
                ),
                2
            );
            localStorage.setItem(
                "partialTotal",
                JSON.stringify(this.partialTotal)
            );

            this.total = round(
                this.partialTotal + this.restaurant.delivery_price,
                2
            );
            localStorage.setItem("total", JSON.stringify(this.total));
            if (this.cart.length == 0) {
                localStorage.removeItem("cart");
                localStorage.removeItem("partialTotal");
                localStorage.removeItem("total");
                this.partialTotal = 0;
                this.total = 0;
            }
        },
        dishSubtotals() {
            if (this.cart && this.cart.length > 0) {
                this.cart.forEach((dish) => {
                    subtotals.push(dish.price * dish.quantity);
                });
            }
            sessionStorage.setItem("subtotals", JSON.stringify(subtotals));
        },
    },
    mounted() {
        this.getRestaurant();
        this.cart = JSON.parse(localStorage.getItem("cart"));
        this.partialTotal = JSON.parse(localStorage.getItem("partialTotal"));
        this.total = JSON.parse(localStorage.getItem("total"));
        this.dishSubtotals();
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

.checkout-open {
    border-top: 2px solid var(--orange);
}

.modal-bg {
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
            margin-bottom: 0.3rem;

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
