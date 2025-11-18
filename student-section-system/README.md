

## 🎓 Student and Section Management System

### 📘 Project Overview

The **Student and Section Management System** is a web-based application developed as part of the **Midterm Examination Project**. It allows users to manage student information and section details efficiently through a simple, user-friendly interface.

This system enables adding, viewing, updating, and deleting (**CRUD**) records for both **Students** and **Sections**, promoting better organization of academic data.

### 🎯 Objectives

  * To design and implement a functional PHP-based web system for managing student and section data.
  * To perform CRUD operations (Create, Read, Update, Delete) using a MySQL database.
  * To provide a responsive and intuitive user interface using HTML, CSS, and JavaScript.
  * To demonstrate understanding of database integration and web application logic.

### ⚙️ Features / Functionality

#### 🧑‍🎓 Student Module

The **Student** module allows the user to add and manage student information.

**Input Fields:**

| Field | Description |
| :--- | :--- |
| 🆔 ID Number | Unique identifier for each student |
| 👤 Name | Full name of the student |
| Ⓜ️ Middle Initial | Student's middle initial |
| 📧 Email | Email address of the student |
| 📞 Contact | Contact number of the student |
| ⚙️ Actions | Edit or Delete student record |

**Functions:**

  * ➕ Add new student
  * 👁️ View student list
  * 📝 Edit existing records
  * 🗑️ Delete student data

#### 🏫 Section Module

The **Section** module allows the user to add and manage section/class details.

**Input Fields:**

| Field | Description |
| :--- | :--- |
| 🗂️ Section Code | Unique section identifier |
| 🏷️ Section Name | Name or title of the section |
| 📝 Description | Short description about the section |
| 🚪 Room | Assigned classroom or location |
| 👥 Capacity | Maximum number of students allowed |
| ⚙️ Actions | Edit or Delete section record |

**Functions:**

  * ➕ Add new section
  * 👁️ View section list
  * 📝 Edit existing section details
  * 🗑️ Delete section data

### 🌿 System Flow

1.  User opens the system via browser.
2.  Navigates to either the **Student** or **Section** page.
3.  Inputs data into the corresponding form fields.
4.  Saves the record, which is then stored in the database.
5.  Views, edits, or deletes data as needed.

### 💻 Technologies Used

| Technology | Purpose |
| :--- | :--- |
| HTML / CSS | Structure and styling of pages |
| JavaScript | Front-end interactivity |
| PHP | Server-side scripting and backend logic |
| MySQL | Database management |
| XAMPP / Apache | Local development environment |

### 🧱 Database Structure

#### 🧑‍🎓 Student Table

| Column | Type | Description |
| :--- | :--- | :--- |
| id\_number | VARCHAR(20) | Primary key |
| name | VARCHAR(100) | Student full name |
| middle\_initial | CHAR(1) | Middle initial |
| email | VARCHAR(100) | Email address |
| contact | VARCHAR(15) | Contact number |

#### 🏫 Section Table

| Column | Type | Description |
| :--- | :--- | :--- |
| section\_code | VARCHAR(20) | Primary key |
| section\_name | VARCHAR(100) | Section title |
| description | TEXT | Details about the section |
| room | VARCHAR(50) | Classroom name or number |
| capacity | INT(11) | Number of students that can be enrolled |

### 🚀 Installation Steps

1.  Clone or **Download** this repository:

    `git clone https://github.com/racellgpt/student-section-system.git`

### 💡 Usage

Open the system in your web browser.

Navigate to the Student or Section page from the main menu. Use the **Add Form** to input details (student or section). Click **Save** to store data in the database. View, Edit, or Delete records from the displayed table. Manage both modules independently for organized data handling.

**Example actions:** Add new student $\rightarrow$ Fill form $\rightarrow$ Save $\rightarrow$ Data appears in student list. Edit student $\rightarrow$ Update details $\rightarrow$ Save $\rightarrow$ Changes reflected immediately.

### 📸 Screenshots / Code Snippets

```php
<?php
// Insert new student record
if(isset($_POST['add_student'])){
    $sid = $_POST['id_number'];
    $name = $_POST['name'];
    $mi = $_POST['middle_initial'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];

    $query = "INSERT INTO students (id_number, name, middle_initial, email, contact) 
              VALUES ('$sid', '$name', '$mi', '$email', '$contact')";

    mysqli_query($conn, $query);
}
?>
```

### \#\#Contributors

*Racell Jay C. Noveloz - Frontend Developer / IT Student \*Rapahael Galvez, Ramir Orario - Collaboration*

### \#\#License

This project is licensed under the MIT license.

-----

