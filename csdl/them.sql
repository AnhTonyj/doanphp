--
INSERT INTO `kich_co` (`MaKC`, `Ten_KC`, `Trang_thai`) VALUES
(1, '64G', 1),
(2, '128GB', 1),
(3, '256GB', 1),
(4, '512GB', 1),
(5, '1TB', 1),
(6, '2TB', 1);
--
INSERT INTO `loai_san_pham` (`MaLSP`, `Ten_loai`, `Trang_thai`) VALUES
(1, 'Iphone 11 Pro Max', 1);

INSERT INTO `mau_sac` (`MaMS`, `Ten_MS`, `Trang_thai`) VALUES
(1, 'Màu Trắng', 1),
(2, 'Màu Đen', 1),
(3, 'Màu Vàng', 1),
(4, 'Màu Xanh', 1),
(5, 'Màu Tím', 1),
(6, 'Màu Đỏ', 1),
(7, 'Màu Hồng', 1),
(8, 'Màu Xanh Green', 1);



INSERT INTO `nhan_hieu` (`MaNH`, `Ten_nhan_hieu`, `Trang_thai`) VALUES
(1, 'Apple Iphone', 1);

INSERT INTO `pt_van_chuyen` (`MaPTVC`, `TenPTVC`, `Do_dai`, `Don_gia`, `Trang_thai`) VALUES
(1, 'Viettel post', 1000, 23100, 1),
(2, 'Giao hàng tiết kiệm', 700, 13800, 1),
(3, 'Ninja van', 3000, 34500, 1),
(4, 'Best Express', 1200, 31000, 1),
(5, 'J&T Express', 900, 42000, 1);

INSERT INTO `san_pham` (`MaSP`, `Ten_sp`, `Mo_ta`, `Thong_tin`, `Gia_nhap`, `Gia_cu`, `Gia_moi`, `Luot_xem`, `Ngay_cap_nhat`, `Trang_thai`, `MaLSP`, `MaNH`) VALUES
(1, 'Iphone 11 Pro Max 64G', 'Do Apple Inc Sản xuất', '3 Camera chính Pin 3497mph', 2000, 3000, 3599, 3504, '2019-03-24 17:00:00', 1, 1, 1);

INSERT INTO `san_pham_ct` (`MaSPCT`, `So_luong`, `MaMS`, `MaKC`, `MaSP`) VALUES
(3, 1290, 1, 1, 1);
