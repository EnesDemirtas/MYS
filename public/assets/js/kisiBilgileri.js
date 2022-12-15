$(document).ready(function(){
    $('#invoice-list').on('click','.viewdetails',function(){
        var csatirid = $(this).attr('data-id');
        if(csatirid > 0){

            // AJAX request
            //var url = "{{ route('calisanDetaylari',[':csatirid']) }}";
            var url = "http://127.0.0.1:8000/calisanDetaylari/:csatirid";
            url = url.replace(':csatirid',csatirid);
            alert(url)
            // Empty modal data
            $('#exampleModalLong .modal-body').empty();
            alert(url);
            $.ajax({
                url: url,
                dataType: 'json',
                success: function(response){
                    // Add employee details
                    $('#exampleModalLong .modal-body').html(response.html);

                    // Display Modal
                },
                error: function() {
                    alert("Veriler Veritabanından Getirilemedi.");
                },
            });
         }
    });

});