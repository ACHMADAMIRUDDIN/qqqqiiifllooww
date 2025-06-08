<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Loading....</title>
    <link rel="stylesheet" href="loding.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body,
        html {
            height: 100%;
            background: #ffffff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Container loading */
        #loading-screen {
            position: fixed;
            width: 100%;
            height: 100%;
            background-color: #0b68cc;
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: opacity 0.5s ease;
        }

        /* SVG Detak Jantung */
        .heartbeat {
            width: 60%;
            max-width: 300px;
            margin-bottom: 20px;
            stroke-dasharray: 1000;
            stroke-dashoffset: 1000;
            animation: heartbeatLine 2s ease-in-out forwards;
        }

        /* Animasi garis detak jantung */
        @keyframes heartbeatLine {
            0% {
                stroke-dashoffset: 1000;
            }

            60% {
                stroke-dashoffset: 0;
            }

            80% {
                stroke: #ff3b3b;
            }

            100% {
                stroke: #ffffff;
            }
        }

        /* Saat loading selesai */
        .fade-out {
            opacity: 0;
            pointer-events: none;
        }

        /* Konten utama */
        .content {
            display: none;
            padding: 40px;
            text-align: center;
        }

        /* Teks 'Selamat Datang' */
        .welcome-text {
            position: absolute;
            font-size: 2rem;
            color: white;
            display: flex;
            gap: 2px;
        }

        /* Semua huruf awalnya disembunyikan */
        .welcome-text span {
            opacity: 0;
            transform: translateY(10px);
            display: inline-block;
            animation: showLetter 0.4s forwards;
        }

        .welcome-text span:nth-child(1) {
            animation-delay: 2.0s;
        }

        .welcome-text span:nth-child(2) {
            animation-delay: 2.08s;
        }

        .welcome-text span:nth-child(3) {
            animation-delay: 2.16s;
        }

        .welcome-text span:nth-child(4) {
            animation-delay: 2.24s;
        }

        .welcome-text span:nth-child(5) {
            animation-delay: 2.32s;
        }

        .welcome-text span:nth-child(6) {
            animation-delay: 2.4s;
        }

        .welcome-text span:nth-child(7) {
            animation-delay: 2.48s;
        }

        .welcome-text span:nth-child(8) {
            animation-delay: 2.56s;
        }

        .welcome-text span:nth-child(9) {
            animation-delay: 2.64s;
        }

        .welcome-text span:nth-child(10) {
            animation-delay: 2.72s;
        }

        .welcome-text span:nth-child(11) {
            animation-delay: 2.8s;
        }

        .welcome-text span:nth-child(12) {
            animation-delay: 2.88s;
        }

        .welcome-text span:nth-child(13) {
            animation-delay: 2.96s;
        }

        .welcome-text span:nth-child(14) {
            animation-delay: 3.04s;
        }

        /* Efek animasi per huruf */
        @keyframes showLetter {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        /* efek fade out */
        #loading-screen.fade-to-beranda {
    animation: exitToBeranda 0.6s ease forwards;
}

@keyframes exitToBeranda {
    0% {
        opacity: 1;
        transform: scale(1);
    }
    100% {
        opacity: 0;
        transform: scale(0.95);
    }
}
    </style>
</head>

<body>


    <!-- Loading Screen -->
    <div id="loading-screen">
        <svg class="heartbeat" viewBox="0 0 500 100" xmlns="http://www.w3.org/2000/svg">
            <polyline fill="none" stroke="#fff" stroke-width="3"
                points="0,50 50,50 70,10 90,90 110,50 160,50 180,30 200,70 220,50 500,50" />
        </svg>
        <div class="welcome-text">
            <span>S</span><span>E</span><span>L</span><span>A</span><span>M</span><span>A</span><span>T</span>
            <span>&nbsp;</span>
            <span>D</span><span>A</span><span>T</span><span>A</span><span>N</span><span>G</span>
        </div>

        <script>
    window.addEventListener('load', () => {
        const loader = document.getElementById('loading-screen');
        const content = document.querySelector('.content');

        setTimeout(() => {
            loader.classList.add('fade-out');
            content.style.display = 'block';
        }, 3500); // animasi loading


        setTimeout(() => {
            loader.classList.add('fade-to-beranda');
        }, 3600); // waktu pindah ke beranda

        setTimeout(() => {
            window.location.href = '{{ route('beranda') }}';
        }, 4200); // marine fade out
    });
</script>
    </div>
</body>

</html>
