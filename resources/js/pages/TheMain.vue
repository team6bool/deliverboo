<template>
    <main class="">
        <JumboTron />
        <div class="search-section bg-primary">
            <div class="container py-3">
                <button class="btn btn-secondary large">
                <a @click="resetCategories()">
                    <i class="fa fa-solid fa-search pe-2"></i> Cerca per categoria</a>
                </button>
            </div>
        </div>
        <div class="decoration position-relative upper">
            <svg class="up-down img-fluid responsive-svg" version="1.1" xmlns="http://www.w3.org/2000/svg" width="100%" height="145px"
                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 320 123" xml:space="preserve" preserveAspectRatio="none">
                <path class="swish" d="M0.2,0c0,0,0,59.5,105.1,80.9S320,101,320,101v22H0L0.2,0z" />
            </svg>
            <svg class="burger" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path
                    d="M412.717,89.012c-35.578-20.985-82.545-32.541-132.246-32.541H239.529c-49.7,0-96.668,11.556-132.246,32.541C69.054,111.56,48,142.453,48,176v16H472V176C472,142.453,450.946,111.56,412.717,89.012ZM82.8,160c14.153-40.121,80.185-71.529,156.731-71.529h40.942c76.546,0,142.578,31.408,156.731,71.529Z" />
                <rect width="424" height="32" x="48" y="304" />
                <path
                    d="M387.2,224.039c-24.785,0-37.77,6.125-49.227,11.529-10.034,4.733-17.96,8.471-35.576,8.471s-25.54-3.738-35.574-8.471c-11.456-5.4-24.441-11.529-49.225-11.529s-37.769,6.125-49.225,11.529c-10.033,4.733-17.957,8.471-35.572,8.471s-25.54-3.738-35.573-8.471c-11.456-5.4-24.441-11.529-49.225-11.529v32c17.615,0,25.54,3.738,35.573,8.471,11.456,5.4,24.441,11.529,49.225,11.529s37.768-6.125,49.224-11.529c10.033-4.733,17.958-8.471,35.573-8.471s25.54,3.738,35.573,8.471c11.457,5.4,24.441,11.529,49.226,11.529s37.77-6.125,49.227-11.529c10.034-4.733,17.959-8.471,35.576-8.471s25.542,3.738,35.576,8.471c11.457,5.4,24.442,11.529,49.227,11.529v-32c-17.617,0-25.542-3.738-35.576-8.471C424.967,230.164,411.982,224.039,387.2,224.039Z" />
                <path d="M48,448a24.028,24.028,0,0,0,24,24H448a24.028,24.028,0,0,0,24-24V368H48Zm32-48H440v40H80Z" />
            </svg>
        </div>
        <CategoriesSection />
        <div class="decoration position-relative lower">
            <svg class="w-100 responsive-svg" version="1.1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 320 123"
                style="enable-background: new 0 0 320 123" xml:space="preserve" preserveAspectRatio="none">
                <path class="swish" d="M0.2,0c0,0,0,59.5,105.1,80.9S320,101,320,101v22H0L0.2,0z" />
            </svg>
            <svg class="pizza" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path
                    d="M468.285,106.1c-73.4-48.951-142.775-73.181-212.079-74.076C186.026,31.159,116.8,52.721,44.54,98.055a31.842,31.842,0,0,0-10.572,43.3L228.554,472.874A31.724,31.724,0,0,0,256,488.676h.16a31.722,31.722,0,0,0,27.434-15.537L477.96,149.191A31.959,31.959,0,0,0,468.285,106.1Zm-17.764,26.624L256.151,456.676,61.547,125.162C127.108,84.028,189.454,64,252.007,64q1.893,0,3.787.024c62.934.812,126.633,23.285,194.737,68.7Z" />
                <path d="M223.576,231.487A27.731,27.731,0,1,0,201.069,263.6,27.731,27.731,0,0,0,223.576,231.487Z" />
                <circle cx="307.735" cy="283.762" r="27.731" transform="rotate(-40.627 307.731 283.76)" />
                <rect width="32.001" height="62.482" x="232" y="316.785" transform="rotate(-50.194 248.003 348.028)" />
                <rect width="68.352" height="32" x="253.824" y="180.026" transform="rotate(-20.556 288.002 196.026)" />
                <path
                    d="M120.5,181.58c33.288-20.885,84.546-45.571,140.818-45.571q1.234,0,2.473.016c46.876.6,89.878,15,135.329,45.313l17.754-26.623c-50.825-33.893-99.337-50-152.671-50.688C199.151,103.222,140.915,131,103.5,154.473Z" />
            </svg>
        </div>
        <RestSection />
    </main>
</template>

<script>
import JumboTron from "../components/JumboTron.vue";
import CategoriesSection from "../components/CategoriesSection.vue";
import RestSection from "../components/RestSection.vue";
import { state } from './../store'

export default {
    methods: {
        resetCategories(){
            state.selectedCategory = "";
            this.$router.push("search");
        }
    },
    components: { JumboTron, CategoriesSection, RestSection },
};
</script>

<style scoped lang="scss">
.search-section {
    margin: -1px 0;

    .container {
        button {
            &:hover, &:active{
                i {

                * {
                    transition: 200ms ease-out;
                }

                    g {
                        path {
                            fill: white;
                        }
                    }
            }

            }
        }
    }
}

.decoration {
    overflow: hidden;
    --margin: -5rem;

    &.upper {
        margin-bottom: var(--margin);
    }

    &.lower {
        margin-top: var(--margin);
        margin-bottom: -1px;
    }

    .swish {
        fill: var(--yellow);
    }

    .burger {
        width: 60px;
        position: absolute;
        top: 0.5rem;
        right: -0.5rem;
        transform: rotate(-30deg);

        >* {
            fill: var(--orange);
        }
    }

    .pizza {
        width: 60px;
        position: absolute;
        bottom: 0.5rem;
        left: -0.5rem;
        transform: rotate(-40deg);

        >* {
            fill: var(--orange);
        }
    }
}

.up-down {
    transform: rotate(180deg);
}

@media screen and (min-width: 576px) {
    .responsive-svg {
        height: 150px;
    }
}

@media screen and (min-width: 768px) {
    .responsive-svg {
        height: 100px;
    }

    .decoration {
        --margin: -4rem;
    }
}
</style>
