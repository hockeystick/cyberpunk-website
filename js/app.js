/**
 * CYBERPUNK WEBSITE - MAIN JAVASCRIPT
 * Performance Optimized | GDPR/CCPA Compliant | Accessible
 */

(function() {
  'use strict';

  // ============================================
  // PERFORMANCE: Debounce utility
  // ============================================
  function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
      const later = () => {
        clearTimeout(timeout);
        func(...args);
      };
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
    };
  }

  // ============================================
  // COOKIE CONSENT MANAGEMENT (GDPR/CCPA)
  // ============================================
  class CookieConsent {
    constructor() {
      this.consentBanner = document.getElementById('cookie-consent');
      this.acceptAllBtn = document.getElementById('cookie-accept-all');
      this.essentialBtn = document.getElementById('cookie-essential');
      this.settingsBtn = document.getElementById('cookie-settings');
      this.preferencesLink = document.getElementById('cookie-preferences');

      this.STORAGE_KEY = 'cookie-consent';
      this.EXPIRY_DAYS = 365;

      this.init();
    }

    init() {
      // Check if user has already given consent
      const consent = this.getConsent();

      if (!consent) {
        this.showBanner();
      } else {
        this.applyConsent(consent);
      }

      // Event listeners
      if (this.acceptAllBtn) {
        this.acceptAllBtn.addEventListener('click', () => this.acceptAll());
      }

      if (this.essentialBtn) {
        this.essentialBtn.addEventListener('click', () => this.acceptEssential());
      }

      if (this.settingsBtn) {
        this.settingsBtn.addEventListener('click', () => this.openSettings());
      }

      if (this.preferencesLink) {
        this.preferencesLink.addEventListener('click', (e) => {
          e.preventDefault();
          this.showBanner();
        });
      }
    }

    showBanner() {
      if (this.consentBanner) {
        this.consentBanner.removeAttribute('hidden');
        this.consentBanner.setAttribute('aria-hidden', 'false');
      }
    }

    hideBanner() {
      if (this.consentBanner) {
        this.consentBanner.setAttribute('hidden', '');
        this.consentBanner.setAttribute('aria-hidden', 'true');
      }
    }

    acceptAll() {
      const consent = {
        essential: true,
        analytics: true,
        marketing: true,
        timestamp: new Date().toISOString()
      };
      this.saveConsent(consent);
      this.applyConsent(consent);
      this.hideBanner();
    }

    acceptEssential() {
      const consent = {
        essential: true,
        analytics: false,
        marketing: false,
        timestamp: new Date().toISOString()
      };
      this.saveConsent(consent);
      this.applyConsent(consent);
      this.hideBanner();
    }

    openSettings() {
      // For demo purposes, show banner with options
      // In production, implement a full preference modal
      this.showBanner();

      // Focus the customize button for accessibility
      if (this.settingsBtn) {
        this.settingsBtn.focus();
      }
    }

    saveConsent(consent) {
      try {
        localStorage.setItem(this.STORAGE_KEY, JSON.stringify(consent));
      } catch (e) {
        console.warn('Unable to save consent to localStorage:', e);
      }
    }

    getConsent() {
      try {
        const stored = localStorage.getItem(this.STORAGE_KEY);
        if (stored) {
          const consent = JSON.parse(stored);
          // Check if consent is still valid (not expired)
          const consentDate = new Date(consent.timestamp);
          const expiryDate = new Date(consentDate.getTime() + (this.EXPIRY_DAYS * 24 * 60 * 60 * 1000));
          if (new Date() > expiryDate) {
            localStorage.removeItem(this.STORAGE_KEY);
            return null;
          }
          return consent;
        }
      } catch (e) {
        console.warn('Unable to read consent from localStorage:', e);
      }
      return null;
    }

    applyConsent(consent) {
      // Apply consent settings
      if (consent.analytics) {
        this.enableAnalytics();
      }
      if (consent.marketing) {
        this.enableMarketing();
      }
      console.log('Cookie consent applied:', consent);
    }

    enableAnalytics() {
      // In production, initialize analytics tools here (Google Analytics, etc.)
      console.log('Analytics cookies enabled');
    }

    enableMarketing() {
      // In production, initialize marketing tools here (Facebook Pixel, etc.)
      console.log('Marketing cookies enabled');
    }
  }

  // ============================================
  // MOBILE NAVIGATION
  // ============================================
  class MobileNav {
    constructor() {
      this.navToggle = document.querySelector('.nav__toggle');
      this.navMenu = document.querySelector('.nav__menu');
      this.navLinks = document.querySelectorAll('.nav__link');

      this.init();
    }

    init() {
      if (!this.navToggle || !this.navMenu) return;

      this.navToggle.addEventListener('click', () => this.toggleMenu());

      // Close menu when clicking on links
      this.navLinks.forEach(link => {
        link.addEventListener('click', () => {
          if (window.innerWidth < 768) {
            this.closeMenu();
          }
        });
      });

      // Close menu when clicking outside
      document.addEventListener('click', (e) => {
        if (this.navMenu.classList.contains('active') &&
            !this.navMenu.contains(e.target) &&
            !this.navToggle.contains(e.target)) {
          this.closeMenu();
        }
      });

      // Handle escape key
      document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && this.navMenu.classList.contains('active')) {
          this.closeMenu();
          this.navToggle.focus();
        }
      });
    }

    toggleMenu() {
      const isExpanded = this.navToggle.getAttribute('aria-expanded') === 'true';
      this.navToggle.setAttribute('aria-expanded', !isExpanded);
      this.navMenu.classList.toggle('active');

      // Prevent body scroll when menu is open
      if (this.navMenu.classList.contains('active')) {
        document.body.style.overflow = 'hidden';
      } else {
        document.body.style.overflow = '';
      }
    }

    closeMenu() {
      this.navToggle.setAttribute('aria-expanded', 'false');
      this.navMenu.classList.remove('active');
      document.body.style.overflow = '';
    }
  }

  // ============================================
  // SMOOTH SCROLL (with accessibility support)
  // ============================================
  class SmoothScroll {
    constructor() {
      this.init();
    }

    init() {
      // Check if user prefers reduced motion
      const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

      if (prefersReducedMotion) {
        return; // Don't apply smooth scrolling
      }

      document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', (e) => {
          const href = anchor.getAttribute('href');
          if (href === '#' || href === '#cookie-settings') return;

          e.preventDefault();
          const target = document.querySelector(href);

          if (target) {
            const headerOffset = 80; // Account for sticky header
            const elementPosition = target.getBoundingClientRect().top;
            const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

            window.scrollTo({
              top: offsetPosition,
              behavior: 'smooth'
            });

            // Set focus to target for accessibility
            target.setAttribute('tabindex', '-1');
            target.focus();

            // Remove tabindex after focus to restore normal tab order
            target.addEventListener('blur', () => {
              target.removeAttribute('tabindex');
            }, { once: true });
          }
        });
      });
    }
  }

  // ============================================
  // INTERSECTION OBSERVER (Lazy Loading Animations)
  // ============================================
  class AnimateOnScroll {
    constructor() {
      this.elements = document.querySelectorAll('[data-aos]');
      this.init();
    }

    init() {
      if (!('IntersectionObserver' in window)) {
        // Fallback: just show all elements
        this.elements.forEach(el => el.classList.add('aos-animate'));
        return;
      }

      const options = {
        root: null,
        rootMargin: '0px',
        threshold: 0.1
      };

      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('aos-animate');
            // Unobserve after animation to prevent memory leaks
            observer.unobserve(entry.target);
          }
        });
      }, options);

      this.elements.forEach(el => observer.observe(el));
    }
  }

  // ============================================
  // CONTACT FORM HANDLING
  // ============================================
  class ContactForm {
    constructor() {
      this.form = document.getElementById('contact-form');
      this.init();
    }

    init() {
      if (!this.form) return;

      this.form.addEventListener('submit', (e) => this.handleSubmit(e));

      // Real-time validation
      const inputs = this.form.querySelectorAll('input, textarea');
      inputs.forEach(input => {
        input.addEventListener('blur', () => this.validateField(input));
      });
    }

    validateField(field) {
      const value = field.value.trim();
      let isValid = true;
      let errorMessage = '';

      if (field.hasAttribute('required') && !value) {
        isValid = false;
        errorMessage = 'This field is required';
      } else if (field.type === 'email' && value) {
        // More robust email validation
        const emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)+$/;
        if (!emailRegex.test(value)) {
          isValid = false;
          errorMessage = 'Please enter a valid email address';
        }
      }

      this.showFieldError(field, isValid, errorMessage);
      return isValid;
    }

    showFieldError(field, isValid, message) {
      // Remove existing error
      const existingError = field.parentElement.querySelector('.field-error');
      if (existingError) {
        existingError.remove();
        field.removeAttribute('aria-describedby');
      }

      field.setAttribute('aria-invalid', !isValid);

      if (!isValid && message) {
        const errorId = `${field.id}-error`;
        const errorEl = document.createElement('span');
        errorEl.id = errorId;
        errorEl.className = 'field-error';
        errorEl.style.color = 'var(--color-error)';
        errorEl.style.fontSize = 'var(--font-size-sm)';
        errorEl.style.marginTop = 'var(--spacing-xs)';
        errorEl.style.display = 'block';
        errorEl.textContent = message;
        errorEl.setAttribute('role', 'alert');
        field.parentElement.appendChild(errorEl);
        field.setAttribute('aria-describedby', errorId);
      }
    }

    handleSubmit(e) {
      e.preventDefault();

      // Validate all fields
      const inputs = this.form.querySelectorAll('input, textarea');
      let isFormValid = true;

      inputs.forEach(input => {
        if (!this.validateField(input)) {
          isFormValid = false;
        }
      });

      if (!isFormValid) {
        // Focus first invalid field
        const firstInvalid = this.form.querySelector('[aria-invalid="true"]');
        if (firstInvalid) {
          firstInvalid.focus();
        }
        return;
      }

      // Get form data
      const formData = new FormData(this.form);

      // Polyfill for Object.fromEntries (IE11 compatibility)
      let data;
      if (typeof Object.fromEntries === 'function') {
        data = Object.fromEntries(formData.entries());
      } else {
        data = {};
        formData.forEach((value, key) => {
          data[key] = value;
        });
      }

      console.log('Form submitted:', data);

      // In production, send to server first, then reset on success
      // For demo, show success message immediately
      this.showSuccessMessage();
    }

    showSuccessMessage() {
      const successDiv = document.createElement('div');
      successDiv.className = 'form-success';
      successDiv.style.cssText = `
        background: var(--color-success);
        color: var(--color-bg-dark);
        padding: var(--spacing-md);
        border-radius: var(--border-radius);
        margin-top: var(--spacing-md);
        text-align: center;
        font-weight: 600;
      `;
      successDiv.textContent = 'Thank you! Your message has been sent successfully.';
      successDiv.setAttribute('role', 'alert');

      // Remove existing success message if any
      const existing = this.form.querySelector('.form-success');
      if (existing) {
        existing.remove();
      }

      this.form.appendChild(successDiv);

      // Reset form after showing success (in production, only after server confirms)
      this.form.reset();

      // Remove success message after 5 seconds
      setTimeout(() => {
        if (successDiv.parentNode) {
          successDiv.remove();
        }
      }, 5000);
    }
  }

  // ============================================
  // PERFORMANCE: Lazy Load Images
  // ============================================
  class LazyLoadImages {
    constructor() {
      this.images = document.querySelectorAll('img[data-src]');
      this.init();
    }

    init() {
      if (!('IntersectionObserver' in window)) {
        // Fallback: load all images immediately
        this.images.forEach(img => {
          img.src = img.dataset.src;
        });
        return;
      }

      const imageObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            const img = entry.target;
            img.src = img.dataset.src;
            img.removeAttribute('data-src');
            imageObserver.unobserve(img);
          }
        });
      });

      this.images.forEach(img => imageObserver.observe(img));
    }
  }

  // ============================================
  // HEADER SCROLL EFFECT
  // ============================================
  class HeaderScroll {
    constructor() {
      this.header = document.querySelector('.header');
      this.init();
    }

    init() {
      if (!this.header) return;

      let lastScroll = 0;

      const handleScroll = debounce(() => {
        const currentScroll = window.pageYOffset;

        if (currentScroll <= 0) {
          this.header.classList.remove('scroll-up', 'scroll-down');
          return;
        }

        if (currentScroll > lastScroll && !this.header.classList.contains('scroll-down')) {
          // Scrolling down
          this.header.classList.remove('scroll-up');
          this.header.classList.add('scroll-down');
        } else if (currentScroll < lastScroll && this.header.classList.contains('scroll-down')) {
          // Scrolling up
          this.header.classList.remove('scroll-down');
          this.header.classList.add('scroll-up');
        }

        lastScroll = currentScroll;
      }, 10);

      window.addEventListener('scroll', handleScroll, { passive: true });
    }
  }

  // ============================================
  // PERFORMANCE MONITORING
  // ============================================
  class PerformanceMonitor {
    constructor() {
      this.init();
    }

    init() {
      if (!('performance' in window)) return;

      window.addEventListener('load', () => {
        // Wait a bit for all resources to finish loading
        setTimeout(() => {
          const perfData = performance.getEntriesByType('navigation')[0];

          if (perfData) {
            console.log('Performance Metrics:');
            console.log('- DOM Content Loaded:', Math.round(perfData.domContentLoadedEventEnd - perfData.domContentLoadedEventStart), 'ms');
            console.log('- Load Complete:', Math.round(perfData.loadEventEnd - perfData.loadEventStart), 'ms');
            console.log('- DOM Interactive:', Math.round(perfData.domInteractive), 'ms');

            // Web Vitals approximation
            if (performance.getEntriesByName) {
              const paintEntries = performance.getEntriesByType('paint');
              paintEntries.forEach(entry => {
                console.log(`- ${entry.name}:`, Math.round(entry.startTime), 'ms');
              });
            }
          }
        }, 0);
      });
    }
  }

  // ============================================
  // ACCESSIBILITY: Keyboard Navigation Enhancement
  // ============================================
  class KeyboardNav {
    constructor() {
      this.init();
    }

    init() {
      // Show focus outline only when using keyboard
      document.addEventListener('mousedown', () => {
        document.body.classList.add('using-mouse');
      });

      document.addEventListener('keydown', (e) => {
        if (e.key === 'Tab') {
          document.body.classList.remove('using-mouse');
        }
      });

      // Add minimal CSS for mouse users - only hide default browser outline
      // Custom focus styles (like buttons) will still show
      const style = document.createElement('style');
      style.textContent = `
        body.using-mouse *:focus:not(:focus-visible) {
          outline: none;
        }
      `;
      document.head.appendChild(style);
    }
  }

  // ============================================
  // INITIALIZE ALL MODULES
  // ============================================
  function init() {
    // Wait for DOM to be ready
    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', initializeModules);
    } else {
      initializeModules();
    }
  }

  function initializeModules() {
    console.log('🚀 Cyberpunk Website Initialized');

    // Initialize all components
    new CookieConsent();
    new MobileNav();
    new SmoothScroll();
    new AnimateOnScroll();
    new ContactForm();
    new LazyLoadImages();
    new HeaderScroll();
    new PerformanceMonitor();
    new KeyboardNav();

    // Mark page as fully loaded
    document.body.classList.add('loaded');
  }

  // Start the app
  init();

})();
