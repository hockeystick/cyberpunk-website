# Cyberpunk Industries WordPress Theme

A high-performance, mobile-optimized cyberpunk-themed WordPress theme with GDPR/CCPA compliance, WCAG 2.1 Level AA accessibility, and modern web standards.

## Features

### 🚀 Performance Optimized
- Mobile-first responsive design
- Lazy loading for images and animations
- Deferred JavaScript loading
- Service Worker (PWA) support
- Optimized CSS delivery
- No jQuery dependency (vanilla JavaScript)

### ♿ Accessibility (WCAG 2.1 Level AA)
- Semantic HTML5 structure
- Comprehensive ARIA labels
- Full keyboard navigation
- Skip links for screen readers
- Focus indicators
- Respects reduced motion preferences

### 🔒 Privacy & Compliance
- GDPR-compliant cookie consent
- CCPA compliance
- Privacy policy integration
- Cookie preference management
- Opt-in model for analytics

### 🎨 Design
- Cyberpunk neon aesthetics
- Smooth CSS animations
- Glitch effects
- Dark theme optimized
- Touch-friendly mobile interface

## Installation

1. Download the `cyberpunk-theme` folder
2. Zip the entire folder
3. In WordPress admin, go to Appearance → Themes → Add New
4. Click "Upload Theme" and select the zip file
5. Click "Install Now" and then "Activate"

## Setup

### Required Setup
1. **Set Homepage**: Go to Settings → Reading and set "A static page" as your homepage, then select "Front Page" template
2. **Create Menus**: Go to Appearance → Menus and create:
   - Primary menu (displayed in header)
   - Footer menu (displayed in footer)
3. **Configure Privacy Policy**: Go to Settings → Privacy and set your privacy policy page

### Recommended Setup
4. **Set Permalink Structure**: Go to Settings → Permalinks and choose "Post name" for SEO-friendly URLs
5. **Configure Widgets**: Go to Appearance → Widgets and add content to footer widget areas
6. **Upload Logo**: Go to Appearance → Customize → Site Identity and upload your logo
7. **Set Colors**: Customize theme colors in the customizer (if available)

## Theme Configuration

### Navigation Menus
The theme supports two menu locations:
- **Primary Menu**: Main navigation in the header
- **Footer Menu**: Quick links in the footer

### Widget Areas
The theme includes 5 widget areas:
- **Sidebar**: Main sidebar (if needed for blog)
- **Footer 1-4**: Four footer columns for widgets

### Contact Form
The theme includes a custom AJAX contact form on the front page. To receive form submissions:
1. Forms are sent to the admin email (Settings → General)
2. Configure SMTP for better email delivery (recommended plugin: WP Mail SMTP)

## Browser Support
- ✅ Chrome/Edge (last 2 versions)
- ✅ Firefox (last 2 versions)
- ✅ Safari (last 2 versions)
- ✅ iOS Safari (last 2 versions)
- ✅ Android Chrome (last 2 versions)

## Theme Customization

### Colors
Main colors are defined in `/assets/css/main.css`:
- Primary: #00ffff (cyan)
- Secondary: #ff00ff (magenta)
- Accent: #ffff00 (yellow)

### Fonts
The theme uses system fonts for performance:
- Base: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto

### Adding Custom CSS
Use Appearance → Customize → Additional CSS

### Child Theme
To create a child theme:
1. Create a new folder: `cyberpunk-child`
2. Create `style.css`:
```css
/*
Theme Name: Cyberpunk Child
Template: cyberpunk-theme
*/
```
3. Create `functions.php`:
```php
<?php
add_action('wp_enqueue_scripts', 'cyberpunk_child_enqueue_styles');
function cyberpunk_child_enqueue_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}
```

## Progressive Web App (PWA)

The theme includes PWA support with:
- Service Worker for offline functionality
- Web App Manifest
- Add to Home Screen capability

Icons are located in `/assets/images/`

## Performance Tips

1. **Use a caching plugin**: WP Super Cache or W3 Total Cache
2. **Optimize images**: Use WebP format with fallbacks
3. **Enable Gzip compression**: Most hosts enable this by default
4. **Use a CDN**: CloudFlare or similar
5. **Minify assets**: Use Autoptimize plugin

## Security Features

The theme includes:
- CSRF protection on forms
- XSS prevention
- Security headers
- WordPress version hiding
- Input sanitization

## Accessibility Features

- Keyboard-navigable menus
- Skip to content link
- ARIA landmarks and labels
- Screen reader-friendly
- Focus visible indicators
- Reduced motion support

## Translations

The theme is translation-ready. Text domain: `cyberpunk-industries`

To translate:
1. Use Loco Translate plugin, or
2. Generate .pot file and translate with Poedit

## Support

For theme support and documentation, visit the theme documentation or contact support.

## Changelog

### Version 1.0.0
- Initial release
- WCAG 2.1 Level AA accessibility
- GDPR/CCPA compliance
- PWA support
- Mobile-first responsive design

## License

MIT License - Free to use for personal and commercial projects.

## Credits

- Font Awesome icons (if used)
- WordPress.org for the amazing CMS
- All contributors and testers

---

**Enjoy your cyberpunk experience!** 🚀
