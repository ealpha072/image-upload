# image-upload

#This simple image upload system has been written entirely in php.
## Flow;
*  Images and image description are collected via a form, the form is then sent to the same page for validation when the upload button is clicked.
* The image description text is then escaped for special characters and the image is then given a location and a name with the **basename() function** its then sent to the database together with the text.
* The function **move_uploaded_file()** moves the uploaded image to the images folder and alerts for success or failure.
* The db is then querried for all images to be displayed on the img_div.
## Techs used;
* PHP -backend logic
* mysqli - database querry and interactions
