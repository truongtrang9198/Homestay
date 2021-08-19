use Homestay;
create table KhachHang (
	MSKH int not null primary key AUTO_INCREMENT,
    HoTenKhach varchar(30) ,
    NgaysinhKH Date,
    Gioitinh boolean,
    CMND char(9) not null,
    DiaChi varchar(100),
    SDT char(10) not null,
    Email varchar(30) );

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
    Chucvu varchar(50) );
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


create table Chitiet(

    MSP int,
    MSKH int ,
    MaHD int,
    Check_in datetime,
    Check_out datetime,
    Sodem int,
    -- constraint Ma_phong primary key(MSP),
    -- constraint MA_KHACH primary key(MSKH)
    primary key(MSP,MSKH)

    );


create table Hoadon(
	Mahd int not null primary key AUTO_INCREMENT,
    MSNV int,
    Tongtien double not null, -- tongtien = tienphong*dem + phikhac
    Phikhac double not null, -- bang tien dv
    Thanhtoan varchar(30),
    foreign key(MSNV) references NhanVien(MSNV) on delete no action

);

create table _Admin(
	Ma_admin char(5) default "Yuen",
    Pwd char(6)
);

create table Anhphong (
		MSP int,
        Hinhphong varchar(100),
        foreign key(MSP) references Phong(MSP) on delete cascade
	);
