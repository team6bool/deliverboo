<template>
    <footer class="bg-primary pt-1">
        <img class="wave" src="/images/icons/footer.svg" alt="">
        <div class="section bg-dark">
            <div class="container text-start text-light">
                <div class="px-3">
                    <img class="logo pb-3" src="/images/DeliveBooLogo.png" alt="">
                    <div class="footer-links d-flex flex-column gap-3">
                        <div v-for="link in links" :key="link.title">
                            <h5 class="fw-bold pb-1">{{link.title}}</h5>
                            <ul class="list-unstyled fw-light">
                                <li v-for="item in link.subLinks" :key="item"><a href="#">{{item}}</a></li>
                            </ul>
                        </div>
                        <div class="d-flex justify-content-center gap-5 pb-4">
                            <img src="/images/icons/download-apple.svg" alt="">
                            <img src="/images/icons/download-appstore.svg" alt="">
                        </div>
                        <ul class="list-unstyled fw-light">
                            <li><a href="#">TERMINI E CONDIZIONI</a></li>
                            <li><a href="#">PRIVACY POLICY</a></li>
                            <li><a href="#">COOKIES POLICY</a></li>
                        </ul>
                    </div>
                    <div class="copy py-4 fw-light">
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
                        "Sponsor"
                    ]
                },
                {
                    title: "Seguici",
                    subLinks: [
                        "TikTok",
                        "Instagram",
                        "Twitter",
                        "Facebook",
                        "Youtube"
                    ]
                },
                {
                    title: "Link utili",
                    subLinks: [
                        "Su di noi",
                        "FAQ",
                        "Contattaci"
                    ]
                }
            ]
        }
    }
}
</script>

<style scoped lang="scss">
footer {
    .wave {
        width: 100%;
        margin-bottom: -3px;
    }

    .container {
        .logo {
            width: 150px;
        }

        li{
            padding-bottom: 1rem;
        }

        .footer-links{
            border-bottom: 1px solid whitesmoke;
        }
    }
}
</style>
