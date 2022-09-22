<template>
    <div class="section bg-primary">
        <div class="jumbotron">
            <video src="/images/video/jumbo.mp4" autoplay loop muted></video>
        </div>
        <div class="container pt-5">
            <h1>Cerca il tuo piatto preferito</h1>
            <p>Nell'isola di Ponza ci sono più di mille ristoranti, scopri quello che più ti piace!</p>
        </div>
    </div>
</template>

<script>
export default {
}
</script>

<style scoped lang="scss">
.section {
    .jumbotron {
        height: 250px;

        video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: 50% 50%;
        }
    }
}

@media screen and (min-width: 720px) {
    .section {
        .jumbotron {
            height: 450px;
        }
    }
}

@media screen and (min-width: 1920px) {
    .section {
        .jumbotron {
            height: 600px;
        }
    }
}
</style>
