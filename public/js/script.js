$(function () {
  //admin data_Kelas tambah kategori
  $(".ModalTambahKategori").on("click", function () {
    $("#judulModalKategori").html("Tambah Data Kategori");
    $(".modal-footer button[type=submit]").html("Tambah Data");

    //membersihkan
    $("#nama_kategori").val("");
    $("#hero_deskripsi").val("");
    $("#hero_gambar").val("");
    $("#id_kategori").val("");
  });

  //ubah data kategori
  $(".ModalUbahKategori").on("click", function () {
    $("#judulModalKategori").html("Ubah Data Kategori");
    $(".modal-footer button[type=submit]").html("Ubah Data");
    $(".modal-body form").attr("action", "http://localhost/digiskill_2.0/kategori/ubah");

    const id = $(this).data("id");

    $.ajax({
      url: "http://localhost/digiskill_2.0/kategori/getUbah",
      data: { id: id }, // kiri nama data,kanan isi data
      method: "post",
      dataType: "json",
      success: function (data) {
        console.log(data);
        $("#K_id_kategori").val(data.id_kategori);
        $("#nama_kategori").val(data.nama_kategori);
        $("#hero_deskripsi").val(data.hero_deskripsi);
        $("#e_hero_gambar").val(data.hero_gambar);
      },
    });
  });

  //admin data_Kelas tambah kelas
  $(".ModalTambahKelas").on("click", function () {
    $("#judulModalKelas").html("Tambah Data Kelas");
    $(".modal-footer button[type=submit]").html("Tambah Data");

    //membersihkan
    $("#id_kategori").val("");
    $("#nama_kelas").val("");
    $("#detail").val("");
    $("#thumbnail").val("");
    $("#detail_program").val("");
    $("#deskripsi").val("");
    $("#kode_kelas").val("");
  });

  //admin data_Kelas ubah data
  $(".ModalUbahKelas").on("click", function () {
    $("#judulModalKelas").html("Ubah Data Kelas");
    $(".modal-footer button[type=submit]").html("Ubah Data");
    $(".modal-body .mb-3 input#kode_kelas").prop("readonly", true);
    $(".modal-body form").attr("action", "http://localhost/digiskill_2.0/kelas/ubah");

    const id = $(this).data("id");

    $.ajax({
      url: "http://localhost/digiskill_2.0/kelas/getUbah",
      data: { id: id }, // kiri nama data,kanan isi data
      method: "post",
      dataType: "json",
      success: function (data) {
        console.log(data);
        $("#id_kelas").val(data.id_kelas);
        $("#id_kategori").val(data.id_kategori);
        $("#nama_kelas").val(data.nama_kelas);
        $("#detail").val(data.detail);
        $("#e_thumbnail").val(data.thumbnail);
        $("#detail_program").val(data.detail_program);
        $("#deskripsi").val(data.deskripsi);
        $("#kode_kelas").val(data.kode_kelas);
      },
    });
  });

  //user Masuk Kelas tabel data_user
  $(".K_ModalMasukKelas").on("click", function () {
    const id = $(this).data("id");

    $.ajax({
      url: "http://localhost/digiskill_2.0/kelas/getUbah",
      data: { id: id }, // kiri nama data,kanan isi data
      method: "post",
      dataType: "json",
      success: function (data) {
        console.log(data);
        $("#id_kelas").val(data.id_kelas);
        $("#nama_kelas").val(data.nama_kelas);
      },
    });
  });

  //user Masuk Kelas tabel data_user
  $(".E_ModalPenilaian").on("click", function () {
    const id = $(this).data("id");

    $.ajax({
      url: "http://localhost/digiskill_2.0/penilaian/getUbahPenilaian",
      data: { id: id }, // kiri nama data,kanan isi data
      method: "post",
      dataType: "json",
      success: function (data) {
        console.log(data);
        $("#id_kelas").val(data.id_kelas);
        $("#nama_kelas").val(data.nama_kelas);
      },
    });
  });

  //admin data_user
  $(".ModalDataUser").on("click", function () {
    const id = $(this).data("id");

    $.ajax({
      url: "http://localhost/digiskill_2.0/user/getData",
      data: { id: id }, // kiri nama data,kanan isi data
      method: "post",
      dataType: "json",
      success: function (data) {
        console.log(data);
        $("#nama").val(data.nama_user);
        $("#profile").val(data.foto_user);
        $("#kategori").val(data.nama_kategori);
        $("#judul").val(data.nama_kelas);
        $("#tgl_pendaftaran").val(data.tgl_pendaftaran);
      },
    });
  });

  // modal tambah data mentor
  $(".ModalTambahMentor").on("click", function () {
    $("#judulModalMentor").html("Tambah Data Mentor");
    $(".modal-footer button[type=submit]").html("Tambah Data");

    //membersihkan
    $("#id_profile_mentor").val("");
    $("#nama_mentor").val("");
    $("#foto_mentor").val("");
    $("#email").val("");
    $("#username").val("");
    $("#password").val("");
    $("#pekerjaan").val("");
    $("#pengalaman").val("");
    $("#ig").val("");
    $("#linkedin").val("");
    $("#git").val("");
  });

  // modal ubah data mentor
  $(".ModalUbahMentor").on("click", function () {
    $("#judulModalMentor").html("Ubah Data Mentor");
    $(".modal-footer button[type=submit]").html("Ubah Data");
    $(".modal-body form").attr("action", "http://localhost/digiskill_2.0/kelola_mentor/ubah");

    const id = $(this).data("id");

    $.ajax({
      url: "http://localhost/digiskill_2.0/kelola_mentor/getUbah",
      data: { id: id }, // kiri nama data,kanan isi data
      method: "post",
      dataType: "json",
      success: function (data) {
        console.log(data);
        $("#id_profile_mentor").val(data.id_profile_mentor);
        $("#nama_mentor").val(data.nama_mentor);
        $("#e_foto_mentor").val(data.foto_mentor);
        $("#email").val(data.email);
        $("#username").val(data.username);
        $("#password").val(data.password);
        $("#pekerjaan").val(data.pekerjaan);
        $("#pengalaman").val(data.pengalaman);
        $("#ig").val(data.ig);
        $("#linkedin").val(data.linkedin);
        $("#git").val(data.git);
      },
    });
  });

  $(".ModalTambahMateri").on("click", function () {
    $("#judulModalMateri").html("Tambah Data Materi");
    $(".modal-footer button[type=submit]").html("Tambah Data");

    //membersihkan
    $("#id_materi").val("");
    $("#urutan_materi").val("");
    $("#judul").val("");
    $("#link_materi").val("");
    $("#deskripsi_materi").val("");
    // $('#file_penugasan').val('');
  });

  $(".ModalUbahMateri").on("click", function () {
    $("#judulModalMateri").html("Ubah Data Materi");
    $(".modal-footer button[type=submit]").html("Ubah Data");
    $(".modal-body form").attr("action", "http://localhost/digiskill_2.0/materi/ubah");

    const id = $(this).data("id");

    $.ajax({
      url: "http://localhost/digiskill_2.0/materi/getUbah",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        console.log(data);
        $("#id_materi").val(data.id_materi);
        $("#urutan_materi").val(data.urutan_materi);
        $("#judul").val(data.judul);
        $("#link_materi").val(data.link_materi);
        $("#deskripsi_materi").val(data.deskripsi_materi);
        // $('#e_file_penugasan').val(data.file_penugasan);
      },
      error: function (xhr, status, error) {
        console.error(xhr.responseText);
      },
    });
  });

  $(".ModalTambahTools").on("click", function () {
    $("#judulModalTools").html("Tambah Data Tools");
    $(".modal-footer button[type=submit]").html("Tambah Data");

    //membersihkan
    $("#id_tools").val("");
    $("#nama_tools").val("");
    $("#link_download").val("");
    $("#gambar").val("");
  });

  $(".ModalUbahTools").on("click", function () {
    $("#judulModalTools").html("Ubah Data Tools");
    $(".modal-footer button[type=submit]").html("Ubah Data");
    $(".modal-body form").attr("action", "http://localhost/digiskill_2.0/tools/ubah");

    const id = $(this).data("id");

    $.ajax({
      url: "http://localhost/digiskill_2.0/tools/getUbah",
      data: { id: id }, // kiri nama data,kanan isi data
      method: "post",
      dataType: "json",
      success: function (data) {
        console.log(data);
        //membersihkan
        $("#id_tools").val(data.id_tools);
        $("#nama_tools").val(data.nama_tools);
        $("#link_download").val(data.link_download);
        $("#e_gambar").val(data.gambar);
      },
    });
  });

  //modal tugas
  $(".ModalUbahTugas").on("click", function () {
    $("#judulModalKelas").html("Ubah Tugas");
    $(".modal-footer button[type=submit]").html("Ubah Tugas");
    $(".modal-body form").attr("action", "http://localhost/digiskill_2.0/penugasan/ubah");

    const id = $(this).data("id");

    $.ajax({
      url: "http://localhost/digiskill_2.0/penugasan/getUbah",
      data: { id: id }, // kiri nama data,kanan isi data
      method: "post",
      dataType: "json",
      success: function (data) {
        console.log(data);
        $("#penugasan").val(data.penugasan);
      },
    });
  });

  //modal Penilaian
  $(".ModalPenilaian").on("click", function () {
    $("#judulModalKelas").html("Berikan Penilaian");
    $(".modal-footer button[type=submit]").html("Ubah Tugas");
    $(".modal-body form").attr("action", "http://localhost/digiskill_2.0/penugasan/tambahPenilaianUser");

    const id = $(this).data("id");

    $.ajax({
      url: "http://localhost/digiskill_2.0/penugasan/getPenilaian",
      data: { id: id }, // kiri nama data,kanan isi data
      method: "post",
      dataType: "json",
      success: function (data) {
        console.log(data);
        $("#id_penugasan").val(data.id_penugasan);
        $("#nama_user").val(data.nama_user);
      },
    });
  });
});
