# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.0.0] - 2026-01-21

### Added

- Professional documentation suite (README, CONTRIBUTING, LICENSE, CHANGELOG).
- Missing core models: `Notification`, `QuoteRequests`.
- Missing mailables for property management workflows: `GetQuoteNotification`, `ShowingNotification`, `PmaNotification`.

### Fixed

- **Module Architecture**: Flattened command namespaces in `config/modules.php` to align with `nwidart/laravel-modules` v10.
- **Security**: Moved hardcoded Stripe and Twilio secrets to environment variables.
- **Console Commands**: Resolved namespace imports and logic errors in 11+ artisan commands.
- **Dependencies**: Relaxed version constraints for `barryvdh/laravel-ide-helper` to ensure compatibility.

### Changed

- Re-initialized Git history for a clean production-ready repository.
- Improved `README.md` with detailed feature overview and installation guide.
