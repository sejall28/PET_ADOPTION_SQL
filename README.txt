Name:Sejal Tupe
TIB60 



# 🐾 Pet Adoption System

A simple web-based **Pet Adoption Management System** built using **PHP, MySQL, HTML, CSS**, and **XAMPP**.
This project allows you to add pets, register adopters, and manage adoptions through a user-friendly interface.

---

## 🚀 Features

* ➕ Add new pets with details (name, type, breed, age, gender, description).
* 👤 Manage adopters (name, phone, email, address).
* 🐶 Adopt a pet (link pets with adopters).
* 📋 View lists of pets, adopters, and adoptions.
* 🛠️ Simple UI with forms and dropdowns.

---

## 🛠️ Tech Stack

* **Frontend:** HTML, CSS
* **Backend:** PHP (mysqli)
* **Database:** MySQL
* **Server:** XAMPP (Apache + MySQL)

---

## ⚙️ Installation

1. **Install XAMPP**

   * Download from [Apache Friends](https://www.apachefriends.org/index.html).
   * Start **Apache** and **MySQL** from XAMPP Control Panel.

2. **Clone/Copy Project**

   * Place the project folder `pet_adoption` inside:

     ```
     C:\xampp\htdocs\
     ```

3. **Create Database**

   * Go to [http://localhost/phpmyadmin](http://localhost/phpmyadmin).
   * Create a new database named `pet_adoption`.

4. **Import Tables**
   Run the following SQL to create necessary tables:

   ```sql
   CREATE TABLE pets (
       id INT AUTO_INCREMENT PRIMARY KEY,
       name VARCHAR(100) NOT NULL,
       type VARCHAR(50) NOT NULL,
       breed VARCHAR(100),
       age INT,
       gender VARCHAR(10),
       description TEXT
   );

   CREATE TABLE adopters (
       id INT AUTO_INCREMENT PRIMARY KEY,
       name VARCHAR(100) NOT NULL,
       phone VARCHAR(20),
       email VARCHAR(100),
       address TEXT
   );

   CREATE TABLE adoptions (
       id INT AUTO_INCREMENT PRIMARY KEY,
       pet_id INT NOT NULL,
       adopter_id INT NOT NULL,
       adoption_date DATE,
       FOREIGN KEY (pet_id) REFERENCES pets(id) ON DELETE CASCADE,
       FOREIGN KEY (adopter_id) REFERENCES adopters(id) ON DELETE CASCADE
   );
   ```

5. **Configure Database Connection**
   Edit `db.php` if needed:

   ```php
   $host = "localhost";
   $user = "root";
   $pass = "";
   $db   = "pet_adoption";
   ```

---

## ▶️ Usage

* Open [http://localhost/pet_adoption](http://localhost/pet_adoption) in browser.
* Use:

  * `add_pet.php` → Add new pets.
  * `add_adopter.php` → Register adopters.
  * `adopt_pet.php` → Assign pets to adopters.
  * `index.php` → Home page.

---

## 📂 Project Structure

```
pet_adoption/
│── db.php             # Database connection file
│── index.php          # Homepage
│── add_pet.php        # Add new pets
│── add_adopter.php    # Add adopters
│── adopt_pet.php      # Adoption form
│── css/               # Stylesheets
│── images/            # Pet images
└── README.md          # Project documentation
```

---

## 📌 Future Improvements

* 🖼️ Upload pet images from the form.
* 🔍 Search/filter pets and adopters.
* 📊 Admin dashboard with statistics.
* 🔒 User authentication (Admin/Staff).

---

