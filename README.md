# Laravel php框架

# 启 动
1, 复制env模板, 修改变量
2, 启动命令:
```
composer install --ignore-platform-reqs
php artisan key:generate
php artisan serve
```

3, 数据迁移
```
迁移: 
php artisan migrate

数据填充: 
php artisan db:seed
```

## 笔记
#### 创建模型类
1, 可使用 artisan 命令
```
php artisan make:model User/UserTb
```

2, 创建映射
参考博客:　https://blog.csdn.net/qq_38253837/article/details/81303530
```
php artisan make:migration create_table_users
```



## Window Nginx Config 
启动 php-cgi: 
- `php-cgi.exe -b 127.0.0.1:9000`  

参考博客: https://www.cnblogs.com/liangxiaofeng/p/5975135.html
windows下Nginx安装目录: D:\programm_soft_ware\nginx-1.14.0
Nginx 配置如下:    
```
root H:/myPprogramming/phpCode/php-larvel-example-app/public;
error_page   500 502 503 504  /50x.html;
index  index.html index.htm index.php;
location = /50x.html {
    root   html;
}

location / {
    try_files $uri $uri/ /index.php?$query_string;
}

location ~ \.php$
{
    fastcgi_pass 127.0.0.1:9000;
    fastcgi_index index.php;
    fastcgi_param SCRIPT_FILENAME H:/myPprogramming/phpCode/php-larvel-example-app/public$fastcgi_script_name;
    include fastcgi_params;
}
location ~ /\.ht {
    deny all;
}
```

## Linux Nginx Config
Reference web : https://laravel.com/docs/8.x/deployment

```
user  root;
worker_processes  1;
events {
    worker_connections  1024;
}
http {
    include       mime.types;
    default_type  application/octet-stream;
    sendfile      on;
    keepalive_timeout  65;
    
    include /etc/nginx/sites-enabled/*;

    server {
        listen       80;
        server_name  localhost;
        index index.php;

        root /home/mylady/phpCode/larvel-example-app/public;
        error_page   500 502 503 504  /50x.html;
        index  index.html index.htm index.php;
        location = /50x.html {
            root   html;
        }
        
        # 必填URL规则
        location / {
            try_files $uri $uri/ /index.php?$query_string;
        }
         location ~ \.php$
         {
           fastcgi_index index.php;
           fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
           fastcgi_param SCRIPT_FILENAME /home/mylady/phpCode/larvel-example-app/public$fastcgi_script_name;
           include fastcgi_params;
         }
         
        location ~ /\.ht {
            deny all;
        }
    }

}
```
