import Axios, { AxiosStatic } from 'axios';

declare global {
  interface Window {
    axios: AxiosStatic;
  }
  interface Element {
    content: string;
  }
}

export default function bootstrap(): void {
  window.axios = Axios;
  window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

  const token = document.head.querySelector('meta[name="csrf-token"]');
  if (token !== null) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
    return;
  }
  console.error('CSRF token not found');
}
