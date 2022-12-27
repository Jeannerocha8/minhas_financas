<template>
  <mf-message :see-message="seeMessage ? true : false" :message="message" :icon="['fa', iconMessage]"/>
  <div class="m-8 mt-6 flex justify-center">
    <div class="px-8 mt-24 shadow-3xl bg-gradient-to-r from-mf-500 rounded-xl w-3/4 h-full">
      <div class="pt-8 pb-8 relative">
        <div class="flex space-between">
          <div class="w-1/2">
            <label class="mt-4 font-bold">Titulo: </label>
            <input
              class="bg-transparent border m-2 rounded p-2 border-mf-200 w-11/12 mr-3 leading-tight focus:outline-none"
              type="text"
              placeholder="Insira aqui a titulo da categoria"
              v-model="title"
              required
            >
          </div>

          <div class="w-1/2">
            <label class="mt-4 font-bold">Icone: </label>
            <button
              class="text-center bg-mf-200 m-2 self-center p-2 rounded-lg w-full shadow-3xl hover:bg-mf-500 relative"
              @click="openCardIcon === false ? openCardIcon = true : openCardIcon = false"
            >
              {{ !selectedIcon ? 'Selecionar icone' : 'Icone selecionado:' }}
              &nbsp <font-awesome-icon v-if="selectedIcon" :icon="['fa-solid', selectedIcon]" />
            </button>

            <div v-if="openCardIcon" class="absolute left-16 bg-mf-500 rounded-xl w-64 p-2 text-center rounded">
              <ul class="fa-ul grid gap-2 grid-cols-6 grid-rows-3">
                <li v-for ="icon in icons" class="fa-li" @click="selectedIconItem(icon)"><font-awesome-icon :icon="['fa-solid', icon]" /></li>
              </ul>
            </div>
          </div>
        </div>

        <div class="text-right">
          <button
              class="text-center bg-mf-200 mt-6 self-center p-2 rounded-lg w-64 shadow-3xl hover:bg-mf-500"
              @click="createOrUpdateCategory"
          >
            Salvar
          </button>
        </div>
      </div>
    </div>
  </div>

  <div class="m-8 flex justify-center">
    <div class="px-8 shadow-3xl bg-gradient-to-r from-mf-500 rounded-xl w-3/4 pt-8 pb-8">
      <div  class="flex space-between">
        <h1 class="w-11/12 mt-3 text-2xl font-bold">Categorias</h1>
        <input class="bg-transparent border m-2 rounded p-2 border-mf-200 w-2/5  focus:outline-none"
           type="text"
           placeholder="Pesquisar"
           v-model="search"
        />
      </div>

      <table class="border-collapse border border-white mt-10">
        <thead>
          <tr class=" bg-mf-900">
            <th class="border border-mf-200 p-2 w-40">Icone</th>
            <th class="border border-mf-200 w-4/5">titulo</th>
            <th class="border border-mf-200 w-20">Ações</th>
          </tr>
        </thead>
        <tbody class="text-left">
          <tr v-for="category in handleCategoryFilter" class="bg-mf-300">
            <th class="border border-mf-200 text-center"><font-awesome-icon :icon="['fa-solid', category.icon]" class="m-2"/></th>
            <th class="border border-mf-200 text-center">{{ category.title }}</th>
            <th class="border border-mf-200">
              <div class="flex space-between mx-3">
                <button
                    class="text-center bg-mf-200 self-center py-1 px-2 mr-2 rounded-lg shadow-3xl hover:bg-mf-500"
                    @click="updateCategory(category)"
                >
                  <font-awesome-icon icon="fa-solid fa-pen" />
                </button>
                <button
                  class="text-center bg-mf-200 self-center py-1 px-2 rounded-lg shadow-3xl hover:bg-mf-500"
                  @click="deleteCategory(category.id)"
                >
                  <font-awesome-icon icon="fa-solid fa-trash" />
                </button>
              </div>
            </th>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import MfMessage from "../components/ui/MfMessage.vue";

axios.defaults.withCredentials = true;

export default {
  name: 'Categories',
  components: {MfMessage},
  data() {
    return {
      title: '',
      selectedCategoryId: 0,
      selectedIcon: '',
      openCardIcon: false,
      seeMessage: false,
      iconMessage: '',
      message: '',
      search: '',
      categories: {},
      icons: [
          "fa-house",
          "fa-user",
          "fa-phone",
          "fa-star",
          "fa-music",
          "fa-heart",
          "fa-fish",
          "fa-paw",
          "fa-car",
          "fa-gas-pump",
          "fa-shirt",
          "fa-glasses",
          "fa-mobile-screen",
          "fa-video",
          "fa-book-open",
          "fa-apple-whole",
          "fa-wallet",
          "fa-plane",
          "fa-wifi",
          "fa-stethoscope",
          "fa-umbrella-beach",
          "fa-desktop",
          "fa-utensils",
          "fa-clipboard",
      ]
    }
  },
  computed: {
    handleCategoryFilter: function () {
      if (this.search) {
        return this.categories.filter(
            (category) =>
                category.title.toLowerCase().includes(this.search.toLowerCase())
        );
      } else {
        return this.categories
      }
    },
  },
  mounted() {
    this.fetchCategories();
  },
  methods: {
    fetchCategories()
    {
      axios.get('http://localhost/sanctum/csrf-cookie').then(response => {
        axios.post('http://localhost/api/category/index').
        then(response => {
          this.categories = response.data;
        });
      });
    },
    selectedIconItem(icon) {
      this.selectedIcon = icon;
      this.openCardIcon = false;
    },
    async createOrUpdateCategory() {
      if (this.title && this.selectedIcon)  {
        await axios.get('http://localhost/sanctum/csrf-cookie').then(response => {
          axios.post('http://localhost/api/category/store', {
            title: this.title,
            icon: this.selectedIcon,
            categoryId: this.selectedCategoryId,
          }).then(response => {
            this.message = 'Cadastrado com Sucesso'
            this.seeMessage = true;
            this.iconMessage = 'circle-check';
            this.selectedIcon = '';
            this.selectedCategoryId = 0;
            this.title = '';
            this.fetchCategories();
          }).catch(error => {
            this.message = error;
            this.seeMessage = true;
            this.iconMessage = 'circle-exclamation';
          });
        });
      } else {
        this.message = 'Os campos Titulo e Icone são obrigatórios';
        this.seeMessage = true;
        this.iconMessage = 'circle-exclamation';
      }
    },
    updateCategory(category)
    {
      this.selectedCategoryId = category.id;
      this.title = category.title;
      this.selectedIcon = category.icon;
      window.scrollTo(0,0);
    },
    async deleteCategory(categoryId)
    {
      await axios.get('http://localhost/sanctum/csrf-cookie').then(response => {
        axios.delete(`http://localhost/api/category/delete/${categoryId}`)
          .then(response => {
            this.message = 'Categoria apagada com Sucesso'
            this.seeMessage = true;
            this.iconMessage = 'circle-check';
            window.scrollTo(0,0);
            this.fetchCategories();
          }).catch(error => {
            this.message = 'Erro ao deletar a categoria, entre em contato com o administrador do sistema';
            this.seeMessage = true;
            this.iconMessage = 'circle-exclamation';
          });
      });
    }
  }
}
</script>