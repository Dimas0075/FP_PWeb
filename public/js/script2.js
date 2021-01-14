console.log("Hello world!");
$(function () {

    $('.tombolTambahData').on('click', function(){
        $('#formModalLabel').html('Tambah Data Mahasiswa') ;
        $('.tombolKonfirmasi').html('Tambah');
    });
    
    $('.tampilModalUpdate').on('click', function(){
       $('#formModalLabel').html('Update Data Peserta') ;
       $('.modal-footer button[type=submit]').html('Update');
       $('.modal-body form').attr('action', 'http://localhost/pwebFP/public/admin/ubah');

       const id = $(this).data('id');
       
       $.ajax({
           url: 'http://localhost/pwebFP/public/admin/getUbah',
           data: {id : id},
           method: 'post',
           dataType: 'json',
           success: function (data) {
               console.log(data)
               $('#nama').val(data.nama);
               $('#username').val(data.username);
               $('#password').val(data.password)
               $('#nomor_identitas').val(data.nomor_identitas);
               $('#path').val(data.path);
               $('#path_status').val(data.path_status);
               $('#id').val(data.id);
           }
       });
    });

})