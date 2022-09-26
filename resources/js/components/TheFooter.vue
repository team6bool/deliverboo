<template>
    <footer class="bg-primary pt-1">
        <svg
            class="wave"
            width="320"
            viewBox="0 0 320 38"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
            preserveAspectRatio="none"
        >
            <path
                d="M163.255 17.2059C242.579 52.198 300.803 24.4959 320 6.27091V37.5H0V26.1528C21.3667 8.59048 83.9311 -17.7861 163.255 17.2059Z"
                fill="#1D1D1D"
            />
        </svg>
        <div class="section bg-dark">
            <div class="container text-start text-light">
                <div class="px-3">
                    <div class="d-xl-flex flex-xl-column align-items-xl-center">
                        <img
                            class="logo pb-3"
                            src="/images/DeliveBooLogo.png"
                            alt=""
                        />
                    </div>

                    <div
                        class="footer-links d-flex row justify-content-sm-between justify-content-xl-evenly text-xl-center"
                    >
                        <div
                            v-for="link in links"
                            :key="link.title"
                            class="col-12 col-sm-6 col-md-3 col-xl-2"
                        >
                            <h5 class="fw-bold pb-1">{{ link.title }}</h5>
                            <ul class="list-unstyled fw-light">
                                <li v-for="item in link.subLinks" :key="item">
                                    <a href="#">{{ item }}</a>
                                </li>
                            </ul>
                        </div>
                        <div
                            class="d-flex align-items-xl-center flex-column gap-5 gap-sm-3 pb-4 col-12 col-sm-6 col-md-3"
                        >
                            <div
                                class="d-flex justify-content-center align-items-xl-center gap-5 gap-sm-3 flex-row flex-sm-column download-box"
                            >
                                <img
                                    src="/images/icons/download-apple.svg"
                                    alt=""
                                    class="download"
                                />
                                <img
                                    src="/images/icons/download-appstore.svg"
                                    alt=""
                                    class="download"
                                />
                            </div>

                            <ul class="list-unstyled fw-light">
                                <li><a href="#">TERMINI E CONDIZIONI</a></li>
                                <li><a href="#">PRIVACY POLICY</a></li>
                                <li><a href="#">COOKIES POLICY</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="copy py-4 fw-light text-sm-center">
                        <em>Disegnato e sviluppato da:</em>
                        <ul class="list-unstyled pt-3 fw-semibold">
                            <li><a href="#">Arturo Arnò</a></li>
                            <li><a href="#">Luca Dercole</a></li>
                            <li><a href="#">Paolo Di Giovanni</a></li>
                            <li><a href="#">Alessio Mazzella</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
export default {
    data() {
        return {
            links: [
                {
                    title: "Unisciti a noi",
                    subLinks: [
                        "Registrati",
                        "Lavora con noi",
                        "Diventa un rider",
                        "Sponsor",
                    ],
                },
                {
                    title: "Seguici",
                    subLinks: [
                        "TikTok",
                        "Instagram",
                        "Twitter",
                        "Facebook",
                        "Youtube",
                    ],
                },
                {
                    title: "Link utili",
                    subLinks: ["Su di noi", "FAQ", "Contattaci"],
                },
            ],
        };
    },
};
</script>

<style scoped lang="scss">
footer {
    .wave {
        width: 100vw;
        height: 65px;
        margin-bottom: -3px;
    }

    .container {
        .logo {
            width: 150px;
        }

        li {
            padding-bottom: 1rem;
        }

        .footer-links {
            border-bottom: 1px solid whitesmoke;
        }
    }

    .download {
        width: 90%;
        height: auto;
    }
}

@media screen and (min-width: 576px) {
    .download-box {
        width: 150px;
        height: auto;
    }
    footer {
        .wave {
            height: 50px;
        }
    }
}
</style>
