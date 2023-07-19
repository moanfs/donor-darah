<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?= site_url(); ?>/assets/admin/css/main/app.css">
    <link rel="stylesheet" href="<?= site_url(); ?>/assets/admin/css/pages/error.css">
    <link rel="shortcut icon" href="<?= site_url(); ?>/assets/img/logo.png" type="image/x-icon">
    <title><?= lang('Errors.pageNotFound') ?></title>

    <style>
        div.logo {
            height: 200px;
            width: 155px;
            display: inline-block;
            opacity: 0.08;
            position: absolute;
            top: 2rem;
            left: 50%;
            margin-left: -73px;
        }

        body {
            height: 100%;
            background: #fafafa;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            color: #777;
            font-weight: 300;
        }

        h1 {
            font-weight: lighter;
            letter-spacing: normal;
            font-size: 3rem;
            margin-top: 0;
            margin-bottom: 0;
            color: #222;
        }

        .wrap {
            max-width: 1024px;
            margin: 5rem auto;
            padding: 2rem;
            background: #fff;
            text-align: center;
            border: 1px solid #efefef;
            border-radius: 0.5rem;
            position: relative;
        }

        pre {
            white-space: normal;
            margin-top: 1.5rem;
        }

        code {
            background: #fafafa;
            border: 1px solid #efefef;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            display: block;
        }

        p {
            margin-top: 1.5rem;
        }

        .footer {
            margin-top: 2rem;
            border-top: 1px solid #efefef;
            padding: 1em 2em 0 2em;
            font-size: 85%;
            color: #999;
        }

        a:active,
        a:link,
        a:visited {
            color: #dd4814;
        }
    </style>
</head>

<body>

    <?php if (ENVIRONMENT !== 'production') : ?>
        <div class="wrap">
            <h1>404</h1>
            <p>
                <?= nl2br(esc($message)) ?>
            </p>
        </div>
    <?php else : ?>
        <div id="error">
            <div class="error-page container">
                <div class="col-md-8 col-12 offset-md-2">
                    <div class="text-center">
                        <img class="img-error" src="<?= site_url(); ?>/assets/img/error-404.svg" alt="Not Found">
                        <h1 class="error-title">NOT FOUND</h1>
                        <p class='fs-5 text-gray-600'>The page you are looking not found.</p>
                        <a href="<?= site_url('back'); ?>" class="btn btn-lg btn-outline-primary mt-3">Go Home</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endif ?>
</body>

</html>