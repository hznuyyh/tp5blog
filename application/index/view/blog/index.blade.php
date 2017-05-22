<html>
<head>
    <title>{$Think.config.myblog.title }</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>{$Think.config.myblog.title}</h1>
    <hr>
    <ul>
        <div class="container">
        {foreach $posts as $vo}
            <a href="/blog/{$vo['slug']}"><h1>{$vo['title']}</h1></a>
            <h5>{$vo['published_at']}</h5>
            <hr>
                <h3>
                    {$vo['content']| htmlspecialchars_decode|strip_tags|msubstr=0,300,'utf-8',true|nl2br}
                </h3>
            <hr>
        {/foreach}
        {$posts->render()}
        </div>

    </ul>
    <hr>
</div>
</body>
</html>