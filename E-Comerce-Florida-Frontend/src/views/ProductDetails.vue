<template>
  <div class="product-details">
    <h1>{{ product.name }}</h1>
    <!-- Остальная информация о товаре -->
  </div>
</template>

<script>
export default {
  props: ['product'], // Получение данных о товаре через props
  mounted() {
    const productId = this.$route.params.id; // Получаем параметр id из маршрута
    // Теперь вы можете использовать productId для запроса информации о товаре и отображения его в компоненте
  },
};
</script>
