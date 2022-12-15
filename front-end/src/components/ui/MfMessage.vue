<template>
  <div v-if="seeMessage" class="static">
    <div class="absolute top-16 left-1/4	 w-1/2 h-auto rounded-lg bg-mf-200">
      <div class="p-2 flex flex-row">
        <font-awesome-icon :icon="icon" class="m-1" />
        <p class="m-1 text-sm">{{ message }}</p>
      </div>
      <div
          @click="seeMessage = false"
          class="absolute -top-2 inset-y-1 -right-1 bg-mf-300 w-6 h-6 rounded-full shadow-3xl">
        <font-awesome-icon icon="fa-solid fa-xmark" class="ml-2" />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'mf-message',
  props: ['seeMessage', 'message', 'icon'],
}
</script>