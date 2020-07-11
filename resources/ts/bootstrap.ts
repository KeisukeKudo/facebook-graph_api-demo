import Axios, { AxiosRequestConfig, AxiosStatic } from 'axios';

declare global {
  interface Window {
    axios: AxiosStatic;
  }
}

function getToken(): string {
  const tokenKey = 'XSRF-TOKEN';
  const token: string | undefined = document.cookie
    .split(';')
    .find((cookie: string) => {
      const [key] = cookie.split('=');
      return key === tokenKey;
    });

  return typeof token !== 'undefined' ? token : '';
}

export default function bootstrap(): void {
  window.axios = Axios;
  window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

  window.axios.interceptors.request.use((config: AxiosRequestConfig) => {
    const key: string =
      typeof config.xsrfHeaderName !== 'undefined'
        ? config.xsrfHeaderName
        : 'X-XSRF-TOKEN';
    // eslint-disable-next-line no-param-reassign
    config.headers[key] = getToken();
    return config;
  });
  window.axios.interceptors.response.use(
    (response) => response,
    (error) => error.response || error
  );
}
