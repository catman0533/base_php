<?php
// File: library.php

/**
 * Абстрактный класс книги.
 * Содержит общие свойства и методы для всех типов книг.
 */
abstract class Book {
    protected $title;
    protected $author;
    protected $isbn;
    protected $publicationYear;
    protected $genre;
    protected static $totalReads = 0; // Статическая переменная для подсчета прочтений

    /**
     * Конструктор класса Book.
     */
    public function __construct($title, $author, $isbn, $publicationYear, $genre) {
        $this->title = $title;
        $this->author = $author;
        $this->isbn = $isbn;
        $this->publicationYear = $publicationYear;
        $this->genre = $genre;
    }

    /**
     * Абстрактный метод для получения книги.
     * Должен быть реализован в наследниках.
     */
    abstract public function getBook();

    /**
     * Метод для увеличения количества прочтений.
     */

     public function incrementReadCount() {
        self::$totalReads++;
    }

    /**
     * Статический метод для получения общей статистики прочтений.
     */
    public static function getTotalReads() {
        return self::$totalReads;
    }

    /**
     * Метод для получения информации о книге.
     */
    public function getDetails() {
        return "{$this->title} by {$this->author}, ISBN: {$this->isbn}, Year: {$this->publicationYear}, Genre: {$this->genre}";
    }
}

/**
 * Класс для цифровых книг.
 * Наследует от класса Book и добавляет свойства, специфичные для цифровых книг.
 */
class DigitalBook extends Book {
    private $fileFormat;
    private $downloadLink;

    /**
     * Конструктор класса DigitalBook.
     */
    public function __construct($title, $author, $isbn, $publicationYear, $genre, $fileFormat, $downloadLink) {
        parent::__construct($title, $author, $isbn, $publicationYear, $genre);
        $this->fileFormat = $fileFormat;
        $this->downloadLink = $downloadLink;
    }

    /**
     * Реализация абстрактного метода getBook.
     * Возвращает ссылку для скачивания.
     */
    public function getBook() {
        $this->incrementReadCount();
        return "Download link: {$this->downloadLink}";
    }

    /**
     * Метод для получения формата файла.
     */
    public function getFileFormat() {
        return $this->fileFormat;
    }
}

/**
 * Класс для бумажных книг.
 * Наследует от класса Book и добавляет свойства, специфичные для бумажных книг.
 */
class PhysicalBook extends Book {
    private $shelfLocation;
    private $libraryAddress;

    /**
     * Конструктор класса PhysicalBook.
     */
    public function __construct($title, $author, $isbn, $publicationYear, $genre, $shelfLocation, $libraryAddress) {
        parent::__construct($title, $author, $isbn, $publicationYear, $genre);
        $this->shelfLocation = $shelfLocation;
        $this->libraryAddress = $libraryAddress;
    }

    /**
     * Реализация абстрактного метода getBook.
     * Возвращает адрес библиотеки для получения книги.
     */
    public function getBook() {
        $this->incrementReadCount();
        return "Available at: {$this->libraryAddress}";
    }

    /**
     * Метод для получения расположения на полке.
     */
    public function getShelfLocation() {
        return $this->shelfLocation;
    }
}

// Пример использования классов

// Создание цифровой книги
$digitalBook = new DigitalBook(
    "Digital Title",
    "Author A",
    "1234567890",
    2021,
    "Fiction",
    "PDF",
    "http://download.link/digital-title"
);

// Создание бумажной книги
$physicalBook = new PhysicalBook(
    "Physical Title",
    "Author B",
    "0987654321",
    2019,
    "Non-Fiction",
    "Shelf A3",
    "123 Library St."
);

// Получение информации и получение книг
echo $digitalBook->getDetails() . PHP_EOL; // Информация о цифровой книге
echo $digitalBook->getBook() . PHP_EOL; // Ссылка для скачивания

echo $physicalBook->getDetails() . PHP_EOL; // Информация о бумажной книге
echo $physicalBook->getBook() . PHP_EOL; // Адрес библиотеки

// Получение общей статистики прочтений
echo "Total Reads: " . Book::getTotalReads() . PHP_EOL; // Выводит общее количество прочтений
?>
