<script setup>
import Container from "../view/Container.vue";
import Sidebar from "../view/Sidebar.vue";
import ModelProfile from "../view/modelprofile.vue";
import FriendInvitation from "../view/FriendInvitation.vue";
import ListFriend from "../view/ListFriend.vue";
import { ref } from "vue";

const openmodel = ref(false);
const containerX = ref(true);
const openFriendInvitation = ref(false);

const openListFriend = ref(false);

const OpenListFriend = () => {
  openListFriend.value = true;
  openFriendInvitation.value = false;
  containerX.value = false;
};
const openModel = () => {
  openmodel.value = true;
};
const OpenFriendInvitation = () => {
  openFriendInvitation.value = true;
  containerX.value = false;
  openListFriend.value = false;
};
const OpenContainer = () => {
  containerX.value = true;
  openFriendInvitation.value = false;
  openListFriend.value = false;
};
const chatUser = ref(null);

const OpenChat = (friend) => {
  chatUser.value = friend;

  containerX.value = true;
  openListFriend.value = false;
};
import { useRoute } from "vue-router";
import ListFriendVue from "../view/ListFriend.vue";

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
      @OpenListFriend="OpenListFriend"
      :id="id"
    />
    <Container class="flex-1" v-if="containerX" :chatUser="chatUser" />
    <FriendInvitation class="flex-1" v-if="openFriendInvitation" :id="id" />
    <ListFriend
      class="flex-1"
      v-if="openListFriend"
      :id="id"
      @openChat="OpenChat"
    />
    <ModelProfile v-if="openmodel" :id="id" @close="openmodel = false" />
  </div>
</template>
