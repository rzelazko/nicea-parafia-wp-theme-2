// import external dependencies
import 'jquery';
import { library as faApiLibrary, dom as faApiDom } from '@fortawesome/fontawesome-svg-core';
import { faAngleDoubleRight } from '@fortawesome/free-solid-svg-icons';

// Import everything from autoload
import './autoload/**/*'

// Import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());

// Add the imported icons to the library
// Tell FontAwesome to watch the DOM and add the SVGs when it detects icon markup
faApiLibrary.add(faAngleDoubleRight);
faApiDom.watch();
