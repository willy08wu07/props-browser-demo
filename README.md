# 商品瀏覽系統

## 這啥

以 Laravel 製作的商品瀏覽系統。

目前功能如下：

* 瀏覽商品
* 以價格過濾商品
* 以廠牌過濾商品
* 換頁功能

## 開發模式系統需求

* Docker
* Docker Compose
* PHP 8
* Composer

## 開發模式安裝

執行：

```shell
composer install
sail artisan key:generate
sail up -d
sail artisan migrate --seed # 產生測試用的商品、廠牌資料
```

等 Docker 容器啟動後再瀏覽 <http://localhost/>。
