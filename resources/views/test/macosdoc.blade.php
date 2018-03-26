
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="CSS3 notification pop up, CSS3 notification pop up demo, CSS3 notification pop up example, CSS3 notification pop up demo code, CSS3 notification pop up code free download, CSS3, CSS3 animation, CSS3 Buttons, iOs buttons, iOS style button, Jquery, jquery change button, jquery change button icon, jquery change button size, jquery change onclick of button, jquery mobile switch button, jquery toggle button, jquery ui switch button, Stylish Switch Button, switch Button, text jquery on radio button, Toggle buttons, simple pop up, popup display, pop demo, notification pop up demo, notification pop up demo, css3 pop up demo, simple pop up demo, notification list, Animated Notification list, Animated notification pop up, Folded Corner effect with CSS3, Folder Corner, Dog Eared" />
    <title>Mac OS Dock with CSS3</title>
    <link href="http://demos.webtricksplus.com/style.css" rel="stylesheet" />
    <script type="text/javascript" src="jquery-1.11.1.js"></script>
    <style>
        * {
            box-sizing: border-box;
        }
        .container {
            width: 100%;
        }
        .wrapper {
            width: 100%;
            /*background: #660033;*/

            background: white;
            background-size: 100%;
            padding: 0 !important;
        }
        p { color: #fff;}

        ul {
            padding: 0;
        }


        #dock-container {
            position: absolute;
            bottom: 0;
            z-index: 9999;
            width: 100%;
            text-align: center;


        }


        #dock-container ul {
            position: relative;
            display: inline-block;
            padding: 0 5px;
            margin: 0;
            background:url(http://www.alessioatzeni.com/mac-osx-lion-css3/res/img/dock-bg.png) repeat-x bottom;
        }

        #dock-container ul:before, #dock-container ul:after {
            content: "";
            position: absolute;
            top: 0;
            bottom: 0;
            width: 38px;
        }
        #dock-container ul:before {
            left: -38px;
            background: url(http://www.alessioatzeni.com/mac-osx-lion-css3/res/img/dock-bg-left.png) no-repeat left bottom;
        }
        #dock-container ul:after {
            right: -38px;
            background: url(http://www.alessioatzeni.com/mac-osx-lion-css3/res/img/dock-bg-right.png) no-repeat right bottom;
        }

        #dock-container li {
            list-style-type: none;
            display: inline-block;
            position: relative;
            margin: 0 0 0 0;
            -webkit-box-reflect: below -16px -webkit-gradient(linear, left top, left bottom, from(transparent), color-stop(91%, rgba(255, 255, 255, .1)), color-stop(91.01%, transparent), to(transparent));

        }

        #dock-container li img {
            width: 64px;
            height: 64px;
            -webkit-box-reflect: below 2px
            -webkit-gradient(linear, left top, left bottom, from(transparent),
                    color-stop(0.7, transparent), to(rgba(255,255,255,.5))); /* reflection is supported by webkit only */
            -webkit-transition: all 0.3s;
            -webkit-transform-origin: 50% 100%;
        }
        #dock-container li:hover img {
            -webkit-transform: scale(2);
            margin: 0 2em;
        }
        #dock-container li:hover + li img,
        #dock-container li.prev img {
            -webkit-transform: scale(1.5);
            margin: 0 1.5em;
        }

        #dock-container li span {
            display: none;
            position: absolute;
            bottom: 140px;
            left: 0;
            width: 100%;
            background-color: rgba(0,0,0,0.75);
            padding: 4px 0;
            border-radius: 12px;
        }
        #dock-container li:hover span {
            display: block;
            color: #fff;
        }

    </style>
</head>

<body>


<div class="container1">
    <h2>Motijheel Govt Boys High School</h2>
    <p>It is the best school of Bangladesh. Future prime minister Ahmed Tarek studied here. </p>
    <p>It is the best school of Bangladesh. Future prime minister Ahmed Tarek studied here. </p>
    <p>It is the best school of Bangladesh. Future prime minister Ahmed Tarek studied here. </p>
    <p>It is the best school of Bangladesh. Future prime minister Ahmed Tarek studied here. </p>
    <p>It is the best school of Bangladesh. Future prime minister Ahmed Tarek studied here. </p>
    <p>It is the best school of Bangladesh. Future prime minister Ahmed Tarek studied here. </p>
    <p>It is the best school of Bangladesh. Future prime minister Ahmed Tarek studied here. </p>
    <p>It is the best school of Bangladesh. Future prime minister Ahmed Tarek studied here. </p> <p>It is the best school of Bangladesh. Future prime minister Ahmed Tarek studied here. </p>
    <p>It is the best school of Bangladesh. Future prime minister Ahmed Tarek studied here. </p>
    <p>It is the best school of Bangladesh. Future prime minister Ahmed Tarek studied here. </p>
    <p>It is the best school of Bangladesh. Future prime minister Ahmed Tarek studied here. </p> <p>It is the best school of Bangladesh. Future prime minister Ahmed Tarek studied here. </p>
    <p>It is the best school of Bangladesh. Future prime minister Ahmed Tarek studied here. </p>
    <p>It is the best school of Bangladesh. Future prime minister Ahmed Tarek studied here. </p>
    <p>It is the best school of Bangladesh. Future prime minister Ahmed Tarek studied here. </p> <p>It is the best school of Bangladesh. Future prime minister Ahmed Tarek studied here. </p>
    <p>It is the best school of Bangladesh. Future prime minister Ahmed Tarek studied here. </p>
    <p>It is the best school of Bangladesh. Future prime minister Ahmed Tarek studied here. </p>
    <p>It is the best school of Bangladesh. Future prime minister Ahmed Tarek studied here. </p> <p>It is the best school of Bangladesh. Future prime minister Ahmed Tarek studied here. </p>
    <p>It is the best school of Bangladesh. Future prime minister Ahmed Tarek studied here. </p>
    <p>It is the best school of Bangladesh. Future prime minister Ahmed Tarek studied here. </p>
    <p>It is the best school of Bangladesh. Future prime minister Ahmed Tarek studied here. </p>





</div>





    <div id="dock-container" style="position: fixed; bottom: 0%; background: #29051B">
        <ul>
            <li>
                <span>Address Book</span>
                <a href="#"><img src="http://demos.webtricksplus.com/Mac-Address-Book-icon.png"/></a>
            </li>
            <li>
                <span>App Store</span>
                <a href="#"><img src="http://demos.webtricksplus.com/Mac-App-Store-icon.png"/></a>
            </li>
            <li>
                <span>Chrome</span>
                <a href="#"><img src="http://demos.webtricksplus.com/chrome_ico.png"/></a>
            </li>
            <li>
                <span>Firefox</span>
                <a href="#"><img src="http://demos.webtricksplus.com/firefox.png"/></a>
            </li>
            <li>
                <span>Mac</span>
                <a href="#"><img src="http://demos.webtricksplus.com/Mac-icon.png"/></a></li>
            <li>
                <span>Icon</span>
                <a href="#"><img src="http://demos.webtricksplus.com/mac-icon%20(1).png"/></a>
            </li>
            <li>
                <span>Chat</span>
                <a href="#"><img src="http://demos.webtricksplus.com/MetroUI-Apps-Mac-iChat-icon.png"/></a>
            </li>
            <li>
                <span>Apple</span>
                <a href="#"><img src="http://demos.webtricksplus.com/apple-icon.png"/></a>
            </li>
            <li>
                <span>App Store</span>
                <a href="#"><img src="http://demos.webtricksplus.com/Mac-App-Store-icon.png"/></a>
            </li>
            <li>
                <span>Chrome</span>
                <a href="#"><img src="http://demos.webtricksplus.com/chrome_ico.png"/></a>
            </li>
        </ul>
    </div>

<script>
    $(document).ready(function(){
        var hdrht = ($(window).height()) - ($("#site-header").height());
        $(".wrapper").height(hdrht);
    });
</script>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-68852337-1', 'auto');
    ga('send', 'pageview');

</script>
</body>
</html>
