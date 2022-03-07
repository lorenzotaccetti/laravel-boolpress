import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);

import Home from './pages/Home.vue';
import About from './pages/About.vue';
import Blog from './pages/Blog.vue';
import NotFound from './pages/NotFound.vue';
import Show from './pages/Show.vue';
import TagDetail from './pages/TagDetail.vue';
import ContactUs from './pages/ContactUs.vue';

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/about",
            name: "about",
            component: About
        },
        {
            path: "/blog",
            name: "blog",
            component: Blog
        },
        {
            path: "/blog/:slug",
            name: "show",
            component: Show
        },
        {
            path: "/tags/:slug",
            name: "tag-detail",
            component: TagDetail
        },
        {
            path: "/contact-us",
            name: "contact-us",
            component: ContactUs
        },
        {
            path: "/*",
            name: "not-found",
            component: NotFound
        },
    ]
});

export default router;