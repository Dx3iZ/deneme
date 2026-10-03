<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <title>Hacked By TurkHackTeam | Anka Team</title>
    <link rel="icon" type="image/x-icon" href="https://i.ibb.co/mV8rZphn/ankalogo.png">
    <link rel="preload" as="image" href="https://i.ibb.co/RGM5VrPY/29ekimop.webp">
    <audio id="bgMusic" loop>
    <source src="https://audio.jukehost.co.uk/01a0eeb1-b22b-73a2-be2c-a6f41ae9d0b3.mp3" auto-play type="audio/mpeg">
    </audio>
    
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        html, body {
            width: 100%;
            min-height: 100%;
            background-color: #000;
            overflow: hidden;
        }

        .bg {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background-size: cover;
            background-position: center;
            z-index: 1;
            transform: scale(1.1);
            object-fit: cover;
            transition: transform 0.1s linear;
        }

        #networkCanvas {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            z-index: 2;
        }
    </style>
</head>
<body>
    <canvas id="networkCanvas"></canvas>
    <img class="bg-layer bg" src="https://i.ibb.co/F4YV2Y8s/c5bd0fd5-ca32-4319-b00c-9b863b72efca.png" alt="">
    <script>
        document.addEventListener('contextmenu', event => {
            event.preventDefault();
            alert('SYSTEM SECURED | Erişim Reddedildi.');
        });

        document.addEventListener('keydown', event => {
            if (event.keyCode === 123 ||
               (event.ctrlKey && event.shiftKey && (event.keyCode === 73 || event.keyCode === 74)) ||
               (event.ctrlKey && event.keyCode === 85)) {
                event.preventDefault();
                return false;
            }
        });

        document.addEventListener('dragstart', event => event.preventDefault());

        document.addEventListener("click", () => {
            const audio = document.getElementById("bgMusic");
            audio.play();
        }, { once: true });

        let mouse = { x: null, y: null, radius: 220 }; // Mouse etki alanı büyütüldü

        window.addEventListener('mousemove', function(event) {
            mouse.x = event.clientX;
            mouse.y = event.clientY;

            let xAxis = (window.innerWidth / 2 - event.clientX) / 20;
            let yAxis = (window.innerHeight / 2 - event.clientY) / 20;

            document.querySelectorAll('.bg-layer').forEach(bg => {
                bg.style.transform = `scale(1.05) translate(${xAxis}px, ${yAxis}px)`;
            });

            document.querySelector('.container').style.transform = `translate(${-xAxis * 0.8}px, ${-yAxis * 0.8}px)`;
        });

        window.addEventListener('mouseout', function() {
            mouse.x = undefined;
            mouse.y = undefined;
            
            document.querySelectorAll('.bg-layer').forEach(bg => {
                bg.style.transform = `scale(1.1) translate(0px, 0px)`;
            });
            document.querySelector('.container').style.transform = `translate(0px, 0px)`;
        });

        const canvas = document.getElementById('networkCanvas');
        const ctx = canvas.getContext('2d');
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;

        let particlesArray = [];

        class Particle {
            constructor(x, y, directionX, directionY, size) {
                this.x = x;
                this.y = y;
                this.directionX = directionX;
                this.directionY = directionY;
                this.size = size;
            }

            draw() {
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2, false);
                
                let dx = mouse.x - this.x;
                let dy = mouse.y - this.y;
                let distance = Math.sqrt(dx * dx + dy * dy);

                if (distance < mouse.radius) {
                    ctx.fillStyle = '#ff3333';
                    ctx.shadowBlur = 20;
                    ctx.shadowColor = '#ff0000';
                } else {
                    ctx.fillStyle = 'rgba(150, 0, 0, 0.6)';
                    ctx.shadowBlur = 5;
                    ctx.shadowColor = '#aa0000';
                }
                ctx.fill();
            }

            update() {
                if (this.x > canvas.width || this.x < 0) this.directionX = -this.directionX;
                if (this.y > canvas.height || this.y < 0) this.directionY = -this.directionY;
                
                this.x += this.directionX;
                this.y += this.directionY;
                this.draw();
            }
        }

        function initCanvas() {
            particlesArray = [];
            let numberOfParticles = Math.floor((canvas.height * canvas.width) / 9000);
            
            if (numberOfParticles > 200) numberOfParticles = 200;
            
            for (let i = 0; i < numberOfParticles; i++) {
                let size = (Math.random() * 2) + 1;
                let x = (Math.random() * ((innerWidth - size * 2) - (size * 2)) + size * 2);
                let y = (Math.random() * ((innerHeight - size * 2) - (size * 2)) + size * 2);
                let directionX = (Math.random() * 1) - 0.5;
                let directionY = (Math.random() * 1) - 0.5;
                
                particlesArray.push(new Particle(x, y, directionX, directionY, size));
            }
        }

        function connectParticles() {
            for (let a = 0; a < particlesArray.length; a++) {
                for (let b = a; b < particlesArray.length; b++) {
                    let distance = ((particlesArray[a].x - particlesArray[b].x) * (particlesArray[a].x - particlesArray[b].x))
                                 + ((particlesArray[a].y - particlesArray[b].y) * (particlesArray[a].y - particlesArray[b].y));
                    
                    if (distance < (canvas.width / 7) * (canvas.height / 7)) {
                        let opacityValue = 1 - (distance / 20000);
                        let dx = mouse.x - particlesArray[a].x;
                        let dy = mouse.y - particlesArray[a].y;
                        let mouseDistance = Math.sqrt(dx * dx + dy * dy);
                        
                        if (mouseDistance < mouse.radius) {
                            ctx.strokeStyle = 'rgba(255, 50, 50,' + opacityValue + ')';
                            ctx.lineWidth = 2;
                            ctx.shadowBlur = 10;
                            ctx.shadowColor = 'red';
                        } else {
                            ctx.strokeStyle = 'rgba(150, 0, 0,' + (opacityValue * 0.2) + ')';
                            ctx.lineWidth = 0.8;
                            ctx.shadowBlur = 0;
                        }
                        ctx.beginPath();
                        ctx.moveTo(particlesArray[a].x, particlesArray[a].y);
                        ctx.lineTo(particlesArray[b].x, particlesArray[b].y);
                        ctx.stroke();
                    }
                }
            }
        }

        function animateCanvas() {
            requestAnimationFrame(animateCanvas);
            ctx.clearRect(0, 0, innerWidth, innerHeight);
            
            for (let i = 0; i < particlesArray.length; i++) {
                particlesArray[i].update();
            }
            connectParticles();
        }

        window.addEventListener('resize', () => {
            canvas.width = innerWidth;
            canvas.height = innerHeight;
            initCanvas();
        });

        initCanvas();
        animateCanvas();
    </script>
</body>
</html>
