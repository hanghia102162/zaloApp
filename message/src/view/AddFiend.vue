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
        />
      </div>
      <div class="w-full flex-1 flex flex-col justify-start gap-3">
        <div class="flex w-full">
          <div class="w-full flex gap-3">
            <img
              src="../../img/Screenshot 2026-01-11 195435.png"
              alt=""
              class="w-[45px] h-[45px] rounded-full"
            />
            <nav>
              <h2>Hà Trọng Nghĩa</h2>
              <h4>0347584418</h4>
            </nav>
          </div>
          <button
            class="w-[20%] flex justify-center items-center rounded-[15px] text-white bg-blue-500"
            type="button"
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
        >
          Tìm kiếm
        </button>
      </div>
    </form>
  </div>
</template>
<script setup>
import { ref } from "vue";

const emit = defineEmits(["close"]);
</script>
