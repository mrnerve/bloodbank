Create Database KanDogruOlan;
Use KanDogruOlan;

Create Table Kullanici(
KullaniciNo Int Identity(1,1)Primary Key,
KullaniciAdi Varchar(15),
KullaniciSoyadi Varchar(15),
sifre varchar(50),
TCKimlikNo char(11),
Telefon char(11),
Mail char(100),
Adres varchar(100),
DogumTarihi Date,
KanGrubu Int Constraint KanGrubu_No Foreign Key references KanGruplari(GrupNo),
Kullanici_Durum bit
);

Create Table Hastane(
HastaneNo Int Identity(1,1)Primary Key,
HastaneAdi Varchar(15),
Adres  varchar(100),
Telefon Char(11)
);

create table uye(
uye_no int identity(1,1) primary key,
uyetc char(11) constraint uyetc_no foreign key references Kullanici(TCKimlikNo),
uyesifre varchar(50) constraint uyesifre_no foreign key references Kullanici(sifre),
)

create table sehir
(
sehir_id int identity(1,1) primary key,
sehir_plaka int,
sehir_ad varchar(100),
semt varchar(100)
)

create table duyuru(
duyuru_id int identity(1,1),
duyuru_no int primary key,
duyuru_icerik varchar(255)
)
