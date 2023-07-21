<template>
  <div class="px-2 bg-grey-lighten-2" style="height: 100vh">
    <h2 class="py-1">Teste Workana</h2>

    <v-card height="calc(100vh - 52px)">
      <v-tabs v-model="tabSelected" bg-color="primary">
        <v-tab
          v-for="(tab, key) in tabs"
          :key="key"
          :value="key"
          v-text="tab.text"
        />
      </v-tabs>

      <v-card-text>
        <v-window v-model="tabSelected">
          <v-window-item v-for="(tab, key) in tabs" :key="`_${key}`" :value="key">
            <component :is="tab.component" />
          </v-window-item>
        </v-window>
      </v-card-text>
    </v-card>
  </div>
</template>

<script setup>
import {ref} from "vue"
import ListProducts from "@/components/product/ListProducts.vue";
import ListSales from "@/components/sale/ListSales.vue";

const tabs = [
  {
    text: "Produtos",
    component: ListProducts
  },
  {
    text: "Vendas",
    component: ListSales
  }
]

const tabSelected = ref(tabs[0])
</script>
