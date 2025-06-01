<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Love Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">

    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            background: black;
            overflow: hidden;
            height: 100vh;
            font-family: 'Dancing Script', cursive;
        }

        .floating-text,
        .floating-img {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            animation: floatUp 10s linear forwards;
            opacity: 0.9;
        }

        .floating-text {
            color: #ff69b4;
            font-size: clamp(16px, 4vw, 28px);
            white-space: nowrap;
            text-shadow: 0 0 10px #ff69b4, 0 0 20px #ff1493;
        }

        .floating-img img {
            width: clamp(20px, 8vw, 60px);
            height: auto;
            filter: drop-shadow(0 0 6px #ff69b4);
        }

        @keyframes floatUp {
            from {
                bottom: -60px;
                opacity: 0;
            }

            50% {
                opacity: 1;
            }

            to {
                bottom: 100vh;
                opacity: 0;
            }
        }

        #start-btn {
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #ff69b4;
            color: white;
            font-size: 24px;
            padding: 20px 40px;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            z-index: 9999;
            box-shadow: 0 0 10px #ff1493;
        }
    </style>
</head>

<body>

    <!-- Nút bắt đầu -->
    <button id="start-btn" style="font-family: 'Dancing Script', cursive !important;">💖 Chi thúi ấn vào đây 💖</button>

    <!-- Nhạc nền -->
    <audio id="bgMusic" muted loop>
        <source src="{{ asset('love.mp3') }}" type="audio/mpeg">
    </audio>

    <script>
        const messages = [
            "1/6 chi thúii💖",
            "Honey bunch you are my everything!",
            "You are my universe 🌌",
            "There is no other 💞",
            "Love ya! 💘",
            "You're my sunshine ☀️",
            "Happy 1/6 💑",
            "Chúc bé iu 1/6 càng xinh đẹp💑",
        ];

        const images = [
            "{{ asset('1.jpg') }}",
            "{{ asset('2.jpg') }}",
            "{{ asset('4.jpg') }}",
            "{{ asset('5.jpg') }}",
            "{{ asset('3.jpg') }}"
        ];

        function createFloatingItem() {
            const isText = Math.random() > 0.3;

            if (isText) {
                const text = document.createElement('div');
                text.className = 'floating-text';
                text.innerText = messages[Math.floor(Math.random() * messages.length)];
                text.style.left = `${Math.random() * 90 + 5}%`;
                text.style.animationDuration = `${7 + Math.random() * 4}s`;
                document.body.appendChild(text);
                setTimeout(() => text.remove(), 12000);
            } else {
                const imgWrap = document.createElement('div');
                imgWrap.className = 'floating-img';
                imgWrap.style.left = `${Math.random() * 90 + 5}%`;
                imgWrap.style.animationDuration = `${8 + Math.random() * 3}s`;

                const img = document.createElement('img');
                img.src = images[Math.floor(Math.random() * images.length)];
                imgWrap.appendChild(img);
                document.body.appendChild(imgWrap);
                setTimeout(() => imgWrap.remove(), 12000);
            }
        }

        document.getElementById('start-btn').addEventListener('click', () => {
            // Phát nhạc
            const audio = document.getElementById('bgMusic');
            audio.muted = false;
            audio.play();

            // Ẩn nút
            document.getElementById('start-btn').style.display = 'none';

            // Bắt đầu hiệu ứng bay
            setInterval(createFloatingItem, 500);
        });
    </script>

</body>

</html>
