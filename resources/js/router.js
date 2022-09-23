import Vue from "vue";
import VueRouter from "vue-router";
import Restaurant from "./pages/TheRestaurant.vue";
import Home from "./pages/TheMain.vue";

//put all the different pages below

Vue.use(VueRouter);

/**
 * @type {import("vue-router").RouteConfig[]}
 */

const routes = [
    //path = URI (into the address bar)
    //component = the component showed when the page is opened
    //meta = attach arbitrary information to routes like transition names, who can access the route, etc.
    {
        path: "/",
        component: Home,
        name: "home.index",
        meta: {
            title: "Deliveboo Homepage",
        },
    },
    {
        path: "/restaurant",
        component: Restaurant,
        name: "restaurant.index",
        meta: {
            title: "Deliveboo Restaurant",
        },
    }
];

const router = new VueRouter({
    //it must contain an array of routes

    routes,
    mode: "history",
});

router.beforeEach((to, from, next) => {
    document.title = to.meta.title ?? "Deliveboo";

    next();
});

export default router;
