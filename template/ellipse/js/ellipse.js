function WordShuffler(holder, opt) {
    var that = this;
    var time = 0;
    this.now;
    this.then = Date.now();

    this.delta;
    this.currentTimeOffset = 0;

    this.word = null;
    this.currentWord = null;
    this.currentCharacter = 0;
    this.currentWordLength = 0;

    var options = {
        fps: 1, // RÝCHLOSŤ: Vyššie číslo = rýchlejšie (1-5)
        timeOffset: 8, // RÝCHLOSŤ: Menšie číslo = rýchlejšie (1-15)
        maxAnimatedChars: 7, // POČET: Koľko znakov sa animuje naraz (3-30)
        textColor: '#000',
        fontSize: "50px",
        useCanvas: false,
        mixCapital: false,
        mixSpecialCharacters: false,
        needUpdate: true,
        colors: [
            'rgb(176, 189, 224)',
            'rgb(127, 133, 149)'
        ]
    }

    if (typeof opt != "undefined") {
        for (key in opt) {
            options[key] = opt[key];
        }
    }

    this.needUpdate = true;
    this.fps = options.fps;
    this.interval = 40/ this.fps;
    this.timeOffset = options.timeOffset;
    this.maxAnimatedChars = options.maxAnimatedChars;
    this.textColor = options.textColor;
    this.fontSize = options.fontSize;
    this.mixCapital = options.mixCapital;
    this.mixSpecialCharacters = options.mixSpecialCharacters;
    this.colors = options.colors;

    this.useCanvas = options.useCanvas;

    this.specialCharacters= [
        'A', 'B', 'C', 'D',
        'E', 'F', 'G', 'H',
        'I', 'J', 'K', 'L',
        'M', 'N', 'O', 'P',
        'Q', 'R', 'S', 'T',
        'U', 'V', 'W', 'X',
        'Y', 'Z'
    ];
    this.chars = [
        's', 'y', 't', 'h',
        'q', 't', 'j', 'g',
        'Q', 'M', 'D',
        'V', 'Q', 'R', 'S', 'T',
        'U', 'V', 'W', 'X',
        'Y', 'Z'
    ]

    if (this.mixSpecialCharacters) {
        this.chars = this.chars.concat(this.specialCharacters);
    }

    this.getRandomColor = function () {
        var randNum = Math.floor(Math.random() * this.colors.length);
        return this.colors[randNum];
    }

    //if Canvas

    this.position = {
        x: 0,
        y: 50
    }

    //if DOM
    if (typeof holder != "undefined") {
        this.holder = holder;
    }

    if (!this.useCanvas && typeof this.holder == "undefined") {
        console.warn('Holder must be defined in DOM Mode. Use Canvas or define Holder');
    }

    this.getRandCharacter = function (characterToReplace) {
        if (characterToReplace == " ") {
            return ' ';
        }
        var randNum = Math.floor(Math.random() * this.chars.length);
        var lowChoice = -.5 + Math.random();
        var picketCharacter = this.chars[randNum];
        var choosen = picketCharacter.toLowerCase();
        if (this.mixCapital) {
            choosen = lowChoice < 0 ? picketCharacter.toLowerCase() : picketCharacter;
        }
        return choosen;

    }

    this.writeWord = function (word) {
        this.word = word;
        this.currentWord = word.split('');
        this.currentWordLength = this.currentWord.length;
        
        // Skryj text na začiatku animácie
        if (!this.useCanvas) {
            this.holder.style.opacity = '0';
        }
    }

    this.generateSingleCharacter = function (color, character) {
        var span = document.createElement('span');
        span.style.color = color;
        span.innerHTML = character;
        return span;
    }

    this.updateCharacter = function (time) {

        this.now = Date.now();
        this.delta = this.now - this.then;

        if (this.delta > this.interval) {
            this.currentTimeOffset++;

            var word = [];

            if (this.currentTimeOffset === this.timeOffset && this.currentCharacter !== this.currentWordLength) {
                this.currentCharacter++;
                this.currentTimeOffset = 0;
            }
            
            // Zobrazenie už dokončených znakov
            for (var k = 0; k < this.currentCharacter; k++) {
                word.push(this.currentWord[k]);
            }

            // Obmedzenie počtu animovaných znakov
            var maxAnimatedChars = this.maxAnimatedChars;
            var remainingChars = this.currentWordLength - this.currentCharacter;
            var charsToAnimate = Math.min(maxAnimatedChars, remainingChars);

            // Animácia len obmedzeného počtu znakov
            for (var i = 0; i < charsToAnimate; i++) {
                var color = this.getRandomColor();
                word.push(this.generateSingleCharacter(color, this.getRandCharacter(this.currentWord[this.currentCharacter + i])));
            }
            
            // Zobrazenie zostávajúcich znakov ako neviditeľné (pre zachovanie rozloženia)
            for (var j = charsToAnimate; j < remainingChars; j++) {
                word.push(this.generateSingleCharacter('transparent', this.currentWord[this.currentCharacter + j]));
            }

            if (that.useCanvas) {
                c.clearRect(0, 0, stage.x * stage.dpr, stage.y * stage.dpr);
                c.font = that.fontSize + " sans-serif";
                var spacing = 0;
                word.forEach(function (w, index) {
                    if (index > that.currentCharacter) {
                        c.fillStyle = that.getRandomColor();
                    } else {
                        c.fillStyle = that.textColor;
                    }
                    if (typeof w === 'string') {
                        c.fillText(w, that.position.x + spacing, that.position.y);
                        spacing += c.measureText(w).width;
                    } else {
                        that.position.x += spacing; // Adjust the position for the span elements
                        that.holder.appendChild(w);
                        spacing = 0; // Reset spacing for the next character
                    }
                });
            } else {
                // Postupne zobrazuj text počas animácie
                if (that.currentCharacter > 0) {
                    that.holder.style.opacity = '1';
                }

                if (that.currentCharacter === that.currentWordLength) {
                    that.needUpdate = false;
                    // Zabezpeč, že je text úplne viditeľný na konci
                    that.holder.style.opacity = '1';
                    // Zobraz finálny text bez animácie
                    that.holder.innerHTML = that.word;
                    return;
                }
                
                this.holder.innerHTML = '';
                word.forEach(function (w, index) {
                    var color = null
                    if (index > that.currentCharacter) {
                        color = that.getRandomColor();
                    } else {
                        color = that.textColor;
                    }
                    if (typeof w === 'string') {
                        that.holder.appendChild(that.generateSingleCharacter(color, w));
                    } else {
                        that.holder.appendChild(w);
                    }
                });
            }
            this.then = this.now - (this.delta % this.interval);
        }
    }

    this.restart = function () {
        this.currentCharacter = 0;
        this.needUpdate = true;
        
        // Skryj text na začiatku animácie
        if (!this.useCanvas) {
            this.holder.style.opacity = '0';
        }
    }

    function update(time) {
        time++;
        if (that.needUpdate) {
            that.updateCharacter(time);
        }
        requestAnimationFrame(update);
    }

    this.writeWord(this.holder.innerHTML);

    update(time);
}

// Pôvodný kód pre .headline elementy (zachováme pre kompatibilitu)
var headline = document.querySelectorAll('.headline');

headline.forEach(function (element) {
    var wordShuffler = new WordShuffler(element, {
        textColor: '',
        timeOffset: 1,
    });

    var isAnimating = false;

    element.addEventListener('mouseenter', function () {
        if (!isAnimating) {
            wordShuffler.restart();
            isAnimating = true;

            setTimeout(function () {
                isAnimating = false;
            }, wordShuffler.interval * wordShuffler.currentWordLength);
        }
    });

    // Intersection Observer pre .headline elementy
    const headlineObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.wordShuffler.restart();
            }
        });
    }, {
        root: null, 
        threshold: 0.5 
    });

    element.wordShuffler = wordShuffler;
    headlineObserver.observe(element);
});

// ===== ANIMÁCIE A EFEKTY =====

// Vylepšený efekt meniacich sa písmen s viewport triggerom
$(document).ready(function() {
  setTimeout(function() {
    const shuffleElements = document.querySelectorAll('.text-shuffle');
    
    if (shuffleElements.length > 0) {
      const shuffleObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting && !entry.target.classList.contains('shuffled')) {
            entry.target.classList.add('shuffled');
            
            try {
              // Pridaj CSS prechod pre plynulé zobrazenie
              entry.target.style.transition = 'opacity 0.3s ease-in-out';
              
              // Načítanie nastavení z data atribútov alebo použitie predvolených hodnôt
              const customTimeOffset = entry.target.getAttribute('data-time-offset');
              const customFps = entry.target.getAttribute('data-fps');
              const customMaxChars = entry.target.getAttribute('data-max-chars');
              
              // Predvolené hodnoty
              let timeOffset = 4; // RÝCHLOSŤ: Menšie číslo = rýchlejšie (1-10)
              let fps = 3; // RÝCHLOSŤ: Vyššie číslo = rýchlejšie (1-5)
              let maxAnimatedChars = 7; // POČET: Koľko znakov sa animuje naraz (5-20)
              
              // Použitie custom hodnôt ak sú zadané
              if (customTimeOffset !== null) {
                const parsedTimeOffset = parseInt(customTimeOffset, 10);
                if (!isNaN(parsedTimeOffset) && parsedTimeOffset >= 1 && parsedTimeOffset <= 15) {
                  timeOffset = parsedTimeOffset;
                }
              }
              
              if (customFps !== null) {
                const parsedFps = parseInt(customFps, 10);
                if (!isNaN(parsedFps) && parsedFps >= 1 && parsedFps <= 10) {
                  fps = parsedFps;
                }
              }
              
              if (customMaxChars !== null) {
                const parsedMaxChars = parseInt(customMaxChars, 10);
                if (!isNaN(parsedMaxChars) && parsedMaxChars >= 3 && parsedMaxChars <= 30) {
                  maxAnimatedChars = parsedMaxChars;
                }
              }
              
              var wordShuffler = new WordShuffler(entry.target, {
                textColor: getComputedStyle(entry.target).color || '#15223f',
                timeOffset: timeOffset,
                fps: fps,
                maxAnimatedChars: maxAnimatedChars,
                colors: [
                  '#15223f',
                  'rgb(111, 122, 152)',
                  'rgb(235, 0, 63)'
                ]
              });
              
              wordShuffler.restart();
              
              setTimeout(() => {
                shuffleObserver.unobserve(entry.target);
              }, 3000);
              
            } catch(error) {
              // Tichá chyba
            }
          }
        });
      }, {
        threshold: 0.5,
        rootMargin: '0px 0px -50px 0px'
      });
      
      shuffleElements.forEach(element => {
        shuffleObserver.observe(element);
      });
    }
  }, 1000);
});

// 3D Tilt efekt pre produkty - optimalizovaný pre plynulosť
$(document).ready(function() {
  $('.carousel-slide .pic').each(function() {
    const card = this;
    let animationId = null;
    let isHovering = false;
    
    $(card).on('mouseenter', function() {
      isHovering = true;
    });
    
    $(card).on('mousemove', function(e) {
      if (!isHovering) return;
      
      // Throttling pomocou requestAnimationFrame
      if (animationId) {
        cancelAnimationFrame(animationId);
      }
      
      animationId = requestAnimationFrame(() => {
        const rect = card.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;
        
        const centerX = rect.width / 2;
        const centerY = rect.height / 2;
        
        // Otočená animácia - roh sa priblíži k myši
        const rotateX = (y - centerY) / centerY * 6;  // Otočené znamienko
        const rotateY = (x - centerX) / centerX * -6; // Otočené znamienko
        
        // Použijeme transform3d pre hardvérové zrýchlenie
        card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateZ(10px)`;
      });
    });
    
    $(card).on('mouseleave', function() {
      isHovering = false;
      
      if (animationId) {
        cancelAnimationFrame(animationId);
        animationId = null;
      }
      
      // Plynulý návrat do normálnej pozície
      card.style.transform = 'perspective(1000px) rotateX(0deg) rotateY(0deg) translateZ(0px)';
    });
  });
});

// Typing Animation
$(document).ready(function() {
    const typingElement = document.querySelector('.typing-text');
    const cursorElement = document.querySelector('.typing-cursor');
    
    if (!typingElement) return;
    
    const texts = JSON.parse(typingElement.getAttribute('data-texts'));
    let currentTextIndex = 0;
    let currentCharIndex = 0;
    let isDeleting = false;
    let isWaiting = false;
    
    const typeSpeed = 100; // Rýchlosť písania (ms)
    const deleteSpeed = 50; // Rýchlosť mazania (ms)
    const waitTime = 2000; // Čakanie po dokončení textu (ms)
    
    function typeText() {
        if (isWaiting) return;
        
        const currentText = texts[currentTextIndex];
        
        if (!isDeleting) {
            // Písanie textu
            if (currentCharIndex < currentText.length) {
                typingElement.textContent = currentText.substring(0, currentCharIndex + 1);
                currentCharIndex++;
                setTimeout(typeText, typeSpeed);
            } else {
                // Text je napísaný, čakáme
                isWaiting = true;
                setTimeout(() => {
                    isWaiting = false;
                    isDeleting = true;
                    typeText();
                }, waitTime);
            }
        } else {
            // Mazanie textu
            if (currentCharIndex > 0) {
                typingElement.textContent = currentText.substring(0, currentCharIndex - 1);
                currentCharIndex--;
                setTimeout(typeText, deleteSpeed);
            } else {
                // Text je zmazaný, prechod na ďalší
                isDeleting = false;
                currentTextIndex = (currentTextIndex + 1) % texts.length;
                
                // Zmena farby gradientu pre každý text
                const gradients = [
                    'linear-gradient(135deg, #f2124b 0%,rgb(217, 3, 57) 100%)',
                    'linear-gradient(135deg, #f2124b 0%, #f2124b 100%)',
                    'linear-gradient(135deg,rgb(184, 4, 49) 0%, #f2124b 100%)',
                    'linear-gradient(135deg,rgb(217, 0, 54) 0%, #f2124b 100%)'
                ];
                
                const gradient = gradients[currentTextIndex % gradients.length];
                typingElement.style.background = gradient;
                typingElement.style.webkitBackgroundClip = 'text';
                typingElement.style.webkitTextFillColor = 'transparent';
                typingElement.style.backgroundClip = 'text';
                
                cursorElement.style.background = gradient;
                cursorElement.style.webkitBackgroundClip = 'text';
                cursorElement.style.webkitTextFillColor = 'transparent';
                cursorElement.style.backgroundClip = 'text';
                
                setTimeout(typeText, 500);
            }
        }
    }
    
    // Spustenie animácie
    typeText();
});

// Swiper s plynulým točením
$(document).ready(function() {
  if (typeof Swiper !== 'undefined' && $('.fea-swiper').length) {
    var feaSwiper = new Swiper('.fea-swiper', {
        direction: 'vertical',
        slidesPerView: 2,
        spaceBetween: 0,
        loop: true,
        draggable: true,
        autoplay: {
            delay: 3000,
            reverseDirection: true,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.fea-swiper-pagination',
            clickable: true,
        },
     
    });
    
   
  }
});

// Timeline animácia pre sekciu .ako
$(document).ready(function() {
  const timelineSection = $('.ako');
  const timelineSteps = $('.timeline-step');
  const timelineProgress = $('.timeline-progress');
  
  if (timelineSection.length && timelineSteps.length) {
    
    // Intersection Observer pre zmenu farieb sekcie
    const sectionObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          // Pridaj dark-mode triedu keď sekcia vstúpi do viewport
          setTimeout(() => {
            entry.target.classList.add('dark-mode');
            // Pridaj ondark triedu na body pre zmenu headera
            document.body.classList.add('ondark');
          }, 300);
        } else {
          // Odstráň dark-mode triedu keď sekcia opustí viewport
       //   entry.target.classList.remove('dark-mode');
          // Odstráň ondark triedu z body
          document.body.classList.remove('ondark');
        }
      });
    }, {
      threshold: [0.25, 0.40],
      rootMargin: '25% 0px 0px 0px'
    });
    
    sectionObserver.observe(timelineSection[0]);
    
    // Scroll animácia pre timeline kroky
    function updateTimeline() {
      const sectionTop = timelineSection.offset().top;
      const sectionHeight = timelineSection.outerHeight();
      const sectionBottom = sectionTop + sectionHeight;
      const scrollTop = $(window).scrollTop();
      const windowHeight = $(window).height();
      const viewportCenter = scrollTop + (windowHeight / 2) + (windowHeight / 3);
      const viewportBottom = scrollTop + windowHeight;
      
      let sectionProgress = 0;
      
      // Progress logika: červená čiara sleduje stred viewport
      // Začína keď stred viewport dosiahne horný okraj sekcie
      // Končí keď spodný okraj sekcie vstúpi do viewport
      if (viewportBottom >= (sectionBottom + (windowHeight / 3))) {
        // Spodný okraj sekcie je už vo viewport - 100% progress
        sectionProgress = 1;
      } else if (viewportCenter >= sectionTop) {
        // Stred viewport je v sekcii, počítaj progress
        const totalDistance = sectionHeight + (windowHeight / 2);
        const currentDistance = viewportCenter - sectionTop;
        sectionProgress = Math.max(0, Math.min(1, currentDistance / totalDistance));
      } else {
        // Stred viewport je pod sekciou - 0% progress
        sectionProgress = 0;
      }
      
      // Aktualizuj progress bar - červená čiara sleduje presne stred viewport
      timelineProgress.css('height', (sectionProgress * 100) + '%');
      
      // Aktivuj kroky keď k nim dôjde červená čiara (progress bar)
      const timelineContainer = $('.timeline-container');
      const timelineTop = timelineContainer.offset().top;
      const timelineLineHeight = timelineContainer.outerHeight();
      const currentProgressHeight = (sectionProgress * timelineLineHeight);
      
      timelineSteps.each(function(index) {
        const $step = $(this);
        const stepTop = $step.offset().top;
        const stepRelativePosition = stepTop - timelineTop;
        
        // Aktivuj krok keď červená čiara dosiahne pozíciu kroku
        if (currentProgressHeight >= stepRelativePosition) {
          if (!$step.hasClass('active')) {
            $step.addClass('active');
          }
        }
        // Deaktivuj len keď červená čiara je pod pozíciou kroku (scroll hore)
        else if (currentProgressHeight < stepRelativePosition && $step.hasClass('active')) {
          $step.removeClass('active');
        }
      });
    }
    
    // Spusti animáciu pri scroll
    $(window).on('scroll', updateTimeline);
    
    // Spusti animáciu pri načítaní stránky
    updateTimeline();
  }
});

/*! Magnific Popup - v1.0.1 - 2015-12-30
* http://dimsemenov.com/plugins/magnific-popup/
* Copyright (c) 2015 Dmitry Semenov; */
!function(a){"function"==typeof define&&define.amd?define(["jquery"],a):a("object"==typeof exports?require("jquery"):window.jQuery||window.Zepto)}(function(a){var b,c,d,e,f,g,h="Close",i="BeforeClose",j="AfterClose",k="BeforeAppend",l="MarkupParse",m="Open",n="Change",o="mfp",p="."+o,q="mfp-ready",r="mfp-removing",s="mfp-prevent-close",t=function(){},u=!!window.jQuery,v=a(window),w=function(a,c){b.ev.on(o+a+p,c)},x=function(b,c,d,e){var f=document.createElement("div");return f.className="mfp-"+b,d&&(f.innerHTML=d),e?c&&c.appendChild(f):(f=a(f),c&&f.appendTo(c)),f},y=function(c,d){b.ev.triggerHandler(o+c,d),b.st.callbacks&&(c=c.charAt(0).toLowerCase()+c.slice(1),b.st.callbacks[c]&&b.st.callbacks[c].apply(b,a.isArray(d)?d:[d]))},z=function(c){return c===g&&b.currTemplate.closeBtn||(b.currTemplate.closeBtn=a(b.st.closeMarkup.replace("%title%",b.st.tClose)),g=c),b.currTemplate.closeBtn},A=function(){a.magnificPopup.instance||(b=new t,b.init(),a.magnificPopup.instance=b)},B=function(){var a=document.createElement("p").style,b=["ms","O","Moz","Webkit"];if(void 0!==a.transition)return!0;for(;b.length;)if(b.pop()+"Transition"in a)return!0;return!1};t.prototype={constructor:t,init:function(){var c=navigator.appVersion;b.isIE7=-1!==c.indexOf("MSIE 7."),b.isIE8=-1!==c.indexOf("MSIE 8."),b.isLowIE=b.isIE7||b.isIE8,b.isAndroid=/android/gi.test(c),b.isIOS=/iphone|ipad|ipod/gi.test(c),b.supportsTransition=B(),b.probablyMobile=b.isAndroid||b.isIOS||/(Opera Mini)|Kindle|webOS|BlackBerry|(Opera Mobi)|(Windows Phone)|IEMobile/i.test(navigator.userAgent),d=a(document),b.popupsCache={}},open:function(c){var e;if(c.isObj===!1){b.items=c.items.toArray(),b.index=0;var g,h=c.items;for(e=0;e<h.length;e++)if(g=h[e],g.parsed&&(g=g.el[0]),g===c.el[0]){b.index=e;break}}else b.items=a.isArray(c.items)?c.items:[c.items],b.index=c.index||0;if(b.isOpen)return void b.updateItemHTML();b.types=[],f="",c.mainEl&&c.mainEl.length?b.ev=c.mainEl.eq(0):b.ev=d,c.key?(b.popupsCache[c.key]||(b.popupsCache[c.key]={}),b.currTemplate=b.popupsCache[c.key]):b.currTemplate={},b.st=a.extend(!0,{},a.magnificPopup.defaults,c),b.fixedContentPos="auto"===b.st.fixedContentPos?!b.probablyMobile:b.st.fixedContentPos,b.st.modal&&(b.st.closeOnContentClick=!1,b.st.closeOnBgClick=!1,b.st.showCloseBtn=!1,b.st.enableEscapeKey=!1),b.bgOverlay||(b.bgOverlay=x("bg").on("click"+p,function(){b.close()}),b.wrap=x("wrap").attr("tabindex",-1).on("click"+p,function(a){b._checkIfClose(a.target)&&b.close()}),b.container=x("container",b.wrap)),b.contentContainer=x("content"),b.st.preloader&&(b.preloader=x("preloader",b.container,b.st.tLoading));var i=a.magnificPopup.modules;for(e=0;e<i.length;e++){var j=i[e];j=j.charAt(0).toUpperCase()+j.slice(1),b["init"+j].call(b)}y("BeforeOpen"),b.st.showCloseBtn&&(b.st.closeBtnInside?(w(l,function(a,b,c,d){c.close_replaceWith=z(d.type)}),f+=" mfp-close-btn-in"):b.wrap.append(z())),b.st.alignTop&&(f+=" mfp-align-top"),b.fixedContentPos?b.wrap.css({overflow:b.st.overflowY,overflowX:"hidden",overflowY:b.st.overflowY}):b.wrap.css({top:v.scrollTop(),position:"absolute"}),(b.st.fixedBgPos===!1||"auto"===b.st.fixedBgPos&&!b.fixedContentPos)&&b.bgOverlay.css({height:d.height(),position:"absolute"}),b.st.enableEscapeKey&&d.on("keyup"+p,function(a){27===a.keyCode&&b.close()}),v.on("resize"+p,function(){b.updateSize()}),b.st.closeOnContentClick||(f+=" mfp-auto-cursor"),f&&b.wrap.addClass(f);var k=b.wH=v.height(),n={};if(b.fixedContentPos&&b._hasScrollBar(k)){var o=b._getScrollbarSize();o&&(n.marginRight=o)}b.fixedContentPos&&(b.isIE7?a("body, html").css("overflow","hidden"):n.overflow="hidden");var r=b.st.mainClass;return b.isIE7&&(r+=" mfp-ie7"),r&&b._addClassToMFP(r),b.updateItemHTML(),y("BuildControls"),a("html").css(n),b.bgOverlay.add(b.wrap).prependTo(b.st.prependTo||a(document.body)),b._lastFocusedEl=document.activeElement,setTimeout(function(){b.content?(b._addClassToMFP(q),b._setFocus()):b.bgOverlay.addClass(q),d.on("focusin"+p,b._onFocusIn)},16),b.isOpen=!0,b.updateSize(k),y(m),c},close:function(){b.isOpen&&(y(i),b.isOpen=!1,b.st.removalDelay&&!b.isLowIE&&b.supportsTransition?(b._addClassToMFP(r),setTimeout(function(){b._close()},b.st.removalDelay)):b._close())},_close:function(){y(h);var c=r+" "+q+" ";if(b.bgOverlay.detach(),b.wrap.detach(),b.container.empty(),b.st.mainClass&&(c+=b.st.mainClass+" "),b._removeClassFromMFP(c),b.fixedContentPos){var e={marginRight:""};b.isIE7?a("body, html").css("overflow",""):e.overflow="",a("html").css(e)}d.off("keyup"+p+" focusin"+p),b.ev.off(p),b.wrap.attr("class","mfp-wrap").removeAttr("style"),b.bgOverlay.attr("class","mfp-bg"),b.container.attr("class","mfp-container"),!b.st.showCloseBtn||b.st.closeBtnInside&&b.currTemplate[b.currItem.type]!==!0||b.currTemplate.closeBtn&&b.currTemplate.closeBtn.detach(),b.st.autoFocusLast&&b._lastFocusedEl&&a(b._lastFocusedEl).focus(),b.currItem=null,b.content=null,b.currTemplate=null,b.prevHeight=0,y(j)},updateSize:function(a){if(b.isIOS){var c=document.documentElement.clientWidth/window.innerWidth,d=window.innerHeight*c;b.wrap.css("height",d),b.wH=d}else b.wH=a||v.height();b.fixedContentPos||b.wrap.css("height",b.wH),y("Resize")},updateItemHTML:function(){var c=b.items[b.index];b.contentContainer.detach(),b.content&&b.content.detach(),c.parsed||(c=b.parseEl(b.index));var d=c.type;if(y("BeforeChange",[b.currItem?b.currItem.type:"",d]),b.currItem=c,!b.currTemplate[d]){var f=b.st[d]?b.st[d].markup:!1;y("FirstMarkupParse",f),f?b.currTemplate[d]=a(f):b.currTemplate[d]=!0}e&&e!==c.type&&b.container.removeClass("mfp-"+e+"-holder");var g=b["get"+d.charAt(0).toUpperCase()+d.slice(1)](c,b.currTemplate[d]);b.appendContent(g,d),c.preloaded=!0,y(n,c),e=c.type,b.container.prepend(b.contentContainer),y("AfterChange")},appendContent:function(a,c){b.content=a,a?b.st.showCloseBtn&&b.st.closeBtnInside&&b.currTemplate[c]===!0?b.content.find(".mfp-close").length||b.content.append(z()):b.content=a:b.content="",y(k),b.container.addClass("mfp-"+c+"-holder"),b.contentContainer.append(b.content)},parseEl:function(c){var d,e=b.items[c];if(e.tagName?e={el:a(e)}:(d=e.type,e={data:e,src:e.src}),e.el){for(var f=b.types,g=0;g<f.length;g++)if(e.el.hasClass("mfp-"+f[g])){d=f[g];break}e.src=e.el.attr("data-mfp-src"),e.src||(e.src=e.el.attr("href"))}return e.type=d||b.st.type||"inline",e.index=c,e.parsed=!0,b.items[c]=e,y("ElementParse",e),b.items[c]},addGroup:function(a,c){var d=function(d){d.mfpEl=this,b._openClick(d,a,c)};c||(c={});var e="click.magnificPopup";c.mainEl=a,c.items?(c.isObj=!0,a.off(e).on(e,d)):(c.isObj=!1,c.delegate?a.off(e).on(e,c.delegate,d):(c.items=a,a.off(e).on(e,d)))},_openClick:function(c,d,e){var f=void 0!==e.midClick?e.midClick:a.magnificPopup.defaults.midClick;if(f||!(2===c.which||c.ctrlKey||c.metaKey||c.altKey||c.shiftKey)){var g=void 0!==e.disableOn?e.disableOn:a.magnificPopup.defaults.disableOn;if(g)if(a.isFunction(g)){if(!g.call(b))return!0}else if(v.width()<g)return!0;c.type&&(c.preventDefault(),b.isOpen&&c.stopPropagation()),e.el=a(c.mfpEl),e.delegate&&(e.items=d.find(e.delegate)),b.open(e)}},updateStatus:function(a,d){if(b.preloader){c!==a&&b.container.removeClass("mfp-s-"+c),d||"loading"!==a||(d=b.st.tLoading);var e={status:a,text:d};y("UpdateStatus",e),a=e.status,d=e.text,b.preloader.html(d),b.preloader.find("a").on("click",function(a){a.stopImmediatePropagation()}),b.container.addClass("mfp-s-"+a),c=a}},_checkIfClose:function(c){if(!a(c).hasClass(s)){var d=b.st.closeOnContentClick,e=b.st.closeOnBgClick;if(d&&e)return!0;if(!b.content||a(c).hasClass("mfp-close")||b.preloader&&c===b.preloader[0])return!0;if(c===b.content[0]||a.contains(b.content[0],c)){if(d)return!0}else if(e&&a.contains(document,c))return!0;return!1}},_addClassToMFP:function(a){b.bgOverlay.addClass(a),b.wrap.addClass(a)},_removeClassFromMFP:function(a){this.bgOverlay.removeClass(a),b.wrap.removeClass(a)},_hasScrollBar:function(a){return(b.isIE7?d.height():document.body.scrollHeight)>(a||v.height())},_setFocus:function(){(b.st.focus?b.content.find(b.st.focus).eq(0):b.wrap).focus()},_onFocusIn:function(c){return c.target===b.wrap[0]||a.contains(b.wrap[0],c.target)?void 0:(b._setFocus(),!1)},_parseMarkup:function(b,c,d){var e;d.data&&(c=a.extend(d.data,c)),y(l,[b,c,d]),a.each(c,function(a,c){if(void 0===c||c===!1)return!0;if(e=a.split("_"),e.length>1){var d=b.find(p+"-"+e[0]);if(d.length>0){var f=e[1];"replaceWith"===f?d[0]!==c[0]&&d.replaceWith(c):"img"===f?d.is("img")?d.attr("src",c):d.replaceWith('<img src="'+c+'" class="'+d.attr("class")+'" />'):d.attr(e[1],c)}}else b.find(p+"-"+a).html(c)})},_getScrollbarSize:function(){if(void 0===b.scrollbarSize){var a=document.createElement("div");a.style.cssText="width: 99px; height: 99px; overflow: scroll; position: absolute; top: -9999px;",document.body.appendChild(a),b.scrollbarSize=a.offsetWidth-a.clientWidth,document.body.removeChild(a)}return b.scrollbarSize}},a.magnificPopup={instance:null,proto:t.prototype,modules:[],open:function(b,c){return A(),b=b?a.extend(!0,{},b):{},b.isObj=!0,b.index=c||0,this.instance.open(b)},close:function(){return a.magnificPopup.instance&&a.magnificPopup.instance.close()},registerModule:function(b,c){c.options&&(a.magnificPopup.defaults[b]=c.options),a.extend(this.proto,c.proto),this.modules.push(b)},defaults:{disableOn:0,key:null,midClick:!1,mainClass:"",preloader:!0,focus:"",closeOnContentClick:!1,closeOnBgClick:!0,closeBtnInside:!0,showCloseBtn:!0,enableEscapeKey:!0,modal:!1,alignTop:!1,removalDelay:0,prependTo:null,fixedContentPos:"auto",fixedBgPos:"auto",overflowY:"auto",closeMarkup:'<button title="%title%" type="button" class="mfp-close">&#215;</button>',tClose:"Close (Esc)",tLoading:"Loading...",autoFocusLast:!0}},a.fn.magnificPopup=function(c){A();var d=a(this);if("string"==typeof c)if("open"===c){var e,f=u?d.data("magnificPopup"):d[0].magnificPopup,g=parseInt(arguments[1],10)||0;f.items?e=f.items[g]:(e=d,f.delegate&&(e=e.find(f.delegate)),e=e.eq(g)),b._openClick({mfpEl:e},d,f)}else b.isOpen&&b[c].apply(b,Array.prototype.slice.call(arguments,1));else c=a.extend(!0,{},c),u?d.data("magnificPopup",c):d[0].magnificPopup=c,b.addGroup(d,c);return d};var C,D,E,F="inline",G=function(){E&&(D.after(E.addClass(C)).detach(),E=null)};a.magnificPopup.registerModule(F,{options:{hiddenClass:"hide",markup:"",tNotFound:"Content not found"},proto:{initInline:function(){b.types.push(F),w(h+"."+F,function(){G()})},getInline:function(c,d){if(G(),c.src){var e=b.st.inline,f=a(c.src);if(f.length){var g=f[0].parentNode;g&&g.tagName&&(D||(C=e.hiddenClass,D=x(C),C="mfp-"+C),E=f.after(D).detach().removeClass(C)),b.updateStatus("ready")}else b.updateStatus("error",e.tNotFound),f=a("<div>");return c.inlineElement=f,f}return b.updateStatus("ready"),b._parseMarkup(d,{},c),d}}});var H,I="ajax",J=function(){H&&a(document.body).removeClass(H)},K=function(){J(),b.req&&b.req.abort()};a.magnificPopup.registerModule(I,{options:{settings:null,cursor:"mfp-ajax-cur",tError:'<a href="%url%">The content</a> could not be loaded.'},proto:{initAjax:function(){b.types.push(I),H=b.st.ajax.cursor,w(h+"."+I,K),w("BeforeChange."+I,K)},getAjax:function(c){H&&a(document.body).addClass(H),b.updateStatus("loading");var d=a.extend({url:c.src,success:function(d,e,f){var g={data:d,xhr:f};y("ParseAjax",g),b.appendContent(a(g.data),I),c.finished=!0,J(),b._setFocus(),setTimeout(function(){b.wrap.addClass(q)},16),b.updateStatus("ready"),y("AjaxContentAdded")},error:function(){J(),c.finished=c.loadError=!0,b.updateStatus("error",b.st.ajax.tError.replace("%url%",c.src))}},b.st.ajax.settings);return b.req=a.ajax(d),""}}});var L,M=function(c){if(c.data&&void 0!==c.data.title)return c.data.title;var d=b.st.image.titleSrc;if(d){if(a.isFunction(d))return d.call(b,c);if(c.el)return c.el.attr(d)||""}return""};a.magnificPopup.registerModule("image",{options:{markup:'<div class="mfp-figure"><div class="mfp-close"></div><figure><div class="mfp-img"></div><figcaption><div class="mfp-bottom-bar"><div class="mfp-title"></div><div class="mfp-counter"></div></div></figcaption></figure></div>',cursor:"mfp-zoom-out-cur",titleSrc:"title",verticalFit:!0,tError:'<a href="%url%">The image</a> could not be loaded.'},proto:{initImage:function(){var c=b.st.image,d=".image";b.types.push("image"),w(m+d,function(){"image"===b.currItem.type&&c.cursor&&a(document.body).addClass(c.cursor)}),w(h+d,function(){c.cursor&&a(document.body).removeClass(c.cursor),v.off("resize"+p)}),w("Resize"+d,b.resizeImage),b.isLowIE&&w("AfterChange",b.resizeImage)},resizeImage:function(){var a=b.currItem;if(a&&a.img&&b.st.image.verticalFit){var c=0;b.isLowIE&&(c=parseInt(a.img.css("padding-top"),10)+parseInt(a.img.css("padding-bottom"),10)),a.img.css("max-height",b.wH-c)}},_onImageHasSize:function(a){a.img&&(a.hasSize=!0,L&&clearInterval(L),a.isCheckingImgSize=!1,y("ImageHasSize",a),a.imgHidden&&(b.content&&b.content.removeClass("mfp-loading"),a.imgHidden=!1))},findImageSize:function(a){var c=0,d=a.img[0],e=function(f){L&&clearInterval(L),L=setInterval(function(){return d.naturalWidth>0?void b._onImageHasSize(a):(c>200&&clearInterval(L),c++,void(3===c?e(10):40===c?e(50):100===c&&e(500)))},f)};e(1)},getImage:function(c,d){var e=0,f=function(){c&&(c.img[0].complete?(c.img.off(".mfploader"),c===b.currItem&&(b._onImageHasSize(c),b.updateStatus("ready")),c.hasSize=!0,c.loaded=!0,y("ImageLoadComplete")):(e++,200>e?setTimeout(f,100):g()))},g=function(){c&&(c.img.off(".mfploader"),c===b.currItem&&(b._onImageHasSize(c),b.updateStatus("error",h.tError.replace("%url%",c.src))),c.hasSize=!0,c.loaded=!0,c.loadError=!0)},h=b.st.image,i=d.find(".mfp-img");if(i.length){var j=document.createElement("img");j.className="mfp-img",c.el&&c.el.find("img").length&&(j.alt=c.el.find("img").attr("alt")),c.img=a(j).on("load.mfploader",f).on("error.mfploader",g),j.src=c.src,i.is("img")&&(c.img=c.img.clone()),j=c.img[0],j.naturalWidth>0?c.hasSize=!0:j.width||(c.hasSize=!1)}return b._parseMarkup(d,{title:M(c),img_replaceWith:c.img},c),b.resizeImage(),c.hasSize?(L&&clearInterval(L),c.loadError?(d.addClass("mfp-loading"),b.updateStatus("error",h.tError.replace("%url%",c.src))):(d.removeClass("mfp-loading"),b.updateStatus("ready")),d):(b.updateStatus("loading"),c.loading=!0,c.hasSize||(c.imgHidden=!0,d.addClass("mfp-loading"),b.findImageSize(c)),d)}}});var N,O=function(){return void 0===N&&(N=void 0!==document.createElement("p").style.MozTransform),N};a.magnificPopup.registerModule("zoom",{options:{enabled:!1,easing:"ease-in-out",duration:300,opener:function(a){return a.is("img")?a:a.find("img")}},proto:{initZoom:function(){var a,c=b.st.zoom,d=".zoom";if(c.enabled&&b.supportsTransition){var e,f,g=c.duration,j=function(a){var b=a.clone().removeAttr("style").removeAttr("class").addClass("mfp-animated-image"),d="all "+c.duration/1e3+"s "+c.easing,e={position:"fixed",zIndex:9999,left:0,top:0,"-webkit-backface-visibility":"hidden"},f="transition";return e["-webkit-"+f]=e["-moz-"+f]=e["-o-"+f]=e[f]=d,b.css(e),b},k=function(){b.content.css("visibility","visible")};w("BuildControls"+d,function(){if(b._allowZoom()){if(clearTimeout(e),b.content.css("visibility","hidden"),a=b._getItemToZoom(),!a)return void k();f=j(a),f.css(b._getOffset()),b.wrap.append(f),e=setTimeout(function(){f.css(b._getOffset(!0)),e=setTimeout(function(){k(),setTimeout(function(){f.remove(),a=f=null,y("ZoomAnimationEnded")},16)},g)},16)}}),w(i+d,function(){if(b._allowZoom()){if(clearTimeout(e),b.st.removalDelay=g,!a){if(a=b._getItemToZoom(),!a)return;f=j(a)}f.css(b._getOffset(!0)),b.wrap.append(f),b.content.css("visibility","hidden"),setTimeout(function(){f.css(b._getOffset())},16)}}),w(h+d,function(){b._allowZoom()&&(k(),f&&f.remove(),a=null)})}},_allowZoom:function(){return"image"===b.currItem.type},_getItemToZoom:function(){return b.currItem.hasSize?b.currItem.img:!1},_getOffset:function(c){var d;d=c?b.currItem.img:b.st.zoom.opener(b.currItem.el||b.currItem);var e=d.offset(),f=parseInt(d.css("padding-top"),10),g=parseInt(d.css("padding-bottom"),10);e.top-=a(window).scrollTop()-f;var h={width:d.width(),height:(u?d.innerHeight():d[0].offsetHeight)-g-f};return O()?h["-moz-transform"]=h.transform="translate("+e.left+"px,"+e.top+"px)":(h.left=e.left,h.top=e.top),h}}});var P="iframe",Q="//about:blank",R=function(a){if(b.currTemplate[P]){var c=b.currTemplate[P].find("iframe");c.length&&(a||(c[0].src=Q),b.isIE8&&c.css("display",a?"block":"none"))}};a.magnificPopup.registerModule(P,{options:{markup:'<div class="mfp-iframe-scaler"><div class="mfp-close"></div><iframe class="mfp-iframe" src="//about:blank" frameborder="0" allowfullscreen></iframe></div>',srcAction:"iframe_src",patterns:{youtube:{index:"youtube.com",id:"v=",src:"//www.youtube.com/embed/%id%?autoplay=1"},vimeo:{index:"vimeo.com/",id:"/",src:"//player.vimeo.com/video/%id%?autoplay=1"},gmaps:{index:"//maps.google.",src:"%id%&output=embed"}}},proto:{initIframe:function(){b.types.push(P),w("BeforeChange",function(a,b,c){b!==c&&(b===P?R():c===P&&R(!0))}),w(h+"."+P,function(){R()})},getIframe:function(c,d){var e=c.src,f=b.st.iframe;a.each(f.patterns,function(){return e.indexOf(this.index)>-1?(this.id&&(e="string"==typeof this.id?e.substr(e.lastIndexOf(this.id)+this.id.length,e.length):this.id.call(this,e)),e=this.src.replace("%id%",e),!1):void 0});var g={};return f.srcAction&&(g[f.srcAction]=e),b._parseMarkup(d,g,c),b.updateStatus("ready"),d}}});var S=function(a){var c=b.items.length;return a>c-1?a-c:0>a?c+a:a},T=function(a,b,c){return a.replace(/%curr%/gi,b+1).replace(/%total%/gi,c)};a.magnificPopup.registerModule("gallery",{options:{enabled:!1,arrowMarkup:'<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>',preload:[0,2],navigateByImgClick:!0,arrows:!0,tPrev:"Previous (Left arrow key)",tNext:"Next (Right arrow key)",tCounter:"%curr% of %total%"},proto:{initGallery:function(){var c=b.st.gallery,e=".mfp-gallery",g=Boolean(a.fn.mfpFastClick);return b.direction=!0,c&&c.enabled?(f+=" mfp-gallery",w(m+e,function(){c.navigateByImgClick&&b.wrap.on("click"+e,".mfp-img",function(){return b.items.length>1?(b.next(),!1):void 0}),d.on("keydown"+e,function(a){37===a.keyCode?b.prev():39===a.keyCode&&b.next()})}),w("UpdateStatus"+e,function(a,c){c.text&&(c.text=T(c.text,b.currItem.index,b.items.length))}),w(l+e,function(a,d,e,f){var g=b.items.length;e.counter=g>1?T(c.tCounter,f.index,g):""}),w("BuildControls"+e,function(){if(b.items.length>1&&c.arrows&&!b.arrowLeft){var d=c.arrowMarkup,e=b.arrowLeft=a(d.replace(/%title%/gi,c.tPrev).replace(/%dir%/gi,"left")).addClass(s),f=b.arrowRight=a(d.replace(/%title%/gi,c.tNext).replace(/%dir%/gi,"right")).addClass(s),h=g?"mfpFastClick":"click";e[h](function(){b.prev()}),f[h](function(){b.next()}),b.isIE7&&(x("b",e[0],!1,!0),x("a",e[0],!1,!0),x("b",f[0],!1,!0),x("a",f[0],!1,!0)),b.container.append(e.add(f))}}),w(n+e,function(){b._preloadTimeout&&clearTimeout(b._preloadTimeout),b._preloadTimeout=setTimeout(function(){b.preloadNearbyImages(),b._preloadTimeout=null},16)}),void w(h+e,function(){d.off(e),b.wrap.off("click"+e),b.arrowLeft&&g&&b.arrowLeft.add(b.arrowRight).destroyMfpFastClick(),b.arrowRight=b.arrowLeft=null})):!1},next:function(){b.direction=!0,b.index=S(b.index+1),b.updateItemHTML()},prev:function(){b.direction=!1,b.index=S(b.index-1),b.updateItemHTML()},goTo:function(a){b.direction=a>=b.index,b.index=a,b.updateItemHTML()},preloadNearbyImages:function(){var a,c=b.st.gallery.preload,d=Math.min(c[0],b.items.length),e=Math.min(c[1],b.items.length);for(a=1;a<=(b.direction?e:d);a++)b._preloadItem(b.index+a);for(a=1;a<=(b.direction?d:e);a++)b._preloadItem(b.index-a)},_preloadItem:function(c){if(c=S(c),!b.items[c].preloaded){var d=b.items[c];d.parsed||(d=b.parseEl(c)),y("LazyLoad",d),"image"===d.type&&(d.img=a('<img class="mfp-img" />').on("load.mfploader",function(){d.hasSize=!0}).on("error.mfploader",function(){d.hasSize=!0,d.loadError=!0,y("LazyLoadError",d)}).attr("src",d.src)),d.preloaded=!0}}}});var U="retina";a.magnificPopup.registerModule(U,{options:{replaceSrc:function(a){return a.src.replace(/\.\w+$/,function(a){return"@2x"+a})},ratio:1},proto:{initRetina:function(){if(window.devicePixelRatio>1){var a=b.st.retina,c=a.ratio;c=isNaN(c)?c():c,c>1&&(w("ImageHasSize."+U,function(a,b){b.img.css({"max-width":b.img[0].naturalWidth/c,width:"100%"})}),w("ElementParse."+U,function(b,d){d.src=a.replaceSrc(d,c)}))}}}}),function(){var b=1e3,c="ontouchstart"in window,d=function(){v.off("touchmove"+f+" touchend"+f)},e="mfpFastClick",f="."+e;a.fn.mfpFastClick=function(e){return a(this).each(function(){var g,h=a(this);if(c){var i,j,k,l,m,n;h.on("touchstart"+f,function(a){l=!1,n=1,m=a.originalEvent?a.originalEvent.touches[0]:a.touches[0],j=m.clientX,k=m.clientY,v.on("touchmove"+f,function(a){m=a.originalEvent?a.originalEvent.touches:a.touches,n=m.length,m=m[0],(Math.abs(m.clientX-j)>10||Math.abs(m.clientY-k)>10)&&(l=!0,d())}).on("touchend"+f,function(a){d(),l||n>1||(g=!0,a.preventDefault(),clearTimeout(i),i=setTimeout(function(){g=!1},b),e())})})}h.on("click"+f,function(){g||e()})})},a.fn.destroyMfpFastClick=function(){a(this).off("touchstart"+f+" click"+f),c&&v.off("touchmove"+f+" touchend"+f)}}(),A()});

$(document).ready(function () {
  $(window).on("resize", function (e) {
      checkScreenSize();
  });

  checkScreenSize();

  function checkScreenSize(){
      var newWindowWidth = $(window).width();
      if (newWindowWidth < 600) {

      }
      else
      {
          $("#bgvideo").ready(function() {

          setTimeout(function(){
              $(".loader").fadeOut("slow");
          }, 6000);

         });
             $('.booktoday,.popup, #sidebook').magnificPopup({
                  type: 'iframe'
              });
      }
  }
});


/**
 * Blog Features JavaScript - Clean Version
 * - Progress bar pre scrollovanie článku
 * - Automatický obsah z H2 elementov
 * - Emócie pre články
 * - Text-to-Speech funkcionalita
 */

(function($) {
  'use strict';

  // ========== 1. PROGRESS BAR PRE SCROLLOVANIE ==========
  function initArticleProgressBar() {
    var $article = $('article');
    if ($article.length === 0) return;

    // Hľadáme placeholder alebo vložíme na začiatok body (fixne hore)
    var $progressPlaceholder = $('#article-progress-placeholder, .article-progress-placeholder');
    var isInline = $progressPlaceholder.length > 0;
    
    // Vytvorenie minimalistického progress baru s percentom
    var progressBar;
    if (isInline) {
      // Inline verzia - percento nad čiarou
      progressBar = '<div class="article-progress-bar inline">' +
                      '<span class="progress-percent">0%</span>' +
                      '<div class="progress-fill"></div>' +
                    '</div>';
    } else {
      // Fixed verzia - percento na začiatku čiary
      progressBar = '<div class="article-progress-bar">' +
                      '<div class="progress-fill"></div>' +
                      '<span class="progress-percent">0%</span>' +
                    '</div>';
    }
    
    if (isInline) {
      // Ak existuje placeholder, vložíme tam (inline v obsahu)
      $progressPlaceholder.html(progressBar);
    } else {
      // Inak vložíme fixne hore (backward compatibility)
      $('body').prepend(progressBar);
    }

    function updateArticleProgress() {
      var $target = $('article.main-content').first();
      if (!$target.length) $target = $article.first();
      var articleTop = $target.offset().top;
      var articleHeight = $target.outerHeight();
      var windowScroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      var start = articleTop;
      var end = articleTop + Math.max(articleHeight - windowHeight, 1);
      var progress = ((windowScroll - start) / (end - start)) * 100;
      if (windowScroll + windowHeight < articleTop) progress = 0;
      if (windowScroll >= articleTop + articleHeight - 8) progress = 100;
      var roundedProgress = Math.max(0, Math.min(100, Math.round(progress)));
      $('.article-progress-bar .progress-fill').css('width', roundedProgress + '%');
      $('.article-progress-bar .progress-percent').text(roundedProgress + '%');
    }
    updateArticleProgress();
    $(window).on('scroll resize', updateArticleProgress);
  }

  // ========== 2. AUTOMATICKÝ OBSAH Z H2 ELEMENTOV ==========
  function initArticleTableOfContents() {
    console.log('🔍 Inicializácia Table of Contents...');
    
    var $tocPlaceholder = $('#article-toc-placeholder, .article-toc-placeholder');
    if ($tocPlaceholder.length === 0) {
      console.log('❌ TOC placeholder nenájdený');
      return;
    }

    var $headings = $('.main-content h2').not('.hg-article-cta h2, .cta h2');
    console.log('📋 Nájdených H2 nadpisov:', $headings.length);
    
    if ($headings.length === 0) {
      console.log('❌ Žiadne H2 nadpisy nenájdené');
      return;
    }

    var tocHtml = '<div class="article-toc">' +
                    '<h4 class="toc-title">Obsah článku</h4>' +
                    '<ul class="toc-list">';

    $headings.each(function(index) {
      var $heading = $(this);
      var headingText = $heading.text().trim();
      var headingId = 'heading-' + index;
      
      // Pridanie ID k nadpisu pre kotvy
      $heading.attr('id', headingId);
      
      // Pridanie do TOC - iba jedna úroveň
      tocHtml += '<li class="toc-item">' +
                   '<a href="#' + headingId + '" class="toc-link">' + headingText + '</a>' +
                 '</li>';
    });

    tocHtml += '</ul></div>';
    
    $tocPlaceholder.html(tocHtml);
    console.log('✅ TOC vytvorený s', $headings.length, 'položkami');

    // Smooth scroll pre TOC linky
    $(document).on('click', '.toc-link', function(e) {
      e.preventDefault();
      var targetId = $(this).attr('href');
      var $target = $(targetId);
      
      if ($target.length) {
        var offset = 100; // offset pre sticky header
        $('html, body').animate({
          scrollTop: $target.offset().top - offset
        }, 500);
      }
    });

    // Inicializácia sledovania aktívnych sekcií
    initActiveSection();
  }

  // ========== 3. SLEDOVANIE AKTÍVNEJ SEKCIE VO VIEWPORTE ==========
  function initActiveSection() {
    var $headings = $('.main-content h2').not('.hg-article-cta h2, .cta h2');
    var $tocLinks = $('.toc-link');
    
    if ($headings.length === 0 || $tocLinks.length === 0) {
      return;
    }

    function updateActiveSection() {
      var scrollTop = $(window).scrollTop();
      var windowHeight = $(window).height();
      var currentSection = null;
      var offset = 150; // offset pre sticky header a lepšiu detekciu
      
      // Nájdeme aktuálnu sekciu na základe pozície vo viewporte
      $headings.each(function() {
        var $heading = $(this);
        var headingTop = $heading.offset().top;
        var headingId = $heading.attr('id');
        
        // Ak je nadpis nad aktuálnou pozíciou scrollu (s offsetom)
        if (headingTop <= scrollTop + offset) {
          currentSection = headingId;
        }
      });
      
      // Ak sme na začiatku stránky a ešte sme nedosiahli prvý nadpis, označíme prvú sekciu
      if (!currentSection) {
        var firstHeadingTop = $headings.first().offset().top;
        if (scrollTop + windowHeight * 0.5 >= firstHeadingTop) {
          currentSection = $headings.first().attr('id');
        }
      }
      
      // Aktualizujeme aktívny odkaz
      $tocLinks.removeClass('active seeme');
      if (currentSection) {
        $tocLinks.filter('[href="#' + currentSection + '"]').addClass('active seeme');
      }
      
    }

    // Sledovanie scrollu s throttling pre výkon
    var scrollTimeout;
    $(window).on('scroll', function() {
      if (scrollTimeout) {
        clearTimeout(scrollTimeout);
      }
      scrollTimeout = setTimeout(updateActiveSection, 50);
    });

    // Počiatočné nastavenie
    updateActiveSection();
  }

  // ========== 3. EMÓCIE PRE ČLÁNKY ==========
  function initArticleEmotions() {
    $('.article-emotions .emotion-btn').on('click', function() {
      var $btn = $(this);
      var $emotions = $btn.closest('.article-emotions');
      var articleId = $emotions.data('article-id');
      var emotionType = $btn.data('emotion');
      
      if (!articleId || !emotionType) return;
      
      $btn.prop('disabled', true);
      
      $.ajax({
        url: '/utility/?pb=articleemotion',
        method: 'POST',
        dataType: 'json',
        data: {
          article_id: articleId,
          emotion_type: emotionType
        },
        success: function(response) {
          if (response.success) {
            var $count = $btn.find('.emotion-count');
            var currentCount = parseInt($count.text()) || 0;
            
            if (response.action === 'added') {
              $btn.addClass('active');
              $count.text(currentCount + 1);
              showEmotionMessage($emotions, 'Ďakujeme za reakciu!', 'success');
            } else if (response.action === 'removed') {
              $btn.removeClass('active');
              $count.text(Math.max(0, currentCount - 1));
              showEmotionMessage($emotions, 'Reakcia bola odstránená', 'success');
            }
          } else {
            showEmotionMessage($emotions, response.error || 'Nastala chyba', 'error');
          }
        },
        error: function() {
          showEmotionMessage($emotions, 'Nastala chyba pri reakcii', 'error');
        },
        complete: function() {
          $btn.prop('disabled', false);
        }
      });
    });
  }

  function showEmotionMessage($container, message, type) {
    var $message = $container.find('.emotions-message');
    $message.removeClass('success error').addClass(type).text(message).show();
    setTimeout(function() {
      $message.fadeOut();
    }, 3000);
  }

  // ========== 4. TEXT-TO-SPEECH (WEB SPEECH API) ==========
  function initArticleSpeech() {
    // Kontrola podpory Web Speech API
    if (!('speechSynthesis' in window)) {
      $('.article-speech-player').hide();
      console.warn('❌ Prehliadač nepodporuje Web Speech API');
      return;
    }

    var isPlaying = false;
    var utterance = null;
    var speechText = '';

    // Získanie textu článku
    function getArticleText() {
      var text = '';
      
      // Pokús sa najprv nájsť content-block elementy
      var $contentBlocks = $('article .content-block');
      
      if ($contentBlocks.length > 0) {
        // Ak existujú content-block elementy
        $contentBlocks.each(function() {
          var $block = $(this);
          var blockText = $block.text().replace(/\s+/g, ' ').trim();
          if (blockText) {
            text += blockText + '. ';
          }
        });
      } else {
        // Inak skús získať text priamo z article.main-content
        var $mainContent = $('article.main-content .text-left');
        if ($mainContent.length > 0) {
          // Získaj všetky odseky, nadpisy atď.
          $mainContent.find('p, h1, h2, h3, h4, h5, h6, li').each(function() {
            var blockText = $(this).text().replace(/\s+/g, ' ').trim();
            if (blockText) {
              text += blockText + '. ';
            }
          });
          
          // Ak sme nenašli žiadne štruktúrované elementy, vezmi celý text
          if (!text) {
            text = $mainContent.text().replace(/\s+/g, ' ').trim();
          }
        }
      }
      
      return text;
    }

    // Play/Pause tlačidlo
    $('#speech-play-btn').on('click', function() {
      var $btn = $(this);
      var $controls = $('.speech-controls');
      var $stopBtn = $('#speech-stop-btn');

      if (!isPlaying) {
        // Začiatok prehrávania
        if (!speechText) {
          speechText = getArticleText();
        }

        if (!speechText) {
          $('.speech-error').text('Nenašiel sa žiadny text na prehranie').show();
          return;
        }

        utterance = new SpeechSynthesisUtterance(speechText);
        utterance.lang = 'sk-SK';
        utterance.rate = parseFloat($('.speech-speed-range').val()) || 1;

        utterance.onstart = function() {
          isPlaying = true;
          $btn.addClass('playing');
          $controls.show();
          $stopBtn.show();
          $('.speech-error').hide();
        };

        utterance.onend = function() {
          isPlaying = false;
          $btn.removeClass('playing');
          $controls.hide();
          $stopBtn.hide();
        };

        utterance.onerror = function(event) {
          console.error('Speech error:', event);
          $('.speech-error').text('Chyba pri prehrávaní: ' + event.error).show();
          isPlaying = false;
          $btn.removeClass('playing');
          $controls.hide();
          $stopBtn.hide();
        };

        speechSynthesis.speak(utterance);
      } else {
        // Pause/Resume
        if (speechSynthesis.paused) {
          speechSynthesis.resume();
          $btn.removeClass('paused');
        } else {
          speechSynthesis.pause();
          $btn.addClass('paused');
        }
      }
    });

    // Stop tlačidlo
    $('#speech-stop-btn').on('click', function() {
      speechSynthesis.cancel();
      isPlaying = false;
      $('#speech-play-btn').removeClass('playing paused');
      $('.speech-controls').hide();
      $(this).hide();
    });

    // Zmena rýchlosti
    $('.speech-speed-range').on('input', function() {
      var speed = parseFloat($(this).val());
      $('.speech-speed-value').text(speed + 'x');
      
      if (utterance && isPlaying) {
        utterance.rate = speed;
      }
    });
  }

  // ========== INICIALIZÁCIA ==========
  $(document).ready(function() {
    initArticleProgressBar();
    initArticleTableOfContents();
    initArticleEmotions();
    initArticleSpeech();
  });

})(jQuery);
