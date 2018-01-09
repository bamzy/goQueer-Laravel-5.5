<!DOCTYPE HTML>
<html>
<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}"/>
</head>
<body>

<!-- Header -->
<header id="header">
    <div class="inner">

        <nav id="nav">
            <a href="/">Home</a>
            <a href="/media">Dashboard</a>
        </nav>
        <a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
    </div>
</header>

<!-- Banner -->
<section id="banner">
    <div class="inner">
        <header>
            <h1>Welcome to Go Queer</h1>
        </header>

        <div class="flex ">

            <div>
                <span class="icon fa fa-search"></span>
                <h3>Curate</h3>
                <p>Gather your data</p>
            </div>

            <div>
                <span class="icon fa-cog"></span>
                <h3>Narrate</h3>
                <p>Make your story</p>
            </div>

            <div>
                <span class="icon fa-share-alt"></span>
                <h3>Share</h3>
                <p>Let everyone enjoy</p>
            </div>

        </div>

        <footer>
            <a href="/media" class="button">Get Started</a>
        </footer>
    </div>
</section>


<!-- Three -->
<section id="three" class="wrapper align-center">
    <div class="inner">
        <div class="flex flex-2">
            <article>
                <div class="image round">
                    <script type="text/javascript" src="{{ URL::asset('js/src/draw/DrawToolbar.js') }}"></script>
                    <img src="{{ URL::to('/') }}/img/pic01.jpg" alt="Pic 01" />

                </div>
                <header>
                    <h3>How to Make a Map</h3>
                </header>
                <p>Morbi in sem quis dui placerat ornare. Pellentesquenisi<br />euismod in, pharetra a, ultricies in diam sed arcu. Cras<br />consequat  egestas augue vulputate.</p>
                <footer>
                    <a href="#" class="button">Learn More</a>
                </footer>
            </article>
            <article>
                <div class="image round">
                    <img src="{{ URL::to('/') }}/img/pic02.jpg"alt="Pic 02" />
                </div>
                <header>
                    <h3>How to Tell Your Story</h3>
                </header>
                <p>Pellentesque fermentum dolor. Aliquam quam lectus<br />facilisis auctor, ultrices ut, elementum vulputate, nunc<br /> blandit ellenste egestagus commodo.</p>
                <footer>
                    <a href="#" class="button">Learn More</a>
                </footer>
            </article>
        </div>
    </div>
</section>
<section id="three" class="wrapper align-center">
    <div class="inner">
        <div class="inner">


            <article>
                <footer>

                    <a rel="external noopener noreferrer" href="https://play.google.com/store/apps/details?id=ca.ualberta.huco.goqueer_android" data-link-type="download" data-download-os="Android" data-mozillaonline-link="https://play.google.com/store/apps/details?id=ca.ualberta.huco.goqueer_android" data-download-location="other">
                        <img class="" src="https://www.mozilla.org//media/img/l10n/en-US/firefox/android/btn-google-play.77bdbc935c58.png" srcset="https://www.mozilla.org//media/img/l10n/en-US/firefox/android/btn-google-play-high-res.87d9720bbc8b.png 1.5x" width="152" alt="Get it on Google Play" height="45">
                    </a>


                    <a href="https://itunes.apple.com/us/app/apple-store/id989804926?pt=373246&amp;mt=8&amp;ct=mozorg-scene_2-appstore-button" data-link-type="download" data-download-os="iOS" data-download-location="other">
                        <img src="https://www.mozilla.org/media/img/l10n/en-US/firefox/ios/btn-app-store.1cfd5dba4a92.svg" alt="Download on the App Store" width="152" height="45">
                    </a>

                </footer>
            </article>
        </div>
    </div>
</section>
<!-- Footer -->
<footer id="footer">
    <div class="inner">

        <h3>Get in touch</h3>

        <form action="#" method="post">

            <div class="field half first">
                <label for="name">Name</label>
                <input name="name" id="name" type="text" placeholder="Name">
            </div>
            <div class="field half">
                <label for="email">Email</label>
                <input name="email" id="email" type="email" placeholder="Email">
            </div>
            <div class="field">
                <label for="message">Message</label>
                <textarea name="message" id="message" rows="6" placeholder="Message"></textarea>
            </div>
            <ul class="actions">
                <li><input value="Send Message" class="button alt" type="submit"></li>
            </ul>
        </form>



    </div>
</footer>

<!-- Scripts -->
<script type="text/javascript" src="{{ URL::asset('js/home/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/home/skel.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/home/util.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/home/main.js') }}"></script>

</body>
</html>