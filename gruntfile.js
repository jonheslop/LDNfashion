module.exports = function(grunt) {
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		sass: {
			dist: {
				files: {
					'style.css' : 'style.scss'
				},
				options: {
					quiet: true
				}
			}
		},
		watch: {
			css: {
				files: '**/*.scss',
				tasks: ['sass']
			},
			all: {
				files: [
					'js/*.js',
					'{,**/}*.{png,jpg,gif,php}'
				]
			},
			options: {
				livereload: true
			}
		},
		cssmin: {
			minify: {
				expand: true,
				src: ['*.css', '!*.min.css'],
				ext: '.min.css'
			}
		},
		uglify: {
			options: {
				mangle: false
			},
			my_target: {
				files: {
					'js/site.min.js': ['js/site.js']
				}
			}
		}
	});
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.registerTask('default',['watch']);
	grunt.registerTask('build',['sass','cssmin', 'uglify']);
}
