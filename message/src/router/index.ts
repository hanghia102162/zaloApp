import { createRouter, createWebHistory } from "vue-router";
import Login from "../view/login.vue";
import Page from "../conpoment/page.vue";
import Register from "../view/register.vue";
import Restore from "../view/restore.vue";
import UpdatePassword from "../view/update_password.vue";
const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      component: Login,
    },
    {
      path: "/page/:id",
      component: Page,
    },
    {
      path: "/register",
      component: Register,
    },
    {
      path: "/restore",
      component: Restore,
    },
    {
      path: "/updatePassword/:id",
      component: UpdatePassword,
    },
  ],
});

export default router;
