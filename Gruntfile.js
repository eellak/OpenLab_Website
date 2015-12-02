module.exports = function (grunt) {
grunt.initConfig({

    /* uglify: {
        dist: {
            src: ['assets/js/vendor/*.js', 'assets/js/*.js'],
            dest: 'assets/js/app.min.js'
        }
    }, */

    sass: {
        dev: {
            options: {
                style: 'expanded',
                compass: false
            },
            files: {
                'css/main.css': 'sass/main.scss'
            }
        },
        dist: {
            options: {
                style: 'compressed',
                compass: false
            },
            files: {
                'css/app.min.css': 'sass/main.scss'
            }
        }
    },

    watch: {
        sass: {
            files: 'sass/{,*/}*.{scss,sass}',
            tasks: ['sass:dev']
        }
    }
});

// load plugins
grunt.loadNpmTasks('grunt-contrib-watch');
//grunt.loadNpmTasks('grunt-contrib-uglify');
grunt.loadNpmTasks('grunt-contrib-sass');

// register at least this one task
grunt.registerTask('default', [ 
    /* 'sass:dist',
    'uglify' */
	'sass:dist'
]);

};