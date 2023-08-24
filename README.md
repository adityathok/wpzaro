# WPZaro WordPress Theme Starter
WPzaro is a WordPress theme starter that combines the power of Underscores and Bootstrap 5. It's derived from the Understrap project, aiming to provide a solid foundation for building customizable and responsive WordPress themes.

## Features
- Built on top of Underscores and [Bootstrap](https://github.com/twbs/bootstrap) 5 for a robust and flexible foundation.
- Mobile-first and responsive design for seamless viewing across devices.
- Clean and organized code structure to kickstart your theme development.
- Customization-ready with support for the WordPress Customizer using the Kirki plugin for easy theme adjustments.
- Integrated with popular web development tools for efficient workflow.
- Uses a single minified CSS file for all the basic stuff.
- [Font Awesome](https://github.com/FortAwesome/Font-Awesome) integration (v4.7.0)
- WooCommerce support
- Contact Form 7 support
- Child Theme ready

## Development
These instructions will help you set up WPzaro on your local machine for development and testing purposes.

### Development Prerequisites
You need to have the following software installed on your system:

- WordPress: Make sure you have WordPress installed locally or on a server.
- Node.js: Required for asset compilation and package management.
- npm: Node package manager, comes with Node.js.

### Development
1. Clone the repository:
```bash
git clone https://github.com/adityathok/wpzaro.git
```
2. Navigate to the theme directory:
```bash
cd wpzaro
```
3. Install the Node.js dependencies:
```bash
npm install
```
4. Start the asset compilation process (Webpack) and watch for changes:
```bash
npm run dist
```

## Contributing
Contributions are welcome! If you find a bug or want to improve WPzaro, please open an issue or submit a pull request. Make sure to follow the existing coding style and conventions.

## License
This project is licensed under the GNU GPLv3 or later license.

## Credits
- WPzaro is built upon the [Understrap](https://github.com/understrap/understrap) project.
- Font Awesome: https://fontawesome.com/v4.7/license/ (Font: SIL OFL 1.1, (S)CSS: MIT)
- Bootstrap: https://getbootstrap.com | https://github.com/twbs/bootstrap/blob/main/LICENSE (MIT)
- WP Bootstrap Navwalker by Edward McIntyre & William Patton: https://github.com/wp-bootstrap/wp-bootstrap-navwalker (GNU GPLv3)
- This theme uses the [Kirki plugin](https://github.com/themeum/kirki) for enhancing the WordPress Customizer experience.
