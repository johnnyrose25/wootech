import {domReady} from '@roots/sage/client';
import {jquery} from './jquery-3.6.0.min.js';
import {jqueryval} from './jquery.validate.min.js';
import {alpine} from './alpine.min.js';
import {slick} from './slick.min.js';
// import {aos} from './aos.js';
// import {script} from './script.js';




/**
 * app.main
 */
const main = async (err) => {
  if (err) {
    // handle hmr errors
    console.error(err);
  }

  // application code
};

/**
 * Initialize
 *
 * @see https://webpack.js.org/api/hot-module-replacement
 */
domReady(main);
import.meta.webpackHot?.accept(main);
