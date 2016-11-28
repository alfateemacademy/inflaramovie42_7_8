@extends('front.layouts.master')

@section('header.styles')
    <link rel="stylesheet" href="/front_assets/js/components/rateit/scripts/rateit.css">
@endsection

@section('content')
    Movies
    @include('front.movie._partials.list')
@endsection

@section('pagination')
    <div class="uk-margin-large-top uk-margin-bottom">
        {{ $movies->links() }}
    </div>
@endsection

@section('footer.scripts')
<script src="/front_assets/js/components/rateit/scripts/jquery.rateit.js"></script>
<script type ="text/javascript">
     //we bind only to the rateit controls within the products div
     $('.rateit').bind('rated reset', function (e) {
         var ri = $(this);
 
         //if the use pressed reset, it will get value: 0 (to be compatible with the HTML range control), we could check if e.type == 'reset', and then set the value to  null .
         var value = ri.rateit('value');
         var movieId = ri.data('movieid');
         //console.log(value, movieId);
         //var productID = ri.data('productid'); // if the product id was in some hidden field: ri.closest('li').find('input[name="productid"]').val()
 
         //maybe we want to disable voting?
         //ri.rateit('readonly', true);
 
         $.ajax({
             url: '/movie/' + movieId + '/rating', //your server side script
             data: { value: value }, //our data
             type: 'POST',
             success: function(response) {
                //ri.rateit('readonly', false);
                if(response.status)
                {
                    alert("Voted");
                }
                else
                {
                    alert("something fishy fishy");
                }
             }
             /*success: function (data) {
                 $('#response').append('<li>' + data + '</li>');
 
             },
             error: function (jxhr, msg, err) {
                 $('#response').append('<li style="color:red">' + msg + '</li>');
             }*/
         });
     });
 </script>
@endsection