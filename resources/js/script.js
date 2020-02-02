$(document).ready(function(){
    $('#searchForm').submit(function(e){
        e.preventDefault();
        var query = $(this).find('input[name="q"]').val().trim();
        var token = $(this).find('input[name="_token"]').val();
        $.post(url= "/search", data={
            query: query,
            _token: token
        }).done(function(data){
            console.log(data);
            $('.resultContainer .row').empty();
            $.each(data, function(index, item){
                var template = `
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a href="`+item.url+`" target="_blank">
                        <div class="cards">
                            <img class="card-img-top" src="`+item.thumbnail+`" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">`+item.title+`</h5>
                            </div>
                        </div>
                    </a>
                </div>
                `;

                $('.resultContainer .row').append(template);
            });
            $('.resultContainer').removeClass('d-none');
            $('.searchbar').addClass('fixed');
        }).fail(function() {
            alert( "error" );
        });
    })
});