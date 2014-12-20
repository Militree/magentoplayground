module.exports = function(grunt) {

grunt.initConfig({
  sass: {                              
    dist: {                            
      options: {                       
        style: 'expanded'
      },
      files: {                         
        'skin/frontend/brandyn/default/css/custom.css':'skin/frontend/brandyn/default/sass/custom.scss',       // 'destination': 'source'
      }
    }
  }
});

grunt.loadNpmTasks('grunt-contrib-sass');

grunt.registerTask('default', ['sass']);

}