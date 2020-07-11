# Facebook Graph API Demo

## packages ディレクトリ

実際の処理は [packages ディレクトリ](https://github.com/KeisukeKudo/facebook-graph_api-demo/tree/master/packages/Crypto) 内のクラスに記述  
`Interface` に対応しているクラスは [CoreServiceProvider](https://github.com/KeisukeKudo/facebook-graph_api-demo/blob/master/app/Providers/CoreServiceProvider.php) に記述しているのでそちらを参照  

## 環境構築

## 必須

- `node.js` LTS
- `yarn` stable
- `Docker Compose` stable

以下のコマンドがすべて完了できればOK  

```bash
$ git clone https://github.com/KeisukeKudo/facebook-graph_api-demo.git
$ cd facebook-graph_api-demo && cp .env.example .evn
$ yarn --ignore-engines
$ yarn eslint && yarn dev
$ cd docker && cp .env.example .env
$ make build && make up && make php # php コンテナが立ち上がる
# php コンテナ内で実行すること
$ composer install
$ php artisan key:generate
$ php artisan migrate
$ composer phpstan && vendor/bin/phpunit
```
