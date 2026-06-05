<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animación Efecto Máquina de Escribir - JS Puro</title>
    
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <style>
        body {
            background-color: #000000; /* Fondo OLED */
            color: #ffffff;
            font-family: 'Segoe UI', Roboto, sans-serif;
            overflow: hidden;
        }

        .highlight {
            color: #ff3b00;
            font-weight: 800;
            display: inline-block;
        }

        /* El cursor parpadeante estilo terminal */
        .cursor-pipe::after {
            content: '|';
            animation: parpadeo 0.7s infinite;
            color: #ff3b00;
            margin-left: 2px;
            font-weight: normal;
        }

        @keyframes parpadeo {
            0%, 100% { opacity: 1; }
            50% { opacity: 0; }
        }

        /* Transición suave para el encendido del resplandor de la palabra Arde */
        #hero-arde {
            transition: text-shadow 0.6s ease-in-out;
        }
    </style>
</head>
<body class="flex min-h-screen items-center justify-center">

    <div class="text-center max-w-4xl px-4">
        <h1 id="hero-title" class="text-4xl md:text-6xl font-black tracking-tight uppercase select-none leading-tight min-h-[7rem]">
            <span id="line-1" class="title-line block"></span>
            <span id="line-2" class="title-line block"></span>
        </h1>
        
        <div class="mt-8 p-4 bg-zinc-900/50 border border-zinc-800 rounded-lg max-w-md mx-auto">
            <p id="status-box" class="text-green-400 text-sm font-semibold">
                ⌨️ Efecto de escritura puro (Vanilla JS)
            </p>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Configuramos los textos fijos que se van a escribir
        const textoLinea1 = "Tecnología que";
        const textoArde   = "Arde";
        const textoLinea2 = " para ti"; // Espacio inicial importante

        const elLinea1 = document.getElementById('line-1');
        const elLinea2 = document.getElementById('line-2');

        const VELOCIDAD_ESCRITURA = 75; // Milisegundos entre cada letra (más bajo = más rápido)

        // Función auxiliar que devuelve una Promesa para escribir texto carácter por carácter
        function escribirTexto(elemento, texto, callbackPorCaracter) {
            return new Promise((resolve) => {
                let i = 0;
                function Type() {
                    if (i < texto.length) {
                        const char = texto.charAt(i);
                        
                        // Si pasamos un callback especial (para manejar el span interno de Arde) lo usamos
                        if (callbackPorCaracter) {
                            callbackPorCaracter(char);
                        } else {
                            elemento.textContent += char;
                        }
                        
                        i++;
                        setTimeout(Type, VELOCIDAD_ESCRITURA);
                    } else {
                        resolve(); // Terminó de escribir este bloque
                    }
                }
                Type();
            });
        }

        async function iniciarEfectoEscritura() {
            // --- PASO 1: Escribir la Primera Línea ---
            elLinea1.classList.add('cursor-pipe'); // Añadimos el cursor a la línea 1
            await escribirTexto(elLinea1, textoLinea1);
            elLinea1.classList.remove('cursor-pipe'); // Quitamos el cursor de la línea 1

            // --- PASO 2: Preparar la Segunda Línea ---
            elLinea2.classList.add('cursor-pipe'); // Pasamos el cursor a la línea 2
            
            // Creamos el contenedor especial para "Arde" de forma dinámica
            const spanArde = document.createElement('span');
            spanArde.id = "hero-arde";
            spanArde.className = "highlight";
            elLinea2.appendChild(spanArde);

            // Escribimos "Arde" dentro de su span destacado
            await escribirTexto(spanArde, textoArde, (char) => {
                spanArde.textContent += char;
            });

            // Escribimos el resto de la frase " para ti" directamente en la línea 2
            await escribirTexto(elLinea2, textoLinea2, (char) => {
                // Insertamos el texto como un nodo de texto al final para no romper el span de Arde
                elLinea2.appendChild(document.createTextNode(char));
            });

            // --- PASO 3: Encendido del Resplandor ---
            // Una vez terminada toda la escritura, encendemos el fuego y dejamos el cursor parpadeando al final
            setTimeout(() => {
                spanArde.style.textShadow = '0 0 25px rgba(232,34,10,0.95), 0 0 50px rgba(255,107,26,0.6)';
            }, 200);
        }

        // Arrancamos la animación con un pequeño delay de cortesía
        setTimeout(iniciarEfectoEscritura, 400);
    });
    </script>
</body>
</html>