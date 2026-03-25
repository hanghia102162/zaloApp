import { defineStore } from "pinia";

export const useUserStore = defineStore("user", {
  state: () => ({
    user: null,
  }),

  actions: {
    setUser(data) {
      this.user = data;
    },

    updateAvatar(fileName) {
      if (this.user) {
        this.user.avatar = fileName;
      }
    },
    updateAvatarCover(fileName) {
      if (this.user) {
        this.user.avatarCover = fileName;
      }
    },
  },
});
