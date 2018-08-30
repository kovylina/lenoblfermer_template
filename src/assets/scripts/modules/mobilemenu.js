const menuButton = document.querySelector(".hamburger-menu");
const fullscreenMenu = document.querySelector(".header__menu");

const onFullscreenMenuButtonClick = function(e) {
  e.preventDefault();
  // Покажем\скроем меню
  fullscreenMenu.classList.toggle("header__menu--active");
  // Повесим\снимем класс активности меню на кнопку для изменения картинки
  menuButton.classList.toggle("hamburger-menu--is-active");
  // Повесим\снимем класс активности меню на родительский контейнер для изменения положения
  //menuButton.parentNode.classList.toggle("hero__menu--fullscreen-menu");
};

function initMenu() {
  jQuery(".main-menu li.parent > a").click(function(eventObject) {
    return false;
  });
  jQuery(".main-menu ul").hide();
  jQuery(".main-menu li.active ul").show();
  jQuery(".main-menu li a").click(function() {
    jQuery(this)
      .next()
      .slideToggle("normal");
  });
}
jQuery(document).ready(function() {
  initMenu();
  menuButton.addEventListener("click", onFullscreenMenuButtonClick);
});
