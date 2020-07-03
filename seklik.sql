CREATE TABLE User_2 (
  id_user INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nama_user VARCHAR(15) NULL,
  pass_user VARCHAR(32) NULL,
  level_user ENUM('Admin','Operator') NULL,
  status_user ENUM('Aktif','Tidak Aktif') NULL,
  PRIMARY KEY(id_user)
);

CREATE TABLE KK (
  id_kk INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  no_kk VARCHAR(16) NULL,
  nama_kk VARCHAR(50) NULL,
  alamat VARCHAR(255) NULL,
  rt VARCHAR(3) NULL,
  rw VARCHAR(3) NULL,
  desa VARCHAR(20) NULL,
  kelurahan VARCHAR(45) NULL,
  kecamatan VARCHAR(45) NULL,
  kabupaten VARCHAR(45) NULL,
  kota VARCHAR(45) NULL,
  kode_pos VARCHAR(5) NULL,
  provinsi VARCHAR(45) NULL,
  PRIMARY KEY(id_kk)
);

CREATE TABLE Warga (
  id_warga INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  id_kk INTEGER UNSIGNED NOT NULL,
  nama_lengkap VARCHAR(50) NULL,
  nik VARCHAR(50) NULL,
  jenis_kelamin VARCHAR(10) NULL,
  tempat_lahir VARCHAR(255) NULL,
  tanggal_lahir VARCHAR(45) NULL,
  agama VARCHAR(20) NULL,
  pendidikan VARCHAR(10) NULL,
  jenis_pekerjaan VARCHAR(50) NULL,
  status_perkawinan VARCHAR(20) NULL,
  hubungan_keluarga VARCHAR(50) NULL,
  kewarganegaraan VARCHAR(10) NULL,
  no_paspor VARCHAR(50) NULL,
  no_kitas VARCHAR(50) NULL,
  nama_ayah VARCHAR(50) NULL,
  nama_ibu VARCHAR(50) NULL,
  nik_ayah VARCHAR(16) NULL,
  nik_ibu VARCHAR(16) NULL,
  PRIMARY KEY(id_warga),
  FOREIGN KEY(id_kk)
    REFERENCES KK(id_kk)
      ON DELETE NO ACTION
      ON UPDATE CASCADE
);

CREATE TABLE Surat (
  id_surat INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  id_user INTEGER UNSIGNED NOT NULL,
  id_warga INTEGER UNSIGNED NOT NULL,
  nama_surat VARCHAR(50) NULL,
  no_surat VARCHAR(45) NULL,
  keperluan VARCHAR(2500) NULL,
  alasan VARCHAR(2500) NULL,
  isian VARCHAR(2500) NULL,
  keterangan VARCHAR(2500) NULL,
  tanggal_surat VARCHAR(45) NULL,
  PRIMARY KEY(id_surat),
  FOREIGN KEY(id_warga)
    REFERENCES Warga(id_warga)
      ON DELETE NO ACTION
      ON UPDATE CASCADE,
  FOREIGN KEY(id_user)
    REFERENCES User_2(id_user)
      ON DELETE NO ACTION
      ON UPDATE CASCADE
);

