<!doctype html>
<html lang="en">
<head>
    <title>Welcome To AgpayTech Test</title>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet"
          id="bootstrap-css">
    <style>
        body {
            margin-top: 20px;
        }
    </style>
    <!------ Include the above in your HEAD tag ---------->
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-xs-8 col-xs-offset-2">
            <form action="<?php echo BASE_URL ?>" id="search-form">
                <div class="input-group">
                    <div class="input-group-btn search-panel">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <span id="search_concept">Filter by</span> <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a id="country" href="#countries?term">Countries</a></li>
                            <li><a id="currency" href="#currencies?term">Currencies</a></li>
                        </ul>
                    </div>
                    <input type="hidden" name="search_param" value="all" id="search_param">
                    <input type="text" class="form-control" id="search_term" name="x" placeholder="Search term...">
                    <span class="input-group-btn">
                    <button id="search-button" class="btn btn-default" type="submit"><span
                                class="glyphicon glyphicon-search"></span></button>
                </span>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function (e) {
        $('.search-panel .dropdown-menu').find('a').click(function (e) {
            e.preventDefault();
            var param = $(this).attr("href").replace("#", "");
            var concept = $(this).text();
            $('.search-panel span#search_concept').text(concept);
            $('.input-group #search_param').val(param);
        });

        $('#search-form').on('submit', function (event) {
            event.preventDefault();
            term = $('.input-group #search_term').val();
            param = $('.input-group #search_param').val();
            if (term.length == 0) {
                alert("Please enter a search term");
            } else if (param.length == 0) {
                alert("Please select a search parameter");
            } else {
                link = $(this).attr('action') + 'api/' + param + "=" + term;
                location.href = link;
            }
        });

        setTimeout(function () {
            $('#currency').trigger('click');
            $('#search_term').val('british');
        }, 1200);

    });
</script>

</body>
</html>