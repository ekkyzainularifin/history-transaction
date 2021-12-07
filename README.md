<h1 align="center">History Transaction</h1>

<p align="center">
    <strong>A PHP library for generating log database transaction.</strong>
</p>

<p align="center">
    <a href="https://github.com/ekkyzainularifin/history-transaction"><img src="https://img.shields.io/badge/source-eza/history--transaction-green?style=flat-square" alt="Source Code"></a>
    <a href="https://packagist.org/packages/eza/history-transaction"><img src="https://img.shields.io/packagist/v/eza/history--transaction?style=flat-square&label=release" alt="Download Package"></a>
    <a href="https://php.net"><img src="https://img.shields.io/packagist/php-v/eza/history--transaction?style=flat-square&colorB=%238892BF" alt="PHP Programming Language"></a>
</p>

## Installation

Run the following command to add it as a requirement to your project's
`composer.json`:

```bash
composer require eza/history-transaction
```
You can install the package by running the command:
```bash
php artisan history-transaction:install
```
After running instalation command you will see `log_transaction` table


## Usage

It's simple, just import the History Transaction facade in your model.

```bash
use HistoryTransaction;
```
