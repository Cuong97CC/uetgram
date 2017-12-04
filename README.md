Nhóm 3 - Quản lý ảnh
 =======
### Thành viên
* Trần Thị Hằng
* Lê Ngọc Cường
* Trần Lê Khoa
* Đoàn Thị Khánh Huyền
* Phạm Ngọc Sơn
* Đàm Đình Đinh
### Cài đặt chương trình
1. Tạo file config database: tạo file .env trong project
 * Copy từ file .env.example sửa DB_DATABASE=btl,DB_USERNAME,DB_PASSWORD
2. *run* php artisan generate key
3. *run* composer update
4. import file csdl.sql hoặc *run* php artisan migrate:refresh --seed
5. *run* php artisan serve
### Giới thiệu sơ bộ về UETGRAM
1. Khi chưa đăng nhập người xem có thể xem tất cả ảnh trên web với kích thước nhỏ và không thể tải
2. Khi đăng nhập với tài khoản người dùng thường:
* Tạo album và xóa album mình tạo
* Thêm ảnh vào album:
	* Có thể thêm nhiều ảnh trong 1 lần vào album
	* Khi thêm ảnh có thể chọn chế độ public (công khai) hoặc private (riêng tư)
	* Xem được tất cả các ảnh để chế độ public
	* Tải ảnh với kích thước thật
	* Gắn tag cho ảnh
	* Viết bình luận và xóa bình luận của mình
	* Khi thêm ảnh chế độ private người dùng có thể chỉnh sửa chia sẻ với những người mình muốn theo tên, những ai được chia sẻ sẽ xem được ảnh
* Xem được toàn bộ ảnh mà bạn đã tải lên
3. Khi đăng nhập với tài khoản quản trị trang web
* Xem tất cả ảnh ở public và private
* Có tất cả các chức năng như của người dùng thường
* Có thể xóa Album của bất cứ người dùng nào
* Có quyền cấp tài khoản quản trị, khóa và mở khóa tài khoản cho người dùng
* Với tài khoản bị khóa không thể xem ảnh lớn và tải ảnh
* Quản trị trang web có thể xóa bình luận hoặc lấy bình luận của người dùng làm mô tả cho ảnh
