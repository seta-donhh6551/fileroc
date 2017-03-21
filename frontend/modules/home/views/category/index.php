<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$navigator = [
	[
		'url' => Yii::getAlias('@web').'/'.$infoCate['rewrite'],
		'title' => $infoCate['name']
	]
];
if(isset($infoSubCate)){
	$navigator[] = ['url' => Yii::getAlias('@web').'/'.$infoCate['rewrite'].'/'.$infoSubCate['rewrite'],'title' => $infoSubCate['name']];
	$navigator[] = [
		'url' => Yii::getAlias('@web').'/'.$infoCate['rewrite'].'/'.$infoSubCate['rewrite'].'/'.$model->rewrite,
		'title' => $model->name
	];

}else{
	$navigator[] = ['url' => Yii::getAlias('@web').'/'.$infoCate['rewrite'].'/'.$subCategory['rewrite'],'title' => $subCategory['titleMenu']];
}
?>
<div class="content-wrapper">
    <div id="content-main" class="container nopadding ">
       <div id="sidebar-left" class="category-page-box-fix">
          <ol id="category-navigation">
             <li class="highlighted category-level-1">
                <h3>
                   <a class="internal-link" href="index.html" title="Firewalls and Security">Firewalls and Security</a>
                </h3>
             <li class=" category-level-2">
                <a class="internal-link" href="http://filehippo.com/software/security/firewalls/" title="">Firewalls</a>
             </li>
             <li class=" category-level-2">
                <a class="internal-link" href="http://filehippo.com/software/security/encryption/" title="">Data Encryption</a>
             </li>
             <li class=" category-level-2">
                <a class="internal-link" href="http://filehippo.com/software/security/diagnostics/" title="">Diagnostics</a>
             </li>
             </li>
          </ol>
          <div class="hidden-sm hidden-xs">
             <ul id="category-popular-software">
                <li>Popular software</li>
                <li>
                   <a class="internal-link" href="http://filehippo.com/download_folder_lock/" title="Folder Lock 7.5.6">
                   <img src="http://cache.filehippo.com/img/ex/5063t__folder_lock_icon.png"/>Folder Lock 7.5.6</a>
                </li>
                <li>
                   <a class="internal-link" href="http://filehippo.com/download_peerblock/" title="PeerBlock 1.2">
                   <img src="http://cache.filehippo.com/img/ex/1326t__peerblock1_icon.png"/>PeerBlock 1.2</a>
                </li>
                <li>
                   <a class="internal-link" href="http://filehippo.com/download_anvi_folder_locker_free/" title="Anvi Folder Locker Free 1.2">
                   <img src="http://cache.filehippo.com/img/ex/5110t__anvifolderlocker_icon.png"/>Anvi Folder Locker Free 1.2</a>
                </li>
                <li>
                   <a class="internal-link" href="http://filehippo.com/download_nmap/" title="Nmap 7.12">
                   <img src="http://cache.filehippo.com/img/ex/1805t__nmap_icon.png"/>Nmap 7.12</a>
                </li>
                <li>
                   <a class="internal-link" href="http://filehippo.com/download_comodo/" title="Comodo Internet Security 8.4.0.5076">
                   <img src="http://cache.filehippo.com/img/ex/1295t__comodo_icon.png"/>Comodo Internet Security 8.4.0.5076</a>
                </li>
                <li>
                   <a class="internal-link" href="http://filehippo.com/download_truecrypt/" title="TrueCrypt 7.2">
                   <img src="http://cache.filehippo.com/img/ex/129t__truecrypt.png"/>TrueCrypt 7.2</a>
                </li>
             </ul>
          </div>
          <div id="ad-slot-4" class="hidden-xs">
             <!-- Categories_Security_skyscraper -->
             <!--dfp_skyscraper -->
             <div class="ad-unit-label" style="color: #869aab;font-size: 11px;margin-bottom: 2px;">Advertisement</div>
             <div id='div-gpt-ad-1384762460430-934a43e13eb4400186a6ebc8285dd946' style=''>
                <img src="<?= Yii::$app->request->baseUrl; ?>img/adsense-160x600.jpg" width="160" />
             </div>
          </div>
       </div>
       <div id="category-header">
          <div class="category-breadcrumbs">
             <div class="category-breadcrumb-entry">
                <h1>Security Software</h1>
             </div>
          </div>
       </div>
       <div id="main-column">
          <div class="adsense-words">
             <div id="afs_div_container-0">
                <!-- <script async="async" src="https://www.google.com/adsense/search/ads.js"></script>
                <script type="text/javascript" charset="utf-8">
                   (function(g,o){g[o]=g[o]||function(){(g[o]['q']=g[o]['q']||[]).push(
                   arguments)},g[o]['t']=1*new Date})(window,'_googCsa');
                </script> -->
             </div>
             <!--AFS A-->

          </div>
          <div id="programs-list">
             <div class="program-entry">
                <div class="program-entry-header">
                   <a href="http://filehippo.com/download_comodo/" class="internal-link">
                      <img src="http://cache.filehippo.com/img/ex/1295__comodo_icon.png" alt="Download Comodo Internet Security"/>
                      <span class="program-title-text">
                         <h3>Comodo Internet Security</h3>
                      </span>
                   </a>
                </div>
                <div class="program-entry-download-button category-page-box-fix">
                   <a href="http://filehippo.com/download_comodo/" class="green program-entry-download-link button-link">
                   <span class="sprite download-icon-white"></span>Download</a>
                </div>
                <div class="program-entry-details">Comodo - 5.20MB (Freeware)</div>
                <div class="program-entry-description">
                   Comodo Internet Security is a free, security app that provides complete protection from virus attacks, Trojans, worms, buffer overflows, zero-day at...
                </div>
                <ul class="child-programs">
                </ul>
             </div>
             <div class="program-entry">
                <div class="program-entry-header">
                   <a href="http://filehippo.com/download_sunbelt_personal_firewall/" class="internal-link">
                      <img src="http://cache.filehippo.com/img/ex/22__keriopf.png" alt="Download Sunbelt Personal Firewall"/>
                      <span class="program-title-text">
                         <h3>Sunbelt Personal Firewall</h3>
                      </span>
                   </a>
                </div>
                <div class="program-entry-download-button category-page-box-fix">
                   <a href="http://filehippo.com/download_sunbelt_personal_firewall/" class="green program-entry-download-link button-link">
                   <span class="sprite download-icon-white"></span>Download</a>
                </div>
                <div class="program-entry-details">Sunbelt Software - 5.72MB (Non-Commercial Freeware)</div>
                <div class="program-entry-description">
                   Protect yourself from hackers. Secure your PC with a 100% free firewall download. Sunbelt Personal Firewall (SPF), previously known as Kerio Firewall,...
                </div>
                <ul class="child-programs">
                </ul>
             </div>
             <div class="program-entry">
                <div class="program-entry-header">
                   <a href="http://filehippo.com/download_sygate_personal_firewall/" class="internal-link">
                      <img src="http://cache.filehippo.com/img/ex/31__sygate.png" alt="Download Sygate Personal Firewall"/>
                      <span class="program-title-text">
                         <h3>Sygate Personal Firewall</h3>
                      </span>
                   </a>
                </div>
                <div class="program-entry-download-button category-page-box-fix">
                   <a href="http://filehippo.com/download_sygate_personal_firewall/" class="green program-entry-download-link button-link">
                   <span class="sprite download-icon-white"></span>Download</a>
                </div>
                <div class="program-entry-details">Sygate Technologies - 8.80MB (Freeware)</div>
                <div class="program-entry-description">
                   Free for personal use, Sygate Personal Firewall provides best of breed security in a user friendly interface, protecting your PC from hackers, trojans...
                </div>
                <ul class="child-programs">
                </ul>
             </div>
             <div class="program-entry">
                <div class="program-entry-header">
                   <a href="http://filehippo.com/download_zonealarm_free_firewall/" class="internal-link">
                      <img src="http://cache.filehippo.com/img/ex/971__zoneAlarm2.gif" alt="Download ZoneAlarm Free Firewall"/>
                      <span class="program-title-text">
                         <h3>ZoneAlarm Free Firewall</h3>
                      </span>
                   </a>
                </div>
                <div class="program-entry-download-button category-page-box-fix">
                   <a href="http://filehippo.com/download_zonealarm_free_firewall/" class="green program-entry-download-link button-link">
                   <span class="sprite download-icon-white"></span>Download</a>
                </div>
                <div class="program-entry-details">Zone Labs - 5.68MB (Non-Commercial Freeware)</div>
                <div class="program-entry-description">
                   ZoneAlarm Free Firewall blocks hackers from infiltrating your home PC by hiding your computer from unsolicited network traffic. By detecting and preve...
                </div>
                <ul class="child-programs">
                </ul>
             </div>
             <div class="program-entry">
                <div class="program-entry-header">
                   <a href="http://filehippo.com/download_360_total_security_essential/" class="internal-link">
                      <img src="http://cache.filehippo.com/img/ex/3064__360internetsecurity.png" alt="Download 360 Total Security Essential"/>
                      <span class="program-title-text">
                         <h3>360 Total Security Essential</h3>
                      </span>
                   </a>
                </div>
                <div class="program-entry-download-button category-page-box-fix">
                   <a href="http://filehippo.com/download_360_total_security_essential/" class="green program-entry-download-link button-link">
                   <span class="sprite download-icon-white"></span>Download</a>
                </div>
                <div class="program-entry-details">QIHU 360 - 31.09MB (Freeware)</div>
                <div class="program-entry-description">
                   QIHU’s 360 Total Security Essential (previously named 360 Internet Security) is a quality, free antivirus product.
                   The software carries out essential...
                </div>
                <ul class="child-programs">
                </ul>
             </div>
             <div class="program-entry">
                <div class="program-entry-header">
                   <a href="http://filehippo.com/download_abelssoft-antilogger/" class="internal-link">
                      <img src="http://cache.filehippo.com/img/ex/8002__antilogger_icon.png" alt="Download Abelssoft AntiLogger"/>
                      <span class="program-title-text">
                         <h3>Abelssoft AntiLogger</h3>
                      </span>
                   </a>
                </div>
                <div class="program-entry-download-button category-page-box-fix">
                   <a href="http://filehippo.com/download_abelssoft-antilogger/" class="green program-entry-download-link button-link">
                   <span class="sprite download-icon-white"></span>Download</a>
                </div>
                <div class="program-entry-details">Abelssoft - 3.38MB (Commercial Trial)</div>
                <div class="program-entry-description">
                   Keyloggers are well designed software programs that can monitor and record every keystroke on your computer. Whilst an Antivirus suite and firewall ...
                </div>
                <ul class="child-programs">
                </ul>
             </div>
             <div class="program-entry">
                <div class="program-entry-header">
                   <a href="http://filehippo.com/download_advanced-password-manager/" class="internal-link">
                      <img src="http://cache.filehippo.com/img/ex/7748__advanced_password_manager_icon.png" alt="Download Advanced Password Manager"/>
                      <span class="program-title-text">
                         <h3>Advanced Password Manager</h3>
                      </span>
                   </a>
                </div>
                <div class="program-entry-download-button category-page-box-fix">
                   <a href="http://filehippo.com/download_advanced-password-manager/" class="green program-entry-download-link button-link">
                   <span class="sprite download-icon-white"></span>Download</a>
                </div>
                <div class="program-entry-details">Advanced Password Manager - 5.60MB (Commercial Demo)</div>
                <div class="program-entry-description">
                   Advanced Password Manager is a fairly lightweight app that is able to detect and delete identity traces from your computer system after saving them ...
                </div>
                <ul class="child-programs">
                </ul>
             </div>
             <div class="program-entry">
                <div class="program-entry-header">
                   <a href="http://filehippo.com/download_anvi_folder_locker_free/" class="internal-link">
                      <img src="http://cache.filehippo.com/img/ex/5110__anvifolderlocker_icon.png" alt="Download Anvi Folder Locker Free"/>
                      <span class="program-title-text">
                         <h3>Anvi Folder Locker Free</h3>
                      </span>
                   </a>
                </div>
                <div class="program-entry-download-button category-page-box-fix">
                   <a href="http://filehippo.com/download_anvi_folder_locker_free/" class="green program-entry-download-link button-link">
                   <span class="sprite download-icon-white"></span>Download</a>
                </div>
                <div class="program-entry-details">Anvsoft Corporation - 13.95MB (Freeware)</div>
                <div class="program-entry-description">
                   Anvi Folder Locker is a free security tool that has been developed to help you manage and protect your 
                   important files. With Anvi Folder Locker, you...
                </div>
                <ul class="child-programs">
                </ul>
             </div>
             <div class="program-entry">
                <div class="program-entry-header">
                   <a href="http://filehippo.com/download_ashampoo_privacy_protector/" class="internal-link">
                      <img src="http://cache.filehippo.com/img/ex/5279__ashampoo_privacy_protector_icon.png" alt="Download Ashampoo Privacy Protector"/>
                      <span class="program-title-text">
                         <h3>Ashampoo Privacy Protector</h3>
                      </span>
                   </a>
                </div>
                <div class="program-entry-download-button category-page-box-fix">
                   <a href="http://filehippo.com/download_ashampoo_privacy_protector/" class="green program-entry-download-link button-link">
                   <span class="sprite download-icon-white"></span>Download</a>
                </div>
                <div class="program-entry-details">Ashampoo GmbH & Co.KG - 21.40MB (Commercial Trial)</div>
                <div class="program-entry-description">
                   Ashampoo Privacy Protector is a great security tool that combines encryption, archiving and trace removal in one application. AES256-encrypted files c...
                </div>
                <ul class="child-programs">
                </ul>
             </div>
             <div class="program-entry">
                <div class="program-entry-header">
                   <a href="http://filehippo.com/download_axcrypt/" class="internal-link">
                      <img src="http://cache.filehippo.com/img/ex/7765__axcrypt_transparent_converted (1).png" alt="Download AxCrypt"/>
                      <span class="program-title-text">
                         <h3>AxCrypt</h3>
                      </span>
                   </a>
                </div>
                <div class="program-entry-download-button category-page-box-fix">
                   <a href="http://filehippo.com/download_axcrypt/" class="green program-entry-download-link button-link">
                   <span class="sprite download-icon-white"></span>Download</a>
                </div>
                <div class="program-entry-details">AxCrypt AB - 5.70MB (Open Source)</div>
                <div class="program-entry-description">
                   AxCrypt is a highly secure data encryption app that provides AES-128/256 file encryption and compression for Windows. It has a simple interface and ...
                </div>
                <ul class="child-programs">
                </ul>
             </div>
          </div>
          <div class="adsense-words">
             <div id="afs_div_container-1">
                <script async="async" src="https://www.google.com/adsense/search/ads.js"></script>
                <script type="text/javascript" charset="utf-8">
                   (function(g,o){g[o]=g[o]||function(){(g[o]['q']=g[o]['q']||[]).push(
                   arguments)},g[o]['t']=1*new Date})(window,'_googCsa');
                </script>
             </div>
          </div>
          <div class="pager-container">
             <span class="pager-current-page">1</span>
             <a href="http://filehippo.com/software/security/2/" class="pager-page-link">2</a>
             <a href="http://filehippo.com/software/security/3/" class="pager-page-link">3</a>
             <a href="http://filehippo.com/software/security/4/" class="pager-page-link">4</a>
             <a href="http://filehippo.com/software/security/5/" class="pager-page-link">5</a>
             <a href="http://filehippo.com/software/security/6/" class="pager-page-link">6</a>
             <a href="http://filehippo.com/software/security/7/" class="pager-page-link">7</a>
             <a href="http://filehippo.com/software/security/2/" class="pager-next-link">Next</a>    
          </div>
       </div>
       <div id="sidebar-right" class="hidden-sm hidden-xs">
          <div id="ad-slot-2">
             <!-- Categories_Security_Top_MPU -->
             <!--dfp_topMpu -->
             <div class="ad-unit-label" style="color: #869aab;font-size: 11px;margin-bottom: 2px;">Advertisement</div>
             <div id='div-gpt-ad-1384762460430-922df1082d0048deb70a07ef4e1e443f' style=''>
                <img src="<?= Yii::$app->request->baseUrl; ?>img/ads-google-300.jpg" width="300" />
             </div>
          </div>
          <div id="techbeat-widget">
             <header><a href="http://news.filehippo.com/" target="_blank">Latest Software News</a></header>
             <script type="text/javascript" src="http://news.filehippo.com/wp-content/custom-php/tbrecentposts3.php?th=1&amp;c=4&amp;s=&amp;cat=software"></script>
          </div>
          <div id="ad-slot-3">
             <!-- Categories_Security_Bottom_MPU -->
             <!--dfp_bottomMpu -->
             <div class="ad-unit-label" style="color: #869aab;font-size: 11px;margin-bottom: 2px;">Advertisement</div>
             <div id='div-gpt-ad-1384762460430-dd0ef69811094147b6cb26aedb86de52' style=''>
                <img src="<?= Yii::$app->request->baseUrl; ?>img/mobile-leaderboard.png" width="300" />
             </div>
          </div>
       </div>
    </div>
 </div>