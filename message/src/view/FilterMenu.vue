<template>
  <div class="relative inline-block">
    <!-- Button -->
    <button class="px-3 py-1 bg-gray-200 rounded-lg">Phân loại</button>

    <!-- Dropdown -->
    <div class="absolute right-0 mt-2 w-60 bg-white rounded-xl shadow-lg p-4">
      <p class="font-semibold mb-2">Theo trạng thái</p>
      <label class="flex items-center gap-2">
        <input type="radio" name="status" />
        Tất cả
      </label>
      <label class="flex items-center gap-2">
        <input type="radio" name="status" />
        Chưa đọc
      </label>
    </div>
  </div>
</template>
