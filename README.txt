# PawLink
This application is developed using an MVC folder structure. The MVC architecture separates the application into three components - Model, View and Controller, initialised by the Index file.
The Model handles the connection to the database and dynamic database query functions.
The View is comprised of the user interface files, the HTML, CSS, JavaScript and images.
The Index file loads the Model, establishes the database connection, restricts Controller access by user type and loads the requested Controller.
The Controllers are the coordinators between the Model and the Views. The Controllers receive all requests for the application, and loads the correct View. The View uses the data prepared by the Model to create the final output.

Using an MVC folder structure helps you write better organised, and therefore more maintainable code.  Further, using this method, code repitition is very minimal as it separates the data and business logic from the display.
