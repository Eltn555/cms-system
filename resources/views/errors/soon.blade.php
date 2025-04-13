<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/png" href="{{asset('title.png')}}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lumen Lux | СКОРО</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: sans-serif;
        }

        section {
            position: relative;
            min-height: 100vh;
            background: #000;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        h2 {
            color: #fff;
            cursor: default;
            letter-spacing: -10px;
            font-size: 6em;
        }

        .light {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            background: radial-gradient(circle at var(--x) var(--y), transparent -5%, rgba(0, 0, 0, 0.95) 20%);
        }
        @media (min-width: 576px) {
            h2 {
                font-size: 8em;
            }
        }

        /* Medium devices (tablets, 768px and up) */
        @media (min-width: 768px) {
            h2 {
                font-size: 12em;
            }
        }

        /* Large devices (desktops, 992px and up) */
        @media (min-width: 992px) {
            h2 {
                font-size: 16em;
            }
        }

        @media (min-width: 1200px) {
            h2 {
                font-size: 20em;
            }
        }
    </style>
</head>
<body>
<section><h2>СКОРО</h2></section>
<div class="light"></div>

<script>
    var pos = document.documentElement;
    pos.addEventListener('mousemove', e =>{
        pos.style.setProperty('--x', e.clientX + 'px')
        pos.style.setProperty('--y', e.clientY + 'px')
    })
</script>
</body>
</html>
