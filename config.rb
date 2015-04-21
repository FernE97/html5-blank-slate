# Require any additional compass plugins here.
add_import_path 'bower_components/foundation/scss'

# Set this to the root of your project when deployed:
http_path = '/'
css_dir = 'assets/css'
sass_dir = 'assets/scss'
images_dir = 'assets/images'
javascripts_dir = 'assets/js'
fonts_dir = 'assets/fonts'

# nested / expanded / compact / compressed
# change to compressed for production
output_style = :compact

# To enable relative paths to assets via compass helper functions. Uncomment:
# relative_assets = true

# To disable debugging comments that display the original location of your selectors. Uncomment:
line_comments = false
color_output = false


# If you prefer the indented syntax, you might want to regenerate this
# project again passing --syntax sass, or you can uncomment this:
# preferred_syntax = :sass
# and then run:
# sass-convert -R --from scss --to sass lib/scss scss && rm -rf sass && mv scss sass
preferred_syntax = :scss
