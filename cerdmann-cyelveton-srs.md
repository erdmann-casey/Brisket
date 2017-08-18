# Brisket SRS

### Casey Erdmann and Cory Yelverton

## Requirements:

1. Needs to allow uploading of images: png, jpg, and gif no larger than 15mb
2. Needs to allow uploading of text no larger than 0.5mb
3. Urls are generated on screen to making sharing text/images easy
4. Urls are created uniquely by file hashing the uploads and using the hash as the url ending.
5. File uploads need to be secure. No non image files, and content should be filtered to protect against XSS.
6. Design needs to be mobile responsive
7. Should be service based by design. MVC design is ideal.
8. API for services should be easily usable by third parties.
9. Basic Syntax Highlighting support for the text editor/display.
