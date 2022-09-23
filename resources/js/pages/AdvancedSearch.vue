<template>
    <div class="search-section bg-primary">
            <div class="container py-3">
                <div class="search-bar d-flex shadow">
                    <a class="icon bg-soft" href="#">
                        <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g filter="url(#filter0_d_7_23)">
                                <path
                                    d="M32.9749 24.0165L27.9072 18.9415L24.0092 17.3288C25.3071 15.4804 26.0025 13.2753 26 11.0157C26 4.94162 21.0654 0 15 0C8.93455 0 4 4.94162 4 11.0157C4 17.0898 8.93455 22.0315 15 22.0315C17.276 22.0341 19.4961 21.3257 21.3511 20.005L22.9574 23.8981L28.0249 28.9733C28.3499 29.2988 28.7358 29.557 29.1604 29.7331C29.5851 29.9093 30.0402 30 30.4998 30C30.9595 30 31.4146 29.9094 31.8393 29.7332C32.2639 29.5571 32.6498 29.2989 32.9748 28.9735C33.2998 28.648 33.5576 28.2616 33.7335 27.8364C33.9094 27.4111 34 26.9553 34 26.495C34 26.0347 33.9095 25.579 33.7336 25.1537C33.5577 24.7284 33.2999 24.342 32.9749 24.0165ZM6 11.0157C6 6.04613 10.0375 2.00286 15 2.00286C19.9625 2.00286 24 6.04613 24 11.0157C24 15.9853 19.9625 20.0286 15 20.0286C10.0375 20.0286 6 15.9853 6 11.0157ZM31.5606 27.5571C31.2791 27.8384 30.8976 27.9964 30.4999 27.9964C30.1022 27.9964 29.7208 27.8384 29.4393 27.5571L24.6535 22.7645L23.1601 19.1446L26.7749 20.6402L31.5607 25.4328C31.8416 25.7147 31.9993 26.0967 31.9993 26.495C31.9993 26.8932 31.8415 27.2752 31.5606 27.5571Z"
                                    fill="#FD5F25" />
                            </g>
                            <defs>
                                <filter id="filter0_d_7_23" x="0" y="0" width="38" height="38"
                                    filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                    <feColorMatrix in="SourceAlpha" type="matrix"
                                        values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                    <feOffset dy="4" />
                                    <feGaussianBlur stdDeviation="2" />
                                    <feComposite in2="hardAlpha" operator="out" />
                                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_7_23" />
                                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_7_23"
                                        result="shape" />
                                </filter>
                            </defs>
                        </svg>
                    </a>
                    <input type="text" name="" id="" placeholder="Cosa ti va di mangiare?">
                </div>
            </div>
        </div>
</template>

<script>
    export default {

    };
</script>

<style scoped lang="scss">
.search-section {
    position: sticky;
    top: 0;
    z-index: 7;
    margin: -1px 0;

    .container {

        .search-bar {
            max-width: 500px;
            margin: auto;
            border-radius: 10px;
            overflow: hidden;

            .icon {
                padding: 0.6rem 0.5rem 0.3rem 0.6rem;
                *{
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