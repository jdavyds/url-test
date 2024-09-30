<script setup></script>

<template>
  <main class="w-full bg-gray-200 min-h-screen flex flex-col gap-10 items-center p-10">
    <div class="py-10 flex justify-center items-center shadow">
      <h3 class="text-gray-700 text-3xl font-bold">Shorten URL</h3>
    </div>
    <div
      class="md:w-1/2 bg-white rounded flex flex-col justify-center items-center gap-10 p-5 md:p-10"
    >
      <h5 class="text-gray-400 text-4xl text-center font-bold">Paste the long URL</h5>
      <label class="h-12 w-full flex">
        <input type="text" class="h-full w-full border rounded-l-lg bg-inherit pl-5" />
        <button class="h-full rounded-r-lg text-white min-w-fit px-5 bg-blue-400">Shorten</button>
      </label>
    </div>
  </main>
</template>
