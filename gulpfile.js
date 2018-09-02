// ####################### PATHS ########################

const name = "myfood"

const path = {
    inputs:{
        styles: "dev/stylesheets/**/*.sass",
        js: "dev/javascripts/"
    },
    outputs:{
        styles: `www/wp-content/themes/${name}/assets/stylesheets/`,
        js: `www/wp-content/themes/${name}/assets/javascripts/`,
    },
    theme:`www/wp-content/themes/${name}`

}


// ####################### REQUIRES #######################
const gulp = require('gulp'),
    autoprefixer = require('gulp-autoprefixer'),
    babel = require('gulp-babel')
    sass = require('gulp-sass'),
    concat = require('gulp-concat'),
    rename = require('gulp-rename'),
    uglify = require('gulp-uglify'),
    livereload = require('gulp-livereload'),
    pixrem = require('gulp-pixrem')



// ####################### TASKS #########################
gulp.task('styles',  () =>
    gulp.src(path.inputs.styles)
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(autoprefixer({
            browsers: ['last 10 versions', '> 1%', 'Explorer 9'],
            cascade: false
        }))
        .pipe(pixrem({atrules:true}))
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(path.outputs.styles))
        .pipe(livereload())
)

gulp.task('styles-norem',  () =>
  gulp.src(path.inputs.styles)
    .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
    .pipe(autoprefixer({
      browsers: ['last 10 versions', '> 1%', 'Explorer 8'],
      cascade: false
    }))
    .pipe(pixrem({
      atrules:true,
      replace:true,
      html: true
    }))
    .pipe(rename({suffix: '.norem'}))
    .pipe(gulp.dest(path.outputs.styles))
    .pipe(livereload())

)

gulp.task('vendors-js', () =>
    gulp.src(path.inputs.js + 'vendor/*.js')
        .pipe(concat('vendors.min.js'))
        .pipe(uglify())
        .on('error', swallowError)
        .pipe(gulp.dest(path.outputs.js))
        .pipe(livereload())
)

gulp.task('dev-js', () =>
    gulp.src(path.inputs.js + 'app/**/*.js')
        .on('error', swallowError)
        .pipe(concat('app.min.js'))
        .on('error', swallowError)
        .pipe(gulp.dest(path.outputs.js))
        .pipe(livereload())
)

gulp.task('prod-js', ()=>{
    gulp.src(path.inputs.js + 'app/**/*.js')
        .pipe(babel({presets: ['es2015']}))
        .on('error', swallowError)
        .pipe(concat('app.min.js'))
        .on('error', swallowError)
        .pipe(uglify())
        .pipe(gulp.dest(path.outputs.js))
        .pipe(livereload())
})

gulp.task('concatProd', ()=>{
    gulp.src([path.outputs.js+'vendors.min.js', path.outputs.js+'app.min.js'])
        .pipe(concat('prod.min.js'))
        .on('error', swallowError)
        .pipe(gulp.dest(path.outputs.js));
})

gulp.task('reloadTheme', ()=>{
    gulp.src(path.theme + '/**/*.php').pipe(livereload())
})

gulp.task('watch', () => {
    livereload.listen()

    gulp.watch(path.theme + '/**/*.php', ['reloadTheme'])

    gulp.watch(path.inputs.styles, ['styles'])
    gulp.watch(path.inputs.styles, ['styles-norem'])
    // gulp.watch(path.inputs.js + 'app/**/*.js', ['dev-js'])
    gulp.watch(path.inputs.js + 'app/**/*.js', ['prod-js'])
    gulp.watch(path.inputs.js + 'vendor/*.js', ['vendors-js'])
})

gulp.task('default', ['styles','vendors-js','prod-js'])

function swallowError (error) {
    console.log(error.toString())
    this.emit('end')
}