module.exports = function(grunt) {

    // 1. Всё конфигурирование тут
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        concat: {
            // 2. Конфигурация для объединения файлов тут.
            dist: {
                src: [
                    'src/scripts/*.js', // Все JS в папке libs
                    //'bower_components/angular/angular.min.js',  // angular
//                    'bower_components/jquery/dist/jquery.min.js',  // Какой-то файл
//                    'bower_components/bootstrap/dist/js/bootstrap.min.js'  
                ],
                dest: 'src/build/production.js',
            }
        },
        uglify: {
            build: {
                src: 'src/build/production.js',
                dest: 'src/build/production.min.js'
            }
        }

    });

    // 3. Здесь мы сообщаем Grunt, что мы планируем использовать этот плагин:
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    

    // 4. Мы сообщаем Grunt, что нужно делать, когда мы введём "grunt" в терминале.
    grunt.registerTask('default', ['concat', 'uglify']);

};