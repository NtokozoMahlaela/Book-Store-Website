# Book Store Website Templates

A collection of responsive WordPress templates for authors and bookstores to showcase and sell their books online. This project includes three distinct template styles: Modern, Classic, and Interactive, each designed to cater to different aesthetic preferences and functional requirements.

## Table of Contents
- [Features](#features)
- [Templates Overview](#templates-overview)
- [Installation](#installation)
- [Usage](#usage)
- [Customization](#customization)
- [Dependencies](#dependencies)


## Features

- **Three Template Styles**: Choose from Modern, Classic, or Interactive designs
- **Responsive Layout**: Works on all device sizes
- **Book Showcase**: Beautiful grid layout for displaying book collections
- **Author Pages**: Dedicated templates for author profiles and book listings
- **User Authentication**: Special features for logged-in users
- **Meeting Booking**: Integrated booking system for author meetings
- **Custom Post Types**: Built-in support for books and authors

## Templates Overview

### 1. Modern Author Template
- Clean, minimalist design
- Focus on book covers and author information
- Simple navigation and clear call-to-action buttons
- Located in: `Preview/template-modern-author.php`

### 2. Classic Author Template
- Traditional bookshop aesthetic
- Detailed book information display
- Classic typography and styling
- Located in: `Classic/template-classic-author.php`

### 3. Interactive Author Template
- Engaging, dynamic interface
- Interactive elements for better user engagement
- Modern animations and transitions
- Located in: `Interactive/template-interactive-author.php`

## Installation

1. **Prerequisites**:
   - WordPress 5.0 or later
   - PHP 7.4 or higher
   - Html for preview

2. **Installation Steps**:
   - Download the repository
   - Upload the template files to your WordPress theme directory
   - Activate the theme through the WordPress admin panel
   - Configure the theme options as needed

3. **Required Plugins**:
   - Advanced Custom Fields PRO (for custom fields)
   - Custom Post Type UI (for book post type)
   - Contact Form 7 (for contact forms)

## Usage

### Setting Up Books
1. Go to WordPress Admin > Books > Add New
2. Enter book details:
   - Title and description
   - Featured image (book cover)
   - Price and purchase link
   - Author information
   - Book categories and tags

### Using the Templates
1. Create a new page in WordPress
2. Select the desired template from the Page Attributes section
3. Publish the page

## Customization

### Changing Colors and Fonts
Edit the CSS variables in the respective template's style section to match your brand:

```css
:root {
    --primary-color: #2c3e50;
    --secondary-color: #e74c3c;
    --text-color: #333;
    --light-bg: #f9f9f9;
}
```

### Adding Custom Fields
Use Advanced Custom Fields to add:
- Book metadata (ISBN, page count, etc.)
- Author biography
- Book excerpts
- Purchase links

## Dependencies

- WordPress 5.0+
- PHP 7.4+
- jQuery (included with WordPress)

## How to Run

## Clone on VS Code 
https://github.com/NtokozoMahlaela/Book-Store-Website.git

Then run the different HTML files to preview
