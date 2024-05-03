use lab6_php;

-- CREATE TABLE User
-- (
--   idUser CHAR(10) NOT NULL,
--   username VARCHAR(255) NOT NULL,
--   email VARCHAR(255) NOT NULL,
--   password VARCHAR(255) NOT NULL,
--   PRIMARY KEY (idUser)
-- );

-- CREATE TABLE Categories
-- (
--   idCategories CHAR(10) NOT NULL,
--   ten_the_loai VARCHAR(255) NOT NULL,
--   PRIMARY KEY (idCategories)
-- );

-- CREATE TABLE Orders
-- (
--   idOrders CHAR(10) NOT NULL,
--   trang_thai VARCHAR(255) NOT NULL,
--   thoi_gian_tao DATE NOT NULL,
--   tong_gia INT NOT NULL,
--   idUser CHAR(10) NOT NULL,
--   PRIMARY KEY (idOrders),
--   FOREIGN KEY (idUser) REFERENCES User(idUser)
-- );

-- CREATE TABLE Products
-- (
--   idProduct CHAR(10) NOT NULL,
--   ten_sp VARCHAR(255) NOT NULL,
--   mo_ta VARCHAR(255) NOT NULL,
--   gia_tien INT NOT NULL,
--   idCategories CHAR(10) NOT NULL,
--   PRIMARY KEY (idProduct),
--   FOREIGN KEY (idCategories) REFERENCES Categories(idCategories)
-- );

-- CREATE TABLE Carts
-- (
--   idCarts CHAR(10) NOT NULL,
--   so_luong VARCHAR(255) NOT NULL,
--   idUser CHAR(10) NOT NULL,
--   idProduct CHAR(10) NOT NULL,
--   PRIMARY KEY (idCarts),
--   FOREIGN KEY (idUser) REFERENCES User(idUser),
--   FOREIGN KEY (idProduct) REFERENCES Products(idProduct)
-- );

-- User Table Data
INSERT INTO User (idUser, username, email, password) VALUES
('U01', 'nguoimoi', 'nguoimoi@example.com', 'pass1234'),
('U02', 'honggiao', 'honggiao@example.net', 'hkpass234'),
('U03', 'anhhue', 'anhhue@example.net', 'hk234pass'),
('U04', 'bichnga', 'bichnga@example.net', 'pass234hk'),
('U05', 'chiemngoc', 'chiemngoc@example.net', '234hkpass'),
('U06', 'diemthu', 'diemthu@example.net', 'hkpass432'),
('U07', 'dunghanh', 'dunghanh@example.net', 'passhk324'),
('U08', 'gianglinh', 'gianglinh@example.net', '324hkpass'),
('U09', 'haanh', 'haanh@example.net', 'hkpass2345'),
('U010', 'hongnhung', 'hongnhung@example.net', 'pass234hk6'),
('U011', 'huyennga', 'huyennga@example.net', '234hkpass7'),
('U012', 'kimngan', 'kimngan@example.net', 'hkpass4328'),
('U013', 'lananh', 'lananh@example.net', 'hkpass234'),
('U014', 'minhthu', 'minhthu@example.net', '324hkpass'),
('U015', 'myhanh', 'myhanh@example.net', 'hkpass4328'),
('U016', 'ngaocanh', 'ngaocanh@example.net', '324hkpass'),
('U017', 'phuongnga', 'phuongnga@example.net', 'hkpass4328'),
('U018', 'quynhnhu', 'quynhnhu@example.net', 'hkpass234'),
('U019', 'thanhhuong', 'thanhhuong@example.net', 'hkpass4328'),
('U020', 'thuha', 'thuha@example.net', '324hkpass');

-- Categories Table Data
INSERT INTO Categories (idCategories, ten_the_loai) VALUES
('C01', 'Sách'),
('C02', 'Điện tử'),
('C03', 'Thời trang'),
('C04', 'Nội thất'),
('C05', 'Sức khỏe & Sắc đẹp'),
('C06', 'Thực phẩm'),
('C07', 'Đồ uống'),
('C08', 'Thể thao'),
('C09', 'Đồ chơi'),
('C010', 'Báo'),
('C011', 'Nhạc'),
('C012', 'Phim'),
('C013', 'Phần mềm'),
('C014', 'Dụng cụ'),
('C015', 'Văn phòng phẩm'),
('C016', 'Đồ dùng cho thú cưng'),
('C017', 'Vườn & Sân'),
('C018', 'Nghệ thuật & Thủ công'),
('C019', 'Đồ chơi & Trò chơi'),
('C020', 'Thiết bị');


-- Orders Table Data
INSERT INTO Orders (idOrders, trang_thai, thoi_gian_tao, tong_gia, idUser) VALUES
('O01', 'Đã giao', '2024-04-01', 150000, 'U01'),
('O02', 'Đang xử lý', '2024-04-02', 200000, 'U02'),
('O03', 'Đã giao', '2024-04-01', 760000, 'U03'),
('O04', 'Đang xử lý', '2024-04-02', 230000, 'U04'),
('O05', 'Đã giao', '2024-04-01', 740000, 'U05'),
('O06', 'Đang xử lý', '2024-04-02', 430000, 'U06'),
('O07', 'Đã giao', '2024-04-01', 540000, 'U07'),
('O08', 'Đang xử lý', '2024-04-02', 25300000, 'U08'),
('O09', 'Đã giao', '2024-04-01', 4530000, 'U09'),
('O010', 'Đang xử lý', '2024-04-02', 240000, 'U010'),
('O011', 'Đã giao', '2024-04-01',560000, 'U011'),
('O012', 'Đang xử lý', '2024-04-02', 5230000, 'U012'),
('O013', 'Đã giao', '2024-04-01', 3330000, 'U013'),
('O014', 'Đang xử lý', '2024-04-02', 562000, 'U014'),
('O015', 'Đã giao', '2024-04-01', 900000, 'U015'),
('O016', 'Đang xử lý', '2024-04-02', 21400000, 'U016'),
('O017', 'Đã giao', '2024-04-01', 155000, 'U017'),
('O018', 'Đang xử lý', '2024-04-02', 2550000, 'U018'),
('O019', 'Đã giao', '2024-04-01', 160000, 'U019'),
('O020', 'Đang xử lý', '2024-04-02', 2720000, 'U020');


-- Products Table Data
INSERT INTO Products (idProduct, ten_sp, mo_ta, gia_tien, idCategories) VALUES
('P01', 'Quyển sách giáo khoa', 'Sách giáo khoa cấp 3', 50000, 'C01'),
('P02', 'Điện thoại thông minh', 'Điện thoại thông minh cao cấp', 15000000, 'C02'),
('P03', 'Máy tính xách tay', 'Cao cấp', 20000000, 'C02'),
('P04', 'Điện thoại thông minh', 'Trung cấp', 8000000, 'C02'),
('P05', 'Tivi', 'Cao cấp', 30000000, 'C08'),
('P06', 'Tủ lạnh', 'Bình dân', 5000000, 'C04'),
('P07', 'Máy giặt', 'Trung cấp', 10000000, 'C04'),
('P08', 'Máy tính bảng', 'Cao cấp', 15000000, 'C02'),
('P09', 'Loa bluetooth', 'Trung cấp', 3000000, 'C02'),
('P10', 'Tai nghe bluetooth', 'Bình dân', 1000000, 'C02'),
('P011', 'Máy sấy tóc', 'Bình dân', 500000, 'C04'),
('P012', 'Bàn ủi', 'Bình dân', 300000, 'C04'),
('P013', 'Máy lọc nước', 'Cao cấp', 12000000, 'C04'),
('P014', 'Nồi cơm điện', 'Bình dân', 1500000, 'C02'),
('P015', 'Máy xay sinh tố', 'Trung cấp', 2000000, 'C02'),
('P016', 'Bình giữ nhiệt', 'Bình dân', 500000, 'C04'),
('P017', 'Bộ ấm trà', 'Cao cấp', 3500000, 'C04'),
('P018', 'Bộ chén dĩa', 'Trung cấp', 2500000, 'C014'),
('P019', 'Chăn ga gối đệm', 'Cao cấp', 5000000, 'C04'),
('P020', 'Rèm cửa', 'Trung cấp', 3000000, 'C04');

-- Carts Table Data
INSERT INTO Carts (idCarts, so_luong, idUser, idProduct) VALUES
('CT01', '2', 'U01', 'P01'),
('CT02', '1', 'U02', 'P02'),
('CT03', '14', 'U03', 'P03'),
('CT04', '19', 'U04', 'P04'),
('CT05', '3', 'U05', 'P05'),
('CT06', '16', 'U06', 'P06'),
('CT07', '7', 'U07', 'P07'),
('CT08', '12', 'U08', 'P08'),
('CT09', '5', 'U09', 'P09'),
('CT010', '10', 'U010', 'P010'),
('CT011', '20', 'U011', 'P011'),
('CT012', '16', 'U012', 'P012'),
('CT013', '8', 'U013', 'P013'),
('CT014', '22', 'U014', 'P014'),
('CT015', '9', 'U015', 'P015'),
('CT016', '1', 'U016', 'P016'),
('CT017', '2', 'U017', 'P017'),
('CT018', '5', 'U018', 'P018'),
('CT019', '8', 'U019', 'P019'),
('CT020', '2', 'U020', 'P020');

