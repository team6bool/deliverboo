<template>
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
                    <line x1="20" y1="12" x2="4" y2="12"></line>
                    <polyline points="10 18 4 12 10 6"></polyline>
                </svg>
                Indietro
            </a></router-link
        >

        <div class="text-center pt-4">
            <h2 class="text-dark-orange name">Ciccio Pasticcio</h2>
            <h3 class="text-yellow">Via Roma, 34</h3>
            <p class="text-start pt-4">
                Nasce nel 2004 a Ponza la “Ciccio Pasticcio”, direttamente
                dall’antica tradizione Partenopea. Una Tipica Pizzeria
                Napoletana a doppio forno a legna e con cucina specializzata nei
                piatti della classica arte della cucina di Napoli.
            </p>
        </div>

        <div class="text-center pt-2">
            <h2 class="text-yellow">I nostri piatti</h2>
            <div class="card-box">
                <div class="row">
                    <div class="col-3">
                        <div class="img-box">
                            <img
                                src="/images/DeliveBooLogoSmall.png"
                                alt=""
                                class="plate-img"
                            />
                        </div>
                    </div>
                    <div class="col-9 text-start ps-0 pt-2">
                        <h3 class="text-orange">Pizza Cipolle</h3>
                        <a href="#" class="btn btn-primary show-btn text-small">
                Vedi
            </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
export default {
    components: {},
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
.my-btn {
    padding: 3px 10px;
}

.show-btn {
    padding: 4px 40px;
}

.text-dark-orange {
    color: #e83e00;
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
.name {
    font-weight: 700;
    text-shadow: 2px 2px 5px rgb(174, 174, 174);
}

.card-box {
    border: 1px solid transparent;
    border-radius: 10px;
    box-shadow: 2px 2px 5px rgb(174, 174, 174);
    padding: 10px;
}

.img-box {
    border: 1px solid transparent;
    border-radius: 50%;
    height: 3.7rem;
    width: 3.7rem;
}

.plate-img {
    object-fit: contain;
    height: 3.7rem;
    width: 3.7rem;
}
</style>
