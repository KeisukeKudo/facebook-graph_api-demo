<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" media="print" onload="this.media='all'">
</head>
<body>
<main>
    <div class="content">
        <div class="nes-container with-title">
            <span class="title">Login</span>
            <div class="nes-container is-dark">
                <a class="login--link" href="{{ route('facebook.login') }}">
                    <section class="message-list">
                        <section class="message -left">
                            <i class="nes-icon facebook is-large"></i>
                            <div class="nes-balloon is-dark login--message">
                                <p>Hello !!</p>
                                <p>Click to login with Facebook</p>
                            </div>
                        </section>
                    </section>
                </a>
            </div>
        </div>
    </div>
</main>
</body>
</html>
