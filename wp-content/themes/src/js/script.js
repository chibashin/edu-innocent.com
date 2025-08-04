jQuery(function ($) {

// スムーススクロール
// ________________________________________________________
$('a[href^="#"]').click(function () {
  let speed = 500;
  let href = $(this).attr('href');
  let target = $(href === '#' || href === '' ? 'html' : href);

  if (!target.length) return false;

  let headerHeight = $('#header').outerHeight() || 0; // ヘッダーの高さを取得
  let position = target.offset().top - headerHeight;

  $('html, body').animate({ scrollTop: position }, speed, 'swing');
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
!(function () {
  const viewport = document.querySelector('meta[name="viewport"]');
  function switchViewport() {
    const value = window.outerWidth > 375 ? 'width=device-width,initial-scale=1' : 'width=375';
    if (viewport.getAttribute('content') !== value) {
      viewport.setAttribute('content', value);
    }
  }
  addEventListener('resize', switchViewport, false);
  switchViewport();
})();


// header-scrolled
// ________________________________________________________
document.addEventListener('DOMContentLoaded', () => {
  const header = document.querySelector('header');
  if (!header) return;

  window.addEventListener('scroll', () => {
    if (window.scrollY > 0) {
      header.classList.add('is-scrolled');
    } else {
      header.classList.remove('is-scrolled');
    }
  });
});

// p-top-mv__fixed
// ________________________________________________________
document.addEventListener('DOMContentLoaded', () => {
  const footer = document.querySelector('footer');
  const target = document.querySelector('.p-top-mv__fixed');

  if (!footer || !target) return;

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          target.classList.add('is-none');
        } else {
          target.classList.remove('is-none');
        }
      });
    },
    {
      root: null, // ビューポート
      threshold: 0, // 一部でも見えたら反応
    }
  );

  observer.observe(footer);
});

// p-top-record
// ________________________________________________________
const items = document.querySelectorAll( '.p-top-record__list-item' );

const isFloat = ( n ) => {
  return Number( n ) === n && n % 1 !== 0;
}

const getDecimalPointLength =( n ) => {
  return ( String( n ).split( '.' )[1] || '' ).length;
}

const observeAction = ( entries ) => {
  entries.forEach( entry => {
    if ( entry.isIntersecting ) {
      if ( ! entry.target.classList.contains( 'is-visible' ) ) {
        const counterEle = entry.target.querySelector( '.counter .number' );
        const from = parseFloat( entry.target.dataset.from || 0 );
        const to = parseFloat( entry.target.dataset.to || 0 );
        const duration = parseInt( entry.target.dataset.duration ) || 600;

        if ( !Number.isFinite( from ) || !Number.isFinite( to ) || from > to ) {
          return false;
        }

        const increment = to - from;
        const deciamlPointLength = getDecimalPointLength( increment );
        const startTime = performance.now();

        const countUp = ( timestamp ) => {
          const elapsed = performance.now() - startTime;
          const countValue = ( from + ( ( elapsed / duration ) * increment ) ).toFixed( deciamlPointLength );

          if ( countValue >= to ) {
            counterEle.innerText = to.toLocaleString();
          } else {
            counterEle.innerText = parseFloat( countValue ).toLocaleString();
            requestAnimationFrame( countUp );
          }
        }

        requestAnimationFrame( countUp );

        entry.target.classList.add( 'is-visible' );
      }
    }
  } );
}

const options = {
  threshold: 1,
}

const obsever = new IntersectionObserver( observeAction, options );

items.forEach( target => {
  obsever.observe( target );
} );


// scroll-images
// ________________________________________________________
function initScrollSwipers() {
  function setupScrollSwiper({ selector, reverse = false }) {
    new Swiper(selector, {
      loop: true,
      speed: reverse ? 15000 : 15000,
      allowTouchMove: false,
      autoplay: {
        delay: 0,
        reverseDirection: reverse,
      },
      spaceBetween: 20, // デフォルト（すべて共通）
      breakpoints: {
        0: { // 767px以下
          slidesPerView: 2.8,
          speed: reverse ? 15000 : 15000,
        },
        768: { // 768px以上
          slidesPerView: 4.8,
          speed: reverse ? 15000 : 15000,
        },
        1025: { // 1025px以上
          slidesPerView: 5.5,
          speed: reverse ? 15000 : 15000,
        },
      },
    });
  }

  setupScrollSwiper({
    selector: ".swiper-scroll.reverse",
    reverse: true,
  });

  setupScrollSwiper({
    selector: ".swiper-scroll.normal",
    reverse: false,
  });
}

document.addEventListener("DOMContentLoaded", function () {
  initScrollSwipers();
});
