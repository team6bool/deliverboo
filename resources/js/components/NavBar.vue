<template>
    <header class="bg-primary position-sticky top-0 start-0 end-0">
        <div class="container d-flex justify-content-between align-items-center py-3">
            <router-link :to="{name: 'home.index'}" class="logo no-decoration" href="#">
                <img
                    src="/images/DeliveBooLogoSmallWhite.png"
                    alt="DeliveBoo Logo"
                />
            </router-link>
            <div class="nav-buttons">
                <button class="btn-secondary"><a href="/login">Accedi</a></button>
            </div>
        </div>
    </header>
</template>

<script>
export default {};
</script>

<style scoped lang="scss">
header{
    z-index: 6;
    .logo{
        img{
            max-height: 35px;
        }
    }
    .nav-buttons {
        button {
            margin-left: 1rem;
        }
    }
}
</style>
