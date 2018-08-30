
<?php
 defined( '_JEXEC' ) or die( 'Restricted access' );
 $app = JFactory::getApplication();
 $menu = $app->getMenu();   
 JHtml::_('behavior.framework', true);
?>
<?php echo '<?'; ?>xml version="1.0" encoding="<?php echo $this->_charset ?>"?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    
    <jdoc:include type="head" />
    
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link rel="stylesheets" href="css/template.min.css">
  </head>
  <body>
    <div class="wrapper">
      <header class="header section">
        <div class="header__login">
          <div class="container">
             <jdoc:include type="modules" name="drawer" style="xhtml" />  </div>
        </div>
        <div class="header__hero">
          <div class="container">
            <div class="hero">
              <div class="hero__logo"><a class="hero__logo-link" href="/"><img class="hero__logo-img" src="/templates/fermertemplate/images/logo.png" alt="Ассоциация крестьянских (фермерских) хозяйств, личных подсобных хозяйств и кооперативов Ленинградской области и Санкт-Петербурга"></a></div>
              <div class="hero__title">
                <h1 class="hero__name">Ассоциация крестьянских (фермерских) хозяйств, личных подсобных хозяйств и кооперативов Ленинградской области и Санкт-Петербурга</h1>
              </div>
            </div>
          </div>
        </div>
        <div class="header__menu">
          <div class="container">
            <nav class="main-menu"><jdoc:include type="modules" name="menu" style="xhtml" /></nav>
          </div>
        </div>
      </header>
      <section class="main section">
        <div class="container">
          <div class="content">
            <jdoc:include type="message" />  
                    
            <?php if(JRequest::getVar('view') != "frontpage" ) : ?>
              <jdoc:include type="component" /> 
            <?php endif; ?> 
            <jdoc:include type="modules" name="content" style="xhtml" />   
              
          </div>
        </div>
      </section>
      
      <?php if ($this->countModules('feature')) : ?>   
      <section class="feature-wrapper">
        <div class="container">
          <div class="feature"><jdoc:include type="modules" name="feature" style="xhtml" />  </div>
        </div>
      </section>  
      <?php endif;?> 
      
      
      <?php if ($this->countModules('showcase')) : ?>
      <section class="showcase-wrapper">
        <div class="container">
          <div class="showcase">
            <jdoc:include>type="modules" name="showcase" style="xhtml" />  </jdoc:include>
          </div>
        </div>
      </section>   
      <?php endif;?> 
      
      
      <?php if ($this->countModules('inset')) : ?> 
      <section class="shop-wrapper">
        <div class="container">
          <div class="shop"><jdoc:include type="modules" name="inset" style="xhtml" />     </div>
        </div>
      </section>   
      <?php endif;?> 
      
      <footer class="footer">
        <div class="container">
          <div class="footer__row">
            <div class="footer__column footer__about-menu"><jdoc:include type="modules" name="about" style="xhtml" /></div>
            <div class="footer__column footer__contacts"><jdoc:include type="modules" name="contact" style="xhtml" /></div>
          </div>
          <div class="footer__row">
            <div class="footer__column footer__copyright">
              <div class="copyright">
                <Copyright>© 2016 Ассоциация крестьянских (фермерских) хозяйств, личных подсобных хозяйств и кооперативов Ленинградской области и Санкт-Петербурга. Все права защищены.   </Copyright>
              </div>
            </div>
            <div class="footer__column footer__author">
              <p>Разработка сайта <a class="footer__author-link" href="https://vk.com/tatyana.kovylina" follow="nofollow" target="_blank">Luzdosol</a></p>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </body>
</html>