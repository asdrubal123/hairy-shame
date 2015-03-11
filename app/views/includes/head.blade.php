<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="ie ie6"> <![endif]-->
<!--[if IE 7 ]> <html lang="en" class="ie ie7"> <![endif]-->
<!--[if IE 8 ]> <html lang="en" class="ie ie8"> <![endif]-->
<!--[if IE 9 ]> <html lang="en" class="ie ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->

<head>
        <!-- META -->
        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1"><!-- Force IE to use the latest rendering engine -->
        <meta name="viewport" content="width=device-width, initial-scale=1"><!-- Optimize mobile viewport -->
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-capable" content="yes">

        <title>Matrix - home page</title>

        <!-- SCROLLS -->
        <script type="text/javascript">
             var root = '{{url("/")}}';
        </script>
       
        {{ HTML::style('css/bootstrap.min.css')}}

        {{ HTML::style('css/font-awesome.min.css')}}
        {{ HTML::style('css/animate.min.css')}}

        {{ HTML::style('css/style.css')}}
        {{ HTML::style('css/main.css')}}
        {{ HTML::style('css/demo-one.css')}}



       <script src="http://code.jquery.com/jquery-1.11.1.js"></script>
        {{ HTML::script('js/bootstrap.min.js')}}

        {{ HTML::style('css/bootstrap-combobox.css')}}
        {{ HTML::script('js/bootstrap-combobox.js')}}

        {{ HTML::style('selectize/css/selectize.bootstrap3.css')}}
        {{ HTML::script('selectize/js/standalone/selectize.min.js')}}
        {{ HTML::script('js/jquery.columnizer.js')}}


<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css">

<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js"></script> 


    <script>
    $(document).ready(function(){
     $('#searchbox').selectize({
        valueField: 'url',
        labelField: ['name'],
        searchField: ['name'],
        maxOptions: 5,
        options: [],
        create: false,
        optgroups: [
            {value: 'application', label: 'Applications'},
            {value: 'asset', label: 'Assets'},
            {value: 'team', label: 'Teams'}
                  ],
        optgroupField: 'class',
        optgroupOrder: ['application','asset','team'],
        load: function(query, callback) {
            if (!query.length) return callback();
            $.ajax({
                url: root+'/api/search',
                type: 'GET',
                dataType: 'json',
                data: {
                    q: query
                },
                error: function() {
                    callback();
                },
                success: function(res) {
                    callback(res.data);
                }
            });
        },
        onChange: function(){
            window.location = this.items[0];
        }
    });
    $('#links').columnize({ columns: 5 });
    });


    </script>


</head>