"use strict";

jQuery(function ($) {
  // スムーススクロール
  // ________________________________________________________
  $('a[href^="#"]').click(function () {
    var speed = 500;
    var href = $(this).attr('href');
    var target = $(href === '#' || href === '' ? 'html' : href);
    if (!target.length) return false;
    var headerHeight = $('#header').outerHeight() || 0; // ヘッダーの高さを取得
    var position = target.offset().top - headerHeight;
    $('html, body').animate({
      scrollTop: position
    }, speed, 'swing');
    return false;
  });

  // ハンバーガーメニュー
  // ________________________________________________________
  $('.l-header__trigger').on('click', function () {
    $('.l-header__trigger-line').toggleClass('is-active');
    return false;
  });
  var state = false;
  $('.l-header__trigger').on('click', function () {
    if (state == false) {
      $('html, body').css('overflow', 'hidden');
      $('body').addClass('is-open');
      state = true;
    } else {
      $('html').css('overflow', 'auto');
      $('body').css('overflow', 'clip');
      $('body').removeClass('is-open');
      state = false;
    }
  });

  // メニュー内リンククリックでメニューを閉じる
  $('.l-navi a').on('click', function () {
    $('.l-header__trigger-line').removeClass('is-active');
    $('html').css('overflow', 'auto');
    $('body').css('overflow', 'clip');
    $('body').removeClass('is-open');
    state = false;
  });
});

// 375px以下スケーリング
// ________________________________________________________
!function () {
  var viewport = document.querySelector('meta[name="viewport"]');
  function switchViewport() {
    var value = window.outerWidth > 375 ? 'width=device-width,initial-scale=1' : 'width=375';
    if (viewport.getAttribute('content') !== value) {
      viewport.setAttribute('content', value);
    }
  }
  addEventListener('resize', switchViewport, false);
  switchViewport();
}();

// header-scrolled
// ________________________________________________________
document.addEventListener('DOMContentLoaded', function () {
  var header = document.querySelector('header');
  if (!header) return;
  window.addEventListener('scroll', function () {
    if (window.scrollY > 0) {
      header.classList.add('is-scrolled');
    } else {
      header.classList.remove('is-scrolled');
    }
  });
});

// p-top-mv__fixed
// ________________________________________________________
document.addEventListener('DOMContentLoaded', function () {
  var footer = document.querySelector('footer');
  var target = document.querySelector('.p-top-mv__fixed');
  if (!footer || !target) return;
  var observer = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (entry.isIntersecting) {
        target.classList.add('is-none');
      } else {
        target.classList.remove('is-none');
      }
    });
  }, {
    root: null,
    // ビューポート
    threshold: 0 // 一部でも見えたら反応
  });
  observer.observe(footer);
});

// p-top-record
// ________________________________________________________
var items = document.querySelectorAll('.p-top-record__list-item');
var isFloat = function isFloat(n) {
  return Number(n) === n && n % 1 !== 0;
};
var getDecimalPointLength = function getDecimalPointLength(n) {
  return (String(n).split('.')[1] || '').length;
};
var observeAction = function observeAction(entries) {
  entries.forEach(function (entry) {
    if (entry.isIntersecting) {
      if (!entry.target.classList.contains('is-visible')) {
        var counterEle = entry.target.querySelector('.counter .number');
        var from = parseFloat(entry.target.dataset.from || 0);
        var to = parseFloat(entry.target.dataset.to || 0);
        var duration = parseInt(entry.target.dataset.duration) || 600;
        if (!Number.isFinite(from) || !Number.isFinite(to) || from > to) {
          return false;
        }
        var increment = to - from;
        var deciamlPointLength = getDecimalPointLength(increment);
        var startTime = performance.now();
        var _countUp = function countUp(timestamp) {
          var elapsed = performance.now() - startTime;
          var countValue = (from + elapsed / duration * increment).toFixed(deciamlPointLength);
          if (countValue >= to) {
            counterEle.innerText = to.toLocaleString();
          } else {
            counterEle.innerText = parseFloat(countValue).toLocaleString();
            requestAnimationFrame(_countUp);
          }
        };
        requestAnimationFrame(_countUp);
        entry.target.classList.add('is-visible');
      }
    }
  });
};
var options = {
  threshold: 1
};
var obsever = new IntersectionObserver(observeAction, options);
items.forEach(function (target) {
  obsever.observe(target);
});

// scroll-images
// ________________________________________________________
function initScrollSwipers() {
  function setupScrollSwiper(_ref) {
    var selector = _ref.selector,
      _ref$reverse = _ref.reverse,
      reverse = _ref$reverse === void 0 ? false : _ref$reverse;
    new Swiper(selector, {
      loop: true,
      speed: reverse ? 15000 : 15000,
      allowTouchMove: false,
      autoplay: {
        delay: 0,
        reverseDirection: reverse
      },
      spaceBetween: 20,
      // デフォルト（すべて共通）
      breakpoints: {
        0: {
          // 767px以下
          slidesPerView: 2.8,
          speed: reverse ? 15000 : 15000
        },
        768: {
          // 768px以上
          slidesPerView: 4.8,
          speed: reverse ? 15000 : 15000
        },
        1025: {
          // 1025px以上
          slidesPerView: 5.5,
          speed: reverse ? 15000 : 15000
        }
      }
    });
  }
  setupScrollSwiper({
    selector: ".swiper-scroll.reverse",
    reverse: true
  });
  setupScrollSwiper({
    selector: ".swiper-scroll.normal",
    reverse: false
  });
}
document.addEventListener("DOMContentLoaded", function () {
  initScrollSwipers();
});