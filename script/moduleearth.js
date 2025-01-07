import * as THREE from 'https://cdnjs.cloudflare.com/ajax/libs/three.js/r110/three.module.min.js';

document.addEventListener("DOMContentLoaded", () => {
    // Получаем элемент canvas
    const canvas = document.getElementById('planetCanvas');

    // Создаем WebGLRenderer с параметром alpha: true для прозрачного фона
    const renderer = new THREE.WebGLRenderer({ 
        canvas, 
        antialias: true, 
        alpha: true 
    });

    // Устанавливаем размер рендера
    renderer.setSize(canvas.clientWidth, canvas.clientHeight);

    // Создаем сцену
    const scene = new THREE.Scene();

    // Создаем камеру
    const camera = new THREE.PerspectiveCamera(60, canvas.clientWidth / canvas.clientHeight, 0.1, 1000);
    
    // Создаем геометрию сферы (планеты)
    const geometry = new THREE.SphereGeometry(1, 32, 32);

    // Цвета для градиента
    const colors = [
        new THREE.Color('#1F01B9'), // Светло-зеленый
        new THREE.Color('#3FD683'), // Изумрудный
        new THREE.Color('#E87461'), // Оливковый
        new THREE.Color('#35A7FF'), // Голубой
        new THREE.Color('#FC440F'),  // Розово-оранжевый
        new THREE.Color('#EF476F')  // Розово-оранжевый
    ];

    // Функция для генерации радиального градиента
    const gradientTexture = new THREE.CanvasTexture(generateGradient(colors));
    gradientTexture.minFilter = THREE.LinearFilter;
    gradientTexture.magFilter = THREE.LinearFilter;

    // Создаем материал для планеты с градиентом
    const material = new THREE.MeshToonMaterial({
        map: gradientTexture,
        flatShading: false, // для мультяшного стиля
    });

    // Создаем объект планеты (меш) и добавляем его в сцену
    const planet = new THREE.Mesh(geometry, material);
    planet.scale.set(2, 2, 2); // Увеличиваем планету в 2 раза по всем осям
    scene.add(planet);

    // Добавляем точечный свет
    const light = new THREE.PointLight(0x9EE33B, 1, 100); // Зеленоватый свет
    light.position.set(11,11,11);
    scene.add(light);

    // Добавляем мягкое окружающее освещение
    const ambientLight = new THREE.AmbientLight(0xE2EDD4, 0.6); // Свет из фона
    scene.add(ambientLight);

    // Устанавливаем позицию камеры
    camera.position.z = 4;

    // Функция для создания радиального градиента
    function generateGradient(colors) {
        const canvas = document.createElement('canvas');
        const ctx = canvas.getContext('2d');

        // Задаем размеры канваса
        canvas.width = 256;
        canvas.height = 256;

        // Создаем радиальный градиент
        const gradient = ctx.createRadialGradient(
            canvas.width / 2, canvas.height / 2, 0, // Центр
            canvas.width / 2, canvas.height / 2, canvas.width / 2 // Радиус
        );

        // Добавляем цвета с равными шагами
        const step = 1 / (colors.length - 1);
        colors.forEach((color, index) => {
            gradient.addColorStop(index * step, color.getStyle());
        });

        // Применяем градиент к холсту
        ctx.fillStyle = gradient;
        ctx.fillRect(0, 0, canvas.width, canvas.height);

        return canvas;
    }

    // Функция анимации для обновления планеты
    const animate = () => {
        requestAnimationFrame(animate);

        // Плавный поворот планеты
        planet.rotation.y += 0.005;
        planet.rotation.x += 0.002;

        // Рендер сцены с камерой
        renderer.render(scene, camera);
    };

    // Запускаем анимацию
    animate();
});
