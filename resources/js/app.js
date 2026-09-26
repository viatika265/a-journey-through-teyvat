document.addEventListener('DOMContentLoaded', () => {
    const viewport = document.getElementById('map-viewport');
    const canvas = document.getElementById('map-canvas');
    const map = document.getElementById('teyvat-map');

    if (!viewport || !canvas || !map) return;

    // Atur skala permanen di sini (1 = ukuran asli gambar)
    // Jika kurang besar, naikkan misal ke 1.5. Jika terlalu besar, turunkan ke 0.8
    let scale = 0.3; 
    
    let translateX = 0;
    let translateY = 0;
    let isDragging = false;
    let startX = 0;
    let startY = 0;

    function updateMap() {
        canvas.style.transform = `translate(${translateX}px, ${translateY}px) scale(${scale})`;
    }

    function clampPosition() {
        const vw = viewport.clientWidth;
        const vh = viewport.clientHeight;
        const mw = map.offsetWidth * scale;
        const mh = map.offsetHeight * scale;

        // Batas Horisontal
        if (mw < vw) {
            translateX = (vw - mw) / 2;
        } else {
            translateX = Math.min(0, Math.max(translateX, vw - mw));
        }

        // Batas Vertikal
        if (mh < vh) {
            translateY = (vh - mh) / 2;
        } else {
            translateY = Math.min(0, Math.max(translateY, vh - mh));
        }
    }

    viewport.addEventListener('pointerdown', (event) => {
        isDragging = true;
        startX = event.clientX - translateX;
        startY = event.clientY - translateY;
        viewport.setPointerCapture(event.pointerId);
        
        canvas.classList.remove('cursor-grab');
        canvas.classList.add('cursor-grabbing');
    });

    viewport.addEventListener('pointermove', (event) => {
        if (!isDragging) return;
        translateX = event.clientX - startX;
        translateY = event.clientY - startY;
        clampPosition();
        updateMap();
    });

    const stopDragging = () => {
        isDragging = false;
        canvas.classList.remove('cursor-grabbing');
        canvas.classList.add('cursor-grab');
    };

    viewport.addEventListener('pointerup', stopDragging);
    viewport.addEventListener('pointercancel', stopDragging);
    map.addEventListener('dragstart', (e) => e.preventDefault());

    function initializeMap() {
        // Jika ingin ukuran peta otomatis menyesuaikan tinggi layar secara permanen, 
        // hapus komentar pada baris di bawah ini dan hapus 'let scale = 1' di atas:
        // scale = viewport.clientHeight / (map.naturalHeight || map.offsetHeight);

        clampPosition();
        updateMap();
    }

    if (map.complete) {
        initializeMap();
    } else {
        map.addEventListener('load', initializeMap);
    }

    window.addEventListener('resize', () => {
        clampPosition();
        updateMap();
    });
    document.getElementById('map-viewport').addEventListener('dblclick', function(e) {
        const canvas = document.getElementById('map-canvas');
        const rect = canvas.getBoundingClientRect();
        
        // Mencari rasio zoom/skala yang sedang aktif
        const currentScale = rect.width / canvas.offsetWidth;
        
        // Mengkalkulasi koordinat akurat pada ukuran asli gambar
        const originalX = (e.clientX - rect.left) / currentScale;
        const originalY = (e.clientY - rect.top) / currentScale;
        
        // Dibulatkan agar tidak ada nilai desimal
        console.log(`left: ${Math.round(originalX)}px; top: ${Math.round(originalY)}px;`);
    });
});