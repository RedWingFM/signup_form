const gulp				= require('gulp'),
	  browserSync		= require('browser-sync').create(),
	  reload			= browserSync.reload;

function watch() {

	browserSync.init({
		proxy: {
			target: "test"
		},
		notify: false
	});

	browserSync.watch("**/*.html").on("change", reload);
	browserSync.watch("**/*.css").on("change", reload);
	browserSync.watch("**/*.js").on("change", reload);
	browserSync.watch("**/*.php").on("change", reload);

}

exports.default = watch;