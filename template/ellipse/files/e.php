<svg style="display: none;">
      <defs>
        <filter id='f'>
          <feTurbulence type='fractalNoise' baseFrequency='7.5'/>
        </filter>
        
        <filter id='noise' x='0%' y='0%' width='100%' height='100%'>
          <feTurbulence baseFrequency='1.2' numOctaves='4' result='noise' seed='2'/>
          <feColorMatrix in='noise' type='saturate' values='0'/>
          <feComponentTransfer>
            <feFuncA type='discrete' tableValues='0.08 0.12 0.16 0.2 0.24'/>
          </feComponentTransfer>
          <feComposite operator='over' in2='SourceGraphic'/>
        </filter>
        
        <filter id='dynamicNoise' x='0%' y='0%' width='100%' height='100%'>
          <feTurbulence baseFrequency='0.9' numOctaves='3' result='dynamicNoiseResult' seed='5'/>
          <feColorMatrix in='dynamicNoiseResult' type='saturate' values='0'/>
          <feComponentTransfer>
            <feFuncA type='discrete' tableValues='0.06 0.1 0.14 0.18'/>
          </feComponentTransfer>
          <feComposite operator='over' in2='SourceGraphic'/>
        </filter>
        
        <filter id='heavyNoise' x='0%' y='0%' width='100%' height='100%'>
          <feTurbulence baseFrequency='2.0' numOctaves='5' result='heavyNoiseResult' seed='8'/>
          <feColorMatrix in='heavyNoiseResult' type='saturate' values='0'/>
          <feComponentTransfer>
            <feFuncA type='discrete' tableValues='0.04 0.08 0.12 0.16 0.2 0.24'/>
          </feComponentTransfer>
          <feComposite operator='over' in2='SourceGraphic'/>
        </filter>
        
        <filter id='noiseFilter' x='0%' y='0%' width='100%' height='100%'>
          <feTurbulence 
            type='fractalNoise' 
            baseFrequency='0.9' 
            numOctaves='4'
            stitchTiles='stitch'
            result='colorNoise'/>
          <feColorMatrix in="colorNoise" type="matrix" values="1 0 0 0 0 0 1 0 0 0 0 0 1 0 0 0 0 0 0.1 0" />
          <feComposite operator="in" in2="SourceGraphic" result="monoNoise"/>
          <feBlend in="SourceGraphic" in2="monoNoise" mode="multiply" />
        </filter>
        
        <!-- Jemný noise filter -->
        <filter id='dynamicNoise' x='0%' y='0%' width='100%' height='100%'>
          <feTurbulence 
            id='turbulenceElement'
            type='fractalNoise' 
            baseFrequency='0.3' 
            numOctaves='2'
            seed='2'
            result='noise'/>
          <feColorMatrix in="noise" type="saturate" values="0"/>
          <feComponentTransfer>
            <feFuncA type="discrete" tableValues="0.01 0.02 0.03"/>
          </feComponentTransfer>
          <feComposite operator="over" in2="SourceGraphic"/>
        </filter>
        
        <!-- Veľmi jemný sekundárny noise -->
        <filter id='secondaryNoise' x='0%' y='0%' width='100%' height='100%'>
          <feTurbulence 
            type='turbulence' 
            baseFrequency='0.15' 
            numOctaves='1'
            seed='5'
            result='noise2'/>
          <feColorMatrix in="noise2" type="saturate" values="0"/>
          <feComponentTransfer>
            <feFuncA type="discrete" tableValues="0.005 0.01"/>
          </feComponentTransfer>
          <feComposite operator="over" in2="SourceGraphic"/>
        </filter>
      </defs>
    </svg>
    
      <div class="gradient-background">
        <div class="gradient-layer"></div>
        <!-- CodePen inšpirované blob elementy -->
        <div class="blob yellow"></div>
        <div class="blob green"></div>
        <div class="blob red"></div>
        <!-- Pôvodné orb elementy pre dodatočný efekt -->
        <div class="interactive-orb"></div>
        <div class="color-orb-1"></div>
        <div class="color-orb-2"></div>
        <div class="color-orb-3"></div>
      </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const gradientBg = document.querySelector('.gradient-background');
        const gradientLayer = document.querySelector('.gradient-layer');
        
        // Noise efekt riadený sekciami
        const turbulenceElement = document.getElementById('turbulenceElement');
        const gradientBackground = document.querySelector('.gradient-background');
        const body = document.body;
        let noiseTime = 0;
        let isNoiseActive = false;
        
        // Funkcia pre animáciu noise
        function animateNoise() {
            noiseTime += 0.005;
            
            if (isNoiseActive) {
                // Jemné zmeny baseFrequency
                const baseFreq = 0.3 + Math.sin(noiseTime) * 0.1;
                const seed = Math.floor(Math.sin(noiseTime * 0.2) * 5) + 2;
                
                if (turbulenceElement) {
                    turbulenceElement.setAttribute('baseFrequency', baseFreq.toFixed(3));
                    turbulenceElement.setAttribute('seed', seed);
                }
                
                // Jemné CSS noise pozície
                if (gradientBackground) {
                    const x = Math.sin(noiseTime * 0.2) * 10;
                    const y = Math.cos(noiseTime * 0.15) * 8;
                    gradientBackground.style.setProperty('--noise-x', x + 'px');
                    gradientBackground.style.setProperty('--noise-y', y + 'px');
                }
            }
            
            requestAnimationFrame(animateNoise);
        }
        
        // Funkcia pre zapnutie/vypnutie noise
        function toggleNoise(enable) {
            isNoiseActive = enable;
            
            if (enable) {
                body.classList.add('noise-active');
                if (gradientBackground) {
                    gradientBackground.style.filter = 'url(#dynamicNoise)';
                    gradientBackground.style.setProperty('--noise-opacity', 0.15);
                }
            } else {
                body.classList.remove('noise-active');
                if (gradientBackground) {
                    gradientBackground.style.filter = 'none';
                    gradientBackground.style.setProperty('--noise-opacity', 0);
                }
            }
        }
        
        // Scroll observer pre detekciu .noisebg sekcií
        function checkNoiseSection() {
            const noiseSections = document.querySelectorAll('.noisebgg');
            const windowHeight = window.innerHeight;
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            let shouldShowNoise = false;
            
            noiseSections.forEach(section => {
                const rect = section.getBoundingClientRect();
                const sectionTop = rect.top + scrollTop;
                const sectionBottom = sectionTop + rect.height;
                
                // Kontrola či je sekcia viditeľná (aspoň 30% sekcie)
                const visibleTop = Math.max(scrollTop, sectionTop);
                const visibleBottom = Math.min(scrollTop + windowHeight, sectionBottom);
                const visibleHeight = Math.max(0, visibleBottom - visibleTop);
                const visibilityRatio = visibleHeight / rect.height;
                
                if (visibilityRatio > 0.3) {
                    shouldShowNoise = true;
                }
            });
            
            // Aplikuj zmenu len ak sa stav zmenil
            if (shouldShowNoise !== isNoiseActive) {
                toggleNoise(shouldShowNoise);
            }
        }
        
        // Event listenery
        window.addEventListener('scroll', checkNoiseSection);
        window.addEventListener('resize', checkNoiseSection);
        
        // Spustí animáciu a počiatočnú kontrolu
        animateNoise();
        checkNoiseSection();
        const interactiveOrb = document.querySelector('.interactive-orb');
        const colorOrbs = document.querySelectorAll('[class*="color-orb"]');
        
        let mouseX = 0;
        let mouseY = 0;
        let targetX = 50;
        let targetY = 50;
        let currentX = 50;
        let currentY = 50;
        let isMouseMoving = false;
        let mouseTimer = null;
        
        // Plynulá interpolácia pre trailing efekt
        function lerp(start, end, factor) {
            return start + (end - start) * factor;
        }
        
        // Sledovanie pohybu myši s trailing efektom
        document.addEventListener('mousemove', function(e) {
            mouseX = e.clientX;
            mouseY = e.clientY;
            targetX = (mouseX / window.innerWidth) * 100;
            targetY = (mouseY / window.innerHeight) * 100;
            
            isMouseMoving = true;
            interactiveOrb.style.opacity = '0.8';
            
            // Reset timer pre trailing efekt
            clearTimeout(mouseTimer);
            mouseTimer = setTimeout(() => {
                isMouseMoving = false;
                interactiveOrb.style.opacity = '0';
            }, 2000);
        });
        
        // Kontinuálna animácia s trailing efektom
        function animate() {
            // Plynulý prechod k cieľovej pozícii
            currentX = lerp(currentX, targetX, 0.02);
            currentY = lerp(currentY, targetY, 0.02);
            
            // Aktualizácia interaktívneho orbu s oneskorením
            interactiveOrb.style.left = (mouseX - 200) + 'px';
            interactiveOrb.style.top = (mouseY - 200) + 'px';
            
            // Jemná animácia gradient layer
            const time = Date.now() * 0.0008;
            const baseOpacity1 = 0.15 + Math.sin(time) * 0.05;
            const baseOpacity2 = 0.1 + Math.cos(time * 1.3) * 0.03;
            const baseOpacity3 = 0.08 + Math.sin(time * 0.7) * 0.02;
            
            gradientLayer.style.background = `radial-gradient(circle at ${currentX}% ${currentY}%, 
                rgba(248, 249, 250, ${baseOpacity1}) 0%, 
                rgba(233, 236, 239, ${baseOpacity2}) 30%, 
                rgba(222, 226, 230, ${baseOpacity3}) 60%, 
                transparent 100%)`;
            
            requestAnimationFrame(animate);
        }
        
        // Jemná animácia pozadia v sivých tónoch
        function animateBackground() {
            const time = Date.now() * 0.0003;
            const lightness1 = 98 + Math.sin(time) * 1;
            const lightness2 = 96 + Math.cos(time * 1.1) * 1;
            
            gradientBg.style.background = `linear-gradient(135deg, 
                hsl(0, 0%, ${lightness1}%) 0%, 
                hsl(0, 0%, ${lightness2}%) 100%)`;
            
            requestAnimationFrame(animateBackground);
        }
        
        // Jemné hover efekty pre orbs
        colorOrbs.forEach((orb, index) => {
            orb.addEventListener('mouseenter', function() {
                this.style.transform += ' scale(1.1)';
                this.style.filter = `blur(${20 + index * 3}px)`;
            });
            
            orb.addEventListener('mouseleave', function() {
                this.style.transform = this.style.transform.replace(' scale(1.1)', '');
                this.style.filter = `blur(${25 + index * 5}px)`;
            });
        });
        
        // Morphing parallax efekt s dynamickými tvarmi
        let morphTime = 0;
        
        document.addEventListener('mousemove', function(e) {
            const moveX = (e.clientX - window.innerWidth / 2) * 0.005;
            const moveY = (e.clientY - window.innerHeight / 2) * 0.005;
            
            // Výpočet intenzity pohybu pre morphing
            const mouseSpeed = Math.sqrt(moveX * moveX + moveY * moveY);
            const morphIntensity = Math.min(mouseSpeed * 100, 1);
            
            colorOrbs.forEach((orb, index) => {
                const multiplier = (index + 1) * 0.3;
                const currentTransform = orb.style.transform || '';
                const baseTransform = currentTransform.replace(/translate\([^)]*\)/g, '');
                orb.style.transform = baseTransform + ` translate(${moveX * multiplier}px, ${moveY * multiplier}px)`;
                
                // Dynamické morphing na základe pohybu myši
                const morphOffset = morphIntensity * 20;
                const timeOffset = index * 0.5;
                const borderRadius = `
                    ${30 + Math.sin(morphTime + timeOffset) * morphOffset}% 
                    ${70 + Math.cos(morphTime + timeOffset + 1) * morphOffset}% 
                    ${70 + Math.sin(morphTime + timeOffset + 2) * morphOffset}% 
                    ${30 + Math.cos(morphTime + timeOffset + 3) * morphOffset}% / 
                    ${30 + Math.cos(morphTime + timeOffset + 4) * morphOffset}% 
                    ${30 + Math.sin(morphTime + timeOffset + 5) * morphOffset}% 
                    ${70 + Math.cos(morphTime + timeOffset + 6) * morphOffset}% 
                    ${70 + Math.sin(morphTime + timeOffset + 7) * morphOffset}%
                `;
                orb.style.borderRadius = borderRadius;
            });
            
            // Interactive orb morphing
            if (interactiveOrb) {
                const orbMorphIntensity = morphIntensity * 30;
                const orbBorderRadius = `
                    ${40 + Math.sin(morphTime) * orbMorphIntensity}% 
                    ${60 + Math.cos(morphTime + 1) * orbMorphIntensity}% 
                    ${50 + Math.sin(morphTime + 2) * orbMorphIntensity}% 
                    ${50 + Math.cos(morphTime + 3) * orbMorphIntensity}% / 
                    ${50 + Math.cos(morphTime + 4) * orbMorphIntensity}% 
                    ${40 + Math.sin(morphTime + 5) * orbMorphIntensity}% 
                    ${60 + Math.cos(morphTime + 6) * orbMorphIntensity}% 
                    ${50 + Math.sin(morphTime + 7) * orbMorphIntensity}%
                `;
                interactiveOrb.style.borderRadius = orbBorderRadius;
                interactiveOrb.style.left = e.clientX - 200 + 'px';
                interactiveOrb.style.top = e.clientY - 200 + 'px';
                interactiveOrb.style.opacity = '1';
            }
            
            morphTime += 0.02;
        });
        
        // Kontinuálne morphing pre všetky blob-y
        function continuousMorphing() {
            morphTime += 0.01;
            
            // Morphing pre hlavné blob-y
            const blobs = document.querySelectorAll('.blob');
            blobs.forEach((blob, index) => {
                const timeOffset = index * 1.2;
                const intensity = 15;
                const borderRadius = `
                    ${35 + Math.sin(morphTime * 0.8 + timeOffset) * intensity}% 
                    ${65 + Math.cos(morphTime * 0.9 + timeOffset + 1) * intensity}% 
                    ${60 + Math.sin(morphTime * 1.1 + timeOffset + 2) * intensity}% 
                    ${40 + Math.cos(morphTime * 0.7 + timeOffset + 3) * intensity}% / 
                    ${40 + Math.cos(morphTime * 0.6 + timeOffset + 4) * intensity}% 
                    ${35 + Math.sin(morphTime * 1.2 + timeOffset + 5) * intensity}% 
                    ${65 + Math.cos(morphTime * 0.8 + timeOffset + 6) * intensity}% 
                    ${60 + Math.sin(morphTime * 0.9 + timeOffset + 7) * intensity}%
                `;
                blob.style.borderRadius = borderRadius;
            });
            
            // Morphing pre color orbs
            colorOrbs.forEach((orb, index) => {
                const timeOffset = index * 0.8;
                const intensity = 10;
                const borderRadius = `
                    ${45 + Math.sin(morphTime * 0.5 + timeOffset) * intensity}% 
                    ${55 + Math.cos(morphTime * 0.6 + timeOffset + 1) * intensity}% 
                    ${50 + Math.sin(morphTime * 0.7 + timeOffset + 2) * intensity}% 
                    ${50 + Math.cos(morphTime * 0.4 + timeOffset + 3) * intensity}% / 
                    ${50 + Math.cos(morphTime * 0.8 + timeOffset + 4) * intensity}% 
                    ${45 + Math.sin(morphTime * 0.3 + timeOffset + 5) * intensity}% 
                    ${55 + Math.cos(morphTime * 0.9 + timeOffset + 6) * intensity}% 
                    ${50 + Math.sin(morphTime * 0.5 + timeOffset + 7) * intensity}%
                `;
                orb.style.borderRadius = borderRadius;
            });
            
            requestAnimationFrame(continuousMorphing);
        }
        
        // Spustenie animácií
        animate();
        animateBackground();
        continuousMorphing();
    });
    </script>