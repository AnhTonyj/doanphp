CREATE DATABASE DoAnPHP
GO
CREATE TABLE lien_he(
    MaLH int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    Tieu_de varchar(200) NOT NULL,
    Dia_chi varchar(250) NOT NULL,
    Dien_thoai varchar(250) NOT NULL,
    Email varchar(100) NOT NULL,
    Facebook varchar(100) NOT NULL,
    Sky  varchar(100),
    Logo  varchar(50)
);
CREATE TABLE tin_tuc(
    MaTT int PRIMARY KEY AUTO_INCREMENT NOT NULL, 
    Tieu_de varchar(200) NOT NULL,
    Mo_ta varchar(250) ,
    Noi_dung text,
    Loai_tin varchar(100) NOT NULL,
    Ngay_dang_ky datetime NOT NULL,
    Ngay_cap_nhat datetime NOT NULL,
    Hinh_anh varchar(50) NOT NULL,
    Trang_thai tinyint 

);
CREATE TABLE phan_hoi (
    MaPH int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    Tieu_de varchar(200) NOT NULL,
    Noi_dung text NOT NULL,
    Ngay_gui datetime NOT NULL,
    Email varchar(100) NOT NULL,
    Facebook varchar(100),
    Tra_loi text,
    Trang_thai tinyint,
    Da_xem tinyint
);
-- xx
CREATE TABLE quan_tri(
    Tai_khoan varchar(50) PRIMARY KEY NOT NULL,
    Mat_khau varchar(32),
    Trang_thai tinyint
);
-- xx
CREATE TABLE pt_thanh_toan(
    MaPTTT int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    Ten_PTTT varchar(50) NOT NULL,
    Trang_thai tinyint
);
CREATE TABLE loai_san_pham(
    MaLSP int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    Ten_loai varchar(50) NOT NULL,
    Trang_thai tinyint
);
CREATE TABLE pt_van_chuyen(
    MaPTVC int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    TenPTVC varchar(50),
    Do_dai int ,
    Don_gia float ,
    Trang_thai tinyint
);
CREATE TABLE kich_co(
    MaKC int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    Ten_KC varchar(50) NOT NULL ,
    Trang_thai tinyint
);
CREATE TABLE nhan_hieu(
    MaNH int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    Ten_nhan_hieu varchar(50) NOT NULL ,
    Trang_thai tinyint
);
CREATE TABLE mau_sac(
    MaMS int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    Ten_MS varchar(50) NOT NULL ,
    Trang_thai tinyint
);
CREATE TABLE khach_hang(
    MaKH int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    Ho_ten varchar(100),
    Tai_khoan varchar(50) NOT NULL,
    Mat_khau varchar(32),
    Dia_chi varchar(200),
    Dien_thoai varchar(30),
    Email varchar(50) NOT NULL,
    Ngay_sinh datetime,
    Ngay_cap_nhat datetime,
    Gioi_tinh tinyint,
    Tich_diem int NOT NULL,
    Trang_thai tinyint
    
);
--xx
CREATE TABLE hoa_don(
    MaHD int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    Ngay_HD  datetime NOT NULL ,
    Hoten_nguoinhan varchar(50),
    Diachi_nguoinhan varchar(50),
    Dienthoai_nguoinhan varchar(50),
    Diachi_email varchar(50),
    Ngay_giao_hang datetime,
    Trang_thai tinyint,
    MaKH int  NOT NULL,
    MaPTVC int  NOT NULL,
    MaPTTT int ,
     FOREIGN KEY(MaKH) REFERENCES khach_hang(MaKH),
    FOREIGN KEY(MaPTVC) REFERENCES pt_van_chuyen(MaPTVC),
    FOREIGN KEY( MaPTTT) REFERENCES pt_thanh_toan(MaPTTT)
);
CREATE TABLE san_pham(
    MaSP int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    Ten_sp varchar(200) NOT NULL,
    Mo_ta varchar(250),
    Thong_tin text,
    Gia_nhap float NOT NULL,
    Gia_cu float,
    Gia_moi float,
    Luot_xem int NOT NULL,
    Ngay_cap_nhat TIMESTAMP,
    Trang_thai tinyint,
    MaLSP int ,
    MaNH int ,
    FOREIGN KEY(MaLSP) REFERENCES loai_san_pham(MaLSP),
    FOREIGN KEY(MaNH) REFERENCES nhan_hieu(MaNH)
    
);
CREATE TABLE hinh_anh(
    MaHA int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    Ten_file_anh varchar(50) NOT NULL,
    Trang_thai tinyint,
    MaSP int FOREIGN KEY REFERENCES san_pham(MaSP)
    
);
CREATE TABLE binh_luan(
    MaBL int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    MaKH int ,
    MaSP int ,
    Tieu_de varchar(100),
    Noi_dung text ,
    Ngay_BL datetime NOT NULL ,
    FOREIGN KEY(MaKH) REFERENCES khach_hang(MaKH),
    FOREIGN KEY(MaSP) REFERENCES san_pham(MaSP),
    Trang_thai tinyint
);
CREATE TABLE san_pham_ct(
   MaSPCT int PRIMARY KEY AUTO_INCREMENT NOT NULL,
   So_luong int NOT NULL,
   MaMS int ,
   MaKC int ,
   MaSP int ,
   FOREIGN KEY(MaMS) REFERENCES mau_sac(MaMS),
   FOREIGN KEY(MaKC) REFERENCES kich_co(MaKC),
   FOREIGN KEY(MaSP) REFERENCES san_pham(MaSP)
    
);
CREATE TABLE ct_hoa_don(
    MaHD int,
    MaSPCT int ,
    So_luong_ban int NOT NULL,
    Gia_ban float NOT NULL,
    Tra_lai int ,
     FOREIGN KEY(MaHD) REFERENCES hoa_don(MaHD),
     FOREIGN KEY(MaSPCT) REFERENCES san_pham_ct(MaSPCT),
    PRIMARY KEY (MaHD, MaSPCT)
    
);

