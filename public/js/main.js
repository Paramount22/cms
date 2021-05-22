(function() {
    // sorting table
    $('#dataTable').DataTable();

    // date picker
    $( "#datepicker" ).datepicker({dateFormat: "yy-mm-dd"}).val();
    $( "#datepicker1" ).datepicker({dateFormat: "yy-mm-dd"}).val();

    // select
    $('#mail').on('change', function() {
        if(this.value === '1') {
            $('#department').show();
        } else {
            $('#department').hide();
        }

        if(this.value === '2') {
            $('#user').show();
        } else {
            $('#user').hide();
        }
    });

}(jQuery));
