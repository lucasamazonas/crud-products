import axios from 'axios'

console.log(import.meta.env.VITE_BASE_URL_API)

const http = axios.create({
  baseURL: import.meta.env.VITE_BASE_URL_API,
  headers: {
    'Content-Type': 'application/json'
  }
});

export function useHttp() {
  return { http }
}
