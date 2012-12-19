<?php
    require('weddingUtils.php');
    header("Content-type: text/css");
?>
body {
    color: #FFFFFF;
    background-color: <?php echo getRandomColor(); ?>;
    font-family: sans;
    font-size: medium;
}
a {
    color: #000000;
    background-color: #FFFFFF;
    text-decoration: none;
    font-weight: bold;
}
p {
    padding: 0.75em;
    margin: 0;
}
a:hover {
    text-decoration: underline;
}
#header {
    border: thick solid #000000;
    background-color: #FFFFFF;
    color: #000000;
    margin-bottom: 0.5em;
    text-align: center;
}
#header img {
    margin-left: auto;
    margin-right: auto;
}
#top {
    text-align: center;
}
#days {
    display: inline-block;
    border: thick solid #000000;
    background-color: #FFFFFF;
    color: #000000;
    padding: 0.3em;
    margin-bottom: 0.5em;
    text-align: center;
}
#nav {
    display: inline-block;
    border: thick solid #000000;
    background-color: #FFFFFF;
    color: #000000;
    padding: 0.3em;
    margin-bottom: 0.5em;
    text-align: center;
    font-weight: bold;
}
#content {
    border: thick solid #000000;
    background-color: #FFFFFF;
    color: #000000;
    overflow: auto;
    padding: 0.375em;
}
#content p {
    padding: 0.375em;
}
#content img {
    margin: 0.375em;
}
#calendar {
    padding: 2em;
    margin-left: auto;
    margin-right: auto;
}
img.left {
    float: left;
    border: thick solid black;
    margin: 1em;
}

img.right {
    float: right;
    border: thick solid black;
    margin: 1em;
}
