<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loading Screen</title>
    <style>
          * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body, html {
      height: 100%;
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

    /* Spinner animasi */
    .spinner {
      border: 8px solid #f7f7f8;
      border-top: 8px solid #3498db;
      border-radius: 50%;
      width: 80px;
      height: 80px;
      animation: spin 1s linear infinite;
    }

    /* Animasi berputar */
    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    /* Konten utama website */
    .content {
      display: none;
      padding: 40px;
      text-align: center;
    }

    /* Fade-out ketika loading selesai */
    .fade-out {
      opacity: 0;
      pointer-events: none;
    }
    </style>
</head>
<body>
    <!-- Loading Screen -->
  <div id="loading-screen">
    <div class="spinner"></div>
  </div>

    <script>
    // Simulasi delay loading (contoh: 2 detik)
    window.addEventListener('load', () => {
      const loader = document.getElementById('loading-screen');
      const content = document.querySelector('.content');

      setTimeout(() => {
        loader.classList.add('fade-out');
        content.style.display = 'block';
    }, 2500); // bisa disesuaikan waktunya
    window.location.href = '{{ route('beranda') }}';
    });
  </script>
</body>
</html>

