create database crud;
create table anggota(
id_anggota int not null auto_increment primary key,
nama_peserta varchar (50),
alamat varchar(50),
jenis_kelamin varchar(50),
agama varchar(30),
sekolah_asal char(13)
);