const gulp = require('gulp');
const sass = require('gulp-sass');

gulp.task('sass', function(done){
    // stream
    gulp.src('./sass/**/*.scss') //タスクで処理するソースの指定
    .pipe(sass()) //処理させるモジュールを指定
    .pipe(gulp.dest('./style/css/')); //保存先を指定

    console.log('sass compile');
    done();
});

//defaultタスクは、タスク名を指定しなかったときに実行されるタスクです。
gulp.task('default', ['sass']);