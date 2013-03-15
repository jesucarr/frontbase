'use strict';
var lrSnippet = require('grunt-contrib-livereload/lib/utils').livereloadSnippet;
var mountFolder = function (connect, dir) {
    return connect.static(require('path').resolve(dir));
};

module.exports = function (grunt) {
    // load all grunt tasks
    require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

    // configurable paths
    var yeomanConfig = {
        app: 'app'
    };

    grunt.initConfig({
        yeoman: yeomanConfig,
        watch: {
            coffee: {
                files: ['<%= yeoman.app %>/wp-content/themes/frontbase/assets/javascripts/coffeescript/*.coffee'],
                tasks: ['coffee:dist']
            },
            coffeeTest: {
                files: ['test/spec/*.coffee'],
                tasks: ['coffee:test']
            },
            compass: {
                files: ['<%= yeoman.app %>/wp-content/themes/frontbase/assets/stylesheets/scss/*.{scss,sass}'],
                tasks: ['compass']
            },
            livereload: {
                files: [
                    '<%= yeoman.app %>/wp-content/themes/frontbase/*.php',
                    '<%= yeoman.app %>/wp-content/themes/frontbase/assets/stylesheets/*.css',
                    '<%= yeoman.app %>/wp-content/themes/frontbase/assets/javascripts/*.js',
                    '<%= yeoman.app %>/wp-content/themes/frontbase/assets/images/*.{png,jpg,jpeg}'
                ],
                tasks: ['livereload']
            }
        },
        connect: {
            livereload: {
                options: {
                    port: 8000,
                    middleware: function (connect) {
                        return [
                            lrSnippet,
                            mountFolder(connect, 'app')
                        ];
                    }
                }
            },
            test: {
                options: {
                    port: 8001,
                    middleware: function (connect) {
                        return [
                            mountFolder(connect, 'test')
                        ];
                    }
                }
            }
        },
        open: {
            server: {
                // url: 'http://localhost:<%= connect.livereload.options.port %>'
                url: 'http://frontendmatters.local'
            }
        },
        // clean: {
        //     dist: ['.tmp', '<%= yeoman.dist %>/*'],
        //     server: '.tmp'
        // },
        // jshint: {
        //     options: {
        //         jshintrc: '.jshintrc'
        //     },
        //     all: [
        //         'Gruntfile.js',
        //         '<%= yeoman.app %>/wp-content/themes/frontbase/assets/javascripts/*.js',
        //         'test/spec/*.js'
        //     ]
        // },
        mocha: {
            all: {
                options: {
                    run: true,
                    urls: ['http://localhost:<%= connect.test.options.port %>/index.html']
                }
            }
        },
        coffee: {
            dist: {
                src: '<%= yeoman.app %>/wp-content/themes/frontbase/assets/javascripts/coffeescript/*.coffee',
                dest: '<%= yeoman.app %>/wp-content/themes/frontbase/assets/javascripts/app.js',
                options: {
                    bare: true
                }
            },
            test: {
                files: [{
                    expand: true,
                    cwd: 'test/spec',
                    src: '*.coffee',
                    dest: 'test/spec'
                }]
            }
        },
        compass: {
            options: {
                sassDir: '<%= yeoman.app %>/wp-content/themes/frontbase/assets/stylesheets/scss',
                cssDir: '<%= yeoman.app %>/wp-content/themes/frontbase/assets/stylesheets',
                imagesDir: '<%= yeoman.app %>/wp-content/themes/frontbase/assets/images',
                javascriptsDir: '<%= yeoman.app %>/wp-content/themes/frontbase/assets/javascripts',
                fontsDir: '<%= yeoman.app %>/wp-content/themes/frontbase/assets/fonts',
                importPath: '<%= yeoman.app %>/wp-content/themes/frontbase/components',
                relativeAssets: true,
                force: true
            },
            dist: {},
            server: {
                options: {
                    debugInfo: true
                }
            }
        },
        uglify: {
            dist: {
              files: {
                '<%= yeoman.app %>/wp-content/themes/frontbase/assets/javascripts/bootstrap.js': [
                    '<%= yeoman.app %>/wp-content/themes/frontbase/components/sass-bootstrap/js/bootstrap-transition.js', 
                    '<%= yeoman.app %>/wp-content/themes/frontbase/components/sass-bootstrap/js/bootstrap-alert.js', 
                    '<%= yeoman.app %>/wp-content/themes/frontbase/components/sass-bootstrap/js/bootstrap-button.js', 
                    '<%= yeoman.app %>/wp-content/themes/frontbase/components/sass-bootstrap/js/bootstrap-carousel.js', 
                    '<%= yeoman.app %>/wp-content/themes/frontbase/components/sass-bootstrap/js/bootstrap-collapse.js', 
                    '<%= yeoman.app %>/wp-content/themes/frontbase/components/sass-bootstrap/js/bootstrap-dropdown.js', 
                    '<%= yeoman.app %>/wp-content/themes/frontbase/components/sass-bootstrap/js/bootstrap-modal.js', 
                    '<%= yeoman.app %>/wp-content/themes/frontbase/components/sass-bootstrap/js/bootstrap-tooltip.js', 
                    '<%= yeoman.app %>/wp-content/themes/frontbase/components/sass-bootstrap/js/bootstrap-popover.js', 
                    '<%= yeoman.app %>/wp-content/themes/frontbase/components/sass-bootstrap/js/bootstrap-scrollspy.js',  
                    '<%= yeoman.app %>/wp-content/themes/frontbase/components/sass-bootstrap/js/bootstrap-tab.js', 
                    '<%= yeoman.app %>/wp-content/themes/frontbase/components/sass-bootstrap/js/bootstrap-typeahead.js', 
                    '<%= yeoman.app %>/wp-content/themes/frontbase/components/sass-bootstrap/js/bootstrap-affix.js'
                ],
                '<%= yeoman.app %>/wp-content/themes/frontbase/assets/javascripts/app.js': '<%= yeoman.app %>/wp-content/themes/frontbase/assets/javascripts/app.js'
                // '<%= yeoman.app %>/wp-content/themes/frontbase/assets/javascripts/require.js': '<%= yeoman.app %>/wp-content/themes/frontbase/components/requirejs/require.js'
              }
            }
        },
        // not used since Uglify task does concat,
        // but still available if needed
        /*concat: {
            dist: {}
        },*/
        // requirejs: {
        //     dist: {
        //         // Options: https://github.com/jrburke/r.js/blob/master/build/example.build.js
        //         options: {
        //             // `name` and `out` is set by grunt-usemin
        //             baseUrl: '<%= yeoman.app %>/wp-content/themes/frontbase/assets/javascripts',
        //             optimize: 'none',
        //             // TODO: Figure out how to make sourcemaps work with grunt-usemin
        //             // https://github.com/yeoman/grunt-usemin/issues/30
        //             //generateSourceMaps: true,
        //             // required to support SourceMaps
        //             // http://requirejs.org/docs/errors.html#sourcemapcomments
        //             preserveLicenseComments: false,
        //             useStrict: true,
        //             wrap: true,
        //             //uglify2: {} // https://github.com/mishoo/UglifyJS2
        //             mainConfigFile: '<%= yeoman.app %>/wp-content/themes/frontbase/assets/javascripts/main-config.js',
        //             name: 'main',
        //             out: '<%= yeoman.app %>/wp-content/themes/frontbase/assets/javascripts/main.js'
        //         }

               




        //     }
        // },
        // useminPrepare: {
        //     html: '<%= yeoman.app %>/index.html',
        //     options: {
        //         dest: '<%= yeoman.dist %>'
        //     }
        // },
        // usemin: {
        //     html: ['<%= yeoman.dist %>/*.html'],
        //     css: ['<%= yeoman.dist %>/styles/*.css'],
        //     options: {
        //         dirs: ['<%= yeoman.dist %>']
        //     }
        // },
        imagemin: {
            dist: {
                files: [{
                    expand: true,
                    cwd: '<%= yeoman.app %>/wp-content/themes/frontbase/assets/images',
                    src: '*.{png,jpg,jpeg}',
                    dest: '<%= yeoman.app %>/wp-content/themes/frontbase/assets/images'
                }]
            }
        },
        // cssmin: {
        //     dist: {
        //         files: {
        //             '<%= yeoman.dist %>/styles/main.css': [
        //                 '.tmp/styles/*.css',
        //                 '<%= yeoman.app %>/styles/*.css'
        //             ]
        //         }
        //     }
        // },
        // htmlmin: {
        //     dist: {
        //         options: {
        //             removeCommentsFromCDATA: true,
        //             // https://github.com/yeoman/grunt-usemin/issues/44
        //             //collapseWhitespace: true,
        //             collapseBooleanAttributes: true,
        //             removeAttributeQuotes: true,
        //             removeRedundantAttributes: true,
        //             useShortDoctype: true,
        //             removeEmptyAttributes: true,
        //             removeOptionalTags: true
        //         },
        //         files: [{
        //             expand: true,
        //             cwd: '<%= yeoman.app %>',
        //             src: '*.html',
        //             dest: '<%= yeoman.dist %>'
        //         }]
        //     }
        // },
        // copy: {
        //     dist: {
        //         files: [{
        //             expand: true,
        //             dot: true,
        //             cwd: '<%= yeoman.app %>',
        //             dest: '<%= yeoman.dist %>',
        //             src: [
        //                 '*.{ico,txt}',
        //                 '.htaccess'
        //             ]
        //         }]
        //     }
        // },
        bower: {
            rjsConfig: 'app/wp-content/themes/frontbase/assets/javascripts/main.js',
            indent: '    '
        }
    });

    grunt.renameTask('regarde', 'watch');
    // remove when mincss task is renamed
    grunt.renameTask('mincss', 'cssmin');

    grunt.registerTask('server', [
        // 'clean:server',
        'coffee:dist',
        'compass:server',
        'livereload-start',
        'connect:livereload',
        'open',
        'watch'
    ]);

    grunt.registerTask('test', [
        // 'clean:server',
        'coffee',
        'compass',
        'connect:test',
        'mocha'
    ]);

    grunt.registerTask('build', [
        // 'clean:dist',
        // 'jshint',
        'test',
        'coffee',
        'compass:dist',
        // 'useminPrepare',
        // 'requirejs',
        'imagemin',
        // 'cssmin',
        // 'htmlmin',
        // 'concat',
        'uglify'
        // 'copy',
        // 'usemin'
    ]);

    grunt.registerTask('default', ['build']);
};
