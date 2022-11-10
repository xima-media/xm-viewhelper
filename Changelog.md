# Change Log
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/en/1.0.0/)
and this project adheres to [Semantic Versioning](http://semver.org/spec/v2.0.0.html).

## [3.2.0] - 2022-11-10
### Added
- BasenameViewHelper
- compatibility to TYPO3 V11 LTS

### Changed
- IbanViewHelper accepts argument

### Removed
- ElseifViewHelper

## [3.1.3] - 2021-03-18
### Added
- BasenameViewHelper

### Changed
- IbanViewHelper accepts parameter
- cleanup and docs

## [3.1.2] - 2021-03-10
### Changed
- YearAndQuarterViewHelper accepts optional DateTime object parameter

## [3.1.1] - 2021-03-04
### Changed
- try and catch reflection in PopulatePlaceholderWithObjectViewHelper
- composer.json contains TYPO3 extension key

## [3.1.0] - 2021-02-26
### Added
- IbanViewHelper
- PopulatePlaceholderWithObjectViewHelper
- PopulatePlaceholderWithArrayViewHelper
- ArrayFromDelimiterStringViewHelper
- ElseifViewHelper
- ContextMatchesViewHelper
- CategoriesViewHelper
- Category model and Repository

## [1.4.0] - 2021-02-03
### Added
- ContextMatchesViewHelper
- examples and wiki links to PHP doc annotation

### Removed
- ContentByContextViewHelper
- html partial

### Changed
- refactored foldor structure and namespaces

## [1.3.1] - 2020-11-30
### Changed
- adjusted template path for ContentByContextViewHelper template2

## [1.3.0] - 2020-11-30
### Added
- ContentByContextViewHelper

### Changed
- organized setup by ViewHelper

## [3.0.0] - 2020-11-17
### Added
- YearAndQuarterViewHelper

## [1.2.0] - 2020-11-18
### Added
- IbanViewHelper
- PopulatePlaceholderWithObjectViewHelper
- PopulatePlaceholderWithArrayViewHelper
- ArrayFromDelimiterStringViewHelper
- ElseifViewHelper

### Changed
- renamed category String to Strings which is to be considered a breaking change due to the change in namespace and ViewHelper usage

## [1.1.0] - 2020-11-13
### Added
- logos to docs
- prepared unit tests
- categorization for the ViewHelper regarding their return value

### Changed
- extended docs added wiki

### Removed
- ext_localconf.php, ext_tables.php and ext_tables.sql

## [1.0.0] - 2020-11-12
### Added
- YearAndQuarterViewHelper
- composer.json
- test environment

### Changed
- extension title

## [0.1.0] - 2020-11-11
### Added
- initial extension build
