const gulp = require("gulp");
const pug = require("gulp-pug");
const postcss = require("gulp-postcss");
const sourcemaps = require("gulp-sourcemaps");
const rename = require("gulp-rename");
const del = require("del");
const gulpWebpack = require("gulp-webpack");
const webpack = require("webpack");
const webpackConfig = require("./webpack.config.js");
const browserSync = require("browser-sync").create();
const config = require("./env.paths.json");

const paths = {
  root: `${config.DIST_DIR}`,
  templates: {
    pages: "./src/views/pages/*.pug",
    src: "./src/views/**/*.pug",
    dest: `${config.DIST_DIR}`
  },
  styles: {
    main: "./src/assets/styles/main.scss",
    src: "./src/assets/styles/**/*.scss",
    dest: `${config.DIST_DIR}/css`
  },
  scripts: {
    src: "./src/assets/scripts/*.js",
    dest: `${config.DIST_DIR}/scripts`
  }
};

function watch() {
  gulp.watch(paths.styles.src, styles);
  gulp.watch(paths.templates.src, templates);
  gulp.watch(paths.scripts.src, scripts);
}

function server() {
  browserSync.init({
    proxy: "fermer.loc"
  });
  browserSync.watch(paths.root + "/**/*.*", browserSync.reload);
}

// clean
function clean() {
  return del(paths.root, { force: true });
}

//pug
function templates() {
  return gulp
    .src(paths.templates.pages)
    .pipe(pug({ pretty: true }))
    .pipe(
      rename({
        extname: ".php"
      })
    )
    .pipe(gulp.dest(paths.root));
}

// scss
function styles() {
  return gulp
    .src(paths.styles.main)
    .pipe(sourcemaps.init())
    .pipe(postcss(require("./postcss.config")))
    .pipe(sourcemaps.write())
    .pipe(rename("template.min.css"))
    .pipe(gulp.dest(paths.styles.dest));
}

function scripts() {
  return gulp
    .src(paths.scripts.src)
    .pipe(gulpWebpack(webpackConfig, webpack))
    .pipe(gulp.dest(paths.scripts.dest));
}

// переносим шрифты
function fonts() {
  return gulp
    .src(`${config.SRC_DIR}/fonts/**`)
    .pipe(gulp.dest(`${config.DIST_DIR}/fonts/`));
}

// просто переносим картинки
function images() {
  return gulp
    .src([`${config.SRC_DIR}/images/**`])
    .pipe(gulp.dest(`${config.DIST_DIR}/images/`));
}

// переносим папку
function html() {
  return gulp
    .src(`${config.SRC_DIR}/html/**`)
    .pipe(gulp.dest(`${config.DIST_DIR}/html/`));
}

function joomla() {
  return gulp
    .src(`${config.SRC_DIR}/joomla-template/**`)
    .pipe(gulp.dest(`${config.DIST_DIR}/`));
}

exports.templates = templates;
exports.styles = styles;
exports.clean = clean;
exports.scripts = scripts;
exports.fonts = fonts;
exports.images = images;
exports.html = html;
exports.joomla = joomla;

gulp.task(
  "default",
  gulp.series(
    clean,
    gulp.parallel(styles, templates, scripts, fonts, images, html, joomla),
    gulp.parallel(watch, server)
  )
);
