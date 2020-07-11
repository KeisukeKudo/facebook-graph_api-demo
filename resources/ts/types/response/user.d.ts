export interface Data {
  height: number;
  is_silhouette: boolean;
  url: string;
  width: number;
}

export interface Picture {
  data: Data;
}

export interface User {
  name: string;
  picture: Picture;
  id: string;
}
