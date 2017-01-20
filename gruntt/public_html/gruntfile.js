module.exports = function(grunt) {

    // 1. �� ���������������� ���
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        concat: {
            // 2. ������������ ��� ����������� ������ ���.
            dist: {
                src: [
                    'src/scripts/*.js', // ��� JS � ����� libs
                    //'bower_components/angular/angular.min.js',  // angular
//                    'bower_components/jquery/dist/jquery.min.js',  // �����-�� ����
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

    // 3. ����� �� �������� Grunt, ��� �� ��������� ������������ ���� ������:
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    

    // 4. �� �������� Grunt, ��� ����� ������, ����� �� ����� "grunt" � ���������.
    grunt.registerTask('default', ['concat', 'uglify']);

};