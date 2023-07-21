<template>{{items}}
  <v-data-table
    :headers="headers"
    :items="items"
  >

  </v-data-table>
</template>

<script setup>
import {onMounted, ref} from "vue"
import {useHttp} from "@/plugins/http";

const {http} = useHttp()

const headers = [
  { text: "Id", value: "id" },
]

const items = ref([])

onMounted(() => getItems())

const getItems = () => {
  http.get('products')
    .then(response => items.value = response.data.products)
}
</script>
