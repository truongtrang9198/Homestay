use homestay;


-- tạo fuction kiểm tra và thêm dữ liệu bảng Loai sp;
delimiter $
create function Themloai(ten varchar(50))
returns int 
begin 
		if (not exists(select Tenloai from Loaiphong where ( select lower(Tenloai) from Loaiphong) = ten))
			then 
					insert into Loaiphong (Tenloai) values(ten);
                    return 1;
			else 
					return 0;
            end if;

end$
delimiter ;

 delimiter $
create procedure Themloai(ten varchar(50))
begin 
		if (not exists(select Tenloai from Loaiphong where ( select lower(Tenloai) from Loaiphong) = ten))
			then 
					insert into Loaiphong (Tenloai) values(ten);
            end if;

end$
delimiter ;

delimiter $
create function SSloai(ten varchar(50))
returns int 
begin 	
		-- declare n int;
		return  (select count (Tenloai)  from Loaiphong where ( select lower(Tenloai) from Loaiphong) = ten);
			
				
			
end$
delimiter ;
select Tenloai, SSloai('Phòng đôi') x from Loaiphong;
drop procedure Themphong;


-- tạo procedure thêm phòng
delimiter $
create procedure Themphong( loaiphong varchar(30), tenphong varchar(30), gia int, mota varchar(400) )
begin 
		 declare ma int;
         set ma = (select Maloai from Loaiphong where Tenloai = loaiphong);
         insert into Phong(Tenphong,Gia,Maloai,Mota) values(tenphong,gia,ma,mota);

end$
delimiter ;
call Themphong('Phòng đôi','bb1',2100);
drop procedure Themphong;
-- hiển thị danh sách phòng
delimiter $ 
create procedure DSPhong () 
begin 
		select MSP,TenPhong,Gia,TenLoai from Phong, Loaiphong where Phong.Maloai = Loaiphong.Maloai;
        
end$
delimiter ;
call DSPhong();
select * from Phong;

-- tạo procedure thêm phòng
delimiter $
create procedure Suaphong( maphong int, loaiphong varchar(30), tphong varchar(30), giap int)
begin 
		 declare ma int;
         set ma = (select Maloai from Loaiphong where Tenloai = loaiphong);
          update Phong set TenPhong = tphong, Gia = giap, MaLoai=ma where MSP=maphong;

end$
delimiter ;
--
delimiter $
create procedure ThemTK( usr varchar(32), pwd char(32), cmnd int) 
begin 
		declare manv int;
        set manv = (select MSNV from NhanVien where CMND_NV = cmnd);
        insert into TaiKhoan(username,passwd,MSNV) values(usr,pwd,manv);


end$
delimiter ;
drop procedure ThemTk;
-- viet procedure trả ve thong tin nhan vien
delimiter /
create procedure ThongtinNhanvien  (ma int )
begin 
		declare usr varchar(5);
        set usr = "none";
        if(exists (select username from taikhoan where MSNV = ma))  then
				set usr = (select username from taikhoan where MSNV = ma);
        end if;        
		select usr,MSNV,Hoten_NV,NgaysinhNV,Gt,CMND_NV,DiaChi_NV,SDT_NV,Congviec,Ngayvaolam,Hinhanh from Nhanvien
        where Nhanvien.MSNV = ma;
         
end/

delimiter ;
drop procedure ThongtinNhanvien;
-- hien thi danh sach tai khoan
delimiter /
create procedure DanhsachTaikhoan() 
begin 
	select username, Hoten_NV from taikhoan 
    inner join Nhanvien on taikhoan.MSNV = Nhanvien.MSNV ;
end/
delimiter ;

 -- procedure hiể nthi5 thông tin ca nhan cua nhan vien
 delimiter \
 create procedure Thongtincanhan ( usr varchar(5)) 
 begin 
		select * from taikhoan 
        inner join Nhanvien on taikhoan.MSNV = Nhanvien.MSNV
        where taikhoan.username = usr;
 end\
 delimiter ;
 -- procedure hien thi thong tin  cua phong
 delimiter \
	create procedure Thongtinphong( maphong int)
    begin 
		select * from Phong 
        join Loaiphong on Phong.Maloai = Loaiphong.Maloai
        where MSP = maphong;
    end\
 delimiter ;
 
 
 
 
 
 
-- procedure Themkhachhang vao bang khach hang va chi tiet dat phong
delimiter \
create procedure Themkhach(hoten varchar(30),ngaysinh date, gioitinh varchar(3),cmnd char(9),diachi varchar(100), sdt char(10),
							email varchar(50))
		begin 
				declare makhach int;
                if(exists (select MaKH from Khachhang_temp where TenKH=hoten)) then
					set makhach = (select MaKH from Khachhang_temp where TenKH=hoten);
					insert into Khachhang  values(makhach,hoten,ngaysinh,gioitinh,cmnd,diachi,sdt,email);
                    end if;
        end\
delimiter ;
drop procedure Datphong;
drop procedure Themkhach;

delimiter \
create procedure Datphong(hoten varchar(30),ngaysinh date, gioitinh varchar(3),cmnd char(9),diachi varchar(100), sdt char(10),
							email varchar(50),maphong int, ngayden date, ngaydi date, songay int)
		begin 
				declare makhach int;
                if(exists (select MaKH from Khachhang_temp where TenKH=hoten)) then
					set makhach = (select MaKH from Khachhang_temp where TenKH=hoten);
					insert into Khachhang(MSKH,HoTenKhach,NgaysinhKH,Gioitinh,CMND,DiaChi,SDT,Email)  values(makhach,hoten,ngaysinh,gioitinh,cmnd,diachi,sdt,email);
                    insert into Datphong(MSP,MSKH,Check_in,Check_out,Sodem) values(maphong,makhach,ngayden,ngaydi,songay);
                    delete from Khachhang_temp where MaKH=makhach;
                    end if;
        end\
delimiter ;
drop procedure Datphong;
call Datphong('TT','2021-07-16','nữ','312463198','TG','0949760662','mail',52,'2021-07-16','2021-07-16',3);

-- function kiemtra phong co trong hay khong

delimiter \
	create function Kiemtraphongtrong( maphong int,ngayden date, ngaydi date)
    returns int
    begin
			declare d_in date;
            declare d_out date;
			if(exists (select Check_in,Check_out from Chitiet where MSP=maphong and Trangthai=1))
            then 
				set d_in = (select Check_in from Chitiet where MSP=maphong and Trangthai=1);
                set d_out = (select Check_in from Chitiet where MSP=maphong and Trangthai=1);
                if ( (d_in between ngayden and ngaydi) || (d_out between ngayden and ngaydi)) 
                then 
					return 0;
				else 
					return 1;
				end if;
			 else 
				return 1;
            end if;
    end\

delimiter ;
drop function Kiemtraphongtrong;
select Kiemtraphongtrong(22,'2021-08-21','2021-08-25');