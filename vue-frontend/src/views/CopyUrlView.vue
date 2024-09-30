<template>
  <main class="w-full bg-gray-200 min-h-screen flex flex-col gap-10 items-center">
    <div class="py-10 w-full bg-white flex justify-center items-center shadow">
      <h3 class="text-gray-700 text-3xl font-bold">Shorten URL</h3>
    </div>
    <div class="md:w-1/2 bg-white rounded flex flex-col justify-center items-center gap-10 p-5 md:p-10">
      <h5 class="text-gray-400 text-4xl text-center font-bold">Copy short URL</h5>
      <label class="h-12 w-full flex">
        <input 
          :value="shortUrl" 
          disabled 
          type="text" 
          class="h-full w-full border rounded-l-lg bg-inherit pl-5" 
        />
        <button 
          @click="copyToClipboard"
          class="h-full rounded-r-lg text-white min-w-fit px-5 bg-blue-400">
          Copy
        </button>
      </label>
      <p class="w-full text-wrap break-words"><strong>Long URL:</strong> {{ longUrl }}</p>
    </div>
  </main>
</template>

<script>
import { useUrlStore } from '../stores/urlStore';

export default {
  setup() {
    const urlStore = useUrlStore();

    const copyToClipboard = () => {
      const el = document.createElement('textarea');
      el.value = `http://127.0.0.1:8000/${urlStore.shortUrl}`;
      document.body.appendChild(el);
      el.select();
      document.execCommand('copy');
      document.body.removeChild(el);

      alert('Short URL copied to clipboard!');
    };

    return {
      longUrl: urlStore.longUrl,
      shortUrl: `http://127.0.0.1:8000/${urlStore.shortUrl}` ,
      copyToClipboard
    };
  }
};
</script>
