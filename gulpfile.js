// REQUIREMENTS
const { src, dest, watch, series, parallel } = require("gulp")
const browserSync = require("browser-sync").create()
const uglify = require("gulp-uglify")
const concat = require("gulp-concat")
const rename = require("gulp-rename")
const sass = require("gulp-sass")(require("sass"))
const autoprefixer = require("gulp-autoprefixer")
const cleanCSS = require("gulp-clean-css")
const sourcemaps = require("gulp-sourcemaps")
const imagemin = require("gulp-imagemin")
const svgstore = require("gulp-svgstore")
const svgmin = require("gulp-svgmin")
const path = require("path")
const sitename = "article-experiment" // set your siteName here

// PATHS
const paths = {
	scss: {
		src: "assets/sass/*.scss",
		dest: "dist/css/",
	},
	js: {
		src: "assets/js/*.js",
		dest: "dist/js/",
	},
	img: {
		src: "assets/img/*",
		dest: "dist/img",
	},
	svg: {
		src: "assets/svg/*.svg",
		dest: "dist/svg/",
	},
}

// BROWSER SYNC WITH PHP INSIDE SERVER
function sync() {
	browserSync.init({
		proxy: {
			target: "http://article-experiment.test",
			ws: true
		},
		open: "local",
		logLevel: "debug",
		notify: false,
		ghostMode: false,
		https: false
	})
}

// TASKS
function compileSass() {
	return src(paths.scss.src)
		.pipe(sourcemaps.init())
		.pipe(
			sass({
				outputStyle: "compressed",
			})
		)
		.pipe(autoprefixer())
		.pipe(cleanCSS())
		.pipe(rename({ suffix: ".min" }))
		.pipe(sourcemaps.write())
		.pipe(dest(paths.scss.dest))
		.pipe(browserSync.stream())
}

function compileJs() {
	return src(paths.js.src)
		.pipe(sourcemaps.init())
		.pipe(concat("scripts.js"))
		.pipe(dest(paths.js.dest))
		.pipe(rename("scripts.min.js"))
		.pipe(uglify())
		.pipe(sourcemaps.write())
		.pipe(dest(paths.js.dest))
		.pipe(browserSync.stream())
}

function minifyImage() {
	return src(paths.img.src).pipe(imagemin()).pipe(dest(paths.img.dest))
}

function minifySvg() {
	return src(paths.svg.src)
		.pipe(
			svgmin(function (file) {
				var prefix = path.basename(file.relative, path.extname(file.relative))
				return {
					plugins: [
						{
							cleanupIDs: {
								prefix: prefix + "-",
								minify: true,
							},
						},
					],
				}
			})
		)
		.pipe(svgstore({ inlineSvg: true }))
		.pipe(dest(paths.svg.dest))
}

// WATCH
function watchSass() {
	watch(paths.scss.src, compileSass)
}

function watchJs() {
	watch(paths.js.src, compileJs)
}

function watchPhp() {
	watch([ // Set your custom files for browser-sync to watch for live reloading here.
		"*.html", 
		"./**/*.php", 
		"./*.json"
	]).on("change", browserSync.reload)
}

// DEFAULT TASK
exports.default = series(
	compileSass,
	compileJs,
	minifyImage,
	minifySvg,
	parallel(sync, watchSass, watchJs, watchPhp)
)
