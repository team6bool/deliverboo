<style lang="scss" scoped>
.cart-header {
    .custom-image-cart {
        padding-top: 1.5rem;
        padding-bottom: 1.5rem;
        width: 50%;
    }
    .restaurant-name {
        color: var(--orange);
        font-weight: 500;
    }

    .restaurant-address {
        color: var(--yellow);
        font-size: 0.9rem;
        font-weight: 500;
        padding-bottom: 2rem;
    }
}

.dish-container {
    //border of the container border
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.25);
    border-radius: 15px;
    display: flex;
    align-items: center;
    margin-inline: 0.7rem;
    margin-bottom: 1rem;
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
            .bin-image {
                line-height: 28px;
                padding-right: 1rem;
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
                width: 33px;
                height: 26px;
                line-height: 28px;
            }
        }
    }

    .checkout-section {
        .bg-image {
            position: absolute;
            right: -10px;
        }
    }
}
</style>

<template>
    <div>
        <div class="container">
            <div class="d-flex flex-column justify-content-center">
                <!-- cart header with logo image, restaurant name and restaurant street -->
                <div class="row">
                    <div class="col cart-header">
                        <!-- take image from public/images/DeliveBooLogo.png -->
                        <img
                            class="custom-image-cart"
                            src="storage/public/images/DeliveBooLogo.png"
                            alt="DeliveBoo Logo"
                        />

                        <!-- restaurant name from db -->
                        <h2 class="restaurant-name">Ciccio Pasticcio</h2>
                        <p class="restaurant-address">Via Roma, 34</p>
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
                <div class="row dish-container">
                    <div class="col-3">
                        <div class="dish-image">
                            <!-- image of the dish -->
                            <img
                                src="storage/public/images/dishes/4.jpg"
                                alt="dish image"
                            />
                        </div>
                    </div>
                    <div class="col-9 dish-information">
                        <div class="dish-and-price">
                            <!-- title and price -->
                            <h4>Pizza Margherita</h4>
                            <span>€ 5,00</span>
                        </div>

                        <!-- cart quantity handle -->
                        <div class="d-flex cart-quantity-button">
                            <!-- bin icon -->
                            <a class="bin-image" href="http://"
                                ><img
                                    src="storage/public/images/icons/bin-trash.svg"
                                    alt="bin-trash"
                            /></a>
                            <!-- add and remove item from cart  -->
                            <div class="pill-button">
                                <a href="http://">-</a>
                                <div class="display-num-pill-button">2</div>
                                <a href="http://">+</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row checkout-section">
                    <img
                        class="bg-image"
                        src="storage/public/images/checkout-bg.svg"
                        alt="checkout-bg"
                    />
                    <!--
                            Structure:
                                - delivery fee
                                - product price
                                - total price
                                - checkout button
                            -->
                    <div>
                        <h1>Hell</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            dishes: [],
            quantity: [],
            subtotal: [],
            total: [],
            cart: null,
        };
    },
    methods: {},
};
</script>
