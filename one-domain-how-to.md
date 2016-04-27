# Install yii2-starter-kit on single domain

## Admin Area
Just `ln -s backend/web admin` in root directory

## Storage
Fix by two lines of code in .htaccess

## Frontend
Fix two confiruration params:
```php
//frontend/config/web.php
    'components' => [
        ....
        'request'=>[
            'baseUrl'=>'',
        ],
    ],
    
//frontend/config/_urlManager.php
return [
	  'baseUrl'=>'/',
	  ...
];
```

And this is root .htaccess file:
```
# prevent directory listings
Options -Indexes
# follow symbolic links
Options FollowSymlinks
RewriteEngine on

RewriteCond %{REQUEST_URI} ^/storage
RewriteRule ^storage(/.+)?$ /storage/web/$1 [L,PT]

RewriteCond %{REQUEST_URI} ^.*$
RewriteRule ^(.*)$ /frontend/web/$1
```
