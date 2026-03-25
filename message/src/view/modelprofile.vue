<template>
  <div
    @click.self="emit('close')"
    class="fixed inset-0 bg-black/40 flex justify-center items-center z-50"
  >
    <form class="w-[400px] h-[760px] bg-white rounded shadow">
      <div class="w-full h-1/3 flex flex-col gap-3 border-b-4 border-black">
        <h1 class="w-full flex justify-center items-center text-xl font-medium">
          Thông tin tài khoản
        </h1>
        <div class="w-full h-[255px] relative">
          <img
            :src="`http://localhost:8000/storage/avatars/${userStore.user.avatarCover}`"
            alt=""
            class="w-full h-full"
          />
          <input
            class="absolute w-full h-full top-0 cursor-pointer z-10 opacity-0"
            type="file"
            accept="image/*"
            @change="(e) => handleImage(e, 'avatarCover')"
          />
        </div>
        <div class="w-full relative">
          <div class="w-full absolute top-[-30px] flex items-center gap-3">
            <div class="w-[75px] h-[75px] relative">
              <img
                v-if="userStore.user?.avatar"
                :src="`http://localhost:8000/storage/avatars/${userStore.user.avatar}`"
                alt=""
                class="w-full h-full rounded-full top[-10px]"
              />
              <input
                class="w-full h-full absolute top-0 opacity-0 cursor-pointer z-10"
                type="file"
                accept="image/*"
                @change="(e) => handleImage(e, 'avatar')"
              />
            </div>
            <div
              class="absolute w-[25px] h-[25px] flex justify-center items-center rounded-full bg-gray-700 bottom-0 left-10"
            >
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
                  d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z"
                />
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z"
                />
              </svg>
            </div>
            <label for="" class="font-medium text-xl">{{ user.name }}</label>
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
                d="M9.53 16.122a3 3 0 0 0-5.78 1.128 2.25 2.25 0 0 1-2.4 2.245 4.5 4.5 0 0 0 8.4-2.245c0-.399-.078-.78-.22-1.128Zm0 0a15.998 15.998 0 0 0 3.388-1.62m-5.043-.025a15.994 15.994 0 0 1 1.622-3.395m3.42 3.42a15.995 15.995 0 0 0 4.764-4.648l3.876-5.814a1.151 1.151 0 0 0-1.597-1.597L14.146 6.32a15.996 15.996 0 0 0-4.649 4.763m3.42 3.42a6.776 6.776 0 0 0-3.42-3.42"
              />
            </svg>
          </div>
        </div>
      </div>
      <!--  -->
      <div
        class="w-full relative h-1/3 flex flex-col gap-3 justify-center items-center border-b-4 border-black"
      >
        <h2 class="font-medium">Thông tin kinh doanh</h2>
        <p>Tạo thông tin kinh doanh dể khách hàng biết đến bạn</p>
        <button
          class="w-full absolute bottom-0 flex justify-center items-center hover:bg-blue-500 h-[75px]"
        >
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
              d="M9.53 16.122a3 3 0 0 0-5.78 1.128 2.25 2.25 0 0 1-2.4 2.245 4.5 4.5 0 0 0 8.4-2.245c0-.399-.078-.78-.22-1.128Zm0 0a15.998 15.998 0 0 0 3.388-1.62m-5.043-.025a15.994 15.994 0 0 1 1.622-3.395m3.42 3.42a15.995 15.995 0 0 0 4.764-4.648l3.876-5.814a1.151 1.151 0 0 0-1.597-1.597L14.146 6.32a15.996 15.996 0 0 0-4.649 4.763m3.42 3.42a6.776 6.776 0 0 0-3.42-3.42"
            />
          </svg>
          Cập nhật
        </button>
      </div>
      <!-- Thông tin cá nhân  -->
      <div class="w-full h-1/3 flex flex-col gap-3 border-b-4 relative">
        <div class="w-full px-2 flex gap-3">
          <span>Giới Tính</span>
          <span>{{ user.gender }}</span>
        </div>
        <div class="w-full px-2 flex gap-3">
          <span>Ngày Sinh</span>
          <span>{{ user.birthday }}</span>
        </div>
        <div class="w-full px-2 flex gap-3">
          <span>Điện thoại</span>
          <span>{{ user.phone }}</span>
        </div>
        <p>Chỉ có bạn bè lưu số hoặc kết bạn mới xem được số này</p>
        <button
          class="w-full absolute bottom-0 flex justify-center items-center hover:bg-blue-500 h-[75px]"
          @click="OpenModelPersonalInformation"
          type="button"
        >
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
              d="M9.53 16.122a3 3 0 0 0-5.78 1.128 2.25 2.25 0 0 1-2.4 2.245 4.5 4.5 0 0 0 8.4-2.245c0-.399-.078-.78-.22-1.128Zm0 0a15.998 15.998 0 0 0 3.388-1.62m-5.043-.025a15.994 15.994 0 0 1 1.622-3.395m3.42 3.42a15.995 15.995 0 0 0 4.764-4.648l3.876-5.814a1.151 1.151 0 0 0-1.597-1.597L14.146 6.32a15.996 15.996 0 0 0-4.649 4.763m3.42 3.42a6.776 6.776 0 0 0-3.42-3.42"
            />
          </svg>
          Cập nhật
        </button>
      </div>
    </form>
    <ModelPersonalInformation v-show="Openmodel" :id="props.id" />
  </div>
</template>
<script setup>
import ModelPersonalInformation from "./modelPersonalInformation.vue";
import axios from "axios";
import { ref, onMounted } from "vue";
const emit = defineEmits(["close"]);
//
const props = defineProps({
  id: String,
});

const user = ref({});
const getProfile = async () => {
  try {
    console.log(props.id);
    const res = await axios.get(
      `http://localhost:8000/api/profile/${props.id}`,
    );
    user.value = res.data.user;
    console.log("API:", res.data);
  } catch (error) {
    console.log(error);
  }
};
onMounted(() => {
  getProfile();
});
// upload avatar
import { useUserStore } from "@/stores/user";
const imageUrl = ref(null);
const userStore = useUserStore();
const handleImage = async (e, type) => {
  try {
    const file = e.target.files[0];
    if (!file) {
      return;
    }
    const formData = new FormData();
    formData.append("avatar", file);
    formData.append("type", type);
    const res = await axios.post(
      `http://localhost:8000/api/handleImage/${props.id}`,
      formData,
    );
    // thay doi phat hien thi luon
    const fileName = res.data.file;
    if (type === "avatar") {
      userStore.updateAvatar(fileName);
    } else if (type === "avatarCover") {
      userStore.updateAvatarCover(fileName); // nếu có
    }
    console.log(res.data);
  } catch (error) {
    console.log(error.response.data);
  }
};
//  model con
const Openmodel = ref(false);
const OpenModelPersonalInformation = () => {
  Openmodel.value = !Openmodel.value;
};
</script>
