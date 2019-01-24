# Advanced Custom Field: Audio/Video Player
Audio and Video Player for Advanced Custom Fields: select audio or video files from Media Library and display them using the wordpress builtin media player (or the native html5 player). 

# Description
This field let users select and display an audio or video file using the media player.
This plugin is based on the native ACF File Field, that, unfortunately, does not have the feature to show the selected media file using the media player.

![ACF Audio/Video Field](https://github.com/ipsips/acf-audio-video/blob/master/acf-audio-video-screencast.gif)

# Installation
1. Copy the acf-audio-video-player folder into your wp-content/plugins folder
2. Activate the Advanced Custom Fields: Audio/Video Player Field plugin via the plugins admin page
3. Create a new field via ACF and select the Audio/Video Player type

# Usage
- Select Shortcode as returned format to display the default mediaplayer (MediaElements)
- Select Player HTML as returned format to display a basic HTML5 player (`<video>` or `<audio>`)


# Migrate from ACF Audio/Video Field (@ipsips)
This field is the evolution of the [ACF Audio/Video Field](https://github.com/ipsips/acf-audio-video) that [no longer works](https://github.com/ipsips/acf-audio-video/issues) with the latests versions of ACF.
If you wish to migrate from ACF Audio/Video to ACF Audio/Video Player Field, try to follow this steps:
1. Install the new ACF Audio/Video Player
2. Change every field type from `audioVideo` to `Audio/Video Player`
3. Ensure that `Field Name` and `Return Value` remain the same
4. Resave every page/post/custom-post of your blog that has an Audio/Video Custom Field previously stored
5. Preview every post to be sure that the audio or video files are being displayed in frontend
6. When finished uninstall the old ACF Audio/Video Field


# Compatibility
This ACF Field has been tested with:
- ACF 5.7.0 PRO or later (but should work also with ACF 5.x)
- Wordpress 4.9.8
- Does not work with ACF4

# Development and Test
This field is still in development.
Please, test it before using in any production website.
If you find any issues, or need some updates/enanchements please feel free to [report them here](https://github.com/virgo79/acf-audio-video-player/issues). I'll do my best to keep everything up to date.
