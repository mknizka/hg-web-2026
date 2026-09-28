<?php require_once __DIR__.'/hg_site.php'; $nap = hg_nap(); $logoSrc = hg_asset('ellipse-logo.svg'); ?>
  <footer class="hg-site-footer">
    <div class="footer-brand">
      <a class="brand inverse" href="/#top"><img src="<?php echo hg_esc($logoSrc); ?>" alt="Ellipse" width="158" height="55"></a>
      <p><?php echo hg_lang('All-in-one cloudová platforma<br>pre modernú HORECA prevádzku.', 'An all-in-one cloud platform<br>for a modern HORECA operation.'); ?></p>
      <div class="footer-apps" aria-label="Stiahnuť Ellipse Team">
        <span class="footer-apps-label">Ellipse Team</span>
        <div class="footer-store-links">
          <a href="https://apps.apple.com/sk/app/ellipse-team/id6806602365?l=sk" target="_blank" rel="noopener" aria-label="Stiahnuť Ellipse Team z App Store"><img src="/template/ellipse/img/badge-appstore-dark.svg" alt="Stiahnuť v App Store" width="120" height="40" loading="lazy"></a>
          <a href="https://play.google.com/store/apps/details?id=com.ellipsecloud.team&amp;hl=sk" target="_blank" rel="noopener" aria-label="Stiahnuť Ellipse Team z Google Play"><img src="/template/ellipse/img/badge-googleplay.png" alt="Získajte to na Google Play" width="135" height="40" loading="lazy"></a>
        </div>
      </div>
    </div>
    <div>
      <b><?php echo hg_lang('Platforma', 'Platform'); ?></b>
      <a href="/hotelovy-system/"><?php echo hg_lang('Hotelový PMS', 'Hotel PMS'); ?></a>
      <a href="/web-booking/"><?php echo hg_lang('Booking engine', 'Booking engine'); ?></a>
      <a href="/pos-systemy/"><?php echo hg_lang('Gastro a POS', 'F&B and POS'); ?></a>
      <a href="/#platby"><?php echo hg_lang('Online a POS platby', 'Online and POS payments'); ?></a>
      <a href="/#loyalty">Ellipse Loyalty &amp; CRM</a>
      <a href="/virtualna-recepcia-ella-ai/">Ella AI</a>
      <a href="/#mcp"><?php echo hg_lang('MCP konektor', 'MCP connector'); ?></a>
      <a href="/vstupy-a-akvaparky/"><?php echo hg_lang('Aquapark', 'Waterpark'); ?></a>
    </div>
    <div>
      <b><?php echo hg_lang('Spoločnosť', 'Company'); ?></b>
      <a href="/#referencie"><?php echo hg_lang('Referencie', 'References'); ?></a>
      <a href="/blog/">Blog</a>
      <a href="/kontakt/"><?php echo hg_lang('Kontakt', 'Contact'); ?></a>
      <a href="/cennik/"><?php echo hg_lang('Cenník', 'Pricing'); ?></a>
    </div>
    <div>
      <b><?php echo hg_lang('Kontakt', 'Contact'); ?></b>
      <a href="mailto:<?php echo hg_esc($nap['email']); ?>"><?php echo hg_esc($nap['email']); ?></a>
      <a href="tel:<?php echo hg_esc($nap['phone']); ?>"><?php echo hg_esc($nap['phone_display']); ?></a>
      <span><?php echo hg_esc($nap['street'].', '.$nap['city']); ?></span>
      <span>Slovensko</span>
    </div>
    <div class="copyright">© <?php echo date('Y'); ?> <?php echo hg_esc($nap['name']); ?> <span><a href="/gdpr/"><?php echo hg_lang('Ochrana súkromia', 'Privacy'); ?></a> · <a href="/vop/">VOP</a></span></div>
  </footer>
