## Midterm Instruction Guide

This project is a web-based application designed for managing students, subjects, and user login. It includes features for student data management, subject assignment, and user authentication.

## Files and Functions Overview

### Files

* **index.php**: Entry point of the application, containing the login form and functions to validate user credentials.
* **dashboard.php**: Protected page showing a welcome message and options for managing students and subjects. Requires a valid user session.
* **student.php / subject.php**: Pages for managing students and subjects, allowing you to add, edit, and list students or subjects.
* **functions.php**: Contains core functions used across the application for user validation, session management, and data handling.

### Directory Structure

```
root/
├── dashboard.php
├── footer.php
├── functions.php
├── header.php
├── index.php
├── logout.php
├── student/
│   ├── attach-subject.php
│   ├── delete.php
│   ├── dettach-subject.php
│   ├── edit.php
│   └── register.php
└── subject/
    ├── add.php
    ├── delete.php
    └── edit.php
```

## Key Functions in functions.php

**User Authentication**

* `getUsers()`
* `validateLoginCredentials($email, $password)`
* `checkLoginCredentials($email, $password, $users)`
* `checkUserSessionIsActive()`

**Session Management**

* `guard()`

**Error Handling**

* `displayErrors($errors)`
* `renderErrorsToView($error)`

**Student Management**

* `validateStudentData($student_data)`
* `checkDuplicateStudentData($student_data)`
* `getSelectedStudentIndex($student_id)`
* `getSelectedStudentData($index)`

**Subject Management**

* `validateSubjectData($subject_data)`
* `checkDuplicateSubjectData($subject_data)`
* `getSelectedSubjectIndex($subject_code)`
* `getSelectedSubjectData($index)`
* `validateAttachedSubject($subject_data)`

## Functions Glossary

* **getUsers()**
  - Returns a hardcoded array of 5 users, each with an email and password.

* **validateLoginCredentials($email, $password)**
  - Validates login credentials by checking if the provided email and password are valid.
  - Returns an array of error messages if the email is empty, not in a valid email format, or if the password is empty.

* **checkLoginCredentials($email, $password, $users)**
  - Checks if a given email and password match any user in the provided list of users.
  - Returns `true` if a match is found, `false` otherwise.
  - Note: This function is case-sensitive and does not hash passwords, which is not recommended for secure password storage.

* **checkUserSessionIsActive()**
  - Checks if a user's session is active by verifying the existence of an email address in the session.
  - If the email is present, it checks if a current page is set in the session.
  - If both conditions are met, it redirects the user to the current page.

* **guard()**
  - Checks if a user is logged in by verifying the existence and non-emptiness of the email key in the `$_SESSION` superglobal array.
  - If the condition is not met, it redirects the user to the base URL of the application.

* **displayErrors($errors)**
  - Takes an array of error messages (`$errors`) and returns a formatted HTML string displaying the errors in an unordered list, preceded by a bold heading "System Errors".

* **renderErrorsToView($error)**
  - Takes an error message as input and returns a formatted HTML alert box containing the error message.
  - If the input is empty, it returns `null`.
  - The alert box is styled with Bootstrap classes for a danger alert with a dismissible close button.

* **getBaseURL()**
  - Returns the base URL of the application as a string, e.g., `http://dct-ccs.test/midterms/`.

* **validateStudentData($student_data)**
  - Validates student data by checking if 'student_id', 'first_name', and 'last_name' are not empty.
  - Adds error messages to the `$errors` array if any field is empty.
  - Returns an empty array if no errors are found.

* **checkDuplicateStudentData($student_data)**
  - Checks if a student with the same ID already exists in the session data.
  - Adds an error message to the `$errors` array if a duplicate is found.
  - Returns an empty array if no duplicates are found.

* **getSelectedStudentIndex($student_id)**
  - Finds and returns the index of a student in the `$_SESSION['student_data']` array based on the provided `$student_id`.
  - Returns `null` if the student is not found.

* **getSelectedStudentData($index)**
  - Retrieves a student's data from the session variable `student_data` based on the provided index.
  - Returns the corresponding student data if the index exists, `null` otherwise.

* **validateSubjectData($subject_data)**
  - Validates subject data by checking if 'subject_code' and 'subject_name' are not empty.
  - Adds error messages to the `$errors` array if any field is empty.
  - Returns an empty array if no errors are found.

* **checkDuplicateSubjectData($subject_data)**
  - Checks if a subject already exists in the session data by comparing its code or name with existing subjects.
  - Returns an error message if a duplicate is found.

* **getSelectedSubjectIndex($subject_code)**
  - Finds the index of a subject in the `$_SESSION['subject_data']` array based on its `$subject_code`.
  - Returns the index if found, `null` otherwise.

* **getSelectedSubjectData($index)**
  - Retrieves subject data from the session variable `$_SESSION['subject_data']` based on the provided index.
  - Returns the corresponding subject data if the index exists, `null` otherwise.

* **validateAttachedSubject($subject_data)**
  - Checks if at least one subject is selected in the provided `$subject_data`.
  - Returns an error message if no subjects are selected.
  - Returns an empty array if at least one subject is selected.

Here's a polished version of your instructions, with some adjustments for clarity, consistency, and formatting.


## Core Project Functionalities

**Login Process:**

* Users can log in from `index.php` by providing their email and password.
* Upon successful login, the application redirects the user to `dashboard.php`.
* If login fails, an appropriate error message displays.
* If the email field is blank or contains an invalid format, display an error message.
* If the password field is blank, display an error message.
* If the user is already authenticated, prevent access to the login page.

**Student Management:**

* **Adding a Student:**
    * Navigate to `student.php`.
    * Enter the student’s ID, first name, and last name.
    * The form validates entries to prevent empty fields and duplicate IDs.
    * Display an error message for invalid input.
* **Editing a Student:**
    * Select a student from the list.
    * Modify details as needed and save changes.
* **Deleting a Student:**
    * Select a student from the list.
    * Display student information with a verification prompt.
    * Delete the record from the session.
* **Viewing Students:**
    * Display a list of students, showing ID, name, and options (Edit, Delete, and Attach Subject).

**Subject Management:**

* **Adding a Subject:**
    * Go to `subject.php`.
    * Enter the subject code and name.
    * The form validates required fields and prevents duplicate entries.
* **Editing a Subject:**
    * Modify subject details as needed and save changes.
* **Deleting a Subject:**
    * Select a subject from the list.
    * Display subject information with a verification prompt.
    * Delete the record from the session.
* **Viewing Subjects:**
    * Display a list of all added subjects, showing the code, name, and actions (Edit and Delete).

**Assigning Subjects to Students:**

* **Attaching Subjects:**
    * After selecting a student, attach one or more subjects.
    * A validation function ensures that at least one subject is selected.
    * If all subjects are attached, hide the form and display a confirmation message.
    * Display a list of subjects attached to the student.
    * Provide an option to detach subjects as needed.

**Session and Page Guarding:**

* Sensitive pages like `dashboard.php`, `student.php`, and `subject.php` should be protected.
* Use a `guard()` function at the top of each page to prevent unauthorized access.

**Running the Application:**

1. Ensure the project files are hosted on a PHP server (e.g., XAMPP, WAMP, or Laragon).
2. Access the project via a URL, such as `http://localhost/project-directory/`.
3. Use the login credentials defined in `getUsers()` (e.g., `user1@email.com` and password).
4. Create at least five static users for testing.
5. Once logged in, navigate to `dashboard.php` to manage students and subjects.

**Git Requirements for Code Submissions:**

* **Git Commits:** Ensure each feature or change has a clear, descriptive commit message.
* **Branching:** Create separate branches for each feature or bug fix. 