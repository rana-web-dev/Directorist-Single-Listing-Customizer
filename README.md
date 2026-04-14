# Directorist Single Listing Customizer

/**
 * Plugin Name: Directorist Single Listing Customizer
 * Description: Directorist Single Listing Page According to Figma Design
 * Version: 1.0.0
 * Author: Jahiruddin Rana
 * Author-URI: #
 * Tags: directorist, listing, customizer, single page, figma
 * Text Domain: directorist-single-listing-customizer
 * Requires PHP: 7.2
 * Tested up to: 6.9.4
 */ 

Customize Directorist single listing page to match Figma design without modifying core plugin files.

---

## 📌 Description

This plugin overrides the default Directorist single listing template and replaces it with a custom design based on provided Figma mockups. All customizations are contained within this plugin, making it **update-safe** and **theme-independent**.

### Features

- ✅ Overrides Directorist single listing template using WordPress hooks
- ✅ Custom HTML/CSS layout matching Figma design
- ✅ Displays listing title, gallery, description, contact info, location, and tags
- ✅ Responsive design (mobile, tablet, desktop)
- ✅ No core plugin files modified
- ✅ Easy to install and activate

---

## 🚀 Setup Instructions

### Prerequisites

Before installing this plugin, make sure you have:

1. **WordPress** installed (version 5.0 or higher)
2. **Directorist Plugin** installed and activated

### Installation Steps

#### Method 1: Upload via WordPress Dashboard

1. Download the plugin ZIP file
2. Go to **Plugins → Add New → Upload Plugin**
3. Click **Choose File**, select the ZIP file, then click **Install Now**
4. After installation, click **Activate**

#### Method 2: Manual Installation via FTP

1. Extract the plugin folder from the ZIP file
2. Upload the folder to `/wp-content/plugins/`
3. Go to **Plugins → Installed Plugins**
4. Find **"Directorist Single Listing Customizer"** and click **Activate**

### Post-Installation

1. Make sure **Directorist** plugin is active
2. Create or edit a listing with sample data:
   - Title
   - Gallery images
   - Description
   - Contact info (phone, email, website)
   - Location address
   - Tags
3. View the listing page on the frontend
4. The custom design should appear automatically

---

## 📂 Plugin Structure

directorist-single-listing-customizer/directorist-single-listing-customizer.php # Main plugin file
<br><br>
directorist-single-listing-customizer/assets/style.css # Custom styles
<br><br>
directorist-single-listing-customizer/templates/single.php # Overridden template

---

## 🔧 Technical Explanation

### Override Approach

This plugin uses WordPress `template_include` filter to override the default Directorist single listing template.

```php
add_filter( 'template_include', 'dslc_custom_single_listing_template', 99999999999999999999 );

Why this approach?

✅ No core plugin files are modified

✅ Updates safe (plugin updates won't erase customizations)

✅ Theme-independent (works with any WordPress theme)

✅ High priority ensures it loads after other plugins

Template Loading Logic
Check if current page is a Directorist listing (at_biz_dir post type)

If yes, look for custom template in plugin's templates/ folder

If custom template exists, return its path

Otherwise, fall back to default Directorist template

Supported Post Types
The plugin supports multiple Directorist post type variations:

at_biz_dir (older versions)

directorist_listing (newer versions)

listing (custom setups)
