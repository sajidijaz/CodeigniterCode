$(document).ready(function(){
    /* JSON FILE UPLOAD  */
    $("#file").fileinput({
        uploadUrl: BASE_URL+"read-json",
        theme: 'fas',
        autoReplace: true,
        overwriteInitial: true,
        maxFileCount: 1,
        maxFilesNum: 0,
        previewFileType:'any',
        allowedFileExtensions: ['json']
    }).on('filecleared', function(event) {
            $('#file').val('');
    }).on('fileuploaded', function(event, previewId, index, fileId) {
        $("#file").fileinput('clear');
        if(previewId.response.message){
            $('#import-msg').html(previewId.response.message).parent().show();
        }
    });
    /* JSON FILE UPLOAD  */

    /* Autocomplete of the products  */
    $( "#product" ).autocomplete({
        source: BASE_URL+"search_products",
        minLength: 2,
        select: function( event, ui ) {
            $( "#product" ).val( ui.item.name );
            $( "input[name='product_id']" ).val( ui.item.id );
            return false;
        },
        change: function( event, ui ) {
            if(ui.item == null){
                $( "input[name='product_id']" ).val( "" );
            }
        }
    }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
        return $( "<li>" )
            .append( "<a>" + item.name + "</a>" )
            .appendTo( ul );
    };
    /* Autocomplete of the products  */

    /* Autocomplete of the customers  */
    $( "#customer" ).autocomplete({
        source: BASE_URL+"search_customers",
        minLength: 2,
        select: function( event, ui ) {
            $( "#customer" ).val( ui.item.name );
            $( "input[name='customer_id']" ).val( ui.item.id );
            return false;
        },
        change: function( event, ui ) {
            if(ui.item == null){
                $( "input[name='customer_id']" ).val( "" );
            }
        }
    }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
        return $( "<li>" )
            .append( "<a>" + item.name + "</a>" )
            .appendTo( ul );
    };
    /* Autocomplete of the customers  */

    /* FILTER FORM WITH AJAX  */
    $('#filterForm').on('submit',function(){
       $('#filter-error').html('');
       if($('#product').val() == "" && $('#customer').val() == "" && $('#price').val() == ""){
           $('#filter-error').html('Please give at least one filter.');
           return false;
       }
       $.ajax({
          url:BASE_URL+"filter_submit",
          type:"Post",
          data: $(this).serialize(),
          dataType:"html",
          beforeSend:function(){
              $('#filter-data').html(spinner);
          },
          success:function(response){
            $('#filter-data').html(response);
          }
       });
       return false;
    });
   /* FILTER FORM WITH AJAX  */


});