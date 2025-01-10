# QR Code Generator Web Application

## Abstract

This project implements a web application for generating QR codes using the Symfony framework and the `endroid/qr-code-bundle`.  The application provides a user-friendly interface for inputting data and generating corresponding QR code images.  While initial development included planned vCard functionality, this feature is currently undergoing further development and testing and is not yet fully implemented.  This document outlines the project's architecture, functionality, and instructions for installation and usage.

## Introduction

QR codes have become ubiquitous tools for encoding and sharing information quickly and easily. This project aims to provide a robust and flexible web-based solution for generating QR codes, leveraging the Symfony PHP framework and the specialized `endroid/qr-code-bundle`.  The application is designed to be easily deployed and customized, offering a solid foundation for various QR code generation needs.  Further development is planned to integrate full vCard support, enabling the generation of QR codes for contact information.


## Project Architecture

The application is built using the Symfony PHP framework, following the Model-View-Controller (MVC) architectural pattern.  The `endroid/qr-code-bundle` provides the core QR code generation functionality. Key components include:

* **Controller (`QrCodeController.php`):**  Handles user input, generates the QR code image, and manages the response. Two routes are defined: `/qr-code` for the input form and `/qr-code/generate-image` for generating the QR code image.
* **View (`templates/qr_code/form.html.twig`):**  Presents the user interface, including the input form and the displayed QR code image.
* **JavaScript (within `form.html.twig`):**  Provides dynamic form handling and updates the displayed QR code image without requiring a page refresh.


## Functionality

The application currently allows users to input arbitrary text data and generate a corresponding QR code image. The process is as follows:

1.  The user accesses the `/qr-code` route, which renders the input form.
2.  The user enters the desired text data into the form.
3.  Upon submitting the form, JavaScript processes the input and generates the QR code image dynamically using the `endroid/qr-code-bundle`.
4.  The generated QR code image is displayed on the page.

## Installation and Usage

### Prerequisites

*   PHP 8.2 or higher
*   Composer
*   Symfony CLI 5.10.6

### Installation

1.  Clone the repository:
    ```bash
    git clone git@github.com:danian3wa/qr-code-generator.git
    ```
2.  Install dependencies:
    ```bash
    composer install
    ```


### Usage

1.  Start the Symfony development server:
    ```bash
    symfony server:start
    ```
2.  Access the application in your browser at `http://localhost:8000/qr-code`.
3.  Enter the desired text data in the form and click "Generate QR Code".  The QR code image will be displayed below the form.

## Future Work

Future development will focus on completing the integration of vCard support. This will enable users to input contact details via the form and generate QR codes that can be scanned by smartphones to automatically add the contact information.  Further enhancements may include support for different QR code formats (e.g., SVG) and customization options (e.g., colors, logo overlay).

## Conclusion

This QR code generator application provides a basic yet functional implementation for creating QR codes from text data. The use of Symfony and the `endroid/qr-code-bundle` ensures a robust and extensible platform for future development.  The planned addition of vCard support will significantly enhance the application's utility and make it a valuable tool for sharing contact information.