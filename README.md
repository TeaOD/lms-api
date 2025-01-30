## LMS API Project

This is a Learning Management System (LMS) API built with PHP and Laravel. It provides endpoints to manage courses, students, comments, and registrations. The API is designed to be RESTful, with support for pagination, filtering.

## Project Structure

The project follows the standard Laravel directory structure with some additional customizations for the LMS system. Here’s an overview of the key directories and files:

lms-api/

├── app/\
│   ├── Http/\
│   │   ├── Controllers/\
│   │   │   ├── CourseController.php\
│   │   │   ├── StudentController.php\
│   │   │   ├── CommentController.php\
│   │   │   ├── RegistrationController.php\
│   ├── Models/\
│   │   ├── Course.php\
│   │   ├── Student.php\
│   │   ├── Comment.php\
│   │   ├── Registration.php\
├── config/\
├── database/\
│   ├── migrations/\
│   │   ├── create_courses_table.php\
│   │   ├── create_students_table.php\
│   │   ├── create_comments_table.php\
│   │   ├── create_registrations_table.php\
├── routes/\
│   ├── api.php\
├── tests/\
├── .env\
├── composer.json\
├── README.md

## Features

- **Courses Management:**

    - Create, update, delete, and list courses.

    - Filter courses by title, start_date, and instructor_name.

    - Soft delete support for courses.

- **Students Management:**

    - Register, update, delete, and list students.

- **Comments Management:**

    - Add, update, delete, and list comments on courses.

    - Comments are linked to both students and courses.

- **Registrations Management:**

    - Register students for courses.

    - Prevent duplicate registrations and registrations for ended courses.

    - Filter registrations by course or student.

- **Pagination:**

    - Courses, Comments and Registrations list endpoints support pagination.

## Setup Instructions

Follow these steps to set up the project locally:

**1. Prerequisites**

1. PHP 8.0 or higher
2. [Composer](https://getcomposer.org/)
3. MySQL, PostgreSQL, or SQLite ([XAMPP](https://www.apachefriends.org/))
4. an IDE ([Visual Stuido Code](https://code.visualstudio.com/))

**2. Clone the Repository**
```
git clone https://github.com/TeaOD/lms-api.git
```

**3. Install Laravel**

Install Laravel using Composer:

```
composer global require laravel/installer
```

**4. Set Up the Environment**

Update the .env file with your database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lms
DB_USERNAME=root
DB_PASSWORD=yourpassword
```

**5. Run Migrations**

Run the database migrations to create the required tables:
```
php artisan migrate
```

**6. Seed the Database (Optional)**

Seed the database with sample data (if seeders are available):

```
php artisan db:seed
```

**7. Start the Development Server**

Start the Laravel development server:
```
php artisan serve
```
The API will be available at `http://localhost:8000`.

## API Endpoints

**Courses**

- List Courses: `GET /api/v1/courses`

- Create Course: `POST /api/v1/courses`

- Show Course: `GET /api/v1/courses/{id}`

- Update Course: `PUT /api/v1/courses/{id}`

- Delete Course: `DELETE /api/v1/courses/{id}`

**Students**

- List Students: `GET /api/v1/students`

- Register Student: `POST /api/v1/students`

- Show Student: `GET /api/v1/students/{id}`

- Update Student: `PUT /api/v1/students/{id}`

- Delete Student: `DELETE /api/v1/students/{id}`

**Comments**

- List Comments: `GET /api/v1/comments`

- Create Comment: `POST /api/v1/comments`

- Show Comment: `GET /api/v1/comments/{id}`

- Update Comment: `PUT /api/v1/comments/{id}`

- Delete Comment: `DELETE /api/v1/comments/{id}`

**Registrations**

- List Registrations: `GET /api/v1/registrations`

- Create Registration: `POST /api/v1/registrations`

- Show Registration: `GET /api/v1/registrations/{id}`

- Update Registration: `PUT /api/v1/registrations/{id}`

- Delete Registration: `DELETE /api/v1/registrations/{id}`


## Assumptions

**Soft Deletes:** Courses are soft-deleted, meaning they are not removed from the database but marked as deleted.

**Validation:** All input data is validated based on the requirements (e.g., title is required and has a maximum length of 250 characters).

**Pagination:** List endpoints are paginated with a default of 10 items per page.

**Filters:**
- Courses can be filtered by title, start_date, and instructor_name.

- Registrations can be filtered by course_id and student_id.

**Authentication:**

Authentication is **NOT** implemented in this version. All endpoints are publicly accessible.

## Testing the API

You can test the API using tools like [Postman](https://www.postman.com/). Here’s an example request to create a course:

**Create a Course**

**URL:** `POST http://your-link/api/v1/courses`

**Headers:**

- Click **Body**, select **raw** then select **JSON** format

**Body:**
```
{
  "title": "Laravel Basics",
  "price": 99.99,
  "start_date": "2023-10-01",
  "end_date": "2023-10-31",
  "details": "Learn the basics of Laravel.",
  "instructor_name": "John Doe"
}
```

## Acknowledgments

- [Laravel 11 Documentation](https://laravel.com/docs/11.x)

- [Postman](https://www.postman.com/) for API testing.

- [Dani Krossing](https://www.youtube.com/watch?v=iBaM5LYgyPk) for his helpful tutorial.

- [Funda Of Web IT](https://youtu.be/1WknI88trqw?feature=shared) for his helpful tutorial.

- [Jeremy McPeak](https://youtu.be/SIoeU1x7xok?feature=shared) for his helpful tutorial.
