<template>
  <div class="wrapper">
    <div class="filtered">
      <ul>
        <li v-for="category in categories" :key="category.id">
          <button @click="filterByCategory(category.id)">
            {{ category.name }}
          </button>
        </li>
      </ul>
    </div>

    <div class="tableBlock">
      <router-link
          v-for="product in displayedProducts"
          :key="product.id"
          :to="'/product/' + product.id"
          class="table_Block"
      >
        <div class="card">
          <img :src="product.image" class="card-img-top" alt="...">
          <div class="card-body">
            <p class="card-text card-title">{{ product.name }}</p>
            <hr>
            <p class="card-text">{{ product.description }}</p>
            <hr>
            <p class="card-text">{{ product.category }}</p>
          </div>
        </div>
      </router-link>
      <div class="pagination">
        <button @click="prevPage" :disabled="currentPage === 1">Prev</button>
        <span>{{ currentPage }}</span>
        <button @click="nextPage" :disabled="currentPage === totalPages">Next</button>
      </div>
    </div>
  </div>
</template>

<script>
import { ref, onMounted, computed } from 'vue';

export default {
  setup() {
    const initialProducts = ref([]); // Исходные данные продуктов
    const products = ref([]); // Данные продуктов для отображения
    const categories = ref([]);
    const currentPage = ref(1);
    const itemsPerPage = 2;

    onMounted(async () => {
      try {
        const productsResponse = await fetch('http://127.0.0.1:8000/api/product');
        const productsData = await productsResponse.json();
        initialProducts.value = productsData; // Сохраняем исходные данные

        // Устанавливаем данные для отображения по умолчанию как исходные данные
        products.value = [...initialProducts.value];

        const categoriesResponse = await fetch('http://127.0.0.1:8000/api/category');
        const categoriesData = await categoriesResponse.json();
        categories.value = categoriesData;
      } catch (error) {
        console.error(error);
      }
    });

    const displayedProducts = computed(() => {
      const startIndex = (currentPage.value - 1) * itemsPerPage;
      const endIndex = startIndex + itemsPerPage;
      return products.value.slice(startIndex, endIndex);
    });

    const totalPages = computed(() => Math.ceil(products.value.length / itemsPerPage));

    const nextPage = () => {
      if (currentPage.value < totalPages.value) {
        currentPage.value += 1;
      }
    };

    const prevPage = () => {
      if (currentPage.value > 1) {
        currentPage.value -= 1;
      }
    };

    const filterByCategory = async (categoryId) => {
      try {
        // Фильтрация исходных данных продуктов по category_id
        const filteredProducts = initialProducts.value.filter(product => product.category === categoryId);

        // Установка отфильтрованных данных для отображения
        products.value = filteredProducts;
        currentPage.value = 1; // Переход на первую страницу после фильтрации
      } catch (error) {
        console.error(error);
      }
    };

    return {
      displayedProducts,
      currentPage,
      totalPages,
      nextPage,
      prevPage,
      filterByCategory,
      categories,
    };
  },
};
</script>




<style>
/* Стили для пагинации */
.pagination {
  margin-top: 10px;
}

.pagination button {
  cursor: pointer;
  margin: 0 5px;
}

.filtered button {
  margin: 5px;
  padding: 5px 10px;
  cursor: pointer;
}
</style>
