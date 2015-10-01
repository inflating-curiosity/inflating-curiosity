/* eslint-env node */
'use strict';

var gulp = require('gulp');
var $ = require('gulp-load-plugins')({
  rename: {
    'gulp-connect-php': 'connect',
    'gulp-minify-css': 'minify'
  }
});
var browserSync = require('browser-sync');
var reload = browserSync.reload;
var basename = require('path').basename;
var p = require('./package.json');
var config = {
  archiveName: p.name + '-' + p.version + '.zip',
  hostname: '127.0.0.1',
  port: '8000'
};

var AUTOPREFIXER_BROWSERS = [
  '> 1%',
  'last 2 versions',
  'Firefox ESR',
  'Opera 12.1'
];

var errorHandler = {
  less: function (err) {
    var colors = $.util.colors;
    var file = basename(err.filename);
    $.util.beep();
    $.util.log(colors.bgRed.black('[' + file + '] L' + err.line + ':' + err.column));
    browserSync.notify('Error in compiling ' + file);
    this.emit('end');
  },
  js: function (err) {
    var color = $.util.colors;
    var message = color.gray(err.lineNumber) + ' ' + err.message;
    message = new $.util.PluginError(err.plugin, message).toString();

    $.util.beep();
    process.stderr.write(message + '\n');
    browserSync.notify('Error in compiling ');
    this.emit('end');
  }
};

gulp.task('styles', function () {
  return gulp.src(['assets/css/**/main.css'])
      .pipe($.sourcemaps.init())
      .pipe($.autoprefixer({browsers: AUTOPREFIXER_BROWSERS}))
      .pipe($.minify())
      .pipe($.rename({suffix: '.min'}))
      .pipe($.sourcemaps.write('.'))
      .pipe(gulp.dest('assets/css'))
      .pipe($.filter('**/*.css'))
      .pipe(reload({stream: true}));
});

gulp.task('scripts', function () {
  var scripts = [
    {
      src: [
        'bower_components/jquery/dist/jquery.js',
        'bower_components/jquery.fitvids/jquery.fitvids.js',
        'bower_components/imagesloaded/imagesloaded.pkgd.js',
        'assets/js/main.js'

      ],
      dest: 'assets/js',
      concat: 'main.js'
    },
    {
      src: ['bower_components/modernizr/modernizr.js'],
      dest: 'assets/js/',
      concat: 'modernizr.js'
    }
  ];

  for (var i in scripts) {
    if ({}.hasOwnProperty.call(scripts, i)) {
      var script = scripts[i];
      gulp.src(script.src)
        .pipe($.sourcemaps.init())
        .pipe($.plumber({errorHandler: errorHandler.js}))
        .pipe($.uglify())
        .pipe($.concat(script.concat))
        .pipe($.rename({suffix: '.min'}))
        .pipe($.sourcemaps.write('.'))
        .pipe(gulp.dest(script.dest))
        .pipe(reload({stream: true, once: true}));
    }
  }
});

gulp.task('copy', function () {
  // gulp.src(['bower_components/bootstrap/dist/fonts/*'])
  //   .pipe(gulp.dest('assets/fonts'));
});

gulp.task('lint', function () {
  gulp.src([
    'assets/js/**/*.js',
    '!assets/js/**/*.min.js',
    'rename.js',
    'gulpfile.js'
  ])
  .pipe($.eslint())
  .pipe($.eslint.format())
  .pipe($.eslint.failAfterError());
});

gulp.task('package', ['build'], function () {
  gulp.src([
    '**/*',
    '.eslintrc',
    '.gitignore',
    '.htaccess',
    '!bower_components/**/*',
    '!bower_components',
    '!node_modules/**/*',
    '!node_modules',
    // '!site/accounts/*.php',
    '!thumbs/**/*',
    '!assets/avatars/**/*',
    // '!site/cache/**/*',
    // 'site/cache/index.html',
    // '!site/config/**/*',
    // 'site/config/config.php',
    '!*.zip'
  ])
    .pipe($.size({title: 'unziped'}))
    .pipe($.zip(config.archiveName))
    .pipe($.size({title: 'ziped'}))
    .pipe(gulp.dest('.'));
});

gulp.task('serve', ['compile'], function () {
  $.connect.server({
    hostname: config.hostname,
    port: config.port,
    base: '.',
    stdio: 'ignore'
  }, function () {
    console.log('PHP server initialized, starting BrowserSync');
    browserSync({
      proxy: config.hostname + ':' + config.port,
      notify: true,
      tunnel: false
    });
  });

  // watch for changes
  gulp.watch([
    'site/**/*.php',
    'assets/images/**/*'
  ]).on('change', reload);

  gulp.watch(['assets/css/**/*.css', '!**/*.min.css'], ['styles']);
  gulp.watch(['assets/js/**/*.js', '!**/*.min.js'], ['scripts']);
});

gulp.task('compile', ['styles', 'scripts', 'copy']);
gulp.task('build', ['lint', 'compile']);
gulp.task('zip', ['package']);
gulp.task('default', ['build']);
