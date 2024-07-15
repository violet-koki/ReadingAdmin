import axios from 'axios';
const apiClient = axios.create({
  baseURL: 'http://localhost',
  withCredentials: true,
  headers: { // ヘッダー
    'Content-Type': 'application/json',
    'Authorization': ''
  }
});

// axios.interceptors.request.use(())
export default apiClient;