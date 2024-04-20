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
            font-size: 20em;
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
