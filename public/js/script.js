$(function () {

    $('.tombolTambahData').on('click', function(){
        $('#formModalLabel').html('Tambah Data Mahasiswa') ;
        $('.tombolKonfirmasi').html('Tambah');
    });
    
    $('.tampilModalUpdate').on('click', function(){
       $('#formModalLabel').html('Update Data Mahasiswa') ;
       $('.modal-footer button[type=submit]').html('Update');
       $('.modal-body form').attr('action', 'http://localhost/phpmvc/public/mahasiswa/ubah');

       const id = $(this).data('id');
       
       $.ajax({
           url: 'http://localhost/phpmvc/public/mahasiswa/getUbah',
           data: {id : id},
           method: 'post',
           dataType: 'json',
           success: function (data) {
               $('#nama').val(data.nama);
               $('#nrp').val(data.nrp);
               $('#asal').val(data.asal);
               $('#id').val(data.id);
           }
       });
    });

})