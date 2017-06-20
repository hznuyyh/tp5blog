<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{$Think.config.myblog.title} Admin</title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-menu">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">{$Think.config.myblog.title}  Admin</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav">
                <li><a href="/">Blog Home</a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li><a href="/admin/tag">Tag</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                {if $Think.session.login_status == 'succeed'}
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                       aria-expanded="false">
                        {$Think.session.user_name}
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="/auth/logout">Logout</a></li>
                    </ul>
                </li>
                {else /}
                <li><a href="/auth/login">登录</a></li>
                {/if}
            </ul>
        </div>
    </div>
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 col-lg-offset-2">
            <h3> Tags <small> >> Create New Tag</small></h3>
        </div>
        <br>
    </div>
    <div class="row">
        <div class="col-md-8 col-lg-offset-2">
            <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">New Tag Form</h4>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="/admin/tag">
                             <div class="form-group">
                                <label for="Tag" class="col-md-3 control-label" >Tag</label>
                                 <div class="col-md-4">
                                     <input type="text" class="form-control" name="tag" id="tag" autofocus>
                                 </div>
                             </div>
                            <div class="form-group">
                                <label for="Title" class="col-md-3 control-label" >Title</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="title" id="title" autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="SubTitle" class="col-md-3 control-label" >Subtitle</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="subtitle" id="subtitle" autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-md-3 control-label" >Meta Description</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="description" id="description" autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="page_image" class="col-md-3 control-label">Page Image</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="image" id="image" autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="reverse_direction" class="col-md-4 control-label" > </label>
                                <div class="col-md-9 col-md-offset-3">
                                    <label class="radio-inline">
                                        <input type="radio" name="reverse_direction" id="reverse_direction" checked="checked"
                                               value="0">
                                        Normal
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="reverse_direction" value="1">
                                        Reversed
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary btn-md form-control">
                                        <i class="fa fa-plus-circle"></i>
                                        Add New Tag
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>

<script src="http://libs.baidu.com/jquery/1.9.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>