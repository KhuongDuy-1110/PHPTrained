use master
go 
create database quanlyhocvien
go 
use quanlyhocvien
drop table 
go
create table sinhvien
(
	id int identity(1,1) primary key not null,
	TenHocVien nvarchar (30),
	Tuoi int,
	DiaChi nvarchar (50),
	Email varchar (30),
	SDT char(11),
	GioiTinh nvarchar (5),
)
create table monhoc
(
	MaMonHoc varchar (5) primary key not null,
	TenMonHoc nvarchar (30),
)
create table diem
(
	Diem int,
	id int,
	MaMonHoc varchar (5),
	primary key(id,MaMonHoc),
	constraint fk_sv_diem foreign key (id) references sinhvien (id),
	constraint fk_monhoc_diem foreign key (MaMonHoc) references monhoc (MaMonHoc),
)
create table lophoc
(
	MaLopHoc varchar (5) primary key not null,
	TenLopHoc nvarchar (30),
	id int,
	constraint fk_sv_lophoc foreign key (id) references sinhvien (id),
)
create table tkb
(
	id int,
	MaMonHoc varchar (5),
	SoTietMotTuan int,
	constraint fk_tkb_sinhvien foreign key (id) references sinhvien (id),
	constraint fk_tkb_monhoc foreign key (MaMonHoc) references monhoc (MaMonHoc)
)
alter table sinhvien add khoahoc int;
insert into sinhvien (TenHocVien,Tuoi,DiaChi,Email,SDT,GioiTinh) 
values 
(N'Nguyễn Văn A', 20, N'Hải Dương', 'nva@gmail.com', '012345678', N'Nam'),
(N'Nguyễn Văn B', 21, N'Hải Phòng', 'nvb@gmail.com', '012345678', N'Nam'),
(N'Nguyễn Văn C', 22, N'Ninh Thuận', 'nvc@gmail.com', '012345678', N'Nam'),
(N'Nguyễn Văn D', 20, N'Bắc Ninh', 'nvd@gmail.com', '012345678', N'Nam'),
(N'Nguyễn Văn E', 19, N'Hà Nội', 'nve@gmail.com', '012345678', N'Nam')

insert into monhoc (MaMonHoc,TenMonHoc) 
values
('MH1',N'Toán cao cấp'),
('MH2',N'Triết học'),
('MH3',N'Tâm lý học')

insert into diem (diem,id,MaMonHoc) 
values
(8.5,1,'MH1'),
(8,5,'MH2'),
(5,3,'MH3'),
(8.5,2,'MH3'),
(8.5,4,'MH1')

insert into lophoc (MaLopHoc,TenLopHoc,id) 
values
('C01',N'Lớp 01',1),
('C02',N'Lớp 02',2),
('C03',N'Lớp 03',3),
('C04',N'Lớp 04',4),
('C05',N'Lớp 05',5)
update sinhvien set khoahoc = 13;
select * from sinhvien
select * from lophoc
select * from sinhvien where Tuoi > 20 order by id desc