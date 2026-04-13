<template>
  <div class="h-screen flex w-110 relative">
    <div class="h-screen w-[25%] bg-blue-500 flex flex-col justify-between p-5">
      <div ref="menuBox" class="relative inline-block z-50">
        <button
          @click.stop="showMenu = !showMenu"
          class="relative cursor-pointer transition duration-300 ease-in-out hover:scale-110"
        >
          <img
            v-if="userStore.user?.avatar"
            :src="`http://localhost:8000/storage/avatars/${userStore.user.avatar}`"
            class="w-15 h-15 rounded-full object-cover"
          />
        </button>
        <div v-if="showMenu" class="absolute top-0 left-full ml-3">
          <!-- Mũi nhọn -->
          <div
            class="absolute top-4 -left-2 w-4 h-4 bg-white rotate-45 shadow"
          ></div>

          <!-- Box -->
          <div class="bg-white rounded-xl shadow-lg p-4 w-56">
            <h1 class="font-semibold mb-2">{{ userStore.user.name }}</h1>

            <ul class="space-y-2 text-sm">
              <li>
                <button @click="openProfile" class="hover:text-blue-500">
                  Hồ sơ của bạn
                </button>
              </li>
              <li><a href="#" class="hover:text-blue-500">Cài đặt</a></li>
              <li><a href="#" class="hover:text-red-500">Đăng xuất</a></li>
            </ul>
          </div>
        </div>

        <button @click="siderBar2()">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="size-8 text-[#fff] cursor-pointer transition duration-300 ease-in-out hover:scale-110 m-[10px]"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a5.969 5.969 0 0 1-.474-.065 4.48 4.48 0 0 0 .978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z"
            />
          </svg>
        </button>
        <button @click="siderBar1()">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="size-8 text-[#fff] cursor-pointer transition duration-300 ease-in-out hover:scale-110 m-[10px]"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Zm6-10.125a1.875 1.875 0 1 1-3.75 0 1.875 1.875 0 0 1 3.75 0Zm1.294 6.336a6.721 6.721 0 0 1-3.17.789 6.721 6.721 0 0 1-3.168-.789 3.376 3.376 0 0 1 6.338 0Z"
            />
          </svg>
        </button>
      </div>

      <div>
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="currentColor"
          class="size-8 text-[#fff] cursor-pointer transition duration-300 ease-in-out hover:scale-110 m-[10px]"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M12 9.75v6.75m0 0-3-3m3 3 3-3m-8.25 6a4.5 4.5 0 0 1-1.41-8.775 5.25 5.25 0 0 1 10.233-2.33 3 3 0 0 1 3.758 3.848A3.752 3.752 0 0 1 18 19.5H6.75Z"
          />
        </svg>

        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="currentColor"
          class="size-8 text-[#fff] cursor-pointer transition duration-300 ease-in-out hover:scale-110 m-[10px]"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z"
          />
        </svg>

        <div class="relative">
          <button @click.stop="showMenu2 = !showMenu2">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              class="size-8 text-[#fff] cursor-pointer transition duration-300 ease-in-out hover:scale-110 m-[10px]"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z"
              />
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
              />
            </svg>
          </button>
          <div v-if="showMenu2" class="absolute -top-35 left-10 ml-3">
            <!-- Box -->
            <div
              class="bg-white rounded-xl shadow-lg p-4 w-56 flex flex-col gap-2"
            >
              <div
                class="flex w-full gap-2 flex-col rounded-xl shadow-[0_2px_12px_-4px_rgba(0,0,0,0.2)]"
              >
                <button @click="openProfile">Thông tin tài khoản</button>
                <button>Cài đặt</button>
              </div>
              <div
                class="flex w-full gap-2 flex-col rounded-xl shadow-[0_2px_12px_-4px_rgba(0,0,0,0.2)]"
              >
                <button @click="LogOut()">Đăng xuất</button>
                <button>Thoát</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- sidebar-top -->
    <div class="w-[75%] flex-col h-screen hidden sm:block">
      <div class="bg-blue-200 h-[15%] relative">
        <div class="flex justify-between p-3 gap-3">
          <nav class="relative">
            <input
              type="text"
              class="rounded-lg shadow px-6 py-2 outline-none focus:ring-2 focus:ring-blue-500"
            />
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              class="w-4 h-4 absolute left-2 top-1/2 -translate-y-1/2 color-red"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"
              />
            </svg>
          </nav>
          <!-- add friend -->
          <button @click="handleClose()">
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
                d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z"
              />
            </svg>
          </button>
          <!--  -->
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
                d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"
              />
            </svg>
          </button>
        </div>
        <!--  -->
        <div
          class="absolute bottom-0 left-0 w-full flex justify-between items-center p-3 bg-white shadow-md"
        >
          <div class="flex gap-2">
            <button>Ưu tiên</button>
            <button>Khác</button>
          </div>
          <div class="flex gap-2 items-center">
            <button>Phân loại</button>
            <button @click.stop="open = !open">
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
            </button>
            <div
              v-if="open"
              class="absolute right-0 top-full mt-2 w-48 bg-white rounded-xl shadow-lg border z-50"
            >
              <button
                class="block w-full text-left px-4 py-2 hover:bg-gray-100"
              >
                Đánh dấu đã đọc
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- sidebar-bottom-message -->
      <div class="flex-1 h-[85%]" v-show="siderbarMessage">
        <!--  -->
        <div class="w-full relative flex bg-blue-200 cursor-pointer">
          <div class="w-16 h-16 p-2">
            <img
              src="../img/Screenshot 2026-01-11 195435.png"
              alt=""
              class="w-full h-full rounded-[100%]"
            />
          </div>
          <div class="p-3">
            <h2>Hà Trọng Nghĩa</h2>
            <p class="text-gray-600">hahahaha</p>
          </div>
          <div class="flex absolute right-0 translate-y-1/2 gap-2">
            <p>13</p>
            <p>Giờ</p>
          </div>
        </div>
      </div>
      <!-- side-bottom-addfriend -->
      <div class="flex-1 h-[85%] shadow-xl p-3" v-show="siderbarAddfriend">
        <button
          class="flex gap-3 w-full h-[45px] items-center hover:bg-blue-500"
          @click="OpenListFriend"
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
              d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"
            />
          </svg>
          <h3>Danh Sách bạn bè</h3>
        </button>
        <nav class="flex gap-3 w-full h-[45px] items-center">
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
              d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z"
            />
          </svg>
          <h3>Danh sách nhóm cộng đồng</h3>
        </nav>
        <button
          class="flex gap-3 w-full h-[45px] items-center hover:bg-blue-500"
          @click="openFriendInvitation"
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
              d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z"
            />
          </svg>
          <h3>Lời mời kết bạn</h3>
        </button>
        <nav class="flex gap-3 w-full h-[45px] items-center">
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
              d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z"
            />
          </svg>
          <h3>lời mời từ nhóm cộng đồng</h3>
        </nav>
      </div>
      <!--  -->
    </div>
    <AddFriend
      v-show="addFiend"
      class="absolute"
      :id="props.id"
      @close="addFiend = false"
    />
  </div>
</template>
<script setup>
import axios from "axios";
import { ref, onMounted } from "vue";
import { useRouter } from "vue-router";
import AddFriend from "./AddFriend.vue";
const router = useRouter();
const open = ref(false);
const showMenu = ref(false);
const menuBox = ref(null);
const showMenu2 = ref(false);
const emit = defineEmits([
  "openProfile",
  "openFriendInvitation",
  "openContainer",
  "OpenListFriend",
]);

onMounted(() => {
  document.addEventListener("click", (e) => {
    if (menuBox.value && !menuBox.value.contains(e.target)) {
      open.value = false;
    }
  });
});

// Click ngoài thì tắt
onMounted(() => {
  document.addEventListener("click", (e) => {
    if (menuBox.value && !menuBox.value.contains(e.target)) {
      showMenu.value = false;
    }
  });
});
onMounted(() => {
  document.addEventListener("click", (e) => {
    if (menuBox.value && !menuBox.value.contains(e.target)) {
      showMenu2.value = false;
    }
  });
});
// guisu kien len oage

const openProfile = () => {
  emit("openProfile");
};
// lay id tu the cha
import { useUserStore } from "@/stores/user";
const userStore = useUserStore();
const props = defineProps({
  id: String,
});
console.log(props);
const user = ref({});
const getUser = async (e) => {
  try {
    const res = await axios.get(
      `http://localhost:8000/api/profile/${props.id}`,
    );
    userStore.user = res.data.user;
    console.log(user.value);
  } catch (error) {
    console.log(error);
  }
};
onMounted(() => {
  getUser();
});
// logout
const LogOut = async () => {
  try {
    const res = await axios.post("http://localhost:8000/api/logout");
    console.log("fisnish");
    userStore.logout();
    router.push("/");
  } catch (error) {
    console.log(error);
  }
};
// AddFiend
const addFiend = ref(false);

const handleClose = () => {
  addFiend.value = !addFiend.value;
};
// mở siderbar-message va addfriend
const siderbarMessage = ref(true);
const siderbarAddfriend = ref(false);
const siderBar1 = () => {
  siderbarMessage.value = false;
  siderbarAddfriend.value = true;
};
const siderBar2 = () => {
  siderbarMessage.value = true;
  siderbarAddfriend.value = false;
  OpenContainer();
};
//
const openFriendInvitation = () => {
  emit("openFriendInvitation");
};
//
const OpenContainer = () => {
  emit("openContainer");
};
//
const OpenListFriend = () => {
  emit("OpenListFriend");
};
</script>
