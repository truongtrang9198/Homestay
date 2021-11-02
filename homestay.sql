-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2021 at 03:41 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homestay`
--
use  Homestay;
DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `DanhsachTaikhoan` ()  begin 
	select username, Hoten_NV from taikhoan 
    inner join Nhanvien on taikhoan.MSNV = Nhanvien.MSNV ;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DSPhong` ()  begin 
		select MSP,TenPhong,Gia,TenLoai from Phong, Loaiphong where Phong.Maloai = Loaiphong.Maloai;
        
end$$
drop procedure DSphongtrong;
CREATE DEFINER=`root`@`localhost` PROCEDURE `DSphongtrong` (`ngayden` DATE, `ngaydi` DATE)  begin
	select Phong.MSP from Phong
   --  left join Trangthai on Phong.MSP = Trangthai.MSP
    where MSP in (select Datphong.MSP from Datphong where ngayden=Check_out) 
or (MSP not in  (select Datphong.MSP from Datphong where (ngayden between Check_in and Check_out) or (ngaydi between Check_in and Check_out ) 
			or (ngayden < Check_in and ngayden < Check_out))) 
or (MSP  in  (select Datphong.MSP from Datphong where ((ngayden between Check_in and Check_out) or (ngaydi between Check_in and Check_out ) 
			or (ngayden < Check_in and ngayden < Check_out)) and Trangthai='Huy'));
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DSphongtrongs` (`ngayden` DATE, `ngaydi` DATE)  begin
	select Phong.MSP from Phong
   --  left join Trangthai on Phong.MSP = Trangthai.MSP
    where MSP in (select Trangthai.MSP from Trangthai where ngayden=Trangthai.NgayKT) or  (MSP not in  (select Trangthai.MSP from Trangthai where (ngayden between Trangthai.NgayBD and Trangthai.NgayKT) or (ngaydi between Trangthai.NgayBD and Trangthai.NgayKT  ) or (ngayden < Trangthai.NgayBD and ngayden < Trangthai.NgayKT)));
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DSphongtrongss` (`ngayden` DATE, `ngaydi` DATE)  begin
	declare ngaydens date;
    declare ngaydis date;
    set ngaydens = STR_TO_DATE(ngayden,  '%Y,%m,%d');
    set ngaydis = STR_TO_DATE(ngaydi,  '%Y,%m,%d');
	select Phong.MSP from Phong
   --  left join Trangthai on Phong.MSP = Trangthai.MSP
    where (MSP not in  (select Trangthai.MSP from Trangthai where (ngaydens between Trangthai.NgayBD and Trangthai.NgayKT) or (ngaydis between Trangthai.NgayBD and Trangthai.NgayKT  ) or (ngaydens < Trangthai.NgayBD and ngaydens < Trangthai.NgayKT)));
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Suaphong` (`maphong` INT, `loaiphong` VARCHAR(30), `tphong` VARCHAR(30), `giap` INT)  begin 
		 declare ma int;
         set ma = (select Maloai from Loaiphong where Tenloai = loaiphong);
          update Phong set TenPhong = tphong, Gia = giap, MaLoai=ma where MSP=maphong;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Themkhach` (`hoten` VARCHAR(30), `ngaysinh` DATE, `gioitinh` VARCHAR(3), `cmnd` CHAR(9), `diachi` VARCHAR(100), `sdt` CHAR(10), `email` VARCHAR(50))  begin 
				declare makhach int;
                if(exists (select MaKH from Khachhang_temp where TenKH=hoten)) then
					set makhach = (select MaKH from Khachhang_temp where TenKH=hoten);
					insert into Khachhang  values(makhach,hoten,ngaysinh,gioitinh,cmnd,diachi,sdt,email);
                    end if;
        end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Themloai` (`ten` VARCHAR(50))  begin 
		if (not exists(select Tenloai from Loaiphong where ( select lower(Tenloai) from Loaiphong) = ten))
			then 
					insert into Loaiphong (Tenloai) values(ten);
            end if;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Themphong` (`loaiphong` VARCHAR(30), `tenphong` VARCHAR(30), `gia` INT, `mota` VARCHAR(400))  begin 
		 declare ma int;
         set ma = (select Maloai from Loaiphong where Tenloai = loaiphong);
         insert into Phong(Tenphong,Gia,Maloai,Mota) values(tenphong,gia,ma,mota);

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ThemTK` (`usr` VARCHAR(32), `pwd` CHAR(32), `cmnd` INT)  begin 
		declare manv int;
        set manv = (select MSNV from NhanVien where CMND_NV = cmnd);
        insert into TaiKhoan(username,passwd,MSNV) values(usr,pwd,manv);


end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Thongtincanhan` (`usr` VARCHAR(5))  begin 
		select * from taikhoan 
        inner join Nhanvien on taikhoan.MSNV = Nhanvien.MSNV
        where taikhoan.username = usr;
 end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ThongtinNhanvien` (`ma` INT)  begin 
		declare usr varchar(5);
        set usr = "none";
        if(exists (select username from taikhoan where MSNV = ma))  then
				set usr = (select username from taikhoan where MSNV = ma);
        end if;        
		select usr,MSNV,Hoten_NV,NgaysinhNV,Gt,CMND_NV,DiaChi_NV,SDT_NV,Chucvu,Ngayvaolam,Hinhanh,Trangthaicv from Nhanvien
        where Nhanvien.MSNV = ma;
         
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Thongtinphong` (`maphong` INT)  begin 
		select * from Phong 
        join Loaiphong on Phong.Maloai = Loaiphong.Maloai
        where MSP = maphong;
    end$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `SSloai` (`ten` VARCHAR(50)) RETURNS INT(11) begin 	
		-- declare n int;
		return  (select count (Tenloai)  from Loaiphong where ( select lower(Tenloai) from Loaiphong) = ten);
		
end$$
--

CREATE DEFINER=`root`@`localhost` function `Sodem` (`ngayden` DATE, `ngaydi` DATE) 
returns int 
	
		return (select datediff(`ngayden`,`ngaydi`) as songay) $$
-- 
CREATE DEFINER=`root`@`localhost` PROCEDURE `Phongdat` (`maphong` INT,`ngayden` DATE, `ngaydi` DATE)  begin 
		select MSP,TenPhong,Gia,datediff(`ngaydi`,`ngayden`) as songay,Mota from Phong 
        where MSP = maphong;
    end$$
    
CREATE DEFINER=`root`@`localhost` PROCEDURE `Datphong` (makhach int, maphong int, ngayden date, 
		ngaydi date, sodem int, thanhgia decimal(10,2), trangthai varchar(30)) 
 begin 
		insert into Datphong(MSP,MSKH,Check_in,Check_out,Sodem,Tienphong,Trangthai) 
				values(maphong,makhach,ngayden,ngaydi,sodem,thanhgia,trangthai);
 end$$
 
 -- 
 CREATE DEFINER=`root`@`localhost` PROCEDURE `Thongtindatphong` (makhach int) 
 begin 
		select * from Datphong,Phong
        where Datphong.MSP=Phong.MSP and Datphong.Trangthai not like 'Thanhtoan' and Datphong.MSKH = makhach;
 end$$
 
  CREATE DEFINER=`root`@`localhost` PROCEDURE `Xemhoadon` (makhach int) 
 begin 
		select * from Datphong,Hoadon,Phong
        where Datphong.MSP=Phong.MSP and Hoadon.MaDP=Datphong.MaDP and Datphong.MSKH = makhach;
 end$$
 
 
 delimiter ;
 drop procedure Thongtindatphong;
 call Phongdat(1,'2021-02-03','2021-03-12');
call Thongtindatphong(3);


-- --------------------------------------------------------

--
-- Table structure for table `anhphong`
--

CREATE TABLE `anhphong` (
  `MSH` int(11) NOT NULL,
  `MSP` int(11) DEFAULT NULL,
  `Hinhphong` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anhphong`
--

INSERT INTO `anhphong` (`MSH`, `MSP`, `Hinhphong`) VALUES
(1, 1, 'Anhphong/robin-spielmann-Z8Al4YPmtB8-unsplash.jpg'),
(2, 2, 'Anhphong/pexels-engin-akyurt-2736388.jpg'),
(3, 1, 'Anhphong/joyful-nVvQKe8hpNk-unsplash.jpg'),
(4, 3, 'Anhphong/pexels-rachel-claire-8112834.jpg'),
(5, 3, 'Anhphong/pexels-rachel-claire-8112840.jpg'),
(6, 3, 'Anhphong/pexels-rachel-claire-8112670.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `datphong`
--

CREATE TABLE `datphong` (
  `MaDP` int(11) NOT NULL,
  `MSP` int(11) DEFAULT NULL,
  `MSKH` int(11) DEFAULT NULL,
  `Check_in` date DEFAULT NULL,
  `Check_out` date DEFAULT NULL,
  `Sodem` int(11) DEFAULT NULL,
  `Tienphong` decimal(10,2) DEFAULT NULL,
  `Trangthai` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `MaHD` int(11) NOT NULL,
  `MSNV` int(11) DEFAULT NULL,
  `MaDP` int(11) DEFAULT NULL,
  `Phikhac` decimal(10,2) DEFAULT NULL,
  `Thanhtoan` varchar(30) DEFAULT NULL,
  `Tongtien` decimal(10,2) DEFAULT NULL,
  `Ghichu` varchar(100) DEFAULT NULL,
  `Thoigianlap` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `MSKH` int(11) NOT NULL,
  `HoTenKhach` varchar(30) DEFAULT NULL,
  `NgaysinhKH` date DEFAULT NULL,
  `Gioitinh` varchar(3) DEFAULT NULL,
  `CMND` char(9) NOT NULL,
  `DiaChi` varchar(100) DEFAULT NULL,
  `SDT` char(10) NOT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Passwd` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MSKH`, `HoTenKhach`, `NgaysinhKH`, `Gioitinh`, `CMND`, `DiaChi`, `SDT`, `Email`, `Passwd`) VALUES
(3, 'Tường Vi', '2002-06-26', 'nữ', '123454321', 'Cai Lậy- Tiền Giang', '0949760662', 'Camoffical@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(4, 'Trang Thi', '1998-10-23', 'nữ', '123454320', 'Cái Bè - Tiền Giang', '0949760661', 'Camoffical@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `loaiphong`
--

CREATE TABLE `loaiphong` (
  `Maloai` int(11) NOT NULL,
  `Tenloai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loaiphong`
--

INSERT INTO `loaiphong` (`Maloai`, `Tenloai`) VALUES
(1, 'Phòng đơn'),
(2, 'Phòng đôi'),
(3, 'Phòng gia đình');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MSNV` int(11) NOT NULL,
  `Hoten_NV` varchar(50) NOT NULL,
  `NgaysinhNV` date DEFAULT NULL,
  `Gt` varchar(3) DEFAULT NULL,
  `CMND_NV` char(9) NOT NULL,
  `DiaChi_NV` varchar(100) DEFAULT NULL,
  `SDT_NV` char(10) NOT NULL,
  `Chucvu` varchar(50) DEFAULT NULL,
  `Trangthaicv` varchar(32) DEFAULT 'Làm việc',
  `Hinhanh` varchar(200) DEFAULT NULL,
  `Ngayvaolam` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`MSNV`, `Hoten_NV`, `NgaysinhNV`, `Gt`, `CMND_NV`, `DiaChi_NV`, `SDT_NV`, `Chucvu`, `Trangthaicv`, `Hinhanh`, `Ngayvaolam`) VALUES
(1, 'Tường Vi', '1988-10-06', 'nữ', '123454321', 'Cái Bè - Tiền Giang', '0949760662', '', 'Làm việc', 'HinhanhNV/480049510.jpg', '2021-10-11 12:21:51'),
(2, 'Thanh Thanh', '2000-06-06', 'nữ', '123454324', 'CT', '0949760661', 'Lễ tân', 'Làm việc', 'HinhanhNV/1448320768.jpg', '2021-10-11 12:39:10');

-- --------------------------------------------------------

--
-- Table structure for table `phong`
--

CREATE TABLE `phong` (
  `MSP` int(11) NOT NULL,
  `TenPhong` varchar(30) DEFAULT NULL,
  `Gia` int(11) DEFAULT NULL,
  `Maloai` int(11) DEFAULT NULL,
  `Mota` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phong`
--

INSERT INTO `phong` (`MSP`, `TenPhong`, `Gia`, `Maloai`, `Mota`) VALUES
(1, 'Phòng đơn-l1', 350000, 1, 'Đầy đủ tiện nghi. Thoải mái'),
(2, 'Phòng đôi 1', 550000, 2, 'Rộng rãi, thoáng mát. Đầy đủ tiện nghi.'),
(3, 'Gia đình v1', 800000, 3, 'Phòng phù hợp cho gia đình. Có không gian riêng tư. Đầy đủ tiện nghi');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `username` varchar(5) DEFAULT NULL,
  `passwd` char(32) DEFAULT NULL,
  `MSNV` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `_admin`
--

CREATE TABLE `_admin` (
  `usr` char(5) DEFAULT 'Admin',
  `Pwd` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `_admin`
--

INSERT INTO `_admin` (`usr`, `Pwd`) VALUES
('Admin', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anhphong`
--
ALTER TABLE `anhphong`
  ADD PRIMARY KEY (`MSH`),
  ADD KEY `MSP` (`MSP`);

--
-- Indexes for table `datphong`
--
ALTER TABLE `datphong`
  ADD PRIMARY KEY (`MaDP`),
  ADD KEY `FK_MSP` (`MSP`),
  ADD KEY `FK_MSKH` (`MSKH`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MaHD`),
  ADD KEY `FK_MSNV` (`MSNV`),
  ADD KEY `FK_MaDP` (`MaDP`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MSKH`);

--
-- Indexes for table `loaiphong`
--
ALTER TABLE `loaiphong`
  ADD PRIMARY KEY (`Maloai`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MSNV`);

--
-- Indexes for table `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`MSP`),
  ADD KEY `Maloai` (`Maloai`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD UNIQUE KEY `MSNV` (`MSNV`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anhphong`
--
ALTER TABLE `anhphong`
  MODIFY `MSH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `datphong`
--
ALTER TABLE `datphong`
  MODIFY `MaDP` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `MaHD` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MSKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `loaiphong`
--
ALTER TABLE `loaiphong`
  MODIFY `Maloai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MSNV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `phong`
--
ALTER TABLE `phong`
  MODIFY `MSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anhphong`
--
ALTER TABLE `anhphong`
  ADD CONSTRAINT `anhphong_ibfk_1` FOREIGN KEY (`MSP`) REFERENCES `phong` (`MSP`) ON DELETE CASCADE;

--
-- Constraints for table `datphong`
--
ALTER TABLE `datphong`
  ADD CONSTRAINT `FK_MSKH` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`),
  ADD CONSTRAINT `FK_MSP` FOREIGN KEY (`MSP`) REFERENCES `phong` (`MSP`);

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `FK_MSNV` FOREIGN KEY (`MSNV`) REFERENCES `nhanvien` (`MSNV`),
  ADD CONSTRAINT `FK_MaDP` FOREIGN KEY (`MaDP`) REFERENCES `datphong` (`MaDP`);

--
-- Constraints for table `phong`
--
ALTER TABLE `phong`
  ADD CONSTRAINT `phong_ibfk_1` FOREIGN KEY (`Maloai`) REFERENCES `loaiphong` (`Maloai`);

--
-- Constraints for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `taikhoan_ibfk_1` FOREIGN KEY (`MSNV`) REFERENCES `nhanvien` (`MSNV`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
