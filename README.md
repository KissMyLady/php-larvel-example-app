# php框架

# 启动方法

php artisan serve

## Nginx Config
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
