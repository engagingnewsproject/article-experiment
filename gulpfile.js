import gulp from 'gulp'
import browserSync from 'browser-sync'

import sourcemaps from 'gulp-sourcemaps'
import autoprefixer from 'gulp-autoprefixer'
// import reload from browserSync.reload;
import minifyCss from 'gulp-minify-css'
import uglify from 'gulp-uglify'
import rename from "gulp-rename"
import imagemin from 'gulp-imagemin'
import svgstore from 'gulp-svgstore'
import svgmin from 'gulp-svgmin'
import path from 'path'
import concat from "gulp-concat"
import dartSass from 'sass';
import connectPHP from 'gulp-connect-php'
import gulpSass from 'gulp-sass';
const sass = gulpSass( dartSass );
// Static Server + watching scss/html files

gulp.task('svgmethod', async function () {
  return gulp
  .src('assets/svg/*.svg')
  .pipe(svgmin(function (file) {
      var prefix = path.basename(file.relative, path.extname(file.relative));
      return {
          plugins: [{
              cleanupIDs: {
                  prefix: prefix + '-',
                  minify: true
              }
          }]
      };
  }))
  .pipe(svgstore({ inlineSvg: true }))
  .pipe(gulp.dest('dist/svg/'));
})

gulp.task('svgstore', gulp.series('svgmethod'));
/* gulp.task('sass', function () {
  // gulp.src locates the source files for the process.
  // This globbing function tells gulp to use all files
  // ending with .scss or .sass within the scss folder.
  return gulp.src('stylesheets/*.{scss,sass}')
    // Initializes sourcemaps
    .pipe(sourcemaps.init())
    // Converts Sass into CSS with Gulp Sass
    .pipe(sass({
      errLogToConsole: true
    }))
    // adds prefixes to whatever needs to get done
    .pipe(autoprefixer())
    // Writes sourcemaps into the CSS file
    .pipe(sourcemaps.write())
    // Outputs CSS files in the css folder
    .pipe(gulp.dest(''));
})*/


gulp.task('sass', async function () {
  processSASS('styles');
});

function jsMethod() {
  var jsFiles = 'assets/js/*.js',
  jsDest = 'dist/js';

  return gulp.src(jsFiles)
      .pipe(concat('scripts.js'))
      .pipe(gulp.dest(jsDest))
      .pipe(rename('scripts.min.js'))
      .pipe(uglify())
      .pipe(gulp.dest(jsDest));
}
gulp.task('js', gulp.series(jsMethod));

function compressJS(filename) {
    rootPath = "assets/js/";
    src = "assets/js/"+filename+".js";
    dist = 'dist/js/';

    return gulp.src(src)
        .pipe(uglify())
        .pipe(rename({
          suffix: '.min'
        }))
        .pipe(gulp.dest(dist));
}


gulp.task('compressImgMethod', function () {
  return gulp.src('assets/img/*')
          .pipe(imagemin())
          .pipe(gulp.dest('dist/img'));
});
gulp.task('compressImg', gulp.series('compressImgMethod'));


async function processSASS(filename) {
    return gulp.src('assets/sass/'+filename+'.{scss,sass}')
      // Converts Sass into CSS with Gulp Sass
      .pipe(sass({
        errLogToConsole: true
      }))
      // adds prefixes to whatever needs to get done
      .pipe(autoprefixer())

      // minify the CSS
      .pipe(minifyCss())

      // rename to add .min
      .pipe(rename({
        suffix: '.min'
      }))
      // Outputs CSS files in the css folder
      .pipe(gulp.dest('dist/css/'));
}



gulp.task('watch', async function () {
  
  browserSync.init({
    // proxy: "localhost",
    proxy: 'dev/2023-article-experiment',
    //host: 'dev/2023-article-experiment',
    open: 'external'
  });

  // Watch SCSS file for change to pass on to sass compiler,
  gulp.watch('assets/sass/*.{scss,sass}', gulp.series('sass'));
  // Watch SCSS file for change to pass on to sass compiler,
  gulp.watch('assets/js/*.js', gulp.series('js'));
  // run img compression when images added to directory
  gulp.watch('assets/img/*.*', gulp.series('compressImg'));
  // run SVG when svg files added
  gulp.watch('assets/svg/*.svg', gulp.series('svgstore'));
  // Watch our CSS file and reload when it's done compiling
  gulp.watch("dist/css/*.css").on("change", browserSync.reload );
  // Watch php file
  gulp.watch("*/*.php").on("change", browserSync.reload );
  // watch javascript files
  gulp.watch("dist/js/*.js").on("change", browserSync.reload );
});


gulp.task('serve', gulp.series('sass', 'js', 'compressImg', 'svgstore', 'watch'), function() {
  browserSync.init({
    // proxy: "localhost",
    proxy: 'dev/2023-article-experiment',
    index: 'article_list.html',
    //host: 'dev/2023-article-experiment',
    open: 'external'
  });

  // Watch SCSS file for change to pass on to sass compiler,
  gulp.watch('assets/sass/*.{scss,sass}', gulp.series('sass'));
  // Watch SCSS file for change to pass on to sass compiler,
  gulp.watch('assets/js/*.js', gulp.series('js'));
  // run img compression when images added to directory
  gulp.watch('assets/img/*.*', gulp.series('compressImg'));
  // run SVG when svg files added
  gulp.watch('assets/svg/*.svg', gulp.series('svgstore'));
  // Watch our CSS file and reload when it's done compiling
  gulp.watch("dist/css/*.css").on("change", browserSync.reload );
  // Watch php file
  gulp.watch("*/*.php").on("change", browserSync.reload );
  // watch javascript files
  gulp.watch("dist/js/*.js").on("change", browserSync.reload );
});


// Creating a default task
gulp.task('default', gulp.series('serve'));


