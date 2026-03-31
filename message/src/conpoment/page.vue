<script setup>
import Container from "../view/Container.vue";
import Sidebar from "../view/Sidebar.vue";
import ModelProfile from "../view/modelprofile.vue";
import FriendInvitation from "../view/FriendInvitation.vue";
import { ref } from "vue";

const openmodel = ref(false);
const containerX = ref(true);
const openFriendInvitation = ref(false);

const openModel = () => {
  openmodel.value = true;
};
const OpenFriendInvitation = () => {
  openFriendInvitation.value = true;
  containerX.value = false;
};
const OpenContainer = () => {
  containerX.value = true;
  openFriendInvitation.value = false;
};
import { useRoute } from "vue-router";

const route = useRoute();

const id = route.params.id;

console.log(id);
</script>

<template>
  <div class="w-screen bg-gray-100 flex">
    <Sidebar
      @openProfile="openModel"
      @openFriendInvitation="OpenFriendInvitation"
      @OpenContainer="OpenContainer"
      :id="id"
    />
    <Container class="flex-1" v-if="containerX" />
    <FriendInvitation class="flex-1" v-if="openFriendInvitation" />
    <ModelProfile v-if="openmodel" :id="id" @close="openmodel = false" />
  </div>
</template>
