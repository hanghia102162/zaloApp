<template>
  <div
    class="w-full h-screen mx-auto shadow rounded-lg p-4 flex flex-col gap-3"
  >
    <h2
      class="text-lg w-full flex h-[55px] flex items-center bg-white font-semibold mb-2"
    >
      Danh sách bạn bè
    </h2>
    <p class="flex">Danh sách bạn bè (100)</p>
    <div
      class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3"
    >
      <div class="col-span-2 relative">
        <input
          type="text"
          placeholder="Tìm bạn"
          class="w-full border rounded px-7 py-2 mb-4 focus:outline-none"
        />
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="currentColor"
          class="size-6 absolute top-1/2 left-6 -translate-3/4"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"
          />
        </svg>
      </div>
      <div class="flex-1 relative">
        <select
          name=""
          class="w-full h-[42px] border focus:outline-none flex justify-center px-7"
          id=""
        >
          <option value="">Tên(A->Z)</option>
          <option value="">Tên(Z->A)</option>
        </select>
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="currentColor"
          class="size-6 absolute top-1/2 -translate-3/4 ml-5"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M3 7.5 7.5 3m0 0L12 7.5M7.5 3v13.5m13.5 0L16.5 21m0 0L12 16.5m4.5 4.5V7.5"
          />
        </svg>
      </div>
      <div class="flex-1 relative">
        <select name="" class="w-full border h-[42px] px-7" id="">
          <option value="">Tất cả</option>
          <option value="">phân loại</option>
        </select>
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="currentColor"
          class="size-6 absolute top-1/2 -translate-3/4 ml-5"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z"
          />
        </svg>
      </div>
    </div>
    <div class="flex-1 overflow-auto">
      <div class="col-span-4 flex flex-col gap-3">
        <!--  -->
        <div
          class="flex items-center justify-between gap-3"
          v-for="item in user"
          :key="item.id"
          @click="openChat(item.friend_user)"
        >
          <div class="flex items-center gap-3">
            <div class="w-[55px] h-[55px]">
              <img
                src="../../img/Screenshot 2026-01-11 195435.png"
                class="w-full h-full rounded-full"
                alt=""
              />
            </div>
            <h2 class="font-medium text-xl">{{ item.friend_user.name }}</h2>
          </div>

          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="size-6"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z"
            />
          </svg>
        </div>
        <!--  -->
      </div>
    </div>
  </div>
</template>
<script setup>
import axios from "axios";
import { ref, onMounted } from "vue";
const props = defineProps({
  id: String,
});
const user = ref([]);
const ShowFriends = async () => {
  try {
    const res = await axios.get(`http://localhost:8000/api/index/${props.id}`);
    user.value = res.data.user;
    console.log(user.value);
  } catch (error) {
    console.log(error);
  }
};
onMounted(() => {
  ShowFriends();
});
const emit = defineEmits(["openChat"]);
const openChat = (friend) => {
  emit("openChat", friend);
};
</script>
