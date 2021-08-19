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
		select usr,MSNV,Hoten_NV,NgaysinhNV,Gt,CMND_NV,DiaChi_NV,SDT_NV,Chucvu,Ngayvaolam,Hinhanh from Nhanvien
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