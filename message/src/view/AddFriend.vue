<template>
  <div
    class="w-screen h-screen z-51 bg-black/50 flex justify-center items-center"
    @click.self="emit('close')"
  >
    <form
      action=""
      class="w-[400px] h-[760px] bg-white rounded shadow flex flex-col justify-between gap-3 p-3 relative"
    >
      <div class="w-full flex flex-col justify-center gap-3">
        <h2 class="font-medium">Thêm bạn</h2>
        <input
          type="text"
          placeholder="Số điện thoại"
          class="w-80 outline-none border-b-1"
          v-model="keyword"
        />
      </div>
      <div class="w-full flex-1 flex flex-col justify-start gap-3">
        <div class="flex w-full">
          <div class="w-full flex gap-3">
            <img
              :src="`http://localhost:8000/storage/avatars/${user.avatar}`"
              alt="img"
              class="w-[45px] h-[45px] rounded-full"
            />
            <nav>
              <h2>{{ user.name }}</h2>
              <h4>{{ user.phone }}</h4>
            </nav>
          </div>
          <button
            class="w-[20%] flex justify-center items-center rounded-[15px] text-white bg-blue-500"
            type="button"
            @click="AddFiend(user.id)"
          >
            Kết Bạn
          </button>
        </div>
      </div>
      <div class="w-full flex justify-end p-3 gap-3 border-t-1">
        <button
          class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400"
        >
          Hủy
        </button>
        <button
          class="px-4 py-2 bg-blue-200 text-gray-700 rounded hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400"
          @click="searchFriend()"
          type="button"
        >
          Tìm kiếm
        </button>
      </div>
    </form>
  </div>
</template>
<script setup>
import axios from "axios";
import { ref } from "vue";
const props = defineProps({
  id: String,
});
const emit = defineEmits(["close"]);
const keyword = ref([]);
const user = ref({});
const searchFriend = async () => {
  try {
    const res = await axios.get(
      `http://localhost:8000/api/searchFriend/${props.id}`,
      {
        params: { keyword: keyword.value },
      },
    );
    console.log("API response:", res.data);
    user.value = res.data;
    if (res.data && res.data.length > 0) {
      user.value = res.data[0]; // lấy user đầu tiên
    } else {
      user.value = null; // không tìm thấy
    }
    console.log(user.value);
  } catch (error) {
    console.error(error);
  }
};
// addFriend
const AddFiend = async (receiverId) => {
  try {
    const res = await axios.post(
      `http://localhost:8000/api/AddFriend/${props.id}`,
      {
        receiver_Id: receiverId,
      },
    );
    console.log(res.data);
  } catch (error) {
    console.log(error);
  }
};
</script>
