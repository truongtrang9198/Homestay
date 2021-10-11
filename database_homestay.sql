create database Homestay;
use Homestay;
drop database homestay;
create table KhachHang (
	MSKH int not null primary key,
    HoTenKhach varchar(30) ,
    NgaysinhKH Date,
    Gioitinh boolean,
    CMND char(9) not null,
    DiaChi varchar(100),
    SDT char(10) not null,
    Email varchar(30),
    pwd_KH varchar(32));

drop table KhachHang;
create table TaiKhoan (
	username varchar(5),
    passwd   char(32),
    MSNV int,
    foreign key(MSNV) references NhanVien(MSNV) on delete cascade
    );
drop table TaiKhoan;
create table NhanVien (
	MSNV int not null primary key AUTO_INCREMENT,
    Hoten_NV varchar(50) not null,
    NgaysinhNV Date,
    Gt varchar(3),
    CMND_NV char(9) not null,
    DiaChi_NV varchar(100),
    SDT_NV char(10) not null,
    Chucvu varchar(50),
	Trangthaicv varchar(30),
    Hinhanh varchar(100)
    );

create table Loaiphong(
			Maloai int not null primary key AUTO_INCREMENT,
		    Tenloai varchar(50) not null
		);
create table Phong (
	MSP int not null primary key AUTO_INCREMENT,
    TenPhong varchar(30),
    Gia  int,
    Maloai int,
    foreign key(Maloai) references Loaiphong(Maloai)
    );


create table ChitietDP (

    MSP int,
    MaDP int ,
    Check_in date,
    Check_out date,
    Sodem int,
    Tienphong decimal(10,2),
	primary key(MSP,MaDP)

    );
    drop table Chitiet;
create table Datphong (
	MaDP int primary key auto_increment,
    MSKH int,
    MSNV int,
	Phikhac decimal(10,2),
    Thanhtoan varchar(30),
    Tongtien decimal(10,2),
    Ghichu varchar(100),
    Thoihian timestamp
);

create table _Admin(
	Ma_admin char(5) default "Admin",
    Pwd varchar(32)
);

create table Anhphong (
		MSP int,
        Hinhphong varchar(100),
        foreign key(MSP) references Phong(MSP) on delete cascade
	);
    
    create table Trangthai (
		Trangthai int,
        Tungay date,
        Denngay date,
        MSP int,
        foreign key(MSP) references Phong(MSP)
    
    
    );

create table Khachhang_temp (
		MaKH int not null primary key AUTO_INCREMENT,
        TenKH varchar(50)

);