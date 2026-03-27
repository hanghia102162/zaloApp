<template>
  <div
    @click.self="emit('close')"
    class="w-screen h-screen flex justify-center items-center"
  >
    <form action="" class="w-[350px] h-[450px] bg-white p-3 relative">
      <div class="w-full h-2/3 flex flex-col justify-between item-center gap-3">
        <div class="w-full flex justify-between item-center">
          <button>
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
                d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"
              />
            </svg>
          </button>
          <h2>Cập nhập thông tin</h2>
          <button>
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
                d="M6 18 18 6M6 6l12 12"
              />
            </svg>
          </button>
        </div>
        <div class="w-full flex flex-col justify-center item-center">
          <label for="">Họ và tên </label>
          <input
            type="text"
            :placeholder="user.name"
            class="w-full border h-[45px] rounded-[5px] p-3"
            v-model="Name"
          />
        </div>
        <div class="w-full flex flex-col gap-2">
          <h2 class="font-medium">Thông tin cá nhân</h2>
          <div class="w-full flex gap-3">
            <div class="flex gap-3">
              <input
                type="radio"
                name="nam"
                id=""
                value="male"
                v-model="gender"
              />
              <label for="">Nam</label>
            </div>
            <div class="flex gap-3">
              <input
                type="radio"
                name="nam"
                id=""
                value="female"
                v-model="gender"
              />
              <label for="">Nữ</label>
            </div>
          </div>
        </div>
        <div class="w-full flex flex-col gap-3">
          <h2>Ngày sinh</h2>
          <input
            type="date"
            v-model="birthday"
            class="border rounded-[5px] h-[35px]"
          />
        </div>
      </div>
      <div
        class="border-top w-[90%] absolute bottom-[15px] flex justify-end gap-3"
      >
        <button
          class="p-3 rounded-xl font-medium bg-blue-300 shadow-xl hover:scale-[105%] transition ease-in-out duration-300 hover:translate-y-[-5px]"
        >
          Hủy
        </button>
        <button
          type="button"
          class="p-3 rounded-xl font-medium bg-blue-300 shadow-xl hover:scale-[105%] transition ease-in-out duration-300 hover:translate-y-[-5px]"
          @click="PostUser"
        >
          Cập Nhật
        </button>
      </div>
    </form>
  </div>
</template>
<script setup>
import axios from "axios";
import { onMounted, ref } from "vue";
const emit = defineEmits(["close", "reload"]);
const birthday = ref("");
const gender = ref("");
const Name = ref("");
const props = defineProps({
  id: String,
});
const user = ref({});
const getUser = async () => {
  try {
    const res = await axios.get(
      `http://localhost:8000/api/profile/${props.id}`,
    );
    user.value = res.data.user;
    gender.value = res.data.user.gender;
    birthday.value = res.data.user.birthday.split("T")[0];
    console.log(gender.value);
    console.log("ahahahahahah");
    console.log(user.value);
    console.log(res.data.user.birthday);
  } catch {
    console.error();
  }
};
onMounted(() => {
  getUser();
});
//  sửa thong tin

const PostUser = async () => {
  try {
    const res = await axios.put(
      `http://localhost:8000/api/updateUser/${props.id}`,
      {
        name: Name.value,
        gender: gender.value,
        birthday: birthday.value || null,
      },
    );

    console.log(res);
    emit("reload");
    emit("close");
  } catch (error) {
    console.log(error);
    console.log("ERROR FROM LARAVEL:", error.response.data);
  }
};
</script>
