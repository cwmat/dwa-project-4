# Charles (Chaz) Mateer Project 4: HES DWA Fall 2015
## Brain Break

### Live URL to the site
- [p4.cwmat-dwa.me](http://p4.cwmat-dwa.me/)

### Description
The goal of this project was to create a Laravel based/database driven web application that included examples of all four CRUD operations.  I decided to implement these requirements by creating a simple micro-blogging application.  

The purpose of this application is to provide a platform to share quick 'bits' of information and is modeled after other micro blogging platforms such tumblr, blogger, reddit, buzzfeed, and so on.  It does not necessarily add anything to the micro blogging platform as a whole but was an exercise for me to learn some of the underlying nuts and bolts of such an application.  Content comes in several forms including text, images, gifs, and hyperlinks.  The user is free to post whatever content they desire as long as there is at least a title to the post.

The application utilizes a roles and permissions system containing three main roles: admin, editor, and user (also there is an implicit guest user that is not stored in the database).  A "guest" that visits the site without logging in will be able to view content on the main page and filter by tags.  A guest may then register to become a "User" and login to make blog posts and also has the capability to edit their own posts.  The site owner is given the role of "Admin" and has several extra capabilities such as access to an admin panel that allows for chaning user roles, deleting posts, and editing posts that are not their own.  Admins are able to appoint other admins and editors.  "Editors" have essentially the same abilities as the admins but without access to the admin panel.  

Have fun posting some content!

### Link to screencast
- [Screencast](TODO)

### Professor/TA Details
I will post an admin username and password so you can test it out when I submit.  

##### Extras (on top of existing requirements)
- Roles and permissions (admin, editor, user)
- Javascript to enhance user experience (validator functions, fading messages, and use of third party APIs to implement WYSIWYG text editors)
- Filters for blog posts based on user and tags

##### Stretch goals I did not have time to implement (but would like to someday)
- "Smart" and "pretty" tags using ajax requests and a library like [bootstrap-tagsinput](https://github.com/bootstrap-tagsinput/bootstrap-tagsinput)
- Lazy loading of images.  [Example](http://www.appelsiini.net/projects/lazyload) (Was causing some major slow downs on my page loads and was interupting DOM creation/making a forced synchronous layout.  Did not have time to troubleshoot)
- "Hover gif animation" to increase page load and navigating performance [Example](http://freezeframe.chrisantonellis.com/documentation/) (Current version of Freezeframe JS has issues with CORS and all of the images for this applciation depend on images hosted on a different domain - I didn't want to risk overloading my Digital Ocean instance by saving to my server)
- Handleing HTML5 video such as Imgur's .gifv format or Gfycat.  (Currently these will not work in the "Image URL" field for blog post creation)

Thanks for a great semester!

### Sources
    Laravel 5: http://laravel.com/

    HTML5-Boilerplate (comes with jquery and modernizer): https://html5boilerplate.com/

    Bootstrap: http://getbootstrap.com/

    Open source images: https://unsplash.com/
