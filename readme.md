# các bước setting

## clone framework laravel
sử dụng composer clone mới 1 dự án laravel.
Cài composer cho mac thì đây: https://ebudezain.com/huong-dan-cai-composer-tren-macosx
Cài cho windows thì vào trang chủ download về rồi cài thôi. ease game
lệnh clone laravel như sau: 
You are missing a parameter in the command. It should be in this order:
`
composer create-project [PACKAGE] [DESTINATION PATH] [--FLAGS]
`
cụ thể anh tạo project tên :  
DESTINATION PATH mặc định thì SERVER_PHP
[PACKAGE] là cái tên framework : laravel/laravel
--FLAGS thì anh điền 7.3 nghĩa là download cái version laravel 7.3 

`
composer create-project laravel/laravel SERVER_PHP 7.3.*
`
tại đây anh sử dụng git commit để em thấy những thay đổi mà anh vừa tạo ra
theo dõi git kraken để nhìn thấy 1 nùi thay đổi do mới tạo project