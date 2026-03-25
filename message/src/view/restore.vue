<template>
  <!-- Dăng kí tai khoan -->
  <div
    class="w-screen h-screen flex flex-col justify-center items-center gap-3"
  >
    <h1 class="text-blue-500 text-6xl font-medium">Zalo</h1>
    <h2 class="font-normal text-4xl" v-if="khoiPhuc1">
      Đăng nhập với tài khoản Zalo
    </h2>
    <h2 class="font-normal text-4xl" v-if="khoiPhuc2">
      Khôi phục mật khẩu Zalo
    </h2>
    <h2 class="font-normal text-4xl">để kết nối dứng dụng zalo web</h2>
    <div
      class="bg-white p-4 rounded-xl shadow-[0_2px_12px_-4px_rgba(0,0,0,0.2)] p-3"
    >
      <form
        action=""
        class="flex flex-col gap-3 w-[300px] h-[360px] justify-around items-center"
      >
        <h1 class="font-medium text-2xl">Nhập email cua bạn</h1>
        <div class="w-full relative">
          <input
            id="otp3"
            v-model="email"
            placeholder=" "
            type="text"
            class="w-full peer p-2 shadow focus:outline-none"
          />
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="size-6 absolute top-1/2 -translate-y-1/2 right-0"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3"
            />
          </svg>
          <label
            for="otp3"
            class="absolute left-2 top-1/2 peer-not-placeholder-shown:top-[-10px] peer-not-placeholder-shown:text-sm -translate-y-1/2 left-0 peer-focus:top-[-10px] transition-all duration-500 ease-linear"
            >Email</label
          >
        </div>
        <button
          type="button"
          @click="showFrom2()"
          class="w-full h-[45px] rounded-xl bg-blue-400 text-white cursor-pointer hover:bg-blue-500"
        >
          Tiếp tục
        </button>
        <button @click="showFrom">Quay lại</button>
      </form>
    </div>
  </div>
</template>
<script setup>
import axios from "axios";
import { ref } from "vue";
import { useRouter } from "vue-router";
const khoiPhuc1 = ref(false);
const khoiPhuc2 = ref(true);
const router = useRouter();
const showFrom = () => {
  router.push("/");
};
const email = ref("");
const showFrom2 = async () => {
  console.log("click roi");

  try {
    const res = await axios.post("http://localhost:8000/api/checkEmail", {
      email: email.value,
    });

    console.log("data:", res.data);

    if (res.data.status) {
      router.push(`/updatePassword/${res.data.id}`);
    }
  } catch (error) {
    console.log(error);
  }
};
</script>
