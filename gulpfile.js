const { watch, src, dest } = require("gulp")
const uglify = require("gulp-uglify")
const rename = require("gulp-rename")
const concat = require("gulp-concat")
const autoprefixer = require("gulp-autoprefixer")
const sass = require("gulp-sass")(require("sass"))
const cleanCSS = require("gulp-clean-css")
const browsersync = require('browser-sync').create();

function css(filename) {
	const source = "assets/sass/" + filename + ".{scss,sass}"
	return src(source)
		.pipe(sass().on("error", sass.logError))
		.pipe(autoprefixer())
		.pipe(cleanCSS({ compatibility: "ie8" }))
		.pipe(
			rename({
				suffix: ".min",
			})
		)
		.pipe(dest("dist/css/"))
}

function js() {
  const source = "assets/js/*.js"
	return src(source)
		.pipe(concat("scripts.js"))
		.pipe(rename("scripts.min.js"))
		.pipe(uglify())
		.pipe(dest("dist/js"))
}

// Watch files
function watchFiles() {
    watch("assets/sass/*.{scss,sass}", css)
    watch('assets/js/*.js', js);
}

// BrowserSync
function browserSync() {
    browsersync.init({
        server: {
            baseDir: './'
        },
        port: 3000
    });
}
exports.watch = parallel(watchFiles, browserSync);
exports.default = series(parallel(js, css))

// series(defaultTask, javascript, css)
