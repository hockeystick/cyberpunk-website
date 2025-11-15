# 🌐 Cyberpunk Website

A high-performance, mobile-optimized cyberpunk-themed website built with modern web standards, accessibility features, and full GDPR/CCPA compliance.

## ✨ Features

### 🚀 Performance Optimized
- **Mobile-First Design**: Optimized for mobile devices with responsive layouts
- **Lazy Loading**: Images and animations load only when needed
- **Code Splitting**: Modular JavaScript for faster initial load
- **Service Worker**: PWA support with offline capabilities
- **Optimized CSS**: Critical CSS inline, main styles deferred
- **Minimal Dependencies**: Vanilla JavaScript, no framework overhead
- **Compression & Caching**: Gzip compression and browser caching configured

### ♿ Accessibility (WCAG 2.1 Level AA)
- **Semantic HTML5**: Proper document structure with landmarks
- **ARIA Labels**: Comprehensive ARIA support for screen readers
- **Keyboard Navigation**: Full keyboard accessibility
- **Skip Links**: Quick navigation to main content
- **Color Contrast**: Meets WCAG AA contrast requirements
- **Focus Indicators**: Clear visual focus for keyboard users
- **Reduced Motion**: Respects `prefers-reduced-motion` setting
- **Screen Reader Friendly**: Tested with screen readers

### 🔒 Privacy & Compliance
- **GDPR Compliant**: Full consent management system
- **CCPA Compliant**: California privacy rights supported
- **Cookie Consent**: Granular cookie preferences (Essential/Analytics/Marketing)
- **Privacy Policy**: Comprehensive privacy documentation
- **Terms of Service**: Clear terms and conditions
- **Data Rights**: Easy access to data rights and deletion requests
- **LocalStorage**: Consent stored locally, expires after 365 days

### 🔐 Security
- **Content Security Policy (CSP)**: Prevents XSS attacks
- **X-Frame-Options**: Prevents clickjacking
- **X-Content-Type-Options**: Prevents MIME sniffing
- **XSS Protection**: Browser XSS filter enabled
- **Referrer Policy**: Strict referrer policy
- **HTTPS Ready**: HSTS configuration available
- **Input Validation**: Form validation and sanitization

### 🎨 Design
- **Cyberpunk Aesthetic**: Neon colors, glitch effects, grid backgrounds
- **Smooth Animations**: CSS-based animations with IntersectionObserver
- **Touch Friendly**: Large touch targets for mobile (44px minimum)
- **Dark Theme**: Eye-friendly dark color scheme
- **Responsive Grid**: CSS Grid and Flexbox layouts
- **Custom CSS Variables**: Easily customizable theme

## 📁 Project Structure

```
cyberpunk-website/
├── index.html              # Main homepage
├── privacy.html            # Privacy policy (GDPR/CCPA)
├── terms.html              # Terms of service
├── accessibility.html      # Accessibility statement
├── sw.js                   # Service worker (PWA)
├── .htaccess               # Apache security & performance config
├── css/
│   └── styles.css          # Main stylesheet (mobile-first)
├── js/
│   └── app.js              # Main JavaScript (modular)
├── assets/                 # Images and other assets
├── package.json            # Dependencies
└── README.md               # This file
```

## 🚀 Quick Start

### Option 1: Simple HTTP Server (Recommended for Development)

```bash
# Using Node.js serve
npm install
npm start
# Visit http://localhost:3000
```

```bash
# Using Python 3
python3 -m http.server 3000
# Visit http://localhost:3000
```

```bash
# Using PHP
php -S localhost:3000
# Visit http://localhost:3000
```

### Option 2: Apache/Nginx

Simply copy all files to your web server's document root.

**Apache:** The `.htaccess` file includes security headers and performance optimizations.

**Nginx:** Use the following configuration:

```nginx
# Security headers
add_header X-Frame-Options "SAMEORIGIN" always;
add_header X-Content-Type-Options "nosniff" always;
add_header X-XSS-Protection "1; mode=block" always;
add_header Referrer-Policy "strict-origin-when-cross-origin" always;
add_header Content-Security-Policy "default-src 'self'; style-src 'self' 'unsafe-inline'; script-src 'self' 'unsafe-inline'; img-src 'self' data:; font-src 'self' data:;" always;

# Gzip compression
gzip on;
gzip_types text/css application/javascript text/javascript application/json;

# Browser caching
location ~* \.(jpg|jpeg|png|gif|ico|css|js|svg|woff|woff2|ttf)$ {
    expires 1y;
    add_header Cache-Control "public, immutable";
}
```

## 📱 Performance Metrics

This website is optimized for:
- **First Contentful Paint (FCP)**: < 1.8s
- **Time to Interactive (TTI)**: < 3.8s
- **Cumulative Layout Shift (CLS)**: < 0.1
- **Largest Contentful Paint (LCP)**: < 2.5s

Performance monitoring is built-in (check browser console on page load).

## ♿ Accessibility Testing

Tested with:
- ✅ Keyboard navigation
- ✅ Screen readers (NVDA, JAWS, VoiceOver)
- ✅ Color contrast analyzers
- ✅ WAVE accessibility tool
- ✅ axe DevTools

## 🔧 Customization

### Colors

Edit CSS variables in `/css/styles.css`:

```css
:root {
  --color-primary: #00ffff;      /* Cyan */
  --color-secondary: #ff00ff;    /* Magenta */
  --color-accent: #ffff00;       /* Yellow */
  --color-bg-dark: #0a0e27;      /* Dark blue */
  /* ... */
}
```

### Content

- **Homepage**: Edit `index.html`
- **Privacy Policy**: Edit `privacy.html`
- **Terms**: Edit `terms.html`
- **Accessibility**: Edit `accessibility.html`

### Cookie Consent

Configure cookie consent in `/js/app.js`:

```javascript
class CookieConsent {
  constructor() {
    this.EXPIRY_DAYS = 365; // Change expiry
    // ...
  }
}
```

## 🌐 Browser Support

- ✅ Chrome/Edge (last 2 versions)
- ✅ Firefox (last 2 versions)
- ✅ Safari (last 2 versions)
- ✅ iOS Safari (last 2 versions)
- ✅ Android Chrome (last 2 versions)
- ⚠️ IE11 (basic support, no animations)

## 📋 Compliance Checklist

- ✅ GDPR compliant cookie consent
- ✅ CCPA compliance (right to opt-out, deletion)
- ✅ Privacy policy with all required disclosures
- ✅ Terms of service
- ✅ Accessibility statement
- ✅ Cookie preferences management
- ✅ Data retention policies
- ✅ Security headers (CSP, XSS, etc.)
- ✅ HTTPS ready (uncomment HSTS in production)
- ✅ Contact information for privacy requests

## 🧪 Testing

### Performance Testing
```bash
# Lighthouse (Chrome DevTools)
# Run audit → Performance, Accessibility, Best Practices, SEO

# WebPageTest
# Visit https://www.webpagetest.org/
```

### Accessibility Testing
```bash
# Install axe DevTools or WAVE browser extension
# Run automated accessibility audit
```

### Security Testing
```bash
# Check security headers
curl -I https://your-domain.com

# Use securityheaders.com
# Visit https://securityheaders.com/
```

## 📝 License

MIT License - Feel free to use for personal or commercial projects.

## 🤝 Contributing

Contributions, issues, and feature requests are welcome!

## 📧 Contact

For privacy requests: privacy@cyberpunk-industries.com
For accessibility issues: accessibility@cyberpunk-industries.com
For general inquiries: contact@cyberpunk-industries.com

---

**Built with ❤️ using modern web standards**
