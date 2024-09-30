<template>
  <main class="w-full bg-gray-200 min-h-screen flex flex-col gap-10 items-center p">
    <div class="py-10 w-full bg-white flex justify-center items-center shadow">
      <h3 class="text-gray-700 text-3xl font-bold">Shorten URL</h3>
    </div>
    <div
      class="md:w-1/2 bg-white rounded flex flex-col justify-center items-center gap-10 p-5 md:p-10"
    >
      <h5 class="text-gray-400 text-4xl text-center font-bold">Paste the long URL</h5>
      <div class="w-full flex flex-col gap-1">
        <label class="h-12 w-full flex">
          <input
            v-model="longUrl"
            type="text"
            required
            class="h-full w-full border rounded-l-lg bg-inherit pl-5"
            placeholder="Enter a long URL"
          />
          <button
            @click="shortenUrl"
            :disabled="isLoading"
            class="h-full rounded-lg text-white min-w-fit px-5 bg-blue-400"
          >
            {{ isLoading ? 'Processing...' : 'Shorten' }}
          </button>
        </label>
        <span v-if="errorMessage" class="text-red-500">{{ errorMessage }}</span>
      </div>
    </div>
  </main>
</template>

<script>
import { ref } from 'vue'
import axios from 'axios'
import { useUrlStore } from '../stores/urlStore'
import { useRouter } from 'vue-router'

export default {
  setup() {
    const urlStore = useUrlStore()
    const router = useRouter()
    const longUrl = ref('')
    const errorMessage = ref('')
    const isLoading = ref(false) 

    const isValidUrl = (url) => {
      const pattern = new RegExp(
        '^(https?:\\/\\/)?' + 
          '((([a-zA-Z0-9\\-]+)\\.)+[a-zA-Z]{2,})' + 
          '(\\:[0-9]{1,5})?' +
          '(\\/.*)?$',
        'i' 
      )
      return !!pattern.test(url)
    }

    const shortenUrl = () => {
      if (!isValidUrl(longUrl.value)) {
        errorMessage.value = 'Please enter a valid URL'
        return
      }

      errorMessage.value = '' 
      isLoading.value = true

      axios
        .post('http://127.0.0.1:8000/api/shorten', {
          original_url: longUrl.value
        })
        .then((response) => {
          urlStore.setUrls({
            longUrl: longUrl.value,
            shortUrl: response.data.short_url
          })
          
          router.push({ name: 'CopyUrlView' })
        })
        .catch((error) => {
          if (error.response && error.response.data) {
            errorMessage.value =
              error.response.data.message || 'An error occurred. Please try again.'
          } else {
            errorMessage.value = 'An unexpected error occurred. Please try again later.'
          }
        })
        .finally(() => {
          isLoading.value = false 
        })
    }

    return {
      longUrl,
      errorMessage,
      isLoading,
      shortenUrl
    }
  }
}
</script>
