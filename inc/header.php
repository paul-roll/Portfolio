<?php
    spl_autoload_register(function ($class) {
        include 'inc/' . $class . '.class.php';
    });
    include ("inc/functions.php");
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Paul Roll - Portfolio</title>
        <link rel="shortcut icon" href="/img/favicon.ico">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="paul roll, portfolio, web developer, norfolk, html, css, javascript, scss"/>
        <meta name="author" content="Paul Roll"/>
        <meta name="description" content="Paul Roll, Training with Netmatters in Web Development."/>
        <script src="https://kit.fontawesome.com/764c638f7d.js" crossorigin="anonymous"></script>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans:wght@400;700&family=Alegreya:wght@400;700&display=swap" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="css/stylesheet.css" type="text/css">
    </head>

    <body>

        <header>
            <h1 id="popup"></h1>
            <div class="burger">
                <a class="btn-burger"><i class="fa fa-bars"></i></a>
            </div>
            <nav class="sidebar hidden">
                <div class="flex-container">
                    <a href="index.php#top"><h1>PR</h1></a>
                    <hr>
                    <a href="aboutme.php#aboutme"><p class="btn-nav">About Me</p></a>
                    <a href="index.php#portfolio"><p class="btn-nav">My Portfolio</p></a>
                    <a href="examples.php#examples"><p class="btn-nav">Coding Examples</p></a>
                    <a href="scs.php#scs"><p class="btn-nav">SCS Scheme</p></a>
                    <hr>
                    <a href="#contact"><p class="btn-nav">Contact Me</p></a>
                    <hr>
                    <a class="github" href="https://github.com/paul-roll" target="_blank"><img src="img/GitHub-Mark-32px.png" alt="github"></a>
                </div>
            </nav>

            <section class="banner">
                <div class="wrapper flex-container">

                    <div>
                        <h1>My Name is <br class="hide-md">Paul&nbsp;Roll</h1>
                        <h2>I'm a Web Developer</h2>
                    </div>

                    <a href="#down">
                        <div class="btn-banner">
                            <h3>Scroll Down</h3>
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                    </a>

                </div>
                <a id="down"></a>
            </section>
            
        </header>
