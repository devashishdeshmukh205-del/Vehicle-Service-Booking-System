# Vehicle Parking Management System

A secure PHP and MySQL based web application developed for academic submission, hosted live on InfinityFree.

## 🌐 Live Demo URL
- **Website Link:** http://deva.free.je

## 🛠️ Technology Stack
- **Frontend:** HTML5, CSS3
- **Backend:** PHP (Server-side processing)
- **Database:** MySQL (phpMyAdmin)
- **Hosting Platform:** InfinityFree

## ✨ Key Features Implemented
- **Vehicle Entry & Insertion (INSERT):** Securely saves vehicle number, owner name, slot details, and duration into the database.
- **Records Display (SELECT):** Dynamically lists all parked vehicles in a structured table layout.
- **Search & Filter Functionality:** Allows users to search and filter records easily by vehicle number or owner name.
- **Security (Prepared Statements):** Utilizes PHP `mysqli` prepared statements (`prepare()` and `bind_param()`) to protect against SQL Injection vulnerabilities.

## 🗄️ Database Schema (`parking_slots` table)
```sql
CREATE TABLE parking_slots (
    id INT AUTO_INCREMENT PRIMARY KEY,
    vehicle_no VARCHAR(50) NOT NULL,
    owner_name VARCHAR(100) NOT NULL,
    slot_no VARCHAR(20) NOT NULL,
    duration INT NOT NULL,
    status VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
