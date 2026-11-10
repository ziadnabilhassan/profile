/* =====================================================
   VOLTERA PREMIUM NAVBAR
===================================================== */

const header = document.getElementById("site-header");

const mobileMenuBtn = document.getElementById("mobile-menu-btn");

const mobileMenu = document.getElementById("mobile-menu");

/* =====================================================
   NAVBAR SCROLL
===================================================== */

if (header) {
  const updateNavbar = () => {
    if (window.scrollY > 40) {
      header.classList.add("scrolled");
    } else {
      header.classList.remove("scrolled");
    }
  };

  window.addEventListener("scroll", updateNavbar, {
    passive: true,
  });

  updateNavbar();
}

/* =====================================================
   SCROLL PROGRESS BAR
===================================================== */

const scrollProgress = document.getElementById("scroll-progress");

if (scrollProgress) {
  const updateScrollProgress = () => {
    const scrollTop = window.scrollY;
    const docHeight =
      document.documentElement.scrollHeight - window.innerHeight;
    const pct = docHeight > 0 ? (scrollTop / docHeight) * 100 : 0;

    scrollProgress.style.width = `${pct}%`;
  };

  window.addEventListener("scroll", updateScrollProgress, { passive: true });

  updateScrollProgress();
}

/* =====================================================
   MAGNETIC NAV GLOW
===================================================== */

const navBarEl = document.querySelector(".voltera-nav");

const navGlow = document.querySelector(".nav-glow");

if (navBarEl && navGlow) {
  navBarEl.addEventListener("mousemove", (event) => {
    const rect = navBarEl.getBoundingClientRect();

    navGlow.style.setProperty("--mx", `${event.clientX - rect.left}px`);
    navGlow.style.setProperty("--my", `${event.clientY - rect.top}px`);
  });
}

/* =====================================================
   MOBILE MENU
===================================================== */

if (mobileMenuBtn && mobileMenu) {
  mobileMenuBtn.addEventListener("click", () => {
    const isOpen = mobileMenu.classList.toggle("open");

    mobileMenuBtn.classList.toggle("open", isOpen);

    mobileMenuBtn.setAttribute("aria-expanded", isOpen);
  });

  /* =================================================
       CLOSE AFTER CLICK (only non-toggle links)
    ================================================= */

  document.querySelectorAll(".mobile-link:not(.mobile-dropdown-toggle)").forEach((link) => {
    link.addEventListener("click", () => {
      mobileMenu.classList.remove("open");
      mobileMenuBtn.classList.remove("open");
      mobileMenuBtn.setAttribute("aria-expanded", "false");
    });
  });

  /* =================================================
       MOBILE DROPDOWN GROUPS — generic handler for all
    ================================================= */

  document.querySelectorAll(".mobile-dropdown-toggle").forEach((toggle) => {
    toggle.addEventListener("click", (e) => {
      e.stopPropagation();
      const group = toggle.closest(".mobile-dropdown-group");
      const sub = group.querySelector(".mobile-sub-links");
      const chevron = toggle.querySelector(".mobile-chevron-icon");
      if (!sub) return;
      const isOpen = sub.classList.toggle("open");
      group.classList.toggle("open", isOpen);
      if (chevron) chevron.style.transform = isOpen ? "rotate(180deg)" : "";
    });
  });

  /* =================================================
       CLOSE WHEN CLICKING OUTSIDE
    ================================================= */

  document.addEventListener("click", (event) => {
    if (
      !header.contains(event.target) &&
      mobileMenu.classList.contains("open")
    ) {
      mobileMenu.classList.remove("open");

      mobileMenuBtn.classList.remove("open");

      mobileMenuBtn.setAttribute("aria-expanded", "false");
    }
  });

  /* =================================================
       ESCAPE
    ================================================= */

  document.addEventListener("keydown", (event) => {
    if (event.key === "Escape" && mobileMenu.classList.contains("open")) {
      mobileMenu.classList.remove("open");

      mobileMenuBtn.classList.remove("open");

      mobileMenuBtn.setAttribute("aria-expanded", "false");
    }
  });
}

/* =====================================================
   DESKTOP NAV — SLIDING INDICATOR + SCROLLSPY
===================================================== */

const navList = document.getElementById("desktop-nav");

const navIndicator = document.getElementById("nav-indicator");

const navLinks = navList
  ? Array.from(navList.querySelectorAll(".nav-item"))
  : [];

if (navList && navIndicator && navLinks.length) {
  const moveIndicatorTo = (link) => {
    if (!link) return;

    navIndicator.style.width = `${link.offsetWidth}px`;
    navIndicator.style.transform = `translateX(${link.offsetLeft}px)`;
    navIndicator.style.opacity = "1";
  };

  const getActiveLink = () =>
    navLinks.find((l) => l.classList.contains("active")) || navLinks[0];

  /* Position on load, after fonts/layout settle */

  requestAnimationFrame(() => moveIndicatorTo(getActiveLink()));

  /* Hover glides the indicator to the hovered item */

  navLinks.forEach((link) => {
    link.addEventListener("mouseenter", () => moveIndicatorTo(link));
  });

  /* Leaving the nav returns it to the active section */

  navList.addEventListener("mouseleave", () =>
    moveIndicatorTo(getActiveLink()),
  );

  /* Scrollspy: highlight + slide indicator to the section in view */

  const sections = navLinks
    .map((link) => document.querySelector(link.getAttribute("href")))
    .filter(Boolean);

  const spyObserver = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          const targetHref = `#${entry.target.id}`;

          navLinks.forEach((l) => {
            l.classList.toggle("active", l.getAttribute("href") === targetHref);
          });

          moveIndicatorTo(getActiveLink());
        }
      });
    },
    {
      rootMargin: "-45% 0px -50% 0px",
      threshold: 0,
    },
  );

  sections.forEach((section) => spyObserver.observe(section));

  /* Keep indicator aligned on resize */

  window.addEventListener("resize", () => moveIndicatorTo(getActiveLink()));
}

/* =====================================================
   HERO SWIPER SLIDER
===================================================== */

const heroSwiperEl = document.querySelector(".hero-swiper");

const heroSection = document.getElementById("home");

const heroThumbs = Array.from(document.querySelectorAll(".hero-thumb"));

if (heroSwiperEl && typeof Swiper !== "undefined") {
  const setActiveThumb = (realIndex) => {
    heroThumbs.forEach((thumb) => {
      thumb.classList.toggle(
        "active",
        Number(thumb.dataset.slideIndex) === realIndex,
      );
    });
  };

  const slideNumCurrent = document.getElementById("slide-num-current");
  const slideProgressLine = document.getElementById("slide-progress-line");
  const totalSlidesCount = heroThumbs.length || 3;

  const updateSlideUI = (realIndex) => {
    setActiveThumb(realIndex);
    if (slideNumCurrent) {
      slideNumCurrent.textContent = `0${realIndex + 1}`;
    }
    if (slideProgressLine) {
      slideProgressLine.style.width = `${((realIndex + 1) / totalSlidesCount) * 100}%`;
    }
  };

  const heroSwiper = new Swiper(heroSwiperEl, {
    loop: true,

    speed: 900,

    effect: "fade",

    fadeEffect: {
      crossFade: true,
    },

    autoplay: {
      delay: 4500,
      disableOnInteraction: false,
    },

    navigation: {
      nextEl: "#hero-next",
      prevEl: "#hero-prev",
    },

    on: {
      slideChange(swiper) {
        updateSlideUI(swiper.realIndex);
      },

      slideChangeTransitionStart(swiper) {
        const incoming = swiper.slides[swiper.activeIndex];
        const reveal = incoming
          ? incoming.querySelector(".split-reveal")
          : null;

        if (reveal) {
          reveal.classList.add("is-covering");

          // Force a reflow so the instant "covering" state is
          // committed before we release it back to a transition.
          void reveal.offsetWidth;

          requestAnimationFrame(() => reveal.classList.remove("is-covering"));
        }
      },
    },
  });

  /* Thumbnail strip drives navigation too */

  heroThumbs.forEach((thumb) => {
    thumb.addEventListener("click", () => {
      heroSwiper.slideToLoop(Number(thumb.dataset.slideIndex));
    });
  });

  updateSlideUI(heroSwiper.realIndex);

  /* Cursor-driven parallax on the slide background */

  if (heroSection) {
    heroSection.addEventListener("mousemove", (event) => {
      const rect = heroSection.getBoundingClientRect();

      const relX = (event.clientX - rect.left) / rect.width - 0.5;
      const relY = (event.clientY - rect.top) / rect.height - 0.5;

      heroSwiperEl.style.setProperty("--parallax-x", `${relX * -14}px`);
      heroSwiperEl.style.setProperty("--parallax-y", `${relY * -10}px`);
    });

    heroSection.addEventListener("mouseleave", () => {
      heroSwiperEl.style.setProperty("--parallax-x", "0px");
      heroSwiperEl.style.setProperty("--parallax-y", "0px");
    });
  }
}

/* =====================================================
   COUNTER SECTION — STAT COUNT-UP
   (this was missing — it's what actually animates any element
   carrying a data-countup attribute, including the counter numbers)
===================================================== */

const countupEls = Array.from(document.querySelectorAll("[data-countup]"));

if (countupEls.length) {
  const animateCountup = (el) => {
    const target = parseFloat(el.dataset.countup);
    const prefix = el.dataset.prefix || "";
    const suffix = el.dataset.suffix || "";
    const isDecimal = el.dataset.countup.includes(".");

    const duration = 1200;
    const start = performance.now();

    const step = (now) => {
      const progress = Math.min((now - start) / duration, 1);
      const eased = 1 - Math.pow(1 - progress, 3);
      const value = target * eased;

      el.textContent = `${prefix}${isDecimal ? value.toFixed(1) : Math.round(value)}${suffix}`;

      if (progress < 1) {
        requestAnimationFrame(step);
      }
    };

    requestAnimationFrame(step);
  };

  const countupObserver = new IntersectionObserver(
    (entries, observer) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          animateCountup(entry.target);
          observer.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.6 },
  );

  countupEls.forEach((el) => countupObserver.observe(el));
}

/* =====================================================
   COUNTER SECTION — UPTIME PROGRESS RING
===================================================== */

const uptimeRing = document.getElementById("uptime-ring");

if (uptimeRing) {
  const circumference = 263.9;
  const targetPct = 99.9;

  const animateRing = () => {
    const duration = 1200;
    const start = performance.now();

    const step = (now) => {
      const progress = Math.min((now - start) / duration, 1);
      const eased = 1 - Math.pow(1 - progress, 3);
      const offset =
        circumference - ((circumference * targetPct) / 100) * eased;

      uptimeRing.style.strokeDashoffset = `${offset}`;

      if (progress < 1) {
        requestAnimationFrame(step);
      }
    };

    requestAnimationFrame(step);
  };

  const ringObserver = new IntersectionObserver(
    (entries, observer) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          animateRing();
          observer.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.6 },
  );

  ringObserver.observe(uptimeRing);
}

/* =====================================================
   COUNTER SECTION — BACKGROUND PARALLAX
===================================================== */

const counterParallaxImg = document.getElementById("counter-parallax-img");

if (counterParallaxImg) {
  const updateCounterParallax = () => {
    const rect = counterParallaxImg.parentElement.getBoundingClientRect();

    if (rect.bottom < 0 || rect.top > window.innerHeight) {
      return;
    }

    const centerOffset = rect.top + rect.height / 2 - window.innerHeight / 2;
    const shift = centerOffset * -0.08;

    counterParallaxImg.style.transform = `translateY(${shift}px) scale(1.08)`;
  };

  window.addEventListener("scroll", updateCounterParallax, { passive: true });
  window.addEventListener("resize", updateCounterParallax);

  updateCounterParallax();
}

/* =====================================================
   PROJECTS SWIPER — COVERFLOW SLIDER
===================================================== */

const projectsSwiperEl = document.querySelector(".projects-swiper");

if (projectsSwiperEl && typeof Swiper !== "undefined") {
  const projectsCurrent = document.getElementById("projects-current");
  const projectsProgress = document.getElementById("projects-progress");

  // Count real slides before Swiper duplicates any for loop mode.
  const totalProjects =
    projectsSwiperEl.querySelectorAll(".swiper-slide").length;

  const updateProjectsUI = (realIndex) => {
    if (projectsCurrent) {
      projectsCurrent.textContent = String(realIndex + 1).padStart(2, "0");
    }
    if (projectsProgress) {
      projectsProgress.style.width = `${((realIndex + 1) / totalProjects) * 100}%`;
    }
  };

  const projectsSwiper = new Swiper(projectsSwiperEl, {
    loop: true,
    centeredSlides: true,
    grabCursor: true,

    effect: "coverflow",
    coverflowEffect: {
      rotate: 15,
      stretch: 0,
      depth: 150,
      modifier: 1,
      slideShadows: false,
    },

    slidesPerView: "auto",
    spaceBetween: 24,

    navigation: {
      nextEl: "#projects-next",
      prevEl: "#projects-prev",
    },

    on: {
      slideChange(swiper) {
        updateProjectsUI(swiper.realIndex);
      },
    },
  });

  updateProjectsUI(projectsSwiper.realIndex);
}

/* =====================================================
   PARTNERS SWIPER — CONTINUOUS BRAND CAROUSEL
===================================================== */

const partnersSwiperEl = document.querySelector(".partners-swiper");

if (partnersSwiperEl && typeof Swiper !== "undefined") {
  const partnersSwiper = new Swiper(partnersSwiperEl, {
    loop: true,
    speed: 700,
    autoplay: {
      delay: 2400,
      disableOnInteraction: false,
      pauseOnMouseEnter: true,
    },
    slidesPerView: 2,
    spaceBetween: 16,
    navigation: {
      nextEl: "#partners-next",
      prevEl: "#partners-prev",
    },
    breakpoints: {
      480: {
        slidesPerView: 3,
        spaceBetween: 16,
      },
      768: {
        slidesPerView: 4,
        spaceBetween: 20,
      },
      1024: {
        slidesPerView: 5,
        spaceBetween: 24,
      },
      1280: {
        slidesPerView: 6,
        spaceBetween: 24,
      },
    },
  });
}


/* =====================================================
   التحكم في النمط (DARK / LIGHT MODE SWITCHER)
   الوظيفة: التبديل بين فئة 'dark' وتخزين التفضيل في localStorage
===================================================== */
const themeToggleBtns = document.querySelectorAll(".theme-toggle-btn");

if (themeToggleBtns.length > 0) {
  themeToggleBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
      // 1. التبديل بين إضافة وإزالة فئة 'dark' من كائن documentElement (عنصر html)
      const isDark = document.documentElement.classList.toggle("dark");

      // 2. حفظ تفضيل المستخدم في ذاكرة المتصفح (localStorage) ليبقى ثابتاً عند التنقل بين الصفحات
      localStorage.setItem("theme", isDark ? "dark" : "light");
    });
  });
}

