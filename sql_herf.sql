-- إنشاء قاعدة البيانات
CREATE DATABASE HarafiDB;

-- استخدام قاعدة البيانات
USE HarafiDB;

-- جدول المستخدمين
CREATE TABLE Users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    location VARCHAR(255),
    user_type ENUM('user', 'professional') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- جدول الحرفيين
CREATE TABLE Professionals (
    professional_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    profession VARCHAR(255) NOT NULL,
    bio TEXT,
    rating FLOAT DEFAULT 0,
    profile_image VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES Users(user_id) ON DELETE CASCADE
);

-- جدول الخدمات
CREATE TABLE Services (
    service_id INT AUTO_INCREMENT PRIMARY KEY,
    professional_id INT,
    service_name VARCHAR(255) NOT NULL,
    service_description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (professional_id) REFERENCES Professionals(professional_id) ON DELETE CASCADE
);

-- جدول الحجزات
CREATE TABLE Bookings (
    booking_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    professional_id INT,
    service_id INT,
    booking_date DATE NOT NULL,
    booking_time TIME NOT NULL,
    status ENUM('Pending', 'Confirmed', 'Cancelled') DEFAULT 'Pending',
    payment_method ENUM('credit-card', 'cash') NOT NULL,
    payment_status ENUM('Pending', 'Paid') DEFAULT 'Pending',
    FOREIGN KEY (user_id) REFERENCES Users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (professional_id) REFERENCES Professionals(professional_id) ON DELETE CASCADE,
    FOREIGN KEY (service_id) REFERENCES Services(service_id) ON DELETE CASCADE
);

-- جدول التقييمات
CREATE TABLE Reviews (
    review_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    professional_id INT,
    rating INT CHECK (rating >= 1 AND rating <= 5),
    review_text TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (professional_id) REFERENCES Professionals(professional_id) ON DELETE CASCADE
);

-- جدول الأسئلة الشائعة
CREATE TABLE FAQs (
    faq_id INT AUTO_INCREMENT PRIMARY KEY,
    question TEXT NOT NULL,
    answer TEXT NOT NULL
);

-- جدول الدعم والاستفسارات
CREATE TABLE SupportTickets (
    ticket_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    subject VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    status ENUM('Open', 'Closed') DEFAULT 'Open',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users(user_id) ON DELETE CASCADE
);