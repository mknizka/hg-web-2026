<?php
// PHP funkcie potrebné pre šablónu el
// Tieto funkcie sú dostupné v systéme Ellipse

// lang() - funkcia pre lokalizáciu textov
// banner() - funkcia pre získanie bannerov z databázy  
// rs_last_articles() - funkcia pre získanie posledných článkov
// themeSetup() - funkcia pre nastavenia témy
// sess() - funkcia pre prácu so session
// $content - globálna premenná s obsahom stránky
// $theme - globálna premenná s názvom témy
// DOMENA_WEBU - konštanta s doménou webu
// short() - funkcia pre skrátenie textu
// strip_tags() - PHP funkcia pre odstránenie HTML tagov
// date() - PHP funkcia pre dátum
// microtime() - PHP funkcia pre presný čas
?>
<!DOCTYPE html>
<html lang="sk">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?php echo $content['name'] ? $content['name'] : lang('Ellipse — Jeden systém pre celé ubytovanie',1); ?></title>
  <meta name="description" content="<?php echo $content['description'] ? $content['description'] : lang('Ellipse: PMS, Booking Engine, Channel Manager, RevPRO a Ella AI v jednom cloudovom ekosystéme.',1); ?>" />
  <meta name="keywords" content="<?php echo $content['keywords']; ?>">
  <link href="/img/system/favicon.ico" rel="shortcut icon">
  <meta name="robots" content="index,follow">
  <meta name="googlebot" content="snippet,archive" >
  <meta name="Generator" content="Ellipse CMS">

  <!-- Google Fonts: Montserrat variable (supports SK) -->
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300..900&display=swap" rel="stylesheet">

  <!-- GSAP & ScrollTrigger -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/TextPlugin.min.js"></script>

  <!-- Open Graph meta tags -->
  <meta property="og:locale" content="<?php echo sess("lang"); ?>_<?php echo strtoupper(sess("lang")); ?>" />
  <meta property="og:title" content="<?php echo $content['title'] ? $content['title'] : $content['name']; ?>" />
  <meta property="og:site_name" content="<?php echo DOMENA_WEBU; ?>" />
  <?php if($content['description'] != ''): ?><meta property="og:description" content="<?php echo $content['description']; ?>" /><?php endif; ?>
  <meta property="og:image" content="<?=DOMENA_WEBU?>img/system/ogimg.jpg" />
  <meta property="og:image:type" content="image/jpeg" />
  <meta property="og:image:width" content="1920" />
  <meta property="og:image:height" content="1100" />
  <meta property="og:url" content="<?=DOMENA_WEBU?>">
  
  <!-- Template CSS -->
  <link type="text/css" rel="stylesheet" href="/template/<?php echo $theme; ?>/css/ellipse.css" media="screen">
  <?php if($content['extra_css']): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $content['extra_css'];?>" media="screen">
  <?php endif; ?>
  
  <!-- jQuery -->
  <script src="/template/js/jquery-1.10.2.js"></script>
  <script src="/template/js/jquery-ui-1.10.4.custom.min.js"></script>
  
  <base href="<?=DOMENA_WEBU?>"/>
  <?php echo themeSetup('extra_header'); ?>

  <style>
    :root{
      --bg:#ffffff;
      --ink:#0e1426;
      --blue:#15223f;
      --magenta:#f2124b;
      --muted:#7c8499;
      --ring: rgba(242,18,75,.25);
      --card:#f7f8fb;
      --radius:18px;
      --container: min(1120px, 92vw);
      --dark-bg: #0a0f1c;
      --dark-blue: #1a2332;
    }

    *{box-sizing:border-box}
    html{scroll-behavior: smooth;}
    html,body{height:100%; overflow-x: hidden;}
    body{
      margin:0; background:var(--bg); color:var(--ink);
      font-family:"Montserrat",system-ui,-apple-system,Segoe UI,Roboto,Ubuntu,"Helvetica Neue",Arial,"Noto Sans",sans-serif;
      font-weight:430; line-height:1.45; letter-spacing:.01em;
    }
    a{color:var(--blue); text-decoration:none}
    a:hover{color:var(--magenta)}
    .container{width:var(--container); margin-inline:auto; position: relative;}

    /* Cursor */
    .cursor{
      position:fixed; left:0; top:0; width:20px; height:20px; border-radius:50%;
      pointer-events:none; z-index:9999; mix-blend-mode:difference;
      background:var(--magenta); transform:translate(-50%,-50%);
      transition:transform 0.1s ease;
    }
    .cursor.hover{transform:translate(-50%,-50%) scale(2);}

    /* Header */
    header.site{
      position:fixed; top:0; left:0; right:0; z-index:1000;
      backdrop-filter:saturate(180%) blur(20px);
      background:rgba(255,255,255,0.9);
      border-bottom:1px solid rgba(21,34,63,.08);
      transition: all 0.3s ease;
    }
    header.scrolled{
      background:rgba(255,255,255,0.95);
      backdrop-filter:saturate(180%) blur(30px);
    }
    .nav{display:flex; align-items:center; justify-content:space-between; gap:24px; padding:16px 4vw}
    .brand{display:flex; align-items:center; gap:12px; cursor: pointer;}
    .brand-logo{
      width:40px; height:40px; border-radius:12px; 
      background:linear-gradient(135deg,var(--blue),var(--magenta));
      position: relative; overflow: hidden;
    }
    .brand-logo::after{
      content:''; position: absolute; inset: 0;
      background: linear-gradient(45deg, transparent 30%, rgba(255,255,255,0.3) 50%, transparent 70%);
      transform: translateX(-100%);
      transition: transform 0.6s ease;
    }
    .brand:hover .brand-logo::after{transform: translateX(100%);}
    .brand-name{font-weight:800; letter-spacing:.02em; color:var(--blue); font-size: 20px;}
    .menu{display:flex; gap:24px; align-items:center; flex-wrap:wrap}
    .menu a{
      font-weight:560; color:var(--blue); opacity:.9; padding: 8px 16px;
      border-radius: 8px; transition: all 0.3s ease; position: relative;
    }
    .menu a::before{
      content: ''; position: absolute; inset: 0; border-radius: 8px;
      background: var(--magenta); opacity: 0; transform: scale(0.8);
      transition: all 0.3s ease; z-index: -1;
    }
    .menu a:hover::before{opacity: 0.1; transform: scale(1);}
    .menu a:hover{color: var(--magenta); transform: translateY(-2px);}

    /* Buttons */
    .btn{
      display:inline-flex; align-items:center; gap:10px; padding:14px 24px;
      border-radius:50px; border:2px solid var(--blue); font-weight:700; cursor:pointer;
      transition:all .3s cubic-bezier(0.4, 0, 0.2, 1);
      position:relative; isolation:isolate; background:#fff; color:var(--blue);
      overflow: hidden;
    }
    .btn::before{
      content: ''; position: absolute; inset: 0; border-radius: 50px;
      background: var(--blue); transform: translateY(100%);
      transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      z-index: -1;
    }
    .btn:hover::before{transform: translateY(0);}
    .btn:hover{color: white; transform: translateY(-3px); box-shadow: 0 10px 30px rgba(21,34,63,0.3);}
    .btn--primary{background:var(--magenta); color:white; border-color:var(--magenta)}
    .btn--primary::before{background: var(--blue);}

    /* Hero Section */
    .hero{
      min-height:100vh; display:flex; align-items:center; justify-content:center;
      position:relative; overflow: hidden;
      background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
    }
    .hero::before{
      content: ''; position: absolute; inset: 0;
      background: radial-gradient(circle at 20% 80%, rgba(242,18,75,0.1) 0%, transparent 50%),
                  radial-gradient(circle at 80% 20%, rgba(21,34,63,0.1) 0%, transparent 50%);
    }
    .hero-content{text-align: center; position: relative; z-index: 2;}
    .hero h1{
      font-size:clamp(32px,6vw,72px); line-height:1.1; margin:0 0 24px; 
      font-weight:900; color:var(--blue); position: relative;
    }
    .hero h1 .highlight{
      background: linear-gradient(135deg, var(--magenta), var(--blue));
      -webkit-background-clip: text; -webkit-text-fill-color: transparent;
      background-clip: text;
    }
    .hero p{max-width:600px; color:var(--muted); font-weight:500; font-size: 18px; margin: 0 auto 32px;}
    .cta-row{display:flex; gap:16px; justify-content: center; flex-wrap:wrap;}

    /* Floating elements */
    .floating-element{
      position: absolute; border-radius: 20px; opacity: 0.1;
      background: linear-gradient(135deg, var(--magenta), var(--blue));
    }
    .floating-element:nth-child(1){width: 100px; height: 100px; top: 20%; left: 10%;}
    .floating-element:nth-child(2){width: 60px; height: 60px; top: 60%; right: 15%;}
    .floating-element:nth-child(3){width: 80px; height: 80px; bottom: 20%; left: 20%;}

    /* Horizontal Scroll Section */
    .horizontal-scroll{
      height: 100vh; overflow: hidden; position: relative;
      background: var(--dark-bg); color: white;
    }
    .horizontal-container{
      display: flex; height: 100%; width: 400vw;
      transition: transform 0.1s ease-out;
    }
    .horizontal-panel{
      width: 100vw; height: 100%; display: flex; align-items: center; justify-content: center;
      padding: 0 5vw; position: relative;
    }
    .horizontal-panel:nth-child(1){background: linear-gradient(135deg, var(--dark-bg), var(--dark-blue));}
    .horizontal-panel:nth-child(2){background: linear-gradient(135deg, var(--dark-blue), var(--blue));}
    .horizontal-panel:nth-child(3){background: linear-gradient(135deg, var(--blue), var(--magenta));}
    .horizontal-panel:nth-child(4){background: linear-gradient(135deg, var(--magenta), var(--dark-bg));}

    .panel-content{max-width: 800px; text-align: center;}
    .panel-content h2{font-size: clamp(28px, 4vw, 48px); margin-bottom: 24px; font-weight: 800;}
    .panel-content p{font-size: 18px; opacity: 0.9; margin-bottom: 32px;}

    /* Cards with animations */
    .cards-grid{
      display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 24px; padding: 80px 0;
    }
    .card{
      background: white; border-radius: 20px; padding: 32px;
      box-shadow: 0 10px 40px rgba(21,34,63,0.1);
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      position: relative; overflow: hidden;
    }
    .card::before{
      content: ''; position: absolute; top: 0; left: 0; right: 0; height: 4px;
      background: linear-gradient(90deg, var(--magenta), var(--blue));
      transform: scaleX(0); transition: transform 0.4s ease;
    }
    .card:hover::before{transform: scaleX(1);}
    .card:hover{transform: translateY(-8px); box-shadow: 0 20px 60px rgba(21,34,63,0.15);}
    .card h3{color: var(--blue); font-weight: 700; margin-bottom: 16px; font-size: 20px;}
    .card p{color: var(--muted); line-height: 1.6;}

    /* Carousel */
    .carousel-section{
      padding: 100px 0; background: #f8fafc; overflow: hidden;
    }
    .carousel-container{
      position: relative; max-width: 1200px; margin: 0 auto;
    }
    .carousel-track{
      display: flex; transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .carousel-slide{
      min-width: 100%; padding: 0 20px;
    }
    .carousel-content{
      background: white; border-radius: 24px; padding: 48px;
      text-align: center; box-shadow: 0 20px 60px rgba(21,34,63,0.1);
    }
    .carousel-nav{
      display: flex; justify-content: center; gap: 16px; margin-top: 32px;
    }
    .carousel-btn{
      width: 50px; height: 50px; border-radius: 50%; border: none;
      background: var(--blue); color: white; cursor: pointer;
      transition: all 0.3s ease; display: flex; align-items: center; justify-content: center;
    }
    .carousel-btn:hover{background: var(--magenta); transform: scale(1.1);}
    .carousel-dots{
      display: flex; justify-content: center; gap: 8px; margin-top: 24px;
    }
    .carousel-dot{
      width: 12px; height: 12px; border-radius: 50%; border: none;
      background: rgba(21,34,63,0.3); cursor: pointer; transition: all 0.3s ease;
    }
    .carousel-dot.active{background: var(--magenta); transform: scale(1.2);}

    /* Dark section */
    .dark-section{
      background: var(--dark-bg); color: white; padding: 120px 0;
      position: relative; overflow: hidden;
    }
    .dark-section::before{
      content: ''; position: absolute; inset: 0;
      background: radial-gradient(circle at 50% 50%, rgba(242,18,75,0.1) 0%, transparent 70%);
    }
    .dark-section h2{color: white; font-size: clamp(32px, 5vw, 56px); margin-bottom: 24px;}
    .dark-section p{color: rgba(255,255,255,0.8); font-size: 18px;}

    /* Stats */
    .stats{
      display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 32px; margin-top: 48px;
    }
    .stat{text-align: center;}
    .stat-number{
      font-size: 48px; font-weight: 900; color: var(--magenta);
      display: block; margin-bottom: 8px;
    }
    .stat-label{color: rgba(255,255,255,0.7); font-weight: 600;}

    /* Responsive */
    @media (max-width: 768px) {
      .nav{flex-direction: column; gap: 16px; padding: 12px 4vw;}
      .menu{flex-direction: column; width: 100%;}
      .hero{min-height: 80vh;}
      .horizontal-container{width: 200vw;}
      .horizontal-panel{width: 50vw;}
      .cta-row{flex-direction: column; align-items: center;}
    }

    /* Loading animation */
    .loading-overlay{
      position: fixed; inset: 0; background: var(--dark-bg); z-index: 10000;
      display: flex; align-items: center; justify-content: center;
      transition: opacity 0.5s ease;
    }
    .loading-spinner{
      width: 60px; height: 60px; border: 4px solid rgba(242,18,75,0.3);
      border-top: 4px solid var(--magenta); border-radius: 50%;
      animation: spin 1s linear infinite;
    }
    @keyframes spin{
      0%{transform: rotate(0deg);}
      100%{transform: rotate(360deg);}
    }
  </style>
</head>
<body class="<?php echo $content['content_type']; ?>">
  <?php echo themeSetup('extra_body'); ?>
  
  <!-- Loading overlay -->
  <div class="loading-overlay" id="loadingOverlay">
    <div class="loading-spinner"></div>
  </div>

  <!-- Custom cursor -->
  <div class="cursor" id="cursor"></div>

  <header class="site" id="header">
    <nav class="nav container">
      <a class="brand" href="/" aria-label="Ellipse">
        <div class="brand-logo" aria-hidden="true"></div>
        <span class="brand-name">Ellipse</span>
      </a>
      <div class="menu">
        <a href="#benefits"><?php echo lang('Prínosy',1); ?></a>
        <a href="#products"><?php echo lang('Produkty',1); ?></a>
        <a href="#testimonials"><?php echo lang('Referencie',1); ?></a>
        <a href="#security"><?php echo lang('Bezpečnosť',1); ?></a>
        <a href="#pricing"><?php echo lang('Cenník',1); ?></a>
        <a class="btn" href="#demo"><?php echo lang('Získať konzultáciu',1); ?></a>
        <a class="btn btn--primary" href="#demo"><?php echo lang('Ukázať demo',1); ?></a>
      </div>
    </nav>
  </header>

  <main>
    <!-- HERO -->
    <section class="hero" id="hero">
      <div class="floating-element"></div>
      <div class="floating-element"></div>
      <div class="floating-element"></div>
      
      <div class="hero-content container">
        <h1>
          <span class="hero-text"><?php echo lang('Jeden systém pre celé',1); ?></span><br>
          <span class="highlight hero-text"><?php echo lang('ubytovanie',1); ?></span>
        </h1>
        <p class="hero-subtitle"><?php echo lang('Ellipse spája PMS, Booking Engine, Channel Manager, RevPRO a virtuálnu recepčnú Ella AI do jedného cloudového ekosystému.',1); ?></p>
        <div class="cta-row">
          <a class="btn btn--primary" href="#demo"><?php echo lang('Ukázať demo',1); ?></a>
          <a class="btn" href="#pricing"><?php echo lang('Získať kalkuláciu',1); ?></a>
        </div>
      </div>
    </section>

    <!-- HORIZONTAL SCROLL SECTION -->
    <section class="horizontal-scroll" id="horizontalScroll">
      <div class="horizontal-container" id="horizontalContainer">
        <div class="horizontal-panel">
          <div class="panel-content">
            <h2><?php echo lang('Šetrí čas',1); ?></h2>
            <p><?php echo lang('Automatizácia procesov a rutín — minimálne 3 hodiny denne späť.',1); ?></p>
            <a class="btn" href="#" style="border-color: white; color: white;"><?php echo lang('Viac info',1); ?></a>
          </div>
        </div>
        <div class="horizontal-panel">
          <div class="panel-content">
            <h2><?php echo lang('Zarába viac',1); ?></h2>
            <p><?php echo lang('RevPRO upravuje ceny podľa dopytu a obsadenosti k maximalizácii výnosu.',1); ?></p>
            <a class="btn" href="#" style="border-color: white; color: white;"><?php echo lang('Viac info',1); ?></a>
          </div>
        </div>
        <div class="horizontal-panel">
          <div class="panel-content">
            <h2><?php echo lang('Globálny predaj',1); ?></h2>
            <p><?php echo lang('Distribúcia na 300+ portáloch bez chaosu a manuálnych chýb.',1); ?></p>
            <a class="btn" href="#" style="border-color: white; color: white;"><?php echo lang('Viac info',1); ?></a>
          </div>
        </div>
        <div class="horizontal-panel">
          <div class="panel-content">
            <h2><?php echo lang('Bezpečnosť',1); ?></h2>
            <p><?php echo lang('EÚ cloud, šifrovanie, DDoS ochrana a audit práv.',1); ?></p>
            <a class="btn" href="#" style="border-color: white; color: white;"><?php echo lang('Viac info',1); ?></a>
          </div>
        </div>
      </div>
    </section>

    <!-- BENEFITS CARDS -->
    <section id="benefits" class="section" style="padding: 100px 0;">
      <div class="container">
        <h2 style="text-align: center; margin-bottom: 16px; font-size: clamp(32px, 4vw, 48px);"><?php echo lang('Čo ti Ellipse prinesie?',1); ?></h2>
        <p style="text-align: center; color: var(--muted); font-size: 18px; margin-bottom: 64px;"><?php echo lang('Jasné prínosy bez omáčok — vyber len to, čo potrebuješ.',1); ?></p>
        
        <div class="cards-grid">
          <?php
            // Skúsime získať bannery z kategórie 5 (Funkcie PMS)
            $benefits_banner = banner(5);
            if(!empty($benefits_banner)){
              foreach($benefits_banner as $k => $v){
                echo '<article class="card benefit-card">';
                echo '<h3>'.lang($v['name'],1).'</h3>';
                echo '<p>'.lang($v['text'],1).'</p>';
                echo '</article>';
              }
            } else {
              // Fallback na statické dáta
              $benefits = [
                ['t'=> 'Šetrí čas', 'd'=> 'Automatizácia procesov a rutín — minimálne 3 hodiny denne späť.'],
                ['t'=> 'Zarába', 'd'=> 'RevPRO upravuje ceny podľa dopytu a obsadenosti k maximalizácii výnosu.'],
                ['t'=> 'Globálny predaj', 'd'=> 'Distribúcia na 300+ portáloch bez chaosu a manuálnych chýb.'],
                ['t'=> 'Bez stresu', 'd'=> 'Centralizované rezervácie z Bookingu, Expedie aj tvojho webu.'],
                ['t'=> 'Prehľad 24/7', 'd'=> 'Živá dostupnosť, dashboardy a majiteľské reporty.'],
                ['t'=> 'Virtuálna recepčná', 'd'=> 'Ella AI pomáha hosťom, odpovedá a predáva doplnky 24/7.'],
              ];
              foreach($benefits as $b){
                echo '<article class="card benefit-card">';
                echo '<h3>'.lang($b['t'],1).'</h3>';
                echo '<p>'.lang($b['d'],1).'</p>';
                echo '</article>';
              }
            }
          ?>
        </div>
      </div>
    </section>

    <!-- CAROUSEL SECTION -->
    <section class="carousel-section" id="testimonials">
      <div class="container">
        <h2 style="text-align: center; margin-bottom: 16px; font-size: clamp(32px, 4vw, 48px); color: var(--blue);"><?php echo lang('Dôkazy z praxe',1); ?></h2>
        <p style="text-align: center; color: var(--muted); font-size: 18px; margin-bottom: 64px;"><?php echo lang('Reálne výsledky, skutočné príbehy.',1); ?></p>
        
        <div class="carousel-container">
          <div class="carousel-track" id="carouselTrack">
            <?php
              // Skúsime získať referencie z kategórie 2 (Referencie)
              $testimonials_banner = banner(2);
              if(!empty($testimonials_banner)){
                foreach($testimonials_banner as $k => $v){
                  echo '<div class="carousel-slide">';
                  echo '<div class="carousel-content">';
                  echo '<blockquote style="font-size: 20px; font-style: italic; margin-bottom: 24px; color: var(--blue);">'.lang($v['text'],1).'</blockquote>';
                  echo '<footer style="font-weight: 600; color: var(--magenta);">— '.lang($v['name'],1).'</footer>';
                  echo '</div>';
                  echo '</div>';
                }
              } else {
                // Fallback na statické dáta
                $quotes = [
                  ['q'=>'Bez Ellipse si nevieme predstaviť fungovanie na našej prevádzke. Denná aktualizácia cien, centralizácia rezervácií z Bookingu, Expedie aj nášho webu nám ušetrila hodiny práce a stres denne.','a'=>'Janka Lopušeková, Hotel Mamut'],
                  ['q'=>'Hotelový systém Ellipse nám scentralizoval 5 rôznych softvérov pod jednu strechu. Je prehľadný, intuitívny a priamo v admine si sami spravujeme aj náš web.','a'=>'Tomáš Sokologorský, Hotel Grand Vígľaš'],
                  ['q'=>'Jednoduchý a intuitivní systém.','a'=>'Tomáš Priščák, Camp Limoni'],
                ];
                foreach($quotes as $qt){
                  echo '<div class="carousel-slide">';
                  echo '<div class="carousel-content">';
                  echo '<blockquote style="font-size: 20px; font-style: italic; margin-bottom: 24px; color: var(--blue);">'.lang($qt['q'],1).'</blockquote>';
                  echo '<footer style="font-weight: 600; color: var(--magenta);">— '.lang($qt['a'],1).'</footer>';
                  echo '</div>';
                  echo '</div>';
                }
              }
            ?>
          </div>
          
          <div class="carousel-nav">
            <button class="carousel-btn" id="prevBtn">‹</button>
            <button class="carousel-btn" id="nextBtn">›</button>
          </div>
          
          <div class="carousel-dots" id="carouselDots"></div>
        </div>
      </div>
    </section>

    <!-- DARK SECTION WITH STATS -->
    <section class="dark-section" id="stats">
      <div class="container">
        <div style="text-align: center; margin-bottom: 64px;">
          <h2><?php echo lang('Dôveryhodný partner',1); ?></h2>
          <p><?php echo lang('Tisíce spokojných klientov po celom svete dôverujú našim riešeniam.',1); ?></p>
        </div>
        
        <div class="stats">
          <div class="stat">
            <span class="stat-number" data-count="500">0</span>
            <span class="stat-label"><?php echo lang('Spokojných klientov',1); ?></span>
          </div>
          <div class="stat">
            <span class="stat-number" data-count="99.99">0</span>
            <span class="stat-label"><?php echo lang('% Dostupnosť',1); ?></span>
          </div>
          <div class="stat">
            <span class="stat-number" data-count="24">0</span>
            <span class="stat-label"><?php echo lang('Hodín podpora',1); ?></span>
          </div>
          <div class="stat">
            <span class="stat-number" data-count="300">0</span>
            <span class="stat-label"><?php echo lang('Portálov pripojených',1); ?></span>
          </div>
        </div>
      </div>
    </section>

    <!-- FINAL CTA -->
    <section style="padding: 100px 0; text-align: center; background: linear-gradient(135deg, #f8fafc, #ffffff);">
      <div class="container">
        <h2 style="margin-bottom: 24px; font-size: clamp(32px, 4vw, 48px); color: var(--blue);"><?php echo lang('Pripravení na demo?',1); ?></h2>
        <p style="color: var(--muted); font-size: 18px; margin-bottom: 32px; max-width: 600px; margin-left: auto; margin-right: auto;"><?php echo lang('Ukážeme ti, ako môže Ellipse šetriť čas a zvyšovať výnosy už tento mesiac.',1); ?></p>
        <div class="cta-row">
          <a class="btn btn--primary" href="#" style="font-size: 18px; padding: 16px 32px;"><?php echo lang('Rezervovať demo hovor',1); ?></a>
          <a class="btn" href="#" style="font-size: 18px; padding: 16px 32px;"><?php echo lang('Stiahnuť prehľad (PDF)',1); ?></a>
        </div>
      </div>
    </section>
  </main>

  <footer style="padding: 48px 0; background: var(--dark-bg); color: white; text-align: center;">
    <div class="container">
      <p>&copy; <?php echo date('Y'); ?> Ellipse. <?php echo lang('Všetky práva vyhradené.',1); ?></p>
    </div>
  </footer>

  <script>
    // Initialize GSAP
    gsap.registerPlugin(ScrollTrigger, TextPlugin);

    // Variables
    let currentSlide = 0;
    const slides = document.querySelectorAll('.carousel-slide');
    const totalSlides = slides.length;

    // Loading animation
    window.addEventListener('load', () => {
      gsap.to('#loadingOverlay', {
        opacity: 0,
        duration: 0.5,
        onComplete: () => {
          document.getElementById('loadingOverlay').style.display = 'none';
          initAnimations();
        }
      });
    });

    // Custom cursor
    const cursor = document.getElementById('cursor');
    const interactiveElements = document.querySelectorAll('a, button, .card');

    document.addEventListener('mousemove', (e) => {
      gsap.to(cursor, {
        x: e.clientX,
        y: e.clientY,
        duration: 0.1
      });
    });

    interactiveElements.forEach(el => {
      el.addEventListener('mouseenter', () => cursor.classList.add('hover'));
      el.addEventListener('mouseleave', () => cursor.classList.remove('hover'));
    });

    // Header scroll effect
    window.addEventListener('scroll', () => {
      const header = document.getElementById('header');
      if (window.scrollY > 100) {
        header.classList.add('scrolled');
      } else {
        header.classList.remove('scrolled');
      }
    });

    // Initialize animations
    function initAnimations() {
      // Hero animations
      const tl = gsap.timeline();
      
      tl.from('.hero-text', {
        y: 100,
        opacity: 0,
        duration: 1,
        stagger: 0.2,
        ease: 'power3.out'
      })
      .from('.hero-subtitle', {
        y: 50,
        opacity: 0,
        duration: 0.8,
        ease: 'power3.out'
      }, '-=0.5')
      .from('.cta-row .btn', {
        y: 30,
        opacity: 0,
        duration: 0.6,
        stagger: 0.1,
        ease: 'power3.out'
      }, '-=0.3');

      // Floating elements animation
      gsap.to('.floating-element', {
        y: -20,
        rotation: 360,
        duration: 6,
        ease: 'none',
        repeat: -1,
        yoyo: true,
        stagger: 0.5
      });

      // Alternative: No-pin horizontal scroll (more reliable)
      const horizontalSection = document.getElementById('horizontalScroll');
      const horizontalContainer = document.getElementById('horizontalContainer');
      
      if (horizontalSection && horizontalContainer) {
        console.log('Setting up alternative horizontal scroll...');
        
        // Method 1: Try with explicit end value
        const scrollDistance = horizontalContainer.scrollWidth - window.innerWidth;
        console.log('Scroll distance:', scrollDistance);
        
        // First try the standard approach
        let scrollTriggerInstance = ScrollTrigger.create({
          trigger: horizontalSection,
          pin: true,
          scrub: 1,
          start: "top top",
          end: "+=4000", // Fixed value instead of calculation
          animation: gsap.to(horizontalContainer, {
            x: -scrollDistance,
            ease: "none"
          }),
          onUpdate: self => {
            console.log('Method 1 - Scroll progress:', self.progress.toFixed(2));
          },
          onComplete: () => {
            console.log('Method 1 - Horizontal scroll completed!');
          },
          onLeave: () => {
            console.log('Method 1 - Left horizontal section');
          }
        });

        // Fallback: If it gets stuck, kill it and use simple scroll
        setTimeout(() => {
          if (scrollTriggerInstance.progress < 0.1) {
            console.log('Switching to fallback method...');
            scrollTriggerInstance.kill();
            
            // Simple scroll without pin
            gsap.to(horizontalContainer, {
              x: -scrollDistance,
              ease: "none",
              scrollTrigger: {
                trigger: horizontalSection,
                scrub: 1,
                start: "top bottom",
                end: "bottom top",
                onUpdate: self => {
                  console.log('Fallback - Scroll progress:', self.progress.toFixed(2));
                }
              }
            });
          }
        }, 2000);

        // Panel animations
        gsap.utils.toArray('.horizontal-panel').forEach((panel, i) => {
          const content = panel.querySelector('.panel-content');
          if (content) {
            gsap.from(content, {
              opacity: 0,
              y: 50,
              duration: 0.8,
              ease: 'power3.out',
              scrollTrigger: {
                trigger: horizontalSection,
                start: "top 80%",
                end: "bottom 20%"
              }
            });
          }
        });
      }

      // Cards animation
      gsap.utils.toArray('.benefit-card').forEach((card, i) => {
        gsap.from(card, {
          y: 60,
          opacity: 0,
          duration: 0.8,
          delay: i * 0.1,
          ease: 'power3.out',
          scrollTrigger: {
            trigger: card,
            start: 'top 85%'
          }
        });
      });

      // Stats counter animation
      gsap.utils.toArray('.stat-number').forEach(stat => {
        const target = parseInt(stat.dataset.count);
        gsap.from(stat, {
          textContent: 0,
          duration: 2,
          ease: 'power2.out',
          snap: { textContent: 1 },
          scrollTrigger: {
            trigger: stat,
            start: 'top 80%'
          }
        });
      });
    }

    // Carousel functionality
    function updateCarousel() {
      const track = document.getElementById('carouselTrack');
      gsap.to(track, {
        x: -currentSlide * 100 + '%',
        duration: 0.5,
        ease: 'power2.inOut'
      });
      updateDots();
    }

    function updateDots() {
      const dots = document.querySelectorAll('.carousel-dot');
      dots.forEach((dot, i) => {
        dot.classList.toggle('active', i === currentSlide);
      });
    }

    function createDots() {
      const dotsContainer = document.getElementById('carouselDots');
      for (let i = 0; i < totalSlides; i++) {
        const dot = document.createElement('button');
        dot.className = 'carousel-dot';
        dot.addEventListener('click', () => {
          currentSlide = i;
          updateCarousel();
        });
        dotsContainer.appendChild(dot);
      }
      updateDots();
    }

    // Carousel controls
    document.getElementById('prevBtn').addEventListener('click', () => {
      currentSlide = currentSlide > 0 ? currentSlide - 1 : totalSlides - 1;
      updateCarousel();
    });

    document.getElementById('nextBtn').addEventListener('click', () => {
      currentSlide = currentSlide < totalSlides - 1 ? currentSlide + 1 : 0;
      updateCarousel();
    });

    // Auto-play carousel
    setInterval(() => {
      currentSlide = currentSlide < totalSlides - 1 ? currentSlide + 1 : 0;
      updateCarousel();
    }, 5000);

    // Initialize carousel
    if (totalSlides > 0) {
      createDots();
      updateCarousel();
    }

    // Refresh ScrollTrigger on resize
    let resizeTimer;
    window.addEventListener('resize', () => {
      clearTimeout(resizeTimer);
      resizeTimer = setTimeout(() => {
        ScrollTrigger.refresh();
      }, 250);
    });

    // Smooth scrolling for navigation links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
          gsap.to(window, {
            duration: 1,
            scrollTo: target,
            ease: 'power2.inOut'
          });
        }
      });
    });

    // Debug info for horizontal scroll
    console.log('Horizontal scroll initialized');
    console.log('Window width:', window.innerWidth);
    const horizontalContainer = document.getElementById('horizontalContainer');
    if (horizontalContainer) {
      console.log('Container width:', horizontalContainer.scrollWidth);
    }
  </script>
  
  <?php echo $content['extra_js_footer']; ?>
  <?php echo themeSetup('extra_body_end'); ?>
</body>
</html>