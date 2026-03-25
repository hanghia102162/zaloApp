<script setup>
import Container from "../view/Container.vue";
import Sidebar from "../view/Sidebar.vue";
import ModelProfile from "../view/modelprofile.vue";
import { ref } from "vue";

const openmodel = ref(false);

const openModel = () => {
  openmodel.value = true;
};

import { useRoute } from "vue-router";

const route = useRoute();

const id = route.params.id;

console.log(id);
</script>

<template>
  <div class="w-screen bg-gray-100 flex">
    <Sidebar @openProfile="openModel" :id="id" />
    <Container class="flex-1" />
    <ModelProfile v-if="openmodel" :id="id" @close="openmodel = false" />
  </div>
</template>
