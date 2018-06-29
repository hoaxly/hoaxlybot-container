<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hi I am Nessie - ask me about hoaxly and our tools!</title>
    <link rel="stylesheet" href="/css/app.css" media="all" />

</head>
<body>
<div class="container">
    <div class="header">
        <svg class="logo" style="width: 100px; height: 100px; margin: 20px" enable-background="new 0 0 250 250" viewBox="0 0 250 250" xmlns="http://www.w3.org/2000/svg" width="250px" height="250px">
            <style type="text/css">
                .i-hoaxly-logo__box {
                    fill: #6600AA;
                }
                .i-hoaxly-logo__line {
                    stroke:#fff;
                    stroke-width:6;
                    fill: none;
                    stroke-linecap:round;
                    stroke-linejoin:round;
                    fill-opacity: 0;
                    stroke-dasharray: 440;
                    stroke-dashoffset: 440;
                    -webkit-animation: logo-drawline 2s 0s ease forwards;
                    -moz-animation: logo-drawline 2s 0s ease forwards;
                    -o-animation: logo-drawline 2s 0s ease forwards;
                    animation: logo-drawline 2s 0s ease forwards;

                }
                @-webkit-keyframes logo-drawline {
                    to {
                        stroke-dashoffset: 0;
                    }
                }
                @-moz-keyframes logo-drawline {
                    to {
                        stroke-dashoffset: 0;
                    }
                }
                @-o-keyframes logo-drawline {
                    to {
                        stroke-dashoffset: 0;
                    }
                }
                @keyframes logo-drawline {
                    to {
                        stroke-dashoffset: 0;
                    }
                }
            </style>
            <path class="i-hoaxly-logo__box" d="m0 0h250v250h-250z" />
            <path class="i-hoaxly-logo__line" d="m196 180.5c-2.7-16.1-12.5-24.3-22.7-28.8-24.8-11-52.5 4.1-60.3 7-13 4.9-21-1.1-20.5-15 .2-6.8 1.5-12.3 3.7-20.1 5.1-18 13.1-35.9 12.3-54.5-.3-6.4-5.1-17.9-14.5-20.1-5.9-1.4-13.8-.6-19.9.6-8.8 1.9-19.4 13.9-20.1 22.6-.5 5.8 5.7 10.3 13.5 8.7 5.7-1.1 10.3-3.2 19.2-6.6-.7 6.7-.5 12.4-1.9 17.7-4.6 17.2-10.7 34-14.4 51.4-1.7 8.1-1.6 24.4-.1 36.1" />
            <path class="i-hoaxly-logo__line" d="m42.9 173.6l0 0c11.3 11.3 29.7 11.3 41.1 0l0 0c11.3 11.3 29.7 11.3 41.1 0l0 0c11.3 11.3 29.7 11.3 41.1 0l0 0c11.3 11.3 29.7 11.3 41.1 0" />
        </svg>

    </div>
    <div class="content" id="app">
        <botman-tinker api-endpoint="/botman"></botman-tinker>
    </div>

    <div class="footer">
        <a href="https://www.hoax.ly" target="_blank" style="color:white"><small>About</small></a>, <a href="https://www.hoax.ly/legal_notice.html" style="color:white" target="_blank"><small>Contact</small></a>,  <a href="https://www.hoax.ly/data_privacy.html" style="color:white" target="_blank"><small>Data Privacy</small></a> | <small>This project is supported by netidee.at</small>
    </div>
    <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none">
        <defs>
            <path id="wave"
                  d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
        </defs>
        <g class="parallax">
            <use xlink:href="#wave" x="50" y="0"/>
            <use xlink:href="#wave" x="50" y="2"/>
            <use xlink:href="#wave" x="50" y="6"/>
        </g>
    </svg>
</div>

<script src="/js/app.js"></script>
</body>
</html>