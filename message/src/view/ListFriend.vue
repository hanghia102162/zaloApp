<template>
  <div class="w-full mx-auto bg-blue-500 shadow rounded-lg p-4">
    <h2 class="text-lg font-semibold mb-2">Danh sách bạn bè</h2>
    <div class="grid grid-cols-3 gap-4 md:grid-cols-2 lg:grid-cols-3">
      <input
        type="text"
        placeholder="Tìm bạn"
        class="flex-1 border rounded px-3 py-2 mb-4"
      />
      <select name="" class="flex-1" id="">
        <option value="">Tên(A->Z)</option>
        <option value="">Tên(Z->A)</option>
      </select>
      <select name="" class="flex-1" id="">
        <option value="">Tất cả</option>
        <option value="">phân loại</option>
      </select>
    </div>
  </div>
</template>
