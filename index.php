<!doctype html>
<html>
<head>
    <title>Twitch Clip Downloader</title>
    <link rel="icon" type="image/png" href="https://static.twitchcdn.net/assets/favicon-32-e29e246c157142c94346.png" />
    <style>
        html, body {
          height: 100%;
          margin: 0;
        }
        
        .full-height {
            height: 100%;
            text-align:center;
            background: black;
        }
        .centered {
            top: 50%;
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <div class="full-height">
        <video class="centered" id="clip" controls="true" autoplay="none" preload="auto" width="90%" height="90%">
            <source src="" type="video/mp4">
        </video>
    </div>
    <script type="text/javascript">
        function getReq(url){
            $.get(url, function(data) {
                return data;
            });
        }
        function getJsonFromUrl(url) {
            if(!url) url = location.search;
            if(url.includes("?")){
                var query = url.substr(1);
                var result = {};
                query.split("&").forEach(function(part) {
                    var item = part.split("=");
                    result[item[0]] = decodeURIComponent(item[1]);
                });
                return result;
            } else return null;
        }
        var query = getJsonFromUrl()
        if(query != null && (query['clip'] || query['url'])){
            var clipURL = query['clip'] || query['url'];
            console.log(clipURL);
            clipID = clipURL.split('/').filter(e => Boolean(e))[clipURL.split('/').filter(e => Boolean(e)).length - 1];
            console.log(getReq(clipURL));
            var source = document.querySelector('#clip > source');
            source.setAttribute('src', 'test');
        }
    </script>
</body>
</html>