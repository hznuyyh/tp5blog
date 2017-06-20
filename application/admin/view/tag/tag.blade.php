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
            <h3> Tags <small> >> Listing</small></h3>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-offset-4 text-right">
                <a href="/admin/tag/create" class="btn btn-success btn-md">
                    <i class="fa fa-plus-circle"></i> New Tag
                </a>
            </div>
        </div>
        <br>
    </div>
    <div class="row ">
        <div class="col-sm-10 col-sm-offset-1">
            <table id="tags-table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Tag</th>
                    <th>Title</th>
                    <th class="hidden-sm">Subtitle</th>
                    <th class="hidden-md">Page Image</th>
                    <th class="hidden-md">Meta Description</th>
                    <th class="hidden-md">Layout</th>
                    <th data-sortable="false">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    {volist name = "tags" id = "tag"}
                    <td>{$tag.tag}</td>
                    <td>{$tag.title }</td>
                    <td class="hidden-sm">{$tag.subtitle }</td>
                    <td class="hidden-md">{$tag.page_image }</td>
                    <td class="hidden-md">{$tag.meta_description}</td>
                    <td class="hidden-md">{$tag.layout }</td>
                    <td>
                        <a href="/admin/tag/{$tag.id}/edit" class="btn btn-xs btn-info">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                    </td>
                </tr>
                </tbody>
                {/volist}
            </table>
        </div>
    </div>
</div>

<script src="http://libs.baidu.com/jquery/1.9.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script>
    $(function() {
        $("#tags-table").DataTable({
        });
    });
</script>
</body>
</html>