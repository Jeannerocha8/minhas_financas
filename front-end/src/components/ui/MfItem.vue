<template>
  <div class="m-8">
    <p class="text-xl text-white font-bold mb-4">{{ data.title }}</p>
    <div class="flex flex-col">
      <div v-for="item in data.items">
        <div class="flex flex-row mb-4">
          <div class="flex flex-row">
            <div
                class="shadow-3xl bg-gradient-to-r from-mf-500 to-mf-400 rounded-xl w-12	h-12 flex justify-center items-center mr-4">
              <font-awesome-icon class="text-white font-bold" :icon="item.icon" />
            </div>
            <div class="w-48">
              <h2 class="text-white font-bold text-lg">{{ item.description }}</h2>
              <p class="text-white text-sm font-[100]"> {{ item.date }}</p>
            </div>
          </div>
          <p class="text-white font-bold text-right text-lg w-full">{{ item.value }}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'mf-item',
  props: ['data'],
}
</script>