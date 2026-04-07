<template>
  <div class="w-full h-full flex flex-col p-3">
    <div class="w-full h-[400px] flex flex-col gap-3">
      <h2 class="w-full justify-center items-center">
        Danh sách lời mời( {{ countinvitation }} )
      </h2>
      <div class="w-full h-[270px] grid grid-cols-3 gap-x-3">
        <div
          v-for="item in user"
          :key="item.id"
          class="cols-1 h-[300px] flex flex-col justify-between shadow-[1px_1px_4px_6px_rgba(0,0,0,0.3)] items-center gap-3 p-2"
        >
          <nav class="w-full flex justify-between items-center">
            <div class="w-2/3 flex gap-3">
              <button class="w-[45px] h-[45px] rounded-full">
                <img
                  src="../../img/Screenshot 2026-02-28 224625.png"
                  alt=""
                  class="w-full h-full rounded-full"
                />
              </button>
              <div class="">
                <h2 class="text-[16px]">{{ item.sender.name }}</h2>
                <p>3 Ngày</p>
              </div>
            </div>
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
                  d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a5.969 5.969 0 0 1-.474-.065 4.48 4.48 0 0 0 .978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z"
                />
              </svg>
            </button>
          </nav>
          <div class="w-full h-[55px] flex justify-center item-center">
            <p
              class="w-full flex justify-center item-center h-[55px] bg-gray-100 shadow-xl"
            >
              Xin chào mình muốn kết bạn với bạn
            </p>
          </div>
          <div class="w-full flex gap-3">
            <button
              class="flex-1 bg-white h-[55px] rounded-[15px]"
              @click="Rejected(item.id)"
            >
              Từ chối
            </button>
            <button
              class="flex-1 bg-white h-[55px] rounded-[15px]"
              @click="Accepted(item.id)"
            >
              Đồng ý
            </button>
          </div>
        </div>
      </div>
    </div>
    <!--  -->
    <div class="w-full flex flex-col gap-3">
      <h2>Lời mời đã gửi( {{ count }} )</h2>
      <div class="w-full grid grid-cols-3">
        <div
          v-for="x in sendinvitations"
          :key="x.id"
          class="flex flex-col justify-between h-[200px] shadow-[1px_1px_4px_6px_rgba(0,0,0,0.3)] p-3"
        >
          <div class="flex justify-between items-center">
            <div class="flex gap-3">
              <img
                src="../../img/Screenshot 2026-01-11 195435.png"
                alt=""
                class="w-[45px] h-[45px] rounded-full"
              />
              <div>
                <h2>{{ x.receiver.name }}</h2>
                <span>Đã gửi lời mời </span>
              </div>
            </div>
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
                  d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a5.969 5.969 0 0 1-.474-.065 4.48 4.48 0 0 0 .978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z"
                />
              </svg>
            </button>
          </div>
          <div class="w-full flex justify-center">
            <button
              class="w-[80%] h-[35px] bg-white rounded-[15px] shadow"
              @click="revokeInvitat(x.id)"
            >
              Thu hồi lời mời
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script setup>
import axios from "axios";
import { onMounted, ref } from "vue";
const props = defineProps({
  id: String,
});
// lấy sanh sách lời mời kết bạn
const user = ref([]);
const countinvitation = ref("");
const AddFriend = async () => {
  const res = await axios.get(`http://localhost:8000/api/Sender/${props.id}`);
  user.value = res.data.data;
  countinvitation.value = res.data.count;
  console.log(user.value);
};

// Lấy danh sách những người đã gửi
const sendinvitations = ref([]);
const count = ref("");
const sendInvitations = async () => {
  const res = await axios.get(
    `http://localhost:8000/api/SendInvitations/${props.id}`,
  );
  sendinvitations.value = res.data.data;
  count.value = res.data.count;
  console.log(sendinvitations.value);
};
onMounted(() => {
  AddFriend();
  sendInvitations();
});
// Thu hôi hồi lời mời

const revokeInvitat = async (id) => {
  try {
    const res = await axios.delete(
      `http://localhost:8000/api/revokeInvitat/${id}`,
    );
    sendinvitations.value = sendinvitations.value.filter(
      (item) => item.id !== id,
    );
    console.log(res.data);
  } catch (error) {
    console.log(error);
  }
};

// dong y
const Accepted = async (id) => {
  try {
    const res = await axios.post(`http://localhost:8000/api/Accepted/${id}`);
    console.log(res.data);
  } catch (error) {
    console.log(error);
  }
};
// tu choi loi moi
const Rejected = async (id) => {
  try {
    const res = await axios.post(`http://localhost:8000/api/Rejected/${id}`);
    console.log(res.data);
  } catch (error) {
    console.log(error);
  }
};
</script>
