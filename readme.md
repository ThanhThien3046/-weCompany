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


để chạy được code laravel cần ghi nhớ là đứng tại thư mục SERVER_PHP mở cmd lên. rồi gõ: 
`
composer install
`
## tư tưởng của laravel frameửok: 

### 1. route trong laravel
dựa trên tư tưởng web, mọi trang đều có 1 đường dẫn url nhất định. 
ví dụ web trang chủ mà dùng php thì cứ tạo đại 1 file index.php rồi code tùm lum tà la trong đó trả về html 
=> laravel cũng mang khuynh hướng đó. mọi thứ đc tạo ra dựa trên 1 url ng ta gọi là route. Cứ 1 route sẽ 
có 1 url nhất định. 
### index.php trong laravel
như chúng ta đã biết hoặc chưa biết, hoặc biết rồi mà quên. PHP thì chạy file index.php, js thì chạy file index.js
=> laravel đc viết từ php => nó cũng dùng file index.php làm gốc. file đó nămf ở đường dẫn SERVER_PHP/public/index.php
biết thôi khỏi nghiên cứu đến nó vì có những lập trình viên đã 4 năm kinh nghiệm laravel vãn không mò tới hoặc không hiểu 
nó là gì. NÊn em không cần hiểu. 
Nếu muón tham khảo thêm laravel trong file index.php thì đọc thử bài viết này: 
https://ebudezain.com/co-che-xu-ly-request-trong-laravel
đừng lo tại sao mình ngu thế, sao không hiểu. Vì anh viết ra mà cũng có hiểu mấy đâu :D 
## cách chạy laravel project
khúc này nếu được hãy temaview cho anh, anh sẽ setting hosts giả lập cho mà chạy. Nhưng nếu em muốn thì cứ gõ full url của nó
ví dụ: locahost/-weCompany/SERVER_PHP/public sẽ ra màn hình welcome của project

## tạo trang chủ 
1. tạo route
vào routes/web.php
thấy dòng 
``
Route::get('/', function () {
    return view('welcome');
});
``
view có nghĩa là view-engine (sai chính tả)
sửa lại welcome thành homepage (kiểu như file index.php á)

thêm 1 file homepage.blade.php vào trong folder /SERVER_PHP/resources/views
ném hết đống code html của file index.php vào trong đó rồi truy cập đường dẫn: 
locahost/-weCompany/SERVER_PHP/public/
là sẽ thấy code của mình đã có


## tài nguyên tĩnh không thay đổi
mọi tài nguyên tĩnh không thay đổi sẽ được nhúng vào thư mục public của laravel
sau này khi deploy lên server thật thì chỉ cần đẩy code lên không cần setting thêm


ví dụ hình ảnh: ban đầu em đang để là thư mục images
bây giừo anh quăng hết vào folder public/images
css em quăng lung tung anh sẽ quăng hết vào thư mục public/css
js em đang viết trong file php luôn nên anh chưa tách nó ra. nhưng anh tạo sẵn 1 folder public/js để sau này anh sẽ giúp em clean lại nó


### sửa các thành phần cho đúng với 1 cấu trúc laravel ổn
vào file homepage.blade.php sửa lại các đường dẫn động
