<template>
    <header class="bg-primary">
        <div class="container d-flex justify-content-between align-items-center py-3">
            <a class="logo" href="#">
                <img src="/images/DeliveBooLogoSmallWhite.png" alt="DeliveBoo Logo">
            </a>
            <div class="nav-buttons">
                <button class="btn-secondary"><a href="/register">Accedi</a></button>
                <button class="btn-cart"><i class="fa fa-solid fa-cart-shopping"></i></button>
            </div>
        </div>
    </header>
</template>

<script>
export default {
}
</script>

<style scoped lang="scss">
header{
    .logo{
        img{
            max-height: 35px;
        }
    }
    .nav-buttons{
        button{
            margin-left: 1rem;
        }
    }
}
</style>
