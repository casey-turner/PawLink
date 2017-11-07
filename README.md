# :dog: PawLink :paw_prints:
Developer: Casey Turner
Email: casey_turner@outlook.com
View: https://github.com/casey-turner/PawLink

This application is developed using an MVC folder structure. The MVC architecture separates the application into three components - Model, View and Controller, initialised by the Index file.

The Model handles the connection to the database and contains the dynamic database query functions.
The Index file loads the Model, establishes the database connection, restricts Controller access by user type and conditionally loads the requested Controller.
The Controllers are the coordinators between the Model and the Views. The Controllers process all requests for the application based on "actions" within each controller, and loads the correct View.
The View is comprised of the user interface files, the HTML, CSS, JavaScript and images. If needed, the view uses data prepared by the Model to create the final output.

Using an MVC folder structure helps with writing better organised, and therefore more maintainable code.  Further, using this method, code repitition is very minimal as it separates the data and business logic from the display.

Forms are validated using Parsley JS a a javascript form validation library.

# Deployment

A copy of the sql database has been provided in the /sql folder. Database credentials need to be updated in the model/db.php file.

Application runs relative to the index.php file.

***Ensure that the uploads directory inside the View folder has write permissions***

# Major To Do Items as of 7/11/17

- Profile & dog photo upload (and possibly edit) :white_check_mark:
- Rates Form and associated isset conditions, distinguishing dog walkers from owners :white_check_mark:
- Dog walker search functionality :white_check_mark:
- Booking Form functionality :white_check_mark:
- Messaging functionality
- Feedback functionality
- Display of all registered dogs as "Wall of Dogs" using masonry.js :white_check_mark:
