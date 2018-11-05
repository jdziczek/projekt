## Table of Contents
- [Authours](#authours)
- [Title](#title)
- [About project](#about-project)
- [Building](#building)
- [Running locally](#running-locally)

## Authours
D. Cywińska-Litka, J. Dziczek, B. Jarzembiński

## Title
Aplikacja do obsługi zleceń transportowych dla firmy spedycyjnej

## About project
Aplikacja ma służyć pracownikom firmy spedycyjnej “JDB Logistics” zajmującej się transportem lądowym na terenie kraju.

Będzie to aplikacja webowa posiadająca dwa możliwe widoki - widok dyspozytora oraz widok kierowcy. 

Po zalogowaniu się przez dyspozytora aplikacja umożliwi tworzenie nowych zleceń transportowych, zarządzanie istniejącymi zleceniami, rozdysponowywanie zleceń między kierowców. Ponadto będzie posiadać narzędzia do zapisu planowanej trasy oraz orientacyjnej wyceny usługi.

Widok kierowcy umożliwi wyświetlanie zleceń w kolejności chronologicznej (w formie kalendarza), szybki podgląd zlecenia oraz wydruk szegółów.

## Building
On the command line, make sure you are in the `webpage` directory, and type the following command to run the babel script and compile `main.js`:

`npm run babel`

## Running locally
On the command line, make sure you are in the `webpage` directory, and type the following command to start http-server:

`npm start`

Open a browser and access http://localhost:8080