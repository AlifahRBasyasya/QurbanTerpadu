CREATE TABLE Pekurban (
    username INT AUTO_INCREMENT,
    pass VARCHAR(255),
    kode_hewan VARCHAR(10),
    nama VARCHAR(255),
    jenis VARCHAR(20),
    lokasi VARCHAR(30),
    narahubung VARCHAR(255),
    nama_kontak VARCHAR(255),
    no_wa_kontak VARCHAR(13),
    foto_konfirmasi VARCHAR(255),
    PRIMARY KEY (username)
);

CREATE TABLE Hewan (
    username INT AUTO_INCREMENT,
    bobot VARCHAR(10),
    temperatur VARCHAR(10),
    tgl_penyembelihan DATE,
    foto1 VARCHAR(255),
    foto2 VARCHAR(255),
    foto3 VARCHAR(255),
    PRIMARY KEY (username),
    FOREIGN KEY (username) REFERENCES Pekurban (username)
);

CREATE TABLE ProgresQurban (
    username INT AUTO_INCREMENT,
    penerimaan BOOLEAN,
    prapenyembelihan BOOLEAN,
    penyembelihan BOOLEAN,
    pencacahan BOOLEAN,
    distribusi BOOLEAN,
    PRIMARY KEY (username),
    FOREIGN KEY (username) REFERENCES Pekurban (username)
);

INSERT INTO Pekurban (pass, kode_hewan, nama, jenis, lokasi, narahubung, nama_kontak, no_wa_kontak, foto_konfirmasi) VALUES
("12345", "A-1", "Nur Mutmainnah Rahim", "Sapi", "Yogyakarta", "Alifah RB", "Alifah RB", "080808080808", "img/konfirmasi1.png");

INSERT INTO Hewan (username, bobot, temperatur, tgl_penyembelihan, foto1, foto2, foto3) VALUES
(1, "100.55 kg", "38.5", NULL, "img/sapi1.jpg", "img/sapi2.jpg", "img/sapi3.jpg");

INSERT INTO ProgresQurban (username, penerimaan, prapenyembelihan, penyembelihan, pencacahan, distribusi) VALUES
(1, true, true, true, false, false);